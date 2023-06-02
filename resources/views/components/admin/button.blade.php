@props([
    'variant'   => 'default',
    'link'      => false
])

@php
$classes = [
    'default'   => 'bg-indigo-600 hover:bg-indigo-700 active:bg-indigo-900 focus:border-indigo-900 ring-indigo-300 text-white',
    'white'     => 'bg-white hover:bg-gray-100 active:bg-gray-200 border-gray-300 focus:border-gray-400 ring-indigo-300'
];
@endphp
<{{ $link ? 'a' : 'button' }} {{ $attributes->merge(['class' => "inline-flex items-center px-4 py-2 border border-transparent font-semibold rounded-md tracking-wide leading-tight focus:outline-none focus:ring disabled:opacity-25 transition ease-in-out duration-150
                    {$classes[$variant]}"]) }}>
    {{ $slot }}
</{{ $link ? 'a' : 'button' }}>
