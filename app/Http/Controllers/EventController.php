<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Nova\EventPage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class EventController extends Controller
{

    public function __construct()
    {
        $this->locale = App::currentLocale();
    }

    public function index() {

        $event = Event::where('date_end', '>=', now())->orderBy('date_start')->first();

        if ($event)
            return redirect(route('events.registration', ['event' => $event]));

        return view('events.index', ['events' => $event]);
    }

    public function registration(Event $event, Request $request) {

        $terms = [];
        foreach ($event->terms as $term)
            $terms[$term->key] = $term->description;

        return view('events.show', ['event' => $event, 'terms' => $terms, 'testing' => $request->query('q') == 'A3rzgnh4gTxE']);
    }
}
