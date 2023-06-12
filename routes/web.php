<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

$locale = request()->segment(1);

if (in_array($locale, config('app.available_locales'))) {
    \Illuminate\Support\Facades\App::setLocale($locale);
} else {
    $locale = null;
}

$language = \Illuminate\Support\Facades\App::currentLocale();

Route::view('/', 'welcome')->name('home');

Route::prefix($locale)->group(function () use ($language) {

    Route::get('events', [\App\Http\Controllers\EventController::class, 'index'])->name('events');

    Route::get('registration/{event}', [\App\Http\Controllers\EventController::class, 'registration'])->name('events.registration');
    Route::post('registration/{event}', [\App\Http\Controllers\OrderController::class, 'store'])->name('registration.store');

    Route::get('checkout/{order}', [\App\Http\Controllers\OrderController::class, 'checkout'])->name('registration.checkout');
    Route::get('payment/{order}/{status}', [\App\Http\Controllers\OrderController::class, 'card_return'])->name('registration.card_return');

    Route::get('thank_you/{order}', [\App\Http\Controllers\OrderController::class, 'thank_you'])->name('registration.finished');

    Route::get('event-page/{page}', function(\App\Models\EventPage $page) {
        return view('pages.show', ['page' => $page]);
    })->name('events.page');
});

// CRONS
Route::prefix('crons')->group(function() {

    Route::get('/send-code-email', [\App\Http\Controllers\CronsController::class, 'sendCodeEmailToSubscribers']);
    Route::get('/send-custom-notification', [\App\Http\Controllers\CronsController::class, 'sendCustomNotification']);

//    Route::get('/send-thank-you-email', [\App\Http\Controllers\CronsController::class, 'sendThankYouEmailToSubscribers']);
//    Route::get('/confirm-gift-approval/{id}', [\App\Http\Controllers\CronsController::class, 'confirmGift'])->name('giftConfirmation');
});


//require __DIR__.'/old_routes.php';

// ARTISAN FOR LIVE
//Route::get('artisan-cn', function() {
//    exec('php artisan nova:check-license', $output, $retval);
//    echo "Returned with status $retval and output:\n";
//    print_r($output);
//});

Route::get('/mailable', function () {
    $item = \App\Models\Order::find(7);

//    Mail::to("alex.titire@pm.me")->send(new \App\Mail\EmailEventFinished($item));
    return new \App\Mail\OrderComplete($item);
});

Route::get('/mailable/en', function () {
    $item = \App\Models\Order::find(342);

//    Mail::to($item->email)->send(new \App\Mail\EmailEventFinished($item));
    return new \App\Mail\EmailCodeMtvSent($item);
});

Route::get('/notification-check/{nid}/{lang}', function($nid, $lang = "ro") {

    $subs = \Illuminate\Support\Facades\DB::table('subscribers')
                        ->join('mailing_list_subscriber', 'subscribers.id', '=', 'mailing_list_subscriber.subscriber_id')
                        ->where('mailing_list_subscriber.mailing_list_id', '=', 2)
                        ->where('mailing_list_subscriber.last_notification_id', '!=', 3)
                        ->select('subscribers.first_name', 'subscribers.email', 'subscribers.language', 'mailing_list_subscriber.id', 'mailing_list_subscriber.subscriber_id')
                        ->take(50)
                        ->get();

    dd($subs);

    $item = \App\Models\Subscriber::find(($lang == 'ro' ? 2 : 472));

    $mail = \App\Models\Notification::where('id', '=', $nid)->firstOrFail();

    return new \App\Mail\EmailDynamicNotification($mail, $item);
});

Route::get('assign-codes', function() {

        $event_id = 2;

        $updates = \App\Models\Order::whereNull('mtv_code')
                ->where('event_id', $event_id)
                ->whereIn('order_status_id', [7, 8, 9, 12])
                ->get();

        $total = 0;
        foreach ($updates as $item) {

//            $type = (in_array($item->status, ['free', 'free_problem']) OR $item->created_at < '2021-10-08') ? 'bonus' : 'normal';

            $code = \App\Models\EventCode::whereNull('order_id')
                            ->where('event_id', $event_id)
                            ->first();

            if (is_null($code)) {
                echo "request more codes";
                die();
            }

            $code->order_id = $item->id;
            $code->save();

            $item->mtv_code = $code->code;
            $item->save();

            $total++;
        }

        echo "done, updated {$total} records";
        exit;
});
