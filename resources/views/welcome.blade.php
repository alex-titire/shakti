<x-guest-layout>

    <div class="relative flex items-top justify-center min-h-screen sm:items-center py-4 sm:pt-0">
        @if (Route::has('login'))
            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                @auth
                    <a href="{{ url('nova/dashboards/main') }}" class="text-sm text-gray-300 underline">Dashboard</a>
                @else
                    <a href="{{ url('nova/login') }}" class="text-sm text-gray-300 underline">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-300 underline">Register</a>
                    @endif
                @endauth
            </div>
        @endif

        <div class="container text-center">
            <img class="mx-auto max-h-36" src="{{ asset('images/logo-venus.png') }}" alt="logo Venus Events">
            <h1 class="text-2xl mt-16 font-bold">Events & Registrations</h1>
            <div class="grid grid-cols-2 gap-12 max-w-screen-sm mt-12 mx-auto">
                <a class="flex flex-col items-center" href="{{ url('ro/events') }}">
                    <span class="flex grow">Pentru limba română click aici</span>
                    <img class="h-16 mx-auto mt-4" src="{{ asset('images/flags/ro.png') }}" alt="lang ro">
                </a>
                <a class="flex flex-col items-center" href="{{ url('en/events') }}">
                    <span class="flex grow">For english click here</span>
                    <img class="h-16 mx-auto mt-4" src="{{ asset('images/flags/en.png') }}" alt="lang en">
                </a>
            </div>
        </div>
    </div>

</x-guest-layout>
