<?php

namespace App\Http\Controllers;

use App\Mail\EmailCodeMtvSent;
use App\Mail\EmailDynamicNotification;
use App\Mail\EmailEventFinished;
use App\Models\MailingList;
use App\Models\MailingListSubscriber;
use App\Models\Notification;
use App\Models\Order;
use App\Models\Setting;
use App\Models\Subscriber;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class CronsController extends Controller
{
    public function sendCodeEmailToSubscribers() {

    //    die();

        // wget -O /dev/null https://registration.venus.org.ro/crons/send-code-email

        $event_id = 2;

        $subs = Order::whereNotNull('mtv_code')
            ->where('event_id', $event_id)
            ->whereNull('code_sent_at')
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
