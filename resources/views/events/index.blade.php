<x-guest-layout>

    <x-header class="container">

    </x-header>

    <div class="container">
        <div class="bg-gray-100 md:rounded-xl -mx-4 md:mx-auto p-4 sm:p-8 my-8">
            @if (is_null($events))
                {{ __('general.no_events_currently') }}
            @endif
        </div>
    </div>
</x-guest-layout>
