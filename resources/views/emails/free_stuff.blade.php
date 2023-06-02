<x-email-layout>
    <x-slot name="title">{{ $title }}</x-slot>

    @if ($order->language == "ro")
        <p style="margin: 16px 0;">Draga noastră,</p>

        <p style="margin: 16px 0;">
            Datorită faptului că am primit anumite indicații de la Ghidul Spiritual referitoare la cadoul pe care îl vei primi, ca urmare a participării tale în Tabăra Online Shakti în Extaz 2021, te anunțăm că materialele cadou nu sunt deocamdată disponibile.
            <br>
            Ele vor fi disponibile la o dată pe care o să o comunicăm prin e-mail imediat ce primim indicații clare în această direcție (nu la data de 3 noiembrie, așa cum am anunțat în primul e-mail).
        </p>
        <p style="margin: 16px 0;">Drept urmare, avem rugămintea să verifici adresa de e-mail în perioada următoare. Îți vom trimite un mesaj prin care îți vom comunica toate detaliile necesare pentru a intra în posesia cadoului.</p>
        <p style="margin: 16px 0;">Îți reamintim că ne poți contacta oricând la adresa de e-mail <a href="mailto:shaktiinextaz@gmail.com">shaktiinextaz@gmail.com</a>. </p>
        <p style="margin: 16px 0;">Te îmbrățișăm cu multă iubire și îți mulțumim încă o dată că ai fost alături de noi pe tot parcursul taberei!</p>
    @else
        <p style="margin: 16px 0;">Our dear,</p>
        <p style="margin: 16px 0;">
            Due to the fact that we have received certain instructions from the Spiritual Guide regarding the gift you will receive, as a result of your participation in the Online Camp Shakti in Ecstasy 2021, we inform you that the gift materials are not available yet.
            <br>
            They will be available on a date that will be communicated by e-mail as soon as we will receive clear indications (not on November 3, as announced in the first e-mail).
        </p>
        <p style="margin: 16px 0;">Therefore, please check your e-mail address in the next period. We will send you a message with all the necessary details.</p>
        <p style="margin: 16px 0;">We remind you that you can contact us  anytime at: <a href="mailto:shaktiinextaz@gmail.com">shaktiinextaz@gmail.com</a>.</p>
        <p style="margin: 16px 0;">We embrace you with love and thank you once again for your participation.</p>
    @endif
</x-email-layout>
