<?php

namespace App\Http\Controllers;

use App\Mail\EmailCodeMtvSent;
use App\Mail\EmailDynamicNotification;
use App\Mail\EmailEventFinished;
use App\Models\Notification;
use App\Models\Order;
use App\Models\Setting;
use App\Models\Subscriber;
use App\Models\User;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class CronsController extends Controller
{
    public function sendCodeEmailToSubscribers() {

        // wget -O /dev/null https://registration.venus.org.ro/crons/send-code-email

        $event_id = 4;

        $subs = Order::whereNotNull('mtv_code')
            ->where('event_id', $event_id)
            ->whereNull('code_sent_at')
            ->whereNull('code_error_at')
            ->where('attendance', '=', 'online')
            ->whereIn('order_status_id', [7,8,9,12])
            // ->whereIn('id', [564])
            ->take(5)
            ->get();

        if (count($subs))
            foreach ($subs as $item) {
                $item->send_registration_code();
            }
    }

    public function sendNotifications() {

        // wget -O /dev/null https://registration.venus.org.ro/crons/send-custom-notifications

        $notification = Notification::where('active', 1)
                                    ->where('type', 'broadcast')
                                    ->first();

        if ( ! is_null($notification)) {

            $subs = User::select('first_name', 'baptism_name', 'email', 'gender', 'language', 'notification_user.id')
                    ->join('notification_user', function(JoinClause $join) use ($notification) {
                        $join->on('users.id', '=', 'notification_user.user_id')
                            ->where('notification_user.notification_id', '=', $notification->id)
                            ->whereNull('notification_user.sent_time')
                            ->whereNull('notification_user.error_time');
                    })
                    ->take(5)
                    ->get();

            if (count($subs)) {

                foreach ($subs as $item) {

                    try {
                        Mail::to($item->email)->send(new EmailDynamicNotification($notification, $item));
                        DB::table('notification_user')
                            ->where('id', $item->id)
                            ->update(['sent_time' => date("Y-m-d H:i:s")]);
                    }
                    catch (\Exception $e) {
                        Log::warning('Email notification failed to send.', ['user_id' => $item->id, 'email' => $item->email]);
                        DB::table('notification_user')
                            ->where('id', $item->id)
                            ->update(['error_time' => date("Y-m-d H:i:s")]);
                    }
                }

                if (count($subs) < 5) {
                    $notification->active = 0;
                    $notification->save();
                }
            }
            else {
                echo "no more users to send notifications to\n";
                $notification->active = 0;
                $notification->save();
            }
        }
        else {
            echo "no active notifications\n";
        }
    }

    public function sendThankYouEmailToSubscribers() {

//        die();

        // wget -O /dev/null https://registration.venus.org.ro/crons/send-thank-you-email

        $subs = Subscriber::whereNull('email_confirmation')
            ->whereNotNull('mtv_code')
            ->where('status', '!=', 'rejected')
//            ->whereIn('id', [1696])
            ->take(5)
            ->get();

        if (count($subs)) {

            foreach ($subs as $item) {
                try {
                    Mail::to($item->email)->send(new EmailEventFinished($item));
                }
                catch (\Exception $e) {
                    Log::warning('Email thank you failed to send.', ['id' => $item->id, 'email' => $item->email]);
                }

                $item->email_confirmation = date("Y-m-d H:i:s");
                $item->save();
            }
        }
        else {
            $setting = Setting::where('key', '=', 'cron_finished')->first();

            if ($setting->value != 1) {

                Mail::send([], [], function ($message) {
                    $message->to("alex.titire@pm.me")
                        ->from('no-reply@venus.org.ro')
                        ->subject("Cron finished Venus")
                        ->html('this cron job has finished');
                });

                $setting->value = 1;
                $setting->save();
            }
        }
    }

    public function sendCustomNotification() {

        // die();

        // wget -O /dev/null https://registration.venus.org.ro/crons/send-custom-notification

        $cron_status = Setting::firstOrNew([
                'key' => 'cron_finished'
            ]);

        if ($cron_status->value == 1)
            return false;

        $notification_id = 3;
        $list_id = 2;

        $mail = Notification::where('id', '=', $notification_id)->firstOrFail();

        $subs = DB::table('subscribers')
                        ->join('mailing_list_subscriber', 'subscribers.id', '=', 'mailing_list_subscriber.subscriber_id')
                        ->where('mailing_list_subscriber.mailing_list_id', '=', $list_id)
                        ->where('mailing_list_subscriber.last_notification_id', '!=', $notification_id)
                        ->select('subscribers.first_name', 'subscribers.email', 'subscribers.language', 'mailing_list_subscriber.id', 'mailing_list_subscriber.subscriber_id')
                        ->take(5)
                        ->get();

        $ids = [];

        if (count($subs)) {

            foreach ($subs as $item) {

                $ids[] = $item->id;
                $status = '';

                try {
                    Mail::to($item->email)->locale($item->language)->send(new EmailDynamicNotification($mail, $item));
                    $status = 'ok';
                }
                catch (\Exception $e) {
                    Log::warning('Email custom notification failed to send.', ['id' => $item->id, 'email' => $item->email]);
                    $status = 'error';
                }
            }

            DB::table('mailing_list_subscriber')
                ->whereIn('id', $ids)
                ->update([
                    'last_notification_id' => $mail->id,
                    'updated_at' => date("Y-m-d H:i:s"),
                    'status' => $status
                ]);
        }
        else {
            Mail::send([], [], function ($message) {
                $message->to("alex.titire@pm.me")
                    ->from('no-reply@venus.org.ro')
                    ->subject("Cron finished Venus")
                    ->html('this cron job has finished');
            });

            $cron_status->value = 1;
            $cron_status->save();
        }
    }

    public function confirmGift($id) {

        $user = DB::table('notifications')->find($id);

        if (is_null($user->confirmation_date)) {

            DB::table('notifications')
                ->where('id', $user->id)
                ->update(['confirmation_date' => date("Y-m-d H:i:s")]);

            $mail = $user->name. " ({$user->email}) a confirmat citirea mailului despre gratuitatea din 2022";

            Mail::raw($mail, function ($message) use ($user) {
                $message->to("shaktiinextaz@gmail.com")
                    ->subject($user->name .' a confirmat citirea mailului');
            });
        }

        return view('pages.gift_confirmation', ['user' => $user]);
    }
}
