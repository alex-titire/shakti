<x-guest-layout>

    <x-slot name="meta_title">
        {{ __('general.confirmation_thank_you') }}
    </x-slot>

    <x-header class="container">
        <br>
    </x-header>

    <x-container>

        @if ($user->language == "ro")
            <h1 class="mb-8 text-2xl text-center">Mulțumim pentru confirmare</h1>

            <p>
               Confirmarea a fost realizată cu succes.
                <br>
                Îți mulțumim și te așteptăm cu drag alături de noi la cât mai multe evenimente Venus.
            </p>
        @else
            <h1 class="mb-8 text-2xl text-center">Thank you for your confirmation.</h1>

            <p>
               Your confirmation has been successfully validated.
                <br>
                Thank you and we are happy to invite you to as many events by Venus association as you desire.
            </p>
        @endif
    </x-container>

</x-guest-layout>
