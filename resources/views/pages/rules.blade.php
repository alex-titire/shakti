<x-guest-layout>

    <x-slot name="meta_title">
        {{ __('general.rules_agreement') }}
    </x-slot>

    <x-header class="container">
        {{--<a class="" href="{{ url("faqs/{$locale}") }}">
            {{ __('general.faqs') }}
        </a>--}}
        <a class="inline-flex items-center px-4 py-2 border-2 rounded-md uppercase border-pink-300 hover:bg-pink-400 hover:text-pink-100 active:bg-pink-500 active:text-pink-100 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150" href="{{ route('registration', ['locale' => $locale]) }}">
            {{ __('general.registration') }}
        </a>
    </x-header>

    <x-container>

        @if ($locale == "ro")
            <h1 class="mb-8 text-2xl text-center">Regulamentul Taberei Spirituale Online SHAKTI IN EXTAZ, octombrie 2021</h1>

            <ul class="list-disc ml-4">
                <li>activitățile taberei sunt rezervate persoanelor, cu varsta peste 18 ani. Prin semnarea în prealabil a <strong>Formularului de înscriere</strong> și prin acceptarea <a href="{{ route('terms', ['locale' => 'ro']) }}">Termenilor și condițiilor de acces</a> pe acest site confirmați că aveți peste 18 ani.</li>
                <li>Persoanele care au interdicție pentru a participa la astfel de evenimente nu vor putea participa nici la acest eveniment, prin urmare sunt rugate să nu se înscrie.</li>
                <li><strong>codul de acces</strong> pe site-ul taberei este unic și netransmisibil. Vă rugăm să înțelegeți că, dacă vom constata tentative de conectare cu același cod simultan în locuri diferite, vom bloca accesul la respectivul cod.</li>
                <li>Participantii vor primi după încheierea taberei, atunci când condițiile o vor permite, unele <strong>materiale cadou</strong>.</li>
                <li>toate conferințele și meditațiile vor beneficia de <strong>traducere</strong> în limba engleză, pe canalul corespondent. Pentru filmele incluse în program se va anunța limba filmului și dacă are sau nu subtitrare. Nu vor putea fi asigurate traduceri în alte limbi.</li>
                <li><strong>programul detaliat</strong> va fi disponibil pe site-ul taberei. Este posibil ca la unele conferințe în premieră să apară modificări de ultimă oră în privința duratei sau a orei de începere. Aceste modificări vor fi anunțate în timp util și vor fi marcate vizibil în program.</li>
                <li>recomandăm participanților să realizeze la fiecare conectare <strong>metoda de protecție pentru accesarea internetului</strong>, pe care o găsiți în detaliu pe site-ul <a href="https://yogaesoteric.net" target="_blank">yogaesoteric.net</a>, și care va fi prezentată și pe site, la începutul fiecărui modul al programului.</li>
                <li>în cazul în care vă confruntați cu <strong>întrebări și probleme de natură tehnică</strong> aveți la dispoziție o fereastră de chat, aflată în partea dreaptă a ecranului. Atenție, pe chat nu se va răspunde la întrebări legate de conținutul conferințelor, ci exclusiv la întrebări de natură tehnică sau administrativă.</li>
                <li>sunteți invitați să trimiteți <strong>relatări sau întrebări pertinente</strong>, cu miez, fie prin mail, la adresa {{ config('site.contact_email') }}, fie direct în pagina de Contact de pe site, precizând de fiecare dată: numele, prenumele, anul de curs și localitatea, titlul conferinței sau al meditației, după caz (iar în cazul în care conferința are mai multe părți precizați la ce parte vă referiți). La aceste întrebări se va răspunde în cadrul acestei tabere, sau în cadrul următoarelor tabere – după caz. Nu veți primi răspunsuri personal, pe email.</li>
                <li>persoanele care se vor înregistra pe site <strong>după ce tabăra a început</strong> vor participa doar la activitățile din zilele rămase, nu vor putea solicita  o eventuală reluare a activităților pe care le-au pierdut.</li>
                <li>Persoanele care se vor înscrie în tabără vor avea acces la materialele expuse în această tabără pentru o <strong>perioadă de încă 30 de zile de la încheierea acesteia</strong>.</li>
                <li>Pentru a putea primi în timp real <strong>anunțurile</strong> relevante (spre exemplu despre eventuale modificări de program), cei care doresc se pot abona pe canalul de <strong>Telegram</strong> dedicat taberei, accesând linkul <a href="https://t.me/shaktiinextaz2021" target="_blank">https://t.me/shaktiinextaz2021</a>. Acesta nu este un grup de discuții, nu se răspunde la întrebări, se vor posta strict anunțuri.</li>
            </ul>
        @else
            <h1 class="mb-8 text-2xl text-center">Rules of the Online SHAKTI IN ECSTASY Camp, October 2021</h1>

            <ul class="list-disc ml-4">
                <li>The activities of the camp are reserved to people over the age of 18. By signing the <strong>Registration Form</strong> in advance and accepting the <a href="{{ route('terms', ['locale' => 'en']) }}">Terms and Conditions</a> of access on this site, you confirm that you are over 18 years of age.</li>
                <li>People who are banned from participating in such events will not be able to participate in this event either, therefore they are asked not to register.</li>
                <li><strong>The access code</strong> on the camp site is unique and non-transferable. Please understand that if we find attempts to connect with the same code simultaneously in different places, we will block the access for that code.</li>
                <li>The participants will receive, after the end of the camp, when conditions will allow it, a set of <strong>camp materials as a gift</strong>.</li>
                <li>All lectures and meditations will be translated into English on the corresponding channels. The language of the films included in the program will be announced and also whether or not they have subtitles. Translation to other languages will not be possible.</li>
                <li><strong>The detailed program</strong> will be available on the site. It is possible that some premiere lectures will have last minute changes in duration or starting time. These changes will be announced in due time and will be clearly marked in the program.</li>
                <li>We advise all participants to perform the <strong>protection method for accessing the internet</strong> before each connection. The method can be found in detail on yogaesoteric.net and will be presented on the site, at the beginning of each segment of the program.</li>
                <li>If you experience <strong>technical problems</strong>, please use the chat window on the right side of the screen. Attention, the chat will not answer questions related to the content of the lectures, but exclusively questions of a technical or administrative nature.</li>
                <li>You are invited to send <strong>relevant testimonies or meaningful questions</strong>, either per email, to {{ config('site.contact_email') }}, or directly using the Contact page on the site, mentioning each time: first name, surname, year of course and city, title of the lecture or meditation, if necessary (and, if the lecture has several parts, please mention which part you are referring to). These questions will be answered either during this camp, or during the next holiday camp. You will not receive answers in person, by email.</li>
                <li>Those who register on the site <strong>after the camp has started</strong> will only be able to participate in the remaining activities in the camp. They will not be able to request a replay of the activities they have missed.</li>
                <li>In order to receive relevant and live <strong>announcements</strong> (for example about changes in the camp programme), you can subscribe to the <strong>dedicated Telegram channel</strong>, using this link <a href="https://t.me/shaktiinextaz2021" target="_blank">https://t.me/shaktiinextaz2021</a>. This is not a discussion group, questions will not be answered, only announcements will be posted.<li>The activities of the camp are reserved to people over the age of 18. By signing the Registration Form in advance and accepting the Terms and Conditions of access on this site, you confirm that you are over 18 years of age.</li>
            </ul>
        @endif
    </x-container>

</x-guest-layout>
