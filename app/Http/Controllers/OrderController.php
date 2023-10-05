<?php

namespace App\Http\Controllers;

use App\Billing\PaymentGateway;
use App\Http\Requests\StoreRegistrationRequest;
use App\Mail\OrderComplete;
use App\Models\Event;
use App\Models\EventPage;
use App\Models\Order;
use App\Models\OrderStatus;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class OrderController extends Controller
{
    public function index(Request $request) {

        $locale = App::currentLocale();

        if ( ! in_array($locale, ['en', 'ro']))
            return abort(404);

        return view('registration.form', ['locale' => App::currentLocale(), 'testing' => $request->query('q') == 'A3rzgnh4gTxE']);
    }

    public function store(StoreRegistrationRequest $request, Event $event) {

        $validated = $request->validated();

        $user = User::firstOrNew(['email' => $request->email]);
        $user->updateDetails($request);

        $order = Order::create([
            'event_id' => $event->id,
            'user_id' => $user->id,
            'first_name' => $user->first_name,
            'last_name' => $user->last_name,
            'phone' => $user->phone,
            'email' => $user->email,
            'price' => $event->calculatePrice($request),
            'currency' => $request->currency ?? (strtolower($request->student) == "en" ? 'eur' : 'ron'),
            'payment' => $request->payment,
            'order_status_id' => OrderStatus::where('key', '=', 'new')->first()->id,
            'comments' => $request->comments,
            'mtv_code' => $request->mtv_code,
            'attendance' => $request->attending ?? $event->attendance,
        ]);

        $order->picture_front = $order->save_image($request, 'picture_front');
        $order->save();

        if ($order->payment !== "card") {

            // refactor this into an event
            try {
                Mail::to($order->email)->send(new OrderComplete($order));
                $order->email_sent = date("Y-m-d H:i:s");
                $order->save();
            }
            catch (\Exception $e) {
                Log::warning('Order complete email failed to send.', ['id' => $order->id, 'email' => $order->email]);
            }
            // end OrderCompleteEvent

            return redirect()->route('registration.finished', ['order' => $order]);
        }
        else
            return redirect()->route('registration.checkout', ['order' => $order]);
    }

    public function checkout(Order $order) {

        return $order->user->checkout([[
            'price_data' => [
                'currency' => $order->currency,
                'product_data' => [
                    'name' => $order->event->title,
                ],
                'unit_amount' => ($order->email == "dragusin.alexandra@yahoo.com" ? 200 : $order->price * 100),
            ],
            'quantity' => 1,
        ]], [
            'success_url' => route('registration.card_return', ['order' => $order, 'status' => 'success']),
            'cancel_url' => route('registration.card_return', ['order' => $order, 'status' => 'cancelled']),
        ]);
    }

    /**
     * does not function properly
     * the operations are ok but the layout is not editable
     */
    public function purchase(Order $order, Request $request) {

        config(['cashier_currency' => $order->currency]);

        try {
            $stripeCharge = $order->user->charge(
                200, $request->pid, ['currency' => 'ron']
            );

            $order->stripe_status = $stripeCharge->status;
        }
        catch (\Stripe\Exception\CardException $e) {

            Log::error('Stripe charge failed.', ['id' => $order->id, 'error' => $e->getMessage()]);
            $order->stripe_status = 'card_error';
        }
        catch (\Stripe\Exception\InvalidRequestException $e) {

            Log::error('Stripe charge failed.', ['id' => $order->id, 'error' => $e->getMessage()]);
            $order->stripe_status = 'invalid_request_error';
        }
        catch (\Exception $e) {

            Log::error('Stripe charge failed.', ['id' => $order->id, 'error' => $e->getMessage()]);
            $order->stripe_status = 'unknown_error';
        }

        // return redirect()->route('registration.finished', ['order' => $order]);
    }

    public function thank_you(Order $order) {

        $order->currencySymbol = ($order->currency == "eur" ? "€" : "Lei");

        $page = EventPage::where('event_id', $order->event_id)
                        ->where('key', 'ty-'. $order->payment)
                        ->first();

        return view('registration.finished', ['order' => $order, 'page' => $page]);
    }

    public function card_return(Order $order, $status) {

        if ($status == "success") {

            // refactor this into an event
            try {
                Mail::to($order->email)->send(new OrderComplete($order));
                $order->email_sent = date("Y-m-d H:i:s");
            }
            catch (\Exception $e) {
                Log::warning('Order complete email failed to send.', ['id' => $order->id, 'email' => $order->email]);
            }
            // end OrderCompleteEvent
        }

        $order->stripe_status = $status;
        $order->save();

        $page = EventPage::where('event_id', $order->event_id)
                        ->where('key', 'ty-card-'. $status)
                        ->first();

        $order->currencySymbol = ($order->currency == "eur" ? "€" : "Lei");

        return view('registration.finished', ['order' => $order, 'page' => $page, 'title' => $page->title]);
    }
}
