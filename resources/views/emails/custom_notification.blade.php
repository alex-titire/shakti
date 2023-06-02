<x-email-layout>
    <x-slot name="title">{{ $title }}</x-slot>

    {!! Markdown::parse($mail->contentHtml) !!}
</x-email-layout>
