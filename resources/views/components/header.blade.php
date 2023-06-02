<div {{ $attributes->merge(['class' => 'py-2 sticky top-0 bg-white shadow-sm']) }}>
    <div class="flex {{ strlen($slot) ? 'justify-between' : 'justify-center' }} items-center">
        <img class="max-w-1/2 max-h-16" src="{{ asset($logo ?? 'images/logo-venus.png') }}" alt="event logo">

        <nav x-cloak class="">
            {{ $slot }}
{{--                <a class="" href="/">{{ __('general.change_language') }}</a>--}}
        </nav>
    </div>
</div>
