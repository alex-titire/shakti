<x-guest-layout>

    <x-slot name="meta_title">
        {{ __('general.terms_field') }}
    </x-slot>

    <x-header>
        <a class="" href="{{ route("registration", ['locale' => $locale]) }}">
            {{ __('general.registration') }}
        </a>
    </x-header>

    <x-container>
        @if ($locale == "ro")
            <h1 class="text-2xl">Întrebări frecvente</h1>
            <div class="mt-6">
                <p><a href="#q1">Voi putea reviziona materialele și după tabără?</a></p>
                <p><a href="#q1">Cum ma inscriu daca nu fac plata online, cu cardul?</a></p>
                <p><a href="#q1">Programul va fi difuzat diferit in functie de fusurile orare?</a></p>
            </div>

            <div class="mt-6">
                <h2 class="text-xl">Voi putea reviziona materialele și după tabără?</h2>
                <p>Da, dupa ce tabără se va încheia, conferințele vor fi disponibile pentru o perioadă de 30 zile</p>
                <h2 class="text-xl">Cum ma inscriu daca nu fac plata online, cu cardul?</h2>
                <h2 class="text-xl">Voi putea reviziona materialele și după tabără?</h2>
            </div>

        @else

        @endif
    </x-container>
</x-guest-layout>
