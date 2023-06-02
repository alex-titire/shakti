<x-guest-layout>

    <x-slot name="meta_title">
        {{ __('general.terms_field') }}
    </x-slot>

    <x-header class="container" logo="{{ Storage::url($page->event->eventType->logo_wide) }}">
        {{--<a class="" href="{{ url("faqs/{$locale}") }}">
            {{ __('general.faqs') }}
        </a>--}}
        <a class="inline-flex items-center px-4 py-2 border-2 rounded-md uppercase border-pink-300 hover:bg-pink-400 hover:text-pink-100 active:bg-pink-500 active:text-pink-100 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150" href="{{ route('events.registration', ['event' => $page->event]) }}">
            {{ __('general.registration') }}
        </a>
    </x-header>

    <x-container class="space-y-4 static-page">
        <h1 class="text-2xl text-center mb-8">{{ $page->title }}</h1>
        {!! $page->content !!}
    </x-container>

</x-guest-layout>
