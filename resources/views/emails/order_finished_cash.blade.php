<x-email-layout>
    <x-slot name="title">Comandă finalizată</x-slot>
    <x-slot name="logo">{{ asset("storage/". $order->event->eventType->logo_wide) }}</x-slot>

    @if ($order->language == "ro")
    <p style="margin: 8px 0;">Dragă {{ $order->first_name }},</p>
    <p style="margin: 8px 0;">Îți mulțumim pentru înscrierea în <strong>Tabăra spirituală online SHAKTI ÎN EXTAZ</strong>, ce va avea loc în perioada {{ __('general.timestamp') }}.</p>
    <p style="margin: 8px 0;">Îți confirmăm pe această cale că am primit înscrierea ta în tabără, urmând ca echipa de organizare să verifice corectitudinea* datelor trimise.</p>
    <p style="margin: 8px 0; font-style: italic">*în cazul în care anumite informații lipsesc sau nu sunt concludente, vei fi contactat{{ strtolower($order->sex) == "f" ? "ă" : "" }} de către echipa de organizare.</p>
    <p style="margin: 8px 0;">Mai departe, pentru a continua procesul de înscriere, te rugăm să efectuezi plata în valoare de <strong style="white-space: nowrap">{{ $order->price / 100 ." ". $currencySymbol }}</strong>, pentru accesul în tabără cash, la sediul Venus, intrarea Romaniței, nr.15, sector 5, București, de luni până vineri în intervalul 13-17.</p>
    <p style="margin: 8px 0;">Te rugăm să ai în vedere că înscrierea în tabără va fi completă după ce plata va fi confirmată.</p>
    <p style="margin: 8px 0;">De asemenea, te invităm sa urmărești și anunțurile organizatorice din perioada următoare fie pe canalul de anunțuri Telegram creat special pentru aceasta tabara (valabil numai pentru participanții/participantele în tabără), pe care îl poți accesa prin link-ul <a href="https://t.me/shaktiinextaz2022" target="_blank">https://t.me/shaktiinextaz2022</a> fie pe site-ul <a href="https://shakti.misatv.ro/" target="_blank">https://shakti.misatv.ro/</a>.</p>
    <p style="margin: 8px 0;">Pentru orice alte detalii sau întrebări, te rugăm să ne contactezi la adresa <a style="color: #be185d; text-decoration: none;" href="mailto:{{ config('site.contact_email') }}" target="_blank">{{ config('site.contact_email') }}</a>.</p>
    @else
    <p style="margin: 8px 0;">Dear {{ $order->first_name }},</p>
    <p style="margin: 8px 0;">Thank you for registering with the <strong>SHAKTI IN ECSTASY Online Spiritual Camp</strong>, which will take place during {{ __('general.timestamp') }}.</p>
    <p style="margin: 8px 0;">We hereby confirm that we have received your application, and the organizing team will verify the correctness of the data sent.</p>
    <p style="margin: 8px 0; font-style: italic">*If certain data are missing or inconclusive, you will be contacted by the organizing team.</p>
    <p style="margin: 8px 0;">Next, in order to complete the camp registration process, please make the payment of <strong style="white-space: nowrap">{{ $order->price / 100 ." ". $currencySymbol }}</strong> in cash, at the Venus headquarters, at Intrarea Romaniței, nr.15, sector 5, Bucharest, from Monday to Friday between 13-17 p.m., within 5 working days.</p>
    <p style="margin: 8px 0;">Please note that the camp registration will only be complete after the payment will be confirmed.</p>
    <p style="margin: 8px 0;">We also invite you to read the organizing announcements over the next period either on the Telegram announcement channel created especially for this camp (valid only for the participants in the camp), that you can access here: <a href="https://t.me/shaktiinextaz2022" target="_blank">https://t.me/shaktiinextaz2022</a>, or on the <a href="https://shakti.misatv.ro/en/" target="_blank">https://shakti.misatv.ro/</a> website.</p>
    <p style="margin: 8px 0;">For any other details or questions, please contact us at <a style="color: #be185d; text-decoration: none;" href="mailto:{{ config('site.contact_email') }}" target="_blank">{{ config('site.contact_email') }}</a>.</p>
    @endif

</x-email-layout>
