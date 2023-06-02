<x-guest-layout>

    <img class="mx-auto my-6 max-h-16" src="{{ Storage::url($order->event->eventType->logo_wide) }}" alt="Venus Event logo">

    <x-container>
        <h1 class="text-2xl text-center">{{ __('general.success') }}!</h1>

        <div class="my-12">
            <p class="my-2">Dragă {{ $order->first_name }},</p>
            <p class="my-2">Îți mulțumim pentru înscrierea în <strong>Tabăra spirituală MAHA SHAKTI</strong>, ce va avea loc în perioada {{ __('general.timestamp') }}.</p>
            <p class="my-2">Îți confirmăm pe această cale că am primit înscrierea ta în tabără, urmând ca echipa de organizare să verifice corectitudinea* datelor trimise.</p>
            <p class="italic my-2">*în cazul în care anumite informații lipsesc sau nu sunt concludente, vei fi contactat{{ $order->sex == "f" ? "ă" : "" }} de către echipa de organizare.</p>
            <p class="my-2">Mai departe, pentru a continua procesul de înscriere, te rugăm să efectuezi plata pentru accesul în tabără cash, la sediul Venus, intrarea Romaniței, nr.15, de luni până vineri în intervalul 13-17.</p>
            <p class="my-2">Te rugăm să ai în vedere că înscrierea în tabără va fi completă după ce plata va fi confirmată.</p>
            <p class="my-2">Pentru orice alte detalii sau întrebări, te rugăm să ne contactezi la adresa <a class="text-pink-700" href="mailto:{{ config('site.contact_email') }}" target="_blank">{{ config('site.contact_email') }}</a>.</p>
            <p class="mt-4">
                Te îmbrățișăm,<br>
                Echipa Venus<br>
                Tel. <a class="text-pink-700" href="tel:0040737620999">+40737620999</a>
            </p>
        </div>
    </x-container>

</x-guest-layout>
