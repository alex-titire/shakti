<x-email-layout>
    <x-slot name="title">Cod de acces eveniment</x-slot>

    @if ($order->user->language == "ro")
        <p style="margin: 16px 0;">Bună ziua,</p>
        <p style="margin: 16px 0;">CODUL dvs. de ACCES în <strong>Tabăra spirituală MAHA SHAKTI, Ediția a 3-a, 2023</strong> este:</p>
        <div style="margin: 16px 0; font-weight: bold; font-size: 24px; border: 1px solid #e7e7e7; background: #e7e7e7; padding: 16px 32px; display: inline-block;">
            {{ $order->mtv_code }}
        </div>
        <p style="margin: 16px 0;">Codul de acces este personal și netransmisibil.</p>
        <p style="margin: 16px 0;">Vă rugăm să citiți cu atenție instrucțiunile de mai jos și să urmați pașii care se potrivesc cu situația dvs.:</p>
        <p style="margin: 16px 0;">Vă puteți înregistra cu codul de acces primit acum pe email, astfel:</p>
        <p style="margin: 16px 0;">
            <strong>A. Dacă deja ați mai folosit platforma <a href="https://shakti.misatv.ro" target="_blank">shakti.misatv.ro</a></strong> (de exemplu: aţi participat la Tabăra Shakti în Extaz online edițiile 2020 sau 2021 sau la edițiile precedente ale Taberei Maha Shakti)
        </p>
        <p style="margin: 16px 0;">
            Vă rugăm mai întâi să vă autentificați pe platformă prin link-ul de mai jos (folosiți adresa de mail și parola folosite la evenimentul online la care ați participat anterior)
            <br>
            &mdash; autentificare (logare) pe site-ul <a href="https://shakti.misatv.ro/login/" target="_blank">https://shakti.misatv.ro/login/</a>
        </p>
        <p style="margin: 16px 0;"><strong>Dacă ați uitat parola</strong>, urmați pașii pentru resetarea acesteia.</p>
        <p style="margin: 16px 0;">Apoi vă rugăm să vă înregistrați pentru Tabăra spirituală MAHA SHAKTI, Ediția a 3-a, 2023 (astfel, nu va fi necesar să vă faceţi alt cont pentru acest eveniment)</p>
        <ol>
            <li>Înregistrare în Tabăra Spirituală MAHA SHAKTI, Ediția a 3-a, 2023 <a href="https://shakti.misatv.ro/inregistrare/" target="_blank">https://shakti.misatv.ro/inregistrare/</a></li>
            <li>Introduceți CODUL de ACCES</li>
            <li>Apăsați butonul Înregistrare</li>
            <li>Veți primi pe email confirmarea de înregistrare în <strong>Tabăra spirituală MAHA SHAKTI, Ediția a 3-a, 2023 (căutați și în folderul Spam)</strong></li>
            <li>Accesați pagina <a href="https://shakti.misatv.ro/live/" target="_blank">https://shakti.misatv.ro/live/</a> pentru a urmări programul acestui eveniment spiritual</li>
        </ol>
        <p style="margin: 16px 0;">
            <strong>B. Dacă nu v-ați mai înregistrat pe platforma <a href="https://shakti.misatv.ro/" target="_blank">https://shakti.misatv.ro/</a> până acum:</strong>
        </p>
        <ol>
            <li>Accesați pagina pentru înregistrare Tabăra Spirituală MAHA SHAKTI, Ediția a 3-a, 2023 <a href="https://shakti.misatv.ro/inregistrare/" target="_blank">https://shakti.misatv.ro/inregistrare/</a></li>
            <li>Introduceți CODUL de ACCES</li>
            <li>Introduceți adresa dvs. de email și parola pe care o doriți</li>
            <li>Apăsați butonul Înregistrare</li>
            <li>Veți primi pe email confirmarea de înregistrare în <strong>Tabăra spirituală MAHA SHAKTI, Ediția a 3-a, 2023 (căutați și în folderul Spam)</strong></li>
            <li>Accesați pagina <a href="https://shakti.misatv.ro/live/" target="_blank">https://shakti.misatv.ro/live/</a> pentru a urmări programul acestui eveniment spiritual</li>
        </ol>
        <p style="margin: 16px 0;">
            Vă rugăm să citiți cu atenție
            <a href="https://shakti.misatv.ro/termeni-si-conditii-de-acces-maha-shakti-2023/" target="_blank">Termenii și condițiile de acces</a>,
            precum și <a href="https://shakti.misatv.ro/regulamentul-taberei-spirituale-online-maha-shakti-iulie-2023/" target="_blank">Regulamentul Taberei Online</a>.
        </p>
        <p style="margin: 16px 0;">
            <strong>Vă recomandăm să vă abonați la canalul de telegram al taberei</strong>
            <a href="https://t.me/MAHASHAKTI2023" target="_blank">https://t.me/MAHASHAKTI2023</a> și, de asemenea, să urmăriți anunțurile organizatorice din perioada următoare pe site-ul <a href="https://shakti.misatv.ro/live/" target="_blank">https://shakti.misatv.ro/live/</a> pentru a fi la curent cu anunțurile sau eventualele modificări de program.
        </p>
        <p style="margin: 16px 0;">
            Vă rugăm să aveți în vedere că este interzisă înregistrarea, modificarea, reproducerea, stocarea, publicarea, transmiterea, retransmiterea conținutului acestei tabere spirituale în orice mod sau formă, precum și participarea la transferul, vânzarea, distribuția unor materiale realizate prin reproducerea, modificarea sau afișarea conținutului, în lipsa obținerii în prealabil a unei permisiuni scrise din partea organizatorilor.
        </p>
        <p style="margin: 16px 0;">Vă mulțumim și vă dorim o tabără cu multe realizări spirituale!</p>

    @else

        <p style="margin: 16px 0;">Hello,</p>
        <p style="margin: 16px 0;">Your registration code for <strong>MAHA SHAKTI Spiritual Camp, 3rd Edition, 2023</strong> is:</p>
        <div style="margin: 16px 0; font-weight: bold; font-size: 24px; border: 1px solid #e7e7e7; background: #e7e7e7; padding: 16px 32px; display: inline-block;">
            {{ $order->mtv_code }}
        </div>
        <p style="margin: 16px 0;">The code is personal and non-transmissible.</p>
        <p style="margin: 16px 0;">Read the instructions below carefully and please follow the steps that suit your situation.</p>
        <p style="margin: 16px 0;">
            A. <strong>If you have already used the <a href="https://shakti.misatv.ro/en/" target="_blank">shakti.misatv.ro</a></strong> platform (for example: you have participated in an online camp - Shakti in ecstasy 2020 or 2021 or in the previous editions of  Maha Shakti)
        </p>
        <p style="margin: 16px 0;">
            First please log into the platform through the link below (use the email address and password used at the previous online event)
            <br>
            <a href="https://shakti.misatv.ro/en/login/" target="_blank">https://shakti.misatv.ro/en/login/</a>
        </p>
        <p style="margin: 16px 0;">(<strong>If you forgot your password</strong>, follow the steps to reset it)</p>
        <p style="margin: 16px 0;">Then please register for the MAHA SHAKTI Spiritual Camp, 3rd Edition, 2023 (so you will not need to create another account for this event).</p>
        <ol>
            <li>Registration for the MAHA SHAKTI Spiritual Camp, 3rd Edition, 2023 <a href="https://shakti.misatv.ro/en/sign-up/" target="_blank">https://shakti.misatv.ro/en/sign-up/</a></li>
            <li>Enter the <strong>nominal code</strong> for MAHA SHAKTI Spiritual Camp, 3rd Edition, 2023</li>
            <li>Press the Register button</li>
            <li>You will receive by email the registration confirmation for <strong>MAHA SHAKTI Spiritual Camp, 3rd Edition, 2023 (search also in Spam)</strong></li>
            <li>Access the page <a href="https://shakti.misatv.ro/en/live/" target="_blank">https://shakti.misatv.ro/en/live/</a> to watch the program of this spiritual event.</li>
        </ol>
        <p style="margin: 16px 0;">
            <strong>B. If you have not registered on the <a href="https://shakti.misatv.ro/en/" target="_blank">shakti.misatv.ro</a> platform before</strong>
        </p>
        <p style="margin: 16px 0;">
            Please follow the steps below:
        </p>
        <ol>
            <li>Access registration page for <strong>MAHA SHAKTI Spiritual Camp, 3rd Edition, 2023</strong> <a href="https://shakti.misatv.ro/en/sign-up/" target="_blank">https://shakti.misatv.ro/en/sign-up/</a></li>
            <li>Enter the <strong>nominal code</strong></li>
            <li>Fill in with your email address and the password you choose</li>
            <li>Press the Register button</li>
            <li>You will receive by email the registration confirmation for <strong>MAHA SHAKTI Spiritual Camp, 3rd Edition, 2023 (search also in Spam)</strong></li>
            <li>Access the page <a href="https://shakti.misatv.ro/en/live/" target="_blank">https://shakti.misatv.ro/en/live/</a> to watch the program of this spiritual event</li>
        </ol>
        <p style="margin: 16px 0;">
            Please read the
            <a href="https://shakti.misatv.ro/en/general-terms-and-access-conditions-maha-shakti-2023/" target="_blank">Terms and Conditions of Access</a>
            as well as the
            <a href="https://shakti.misatv.ro/en/rules-of-the-online-maha-shakti-camp-july-2023/" target="_blank">Rules of Participation</a>
            attentively.
        </p>
        <p style="margin: 16px 0;">
            We recommend to subscribe to the telegram channel of the camp <a href="https://t.me/MAHASHAKTI2023" target="_blank">https://t.me/MAHASHAKTI2023</a> and to <strong>follow the organizational announcements</strong> in the next period on the page <a href="https://shakti.misatv.ro/en/live/" target="_blank">https://shakti.misatv.ro/en/live/</a> in order to keep up to date with announcements or possible program changes.
        </p>
        <p style="margin: 16px 0;">Please note that it is forbidden to modify, reproduce, store, publish, transmit, or retransmit the content of this spiritual camp in any way or form, as well as to participate in the transfer, sale, or distribution of materials made by reproducing, modifying or displaying the content, in the absence of prior written permission from us.</p>
        <p style="margin: 16px 0;">Thank you and we wish you a camp full of spiritual achievements!</p>
    @endif

</x-email-layout>
