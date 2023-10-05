<x-email-layout>
    <x-slot name="title">Cod de acces eveniment</x-slot>

    @if ($order->user->language == "ro")

        <p style="margin: 16px 0;">Bine te-am găsit {{ Str::title($order->first_name) }},</p>
        <p style="margin: 16px 0;">Codul tău de înregistrare în Tabăra spirituală online SHAKTI ÎN EXTAZ este:</p>
        <div style="margin: 16px 0; font-weight: bold; font-size: 24px; border: 1px solid #e7e7e7; background: #e7e7e7; padding: 16px 32px; display: inline-block;">
            {{ $order->mtv_code }}
        </div>
        <p style="margin: 16px 0;">Codul este personal și netransmisibil.</p>
        <p style="margin: 16px 0;">Pentru a accesa programul taberei, te rugăm să te înregistrezi folosind codul primit, accesând link-ul <a href="https://shakti.misatv.ro/inregistrare/" target="_blank">https://shakti.misatv.ro/inregistrare/</a></p>
        <p style="margin: 16px 0;">Vei găsi pe pagina respectivă pașii detaliați pentru înregistrare.</p>
        <p style="margin: 16px 0;">După ce te-ai înregistrat deja în tabără, de fiecare dată când vei dori să accesezi tabăra, intră pe pagina de login:</p>
        <p style="margin: 16px 0;"><a href="https://shakti.misatv.ro/login/" target="_blank">https://shakti.misatv.ro/login/</a></p>
        <p style="margin: 16px 0;">Dacă ai uitat parola, urmează pașii pentru resetarea acesteia.</p>
        <p style="margin: 16px 0;">Te rugăm să citești cu atenție Termenii și condițiile de acces precum și Regulamentul taberei.</p>
        <p style="margin: 16px 0;">Programul complet al taberei va fi disponibil doar pentru participanții în tabără.</p>
        <p style="margin: 16px 0;">
            Îți recomandăm să te abonezi la canalul de telegram al taberei <a href="https://t.me/shaktiinextaz2023" target="_blank">https://t.me/shaktiinextaz2023</a>
            și de asemenea să urmărești anunțurile organizatorice din perioada următoare pe site-ul <a href="https://shakti.misatv.ro/" target="_blank">https://shakti.misatv.ro/</a> pentru a fi la curent cu anunțurile sau eventualele modificări de program.
        </p>
        <p style="margin: 16px 0;">Te rugăm să ai în vedere că este interzisă înregistrarea, modificarea, reproducerea, stocarea, publicarea, transmiterea, retransmiterea conținutului acestei tabere spirituale în orice mod sau formă, precum și participarea la transferul, vânzarea, distribuția unor materiale realizate prin reproducerea, modificarea sau afișarea conținutului, în lipsa obținerii în prealabil a unei permisiuni scrise din partea noastră.</p>
        <p style="margin: 16px 0;">🎁 Vă anunțăm că participantele plătitoare la Tabăra Shakti în Extaz (12-15 octombrie 2023) vor primi cadou următoarele rețete magistrale pe bază de plante medicinale:</p>
        <ul style="margin: 16px 0;">
            <li>STAREA DE SHAKTI</li>
            <li>EXTAZ FORTE</li>
        </ul>
        <p style="margin: 16px 0;">❗️Este contraindicat să conduceți timp de 7 ore după după ce ați luat Extaz Forte.</p>
        <p style="margin: 16px 0;">Participantele din București vor putea ridica cele două plicuri cu plante medicinale în perioada 5-31 octombrie 2023, de la sediul Venus (intrarea Romaniței, nr 15), de luni până vineri în intervalul 13-17.</p>
        <p style="margin: 16px 0;">În provincie, amestecurile de plante vor fi trimise ulterior prin intermediul instructorilor și/sau a coordonatoarelor de grup de shakti.</p>
        <p style="margin: 16px 0;">Participantele din alte țări, vor primi respectivele amestecuri în Taberele internaționale care urmează.</p>
        <p style="margin: 16px 0;">🎁 Îți oferim de asemenea cadou 20% reducere la toate cărțile publicate de Editura Venusiana. Intră pe site-ul  https://www.edituravenusiana.ro/ și folosește codul de reducere EXTAZ pentru a beneficia de această reducere. Oferta este valabilă până pe 31 octombrie 2023.</p>
        <p style="margin: 16px 0;">Îți dorim o tabără plină de realizări spirituale!</p>

    @else

        <p style="margin: 16px 0;">Hello {{ Str::title($order->first_name) }},</p>
        <p style="margin: 16px 0;">Your registration code for SHAKTI IN EXTASY Spiritual Camp, 2023 is:</p>
        <div style="margin: 16px 0; font-weight: bold; font-size: 24px; border: 1px solid #e7e7e7; background: #e7e7e7; padding: 16px 32px; display: inline-block;">
            {{ $order->mtv_code }}
        </div>
        <p style="margin: 16px 0;">The code is personal and non-transmissible.</p>
        <p style="margin: 16px 0;">Read the instructions below carefully and please follow the steps that suit your situation.</p>
        <p style="margin: 16px 0;">
            A. <strong>If you have already used the <a href="https://shakti.misatv.ro/en/" target="_blank">shakti.misatv.ro</a></strong> platform (for example: you have participated in an online camp - MahaShakti in 2021 or 2022 or in the previous edition of  Shakti in extasy)
        </p>
        <p style="margin: 16px 0;">
            First please log into the platform through the link below (use the email address and password used at the previous online event)
            <br>
            <a href="https://shakti.misatv.ro/en/login/" target="_blank">https://shakti.misatv.ro/en/login/</a>
        </p>
        <p style="margin: 16px 0;"><strong>If you forgot your password</strong>, follow the steps to reset it</p>
        <p style="margin: 16px 0;">Then please register for the SHAKTI IN EXTASY Spiritual Camp, 2023 (so you will not need to create another account for this event).</p>
        <ol>
            <li>Registration for SHAKTI IN EXTASY Spiritual Camp, 2023 <a href="https://shakti.misatv.ro/en/sign-up/" target="_blank">https://shakti.misatv.ro/en/sign-up/</a></li>
            <li>Enter the <strong>nominal code</strong> for SHAKTI IN EXTASY Spiritual Camp, 2023</li>
            <li>Press the Register button</li>
            <li>You will receive by email the registration confirmation for <strong>SHAKTI IN EXTASY Spiritual Camp, 2023 (search also in Spam)</strong></li>
            <li>Access the page <a href="https://shakti.misatv.ro/en/live/" target="_blank">https://shakti.misatv.ro/en/live/</a> to watch the program of this spiritual event.</li>
        </ol>
        <p style="margin: 16px 0;">
            <strong>B. If you have not registered on the <a href="https://shakti.misatv.ro/en/" target="_blank">shakti.misatv.ro</a> platform before</strong>
        </p>
        <p style="margin: 16px 0;">
            Please follow the steps below:
        </p>
        <ol>
            <li>Access registration page for <strong>SHAKTI IN EXTASY Spiritual Camp, 2023</strong> <a href="https://shakti.misatv.ro/en/sign-up/" target="_blank">https://shakti.misatv.ro/en/sign-up/</a></li>
            <li>Enter the <strong>nominal code</strong></li>
            <li>Fill in with your email address and the password you choose</li>
            <li>Press the Register button</li>
            <li>You will receive by email the registration confirmation for <strong>SHAKTI IN EXTASY Spiritual Camp, 2023 (search also in Spam)</strong></li>
            <li>Access the page <a href="https://shakti.misatv.ro/en/live/" target="_blank">https://shakti.misatv.ro/en/live/</a> to watch the program of this spiritual event</li>
        </ol>
        <p style="margin: 16px 0;">
            Please read the
            <a href="https://shakti.misatv.ro/en/terms-and-conditions/" target="_blank">Terms and Conditions of Access</a>
            as well as the
            <a href="https://shakti.misatv.ro/en/rules-of-the-online-shakti-in-ecstasy-camp/" target="_blank">Rules of Participation</a>
            attentively.
        </p>
        <p style="margin: 16px 0;">
            We recommend to subscribe to the telegram channel of the camp <a href="https://t.me/shaktiinextaz2023" target="_blank">https://t.me/shaktiinextaz2023</a> and to <strong>follow the organizational announcements</strong> in the next period on the site <a href="https://shakti.misatv.ro/" target="_blank">https://shakti.misatv.ro/</a> in order to keep up to date with announcements or possible program changes.
        </p>
        <p style="margin: 16px 0;">Please note that it is forbidden to modify, reproduce, store, publish, transmit, or retransmit the content of this spiritual camp in any way or form, as well as to participate in the transfer, sale, or distribution of materials made by reproducing, modifying or displaying the content, in the absence of prior written permission from us.</p>
        <p style="margin: 16px 0;">🎁 We announce that paying participants of Shakti in Extasy Camp (October 12-15, 2023) will receive the following magistral plant recipes as a gift:</p>
        <ul style="margin: 16px 0;">
            <li>STATE OF SHAKTI</li>
            <li>EXTASY FORTE</li>
        </ul>
        <p style="margin: 16px 0;">❗️It is contraindicated to drive for 7 hours after taking Extaz Forte.</p>
        <p style="margin: 16px 0;">Participants in Bucharest will be able to pick up the two herbal sachets from 5-31 October 2023, at the Venus headquarters (Romaniței entrance, no 15), from Monday to Friday between 13-17.</p>
        <p style="margin: 16px 0;">In other cities of Romania, the herbal mixtures will then be sent via the teachers and/or shakti group coordinators.</p>
        <p style="margin: 16px 0;">Participants from other countries will receive the mixtures in the international camps that follow.</p>
        <p style="margin: 16px 0;">Thank you and we wish you a camp full of spiritual achievements!</p>

    @endif

</x-email-layout>
