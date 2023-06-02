<?php

namespace App\Http\Controllers;

use App\Billing\PaymentGateway;
use App\Http\Requests\StoreRegistrationRequest;
use App\Mail\OrderComplete;
use App\Models\Event;
use App\Models\EventPage;
use App\Models\Order;
use App\Models\Subscriber;
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
        $request->price = $event->calculatePrice($request);

        $order = new Order;
        $order->event_id = $event->id;
        $order->updateViaPost($request);

        if ($request->save_user) {
            $user = User::firstOrNew(['email' => $request->email]);
            $user->updateViaPost($request);

            $order->user_id = $user->id;
            $order->save();
        }

        $subscriber = Subscriber::updateOrCreate(
            ['email' => $request->email],
            [
                'first_name' => Str::title($request->baptism_name ?? $request->first_name),
                'last_name' => Str::title($request->last_name),
                'language' => $request->language
            ]
        );

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

        if ($order->payment == "card")
            return redirect($order->getPaymentLink());

        return redirect()->route('registration.finished', ['order' => $order]);
    }

    public function thank_you(Order $order) {

        $order->currencySymbol = ($order->currency == "EUR" ? "€" : "Lei");

        $page = EventPage::where('event_id', $order->event_id)
                        ->where('key', 'ty-'. $order->payment)
                        ->first();

        return view('registration.finished', ['order' => $order, 'page' => $page]);
    }
}
