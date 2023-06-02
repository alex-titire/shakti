<x-email-layout>
    <x-slot name="title">{{ $title }}</x-slot>

    @php
    $find = $find ?? [];
    $replace = $replace ?? [];
    @endphp

    {!! Markdown::parse(str_replace($find, $replace, $mail->contentHtml)) !!}
</x-email-layout>
