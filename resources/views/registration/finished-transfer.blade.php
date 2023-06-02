<x-guest-layout>

    <img class="mx-auto my-6 max-h-16" src="{{ Storage::url($order->event->eventType->logo_wide) }}" alt="Venus Event logo">

    <x-container>
        <h1 class="text-2xl text-center">{{ __('general.success') }}!</h1>

        <div class="my-12">
            @if ($order->language == "ro")
            <p class="my-2">Dragă {{ $order->first_name }},</p>
            <p class="my-2">Îți mulțumim pentru înscrierea în <strong>Tabăra spirituală MAHA SHAKTI</strong>, ce va avea loc în perioada {{ __('general.timestamp') }}.</p>
            <p class="my-2">Îți confirmăm pe această cale că am primit înscrierea ta în tabără, urmând ca echipa de organizare să verifice corectitudinea* datelor trimise.</p>
            <p class="italic my-2">*în cazul în care anumite informații lipsesc sau nu sunt concludente, vei fi contactat{{ strtolower($order->sex) == "f" ? "ă" : "" }} de către echipa de organizare.</p>
            <p class="my-2">Mai departe, pentru a continua procesul de înscriere, te rugăm să efectuezi plata în cont* pentru accesul în tabără și să ne trimiți confirmarea plății la adresa <a class="text-pink-700" href="mailto:{{ config('site.contact_email') }}" target="_blank">{{ config('site.contact_email') }}</a>.</p>
            <p class="my-2">Te rugăm să ai în vedere că înscrierea în tabără va fi completă după ce plata va fi confirmată.</p>
            <p class="my-4 text-lg">Taxă tabără: <strong>{{ $order->price / 100 ." ". $order->currencySymbol }}</strong>.</p>
            <p class="my-2">IBAN: <strong>{{ $order->currency == "EUR" ? config('site.bank_eur') : config('site.bank_ron') }}</strong></p>
            <p class="my-2"><strong>BANCA Transilvania, Agentia Margeanului</strong></p>
            <p class="my-2">Titular: <strong>Venus Asociatia pentru elevarea femeii</strong></p>
            <p class="my-2">Pentru orice alte detalii sau întrebări, te rugăm să ne contactezi la adresa <a class="text-pink-700" href="mailto:{{ config('site.contact_email') }}" target="_blank">{{ config('site.contact_email') }}</a>.</p>
            <p class="mt-4">
                Te îmbrățișăm,<br>
                Echipa Venus<br>
                Tel. <a class="text-pink-700" href="tel:0040737620999">+40737620999</a>
            </p>
            @else
            <p class="my-2">Dear {{ $order->first_name }},</p>
            <p class="my-2">Thank you for registering with the <strong>MAHA SHAKTI Spiritual Camp</strong>, which will take place during {{ __('general.timestamp') }}.</p>
            <p class="my-2">We hereby confirm that we have received your application, and the organizing team will verify the correctness of the data sent.</p>
            <p class="italic my-2">*If certain data are missing or inconclusive, you will be contacted by the organizing team.</p>
            <p class="my-2">Next, in order to complete the camp registration process, please make the payment within 5 working days and send us the proof of payment by email at <a class="text-pink-700" href="mailto:{{ config('site.contact_email') }}" target="_blank">{{ config('site.contact_email') }}</a>.</p>
            <p class="my-4 text-lg">Registration fee: <strong>{{ $order->price / 100 ." ". $order->currencySymbol }}</strong>.</p>
            <p class="my-2">The payment will be made in the account:</p>
            <p class="my-2">IBAN: <strong>{{ $order->currency == "EUR" ? config('site.bank_eur') : config('site.bank_ron') }}</strong></p>
            <p class="my-2"><strong>BANCA Transilvania, Agentia Margeanului</strong></p>
            <p class="my-2">Beneficiary: <strong>Venus Asociatia pentru elevarea femeii</strong></p>
            <p class="my-2">SWIFT/BIC code: <strong>BTRLRO22</strong></p>
            <p class="my-2">Please note that the camp registration will only be complete after the payment will be confirmed.</p>
            <p class="my-2">For any other details or questions, please contact us at <a class="text-pink-700" href="mailto:{{ config('site.contact_email') }}" target="_blank">{{ config('site.contact_email') }}</a>.</p>
            <p class="mt-4">
                We embrace you,<br>
                The Venus team<br>
                Phone <a class="text-pink-700" href="tel:0040737620999">+40737620999</a>
            </p>
            @endif
        </div>
    </x-container>

</x-guest-layout>
