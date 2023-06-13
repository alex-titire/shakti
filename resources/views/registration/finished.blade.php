<x-guest-layout>

    <img class="mx-auto my-6 max-h-16" src="{{ Storage::url($order->event->eventType->logo_wide) }}" alt="Venus Event logo">

    <x-container>
        <h1 class="text-2xl text-center">{{ $title ?? __('general.success') }}!</h1>

        <div class="my-12 static-page">

            @if($page)
            {!! str_replace(['{first_name}', '{order_total}'], [$order->user->baptism_name ?? $order->first_name, $order->price .' '. $order->currencySymbol], $page->content) !!}
            @else
            {{ __('general.thank_you') }}
            @endif

            <p class="mt-4">
                Te îmbrățișăm,<br>
                Echipa Venus<br>
                Tel. <a class="text-pink-700" href="tel:0040737620999">+40737620999</a>
            </p>
        </div>
    </x-container>

</x-guest-layout>
