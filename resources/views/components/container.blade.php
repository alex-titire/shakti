<div class="container">

    <div {{ $attributes->merge(['class' => 'bg-gray-100 md:rounded-xl -mx-4 md:mx-auto p-4 sm:p-8 my-8']) }}>
        {{ $slot }}
    </div>

</div>

<div class="text-center pb-4 text-sm text-gray-700">
    &copy; {{ __('general.copyright') }}
</div>
