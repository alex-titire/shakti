<x-guest-layout>

    <x-slot name="meta_title">
        {{ __('general.terms_field') }}
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
            <h1 class="mb-8 text-2xl text-center">Termeni și condiții de acces</h1>

            <p class="font-bold"><a href="{{ route('rules', ['locale' => 'ro']) }}" class="text-pink-700">REGULAMENTUL TABEREI ONLINE SHAKTI ÎN EXTAZ</a> este parte integrantă din Termeni și condiții de acces.</p>
            <p class="mt-3"><strong>1. Informații despre site-urile implicate</strong><br />
            1.1. Site-ul web prin care se va desfăsura tabăra: <strong>shakti.misatv.ro</strong> este administrat în perioada 10 octombrie – 17 noiembrie 2021 de VENUS - ASOCIAŢIA PENTRU ELEVAREA FEMEII, cu sediul în București, sector 5, Intrarea Romaniței, nr 15, CUI 16817435<br />
            și<br />
            Site-ul prin care se va face înscrierea și plata pentru tabără: <strong>registration.venus.org.ro</strong> este administrat de VENUS - ASOCIAŢIA PENTRU ELEVAREA FEMEII, cu sediul în București, sector 5, Intrarea Romaniței, nr 15, CUI 16817435<br />
            Site-urile mai sus mentionate vor fi numite pe parcursul acestor termeni și condiții <strong>SHAKTI ÎN EXTAZ</strong>.<br />
            Adrese de contact: București, sector 5, Intrarea Romanitei, nr 15<br />
            Tel: (+40) 0737620999<br />
            email:{{ config('site.contact_email') }}</p>

            <p class="mt-3"><strong>2. Proprietatea Intelectuală</strong><br />
            2.1 Conținutul și experiența de utilizare a subdomeniului <strong>shakti.mistatv.ro </strong>și <strong>registration.venus.org.ro </strong>sunt proprietatea VENUS &ndash; ASOCIAȚIA PENTRU ELEVAREA FEMEII și sunt protejate prin legislația română în vigoare cu privire la drepturile de autor și drepturile conexe. Textele postate de către utilizatori la &bdquo;Adăugare comentariu&rdquo; devin proprietatea MISA Senzațional TV din momentul postării. În cazul informațiilor și conținutului postat de utilizatori înregistrați sau terțe părți ori parteneri pe site-ul <strong><b>SHAKTI ÎN EXTAZ online</b></strong>, dreptul de autor și responsabilitatea asupra acestora aparțin în totalitate celor care au publicat acea informație. În cazul conținutului preluat de la parteneri pe baza acordurilor încheiate, acestea sunt identificate prin menționarea numelui partenerului lângă textul sau imaginea respectivă.<br />
            2.2. Puteți utiliza conținutul <b>SHAKTI ÎN EXTAZ online</b> doar pentru folosința dvs. personală. <br />
            2.3. Acțiunile descrise mai jos <strong>nu </strong>sunt permise în lipsa obținerii în prealabil a unei permisiuni scrise din partea <b>SHAKTI ÎN EXTAZ online</b>:<br />
            a. îndepărtarea însemnelor care identifica dreptul de autor al <strong><b>SHAKTI ÎN EXTAZ online</b></strong> asupra conținutului;<br />
            b. modificarea, publicarea, transmiterea, retransmiterea în orice mod sau formă, precum și participarea la transferul, vânzarea, distribuția unor materiale realizate prin reproducerea, modificarea sau afișarea conținutului, în lipsa obținerii în prealabil a unei permisiuni scrise din partea noastră;<br />
            c. reproducerea sau stocarea conținutului, precum și trimiterea acestui conținut către orice alt website, server sau orice alt mijloc de stocare a informației, dacă scopul acestei activități este unul comercial.<br />
            2.4. Este interzisă orice utilizare a conținutului <b>SHAKTI ÎN EXTAZ online</b> în alte scopuri decât cele permise expres de prezentul document sau de legislația în vigoare. Cererile de utilizare a conținutului în alte scopuri decât cele permise expres de prezentul document pot fi trimise la adresa de email {{ config('site.contact_email') }}.<br />
            2.5. În condițiile în care considerați că un anumit conținut aflat pe site-ul <b>SHAKTI ÎN EXTAZ online</b> încalcă drepturile dvs. de proprietate intelectuală, dreptul la viață privată, la publicitate sau alte drepturi personale, sunteți rugat să trimiteți un email la {{ config('site.contact_email') }} cu drepturile încălcate, pentru a permite administratorilor <b>SHAKTI ÎN EXTAZ online</b> să acționeze în conformitate cu dispozițiile legale conform Legii 365/2002 privind comerțul electronic.</p>

            <p class="mt-3"><strong>3. Suspendarea accesului</strong><br />
            <b>SHAKTI ÎN EXTAZ online</b> poate, fără orice altă notificare sau formalitate și fără ca acest lucru să necesite explicarea atitudinii sale, să suspende sau să blocheze accesul dvs. la conținutul site-ului sau la o parte a acestui conținut.</p>

            <p class="mt-3"><strong>4. Schimbări ale site-ului</strong><br />
            <b>SHAKTI ÎN EXTAZ online</b> își rezervă dreptul de a suspenda, modifica, adauga sau șterge în orice moment porțiuni ale conținutului sau. De asemenea, <b>SHAKTI ÎN EXTAZ online</b> își rezervă dreptul de a restricționa accesul utilizatorilor la o parte sau la întregul său conținut.</p>

            <p class="mt-3"><strong>5. Înregistrare, parole și responsabilități</strong><br />
            5.1. Accesul dvs. la serviciul de Newsletter sau unele facilități din cadrul site-ului necesită înregistrarea dvs. cu un nume de utilizator și o parolă. Vă recomandăm să nu dezvăluiți nimănui această parolă. <b>SHAKTI ÎN EXTAZ online</b> nu va cere niciodată parolă conturilor dvs în mesaje prin poștă electronică sau telefon.<br />
            5.2.Din păcate, nicio transmisie de date prin intermediul internetului nu poate fi garantată a fi 100% sigură. În consecință, în ciuda eforturilor noastre de a va proteja informația personală, <b>SHAKTI ÎN EXTAZ online</b> nu poate asigura sau garanta securitatea informațiilor transmise de dvs. către noi, către și de la serviciile noastre online. Va avertizăm așadar că orice informație trimisă către noi se va face pe propriul dvs. risc.</p>

            <p class="mt-3"><strong>6. Viață privată</strong><br />
            <strong>6.1 Informații generale</strong><br />
            <b>SHAKTI ÎN EXTAZ online</b> respectă viață dvs. privată și datele cu caracter personal pe care le împărtășiți cu noi în momentul accesării acestui site. Aceste informații au rolul de a vă informa cu privire la ce tip de informație identificabilă personal este colectată de la dvs., cum și unde am putea folosi această informație, cum înțelegem noi să protejăm informația colectată de la dvs., cine are acces la informația colectată de la dvs. și cum pot fi corectate în timp inadvertențele din informația preluată.<br />
            <b>SHAKTI ÎN EXTAZ online</b> respectă legislația în vigoare, în speță cele două acte normative care compun pachetul legislativ privind protecţia datelor la nivelul Uniunii Europene: Regulamentul (UE) 2016/679 privind protecţia persoanelor fizice în ceea ce priveşte prelucrarea datelor cu caracter personal şi privind liberă circulaţie a acestor date şi de abrogare a Directivei 95/46/CE (Regulamentul general privind protecţia datelor), precum și Directiva (UE) 2016/680 referitoare la protecţia datelor personale în cadrul activităţilor specifice desfăşurate de autorităţile de aplicare a legii. <br />
            Conform acestora beneficiați de dreptul de acces, de intervenție asupra datelor, dreptul de a nu fi supus unei decizii individuale și dreptul de a vă adresa justiției. Totodată, aveți dreptul să va opuneți prelucrării datelor personale care va privesc și să solicitați ștergerea datelor. Pentru exercitarea acestor drepturi, va puteți adresa cu o cerere scrisă, datată și semnată pe e-mail {{ config('site.contact_email') }}. <br />
            Scopul colectării datelor este posibilitatea de a avea acces mai ușor la contul dvs. pe site-ul <b>SHAKTI ÎN EXTAZ online</b> sau informarea utilizatorilor cu privire la noile știri apărute, participarea la concursuri ori participarea la campanii promoționale desfășurate de <b>SHAKTI ÎN EXTAZ online</b>.<br />
            Scopul accesului <b>SHAKTI ÎN EXTAZ online</b> la datele stocate pe calculatorul dvs. (cookie-uri) este de personalizare a conținutului afișat &ndash; de exemplu de păstrare a setărilor personalizate ale fiecărui utilizator, autentificarea pentru comentarii sau realizarea de profile de utilizatori (fără a fi identificat un utilizator sau dispozitiv informatic anume).<br />
            Alte terțe părți, cum ar fi cele care colectează date de trafic (de ex. SATI) sau cele aparținând rețelele sociale (de ex. Facebook) integrate pe paginile <b>SHAKTI ÎN EXTAZ online</b> pot utiliza cookie-uri pentru scopuri de colectare a informațiilor de trafic sau, respectiv, de a permite partajarea conținutului cu rețeaua socială specifică.<br />
            Utilizatorii care nu doresc accesul terților la datele stocate pe calculatorul dvs. (cookie-uri) pot folosi setările browserului folosit pentru ștergerea sau blocarea acestora. În ajutorul utilizatorilor noștri va indicăm modul în care principalele trei browsere de pe piață permit acest lucru:<br />
            &ndash; Internet Explorer &ndash; <a href="http://support.microsoft.com/kb/278835/ro" target="_blank">http://support.microsoft.com/kb/278835/ro</a><br />
            &ndash; Mozilla Firefox &ndash; <a href="http://support.mozilla.org/ro/kb/cookie-urile" target="_blank">http://support.mozilla.org/ro/kb/cookie-urile</a><br />
            &ndash; Google Chrome &ndash; <a href="http://support.google.com/chrome/bin/answer.py?hl=ro&amp;answer=95647" target="_blank">http://support.google.com/chrome/bin/answer.py?hl=ro&amp;answer=95647</a></p>

            <p class="mt-3"><strong>6.2 Ce informații colectăm</strong><br />
            <b>SHAKTI ÎN EXTAZ online</b> colectează informații de la utilizatorii săi în trei modalități &ndash; direct de la utilizator, din rapoartele traficului înregistrat de serverele care găzduiesc site-urile noastre și prin intermediul cookie-urilor.<br />
            Informațiile necesare pentru înscriere: nume, prenume, data nașterii, grupa de curs, oras, tapas, numar de telefon, adresa de email, fotografie.<br />
            Informație furnizată direct de utilizator: atunci când va faceți un cont pe <b>SHAKTI ÎN EXTAZ online</b>, va putem întreba care este numele dvs., care este adresa dvs. de e-mail și va putem cere alte informații personale. Datele pot fi corectate în secțiunea &ldquo;Profilul tău&rdquo;, accesibilă pe parcursul întregii vizite în colțul din dreapta-sus a portalului. Aceste informații trimise de dvs. nu vor fi partajate cu nici o terță parte.<br />
            Informație din raportul de trafic al serverului: atunci când vizitați un site web, dezvăluiți anumite informații despre dvs., ca adresa dvs. IP, ora vizitei dvs., locul de unde ați intrat în site-urile noastre. <b>SHAKTI ÎN EXTAZ online</b> înregistrează aceste informații pentru o perioada de timp determinată. Utilizăm servicii externe companiei de analiză a traficului &ndash; cum sunt cele puse la dispoziție de Trafic.ro, Google Analytics sau SATI &ndash; Studiu de Audiență și Trafic Internet. <br />
            Cookie-uri: în ideea de a oferi un serviciu personalizat utilizatorilor noștri, <b>SHAKTI ÎN EXTAZ online</b> poate folosi cookie-uri pentru a facilita accesul la contul dvs și la avantajele aduse de acesta. <br />
            Cookie-urile sunt fișiere de tip &ldquo;.txt&rdquo;, oferite browser-ului dvs. de un server web și stocate apoi pe hard-discul computerului dvs.. Folosirea cookie-urilor este un standard actual la multe dintre site-urile importante pe care le vizitați.<br />
            Majoritatea browser-elor sunt setate să accepte cookie-uri. Dacă însă nu preferați acest lucru, puteți reseta browser-ul dvs., fie să va anunțe ori de câte ori primiți câte un cookie, fie să refuze chiar acceptarea cookie-urilor. Cookie-urile ne permit să salvăm parolele dvs. de acces și preferințele dvs. astfel încât să nu fiți nevoit să le introduceți din nou data viitoare când ne veți vizita.<br />
            <strong>6.3. Cum protejăm informațiile colectate de la dvs.</strong><br />
            Confidențialitatea și protecția informațiilor colectate de la dvs. sunt de o importantă vitală pentru noi. <b>SHAKTI ÎN EXTAZ online</b> nu oferă informația colectată unor terți fără consimțământul dvs. expres și prealabil. Orice statistică privind traficul utilizatorilor noștri este folosită doar ca ansamblu de date și nu include nicio informație identificabilă personal despre niciun utilizator individual.<br />
            Accesul dvs. la anumite servicii și informații din cadrul site-ului este protejat de o parolă.<br />
            În momentul în care noi primim informațiile transmise de dvs. va garantăm că vom depune toate eforturile pentru a asigura securitatea acestora în sistemele noastre, conform standardelor de securitate impuse de legislația română în vigoare.<br />
            <strong>6.4. Cine are acces la informațiile colectate de la dvs.</strong><br />
            <b>SHAKTI ÎN EXTAZ online</b> nu va dezvălui niciun fel de informație identificabilă personal despre utilizatorii săi către terțe părți fără a primi mai întâi consimțământul expres al utilizatorilor în această privință.<br />
            În același timp însă, <b>SHAKTI ÎN EXTAZ online</b> poate dezvălui informații identificabile personal atunci când legea prevede expres acest lucru, când este cerut de o autoritate competentă sau când acest lucru este necesar pentru protejarea drepturilor și intereselor <b>SHAKTI ÎN EXTAZ online</b>.</p>

            <p class="mt-3"><strong>7. Aprobarea comentariilor</strong><br />
            <b>SHAKTI ÎN EXTAZ online</b> își rezervă dreptul de a nu aproba sau de a dezactiva (fără posibilitatea ulterioară a utilizatorilor de a le reactiva) acele informații sau comentarii trimise spre publicare sau publicate care contravin termenilor și condițiilor de utilizare, care sunt în afara subiectului articolului principal sau pe care le consideră, în mod unilateral, că fiind ilegale, discriminatorii, injurioase, neadecvate sau dăunătoare, sub orice formă, propriei imagini, partenerilor sau terților.<br />
            Utilizatorul este singurul responsabil pentru conținutul mesajelor trimise spre publicare. Pentru aceasta, trebuie să știți că postarea sau transmiterea de comunicări sau informații prin intermediul platformelor de comunicație puse la dispoziție de MISA Senzațional TV este supusă prezenților Termeni și Condiții și informațiile pot să nu apară pe platforma <b>SHAKTI ÎN EXTAZ online</b>, dacă acestea nu sunt aprobate de către unul dintre administratorii <b>SHAKTI ÎN EXTAZ online</b>.<br />
            De asemenea utilizatorul trebuie să înțeleagă că nu poate publica, transmite sau face referire către utilizatorii sau membrii <b>SHAKTI ÎN EXTAZ online</b> niciun fel de mesaj comercial nesolicitat, mesaje cu informații confidențiale, mesaje care conțin viruși sau orice alte secvențe de cod care se dovedesc a fi distructive sau care pot întrerupe, elimina sau limita funcționalitatea <b>SHAKTI ÎN EXTAZ online</b>, mesaje de tip de &bdquo;joc piramidal&rdquo; sau orice altă activitate menită a înșela încrederea unor alte persoane că și orice mesaje care conțin texte ilegale, imorale, injurioase, amenințătoare, abuzive, indecente, care încalcă în orice fel dreptul de proprietate intelectuală sau alte drepturi pe care le poate avea un terț.</p>

            <p class="mt-3"><strong>8. Modificarea prezenților Termeni și Condiții</strong><br />
            <b>SHAKTI ÎN EXTAZ online</b> își rezervă dreptul să schimbe acești termeni, modificând versiunea și dată adoptării noului regulament fără îndeplinirea unor alte formalități. Atunci când acești termeni se vor modifica, <b>SHAKTI ÎN EXTAZ online</b> vă va putea notifica prin intermediul emailului sau printr-un mesaj în contul dvs. de utilizator al <b>SHAKTI ÎN EXTAZ online</b> și prin publicarea în prima pagină a site-ului, a unui link care face trimitere la noua formă a prezentului document. Accesul în site, în contul dvs de utilizator și folosirea serviciilor noastre după momentul notificării sau al afișării linkului privind schimbările pe prima pagină a site-ului implică faptul că v-ați dat acordul asupra noilor termeni.</p>

        @else

            <h1 class="mb-8 text-2xl text-center">General terms and access conditions</h1>

            <p class="font-bold">The <a href="{{ route('rules', ['locale' => 'en']) }}" class="text-pink-700">ONLINE SHAKTI IN ECSTASY REGULATIONS</a> are part of the General terms and access conditions</p>

            <p class="mt-3">
                <strong>1. Website information</strong><br />
            1.1. The <strong>shakti.misatv.ro </strong>website on which the online camp will be held is administred during 10.10.2021-17.11.2021 by VENUS - ASOCIAŢIA PENTRU ELEVAREA FEMEII, based in Bucharest, sector 5, , Intrarea Romaniței, no. 15, fiscal identification number (CUI) 16817435,<br />
            and <br />
            The web page <strong>registration.venus.org.ro </strong>through which registration and payment for the camp will be made is also administred by VENUS - ASOCIAŢIA PENTRU ELEVAREA FEMEII, based in Bucharest, sector 5,  Intrarea Romaniței, no. 15, fiscal identification number (CUI) 16817435.
                <br>
                The forementioned web pages will be named throughout this document <strong>SHAKTI IN ECSTASY</strong> online.
                <br>
                Contact address: Bucharest, sector 5, Intrarea Romanitei, nr. 15<br />
                Phone: (+40) 0737620999<br />
                email:{{ config('site.contact_email') }}
            </p>

            <p class="mt-3"><strong>2. Intellectual Property</strong><br />
            2.1 The content and user experience of the sub-domains <strong>shakti.mistatv.ro </strong>și <strong>registration.venus.org.ro </strong>are owned by VENUS &ndash; ASOCIAȚIA PENTRU ELEVAREA FEMEII and are protected by the Romanian legislation concerning copyright and the related rights. The texts posted by the users in the &ldquo;Add comment&rdquo; section will become the property of VENUS &ndash; ASOCIAȚIA PENTRU ELEVAREA FEMEII from the moment of posting. Information and content posted by registered users or third parties or partners on the <b>SHAKTI IN ECSTASY online</b> website, the copyright and responsibility for them belong entirely to those who published that information. Content from partners based on concluded agreements are identified with the partner&rsquo;s name next to that content, text or image.<br />
            2.2. You may use the content of <b>SHAKTI IN ECSTASY online</b> only for personal use.<br />
            2.3. The actions outlined below are not allowed without prior written permission from <b>SHAKTI IN ECSTASY online staff</b>:<br />
            a. removal of the acknowledgement that identifies the content as the copyright of <b>SHAKTI IN ECSTASY online</b>;<br />
            b. modifying, publishing, transmitting, retransmitting in any way or form, as well as participating in the transfer, sale, distribution of materials made by reproducing, modifying or displaying the content, in the absence of obtaining prior written permission from us;<br />
            c. the reproduction or storage of the content, as well as the sending of this content to any other website, server or any other means of storing the information, if this activity has a commercial purpose.<br />
            2.4. It is forbidden to use the content of <b>SHAKTI IN ECSTASY online</b> for purposes other than those expressly permitted by this document or by the current laws. Requests to use the content for purposes other than those expressly permitted by this document can be sent to {{ config('site.contact_email') }}.<br />
            2.5. If you believe that any content on the <b>SHAKTI IN ECSTASY online</b> website violates your intellectual property rights, the right to privacy, advertising or other personal rights, please send an email to {{ config('site.contact_email') }} with details of the violated rights, to allow the administrators of <b>SHAKTI IN ECSTASY online</b> to act in accordance with the legal provisions set out in Law 365/2002 on electronic commerce.</p>

            <p class="mt-3"><strong>3. Suspension of access</strong><br />
            <b>SHAKTI IN ECSTASY online</b> reserves the right to suspend or block your access to the content of the site or to part of it, without further notification or formality and without any explanation,</p>

            <p class="mt-3"><strong>4. Site changes</strong><br />
            <b>SHAKTI IN ECSTASY online</b> reserves the right to suspend, modify, add or delete portions of its content at any time. <b>SHAKTI IN ECSTASY online</b> reserves the right to restrict users&rsquo; access to some or all of its content.</p>

            <p class="mt-3"><strong>5. Registration, passwords and responsibilities</strong><br />
            5.1. Your access to the Newsletter service or some facilities within the site requires your registration with a username and password. We recommend that you do not disclose this password to anyone. <b>SHAKTI IN ECSTASY online</b> will never ask for your password via e-mail or telephone messages.<br />
            5.2. Unfortunately, it can never be guaranteed that transmission of data via the Internet is 100% secure. Consequently, despite our efforts to protect your personal information, <b>SHAKTI IN ECSTASY online</b> cannot ensure or guarantee the security of the information transmitted by you to us, to and from our online services. We therefore are warning you that any information sent to us will be at your own risk.</p>

            <p class="mt-3"><strong>6. Private life</strong><br />
            <strong>6.1 General information</strong><br />
            <b>SHAKTI IN ECSTASY online</b> respects your privacy and the personal data you share with us when accessing this site. This information is intended to inform you about what type of personally identifiable information is collected from you, how and where we may use this information, how we will protect the information collected from you, who has access to the information collected from you and how inaccuracies in the given information can be corrected.<br />
            <b>SHAKTI IN ECSTASY online</b> complies with the Romanian legislation to date, in this case the two normative acts that make up the legislative package on data protection in the European Union: (EU) Regulation 2016/679 on the protection of individuals with regard to the processing of personal data and with regard to free circulation of such data and of repealing Directive 95/46 / EC (General Data Protection Regulation) as well as (EU) Directive  2016/680 on the protection of personal data in the context of specific activities carried out by law enforcement authorities.<br />
            According to these, you have the right to access, to modify your data, the right not to be subjected to an individual decision and the right to appeal to justice. You have the right to oppose the processing of your personal data and to request the deletion of data. To exercise these rights, you can address a written request, dated and signed, to: {{ config('site.contact_email') }}.<br />
            Data collection is for the purpose of an easier access to your account on the <b>SHAKTI IN ECSTASY online</b> website, or to inform the users of news, participation in contests or participation in promotional campaigns by <b>SHAKTI IN ECSTASY online</b>.<br />
            The purpose of <b>SHAKTI IN ECSTASY online</b> having access to the data stored on your computer (cookies) is for the personalization of displayed content &ndash; for example, to retain the personalized settings of each user, to authenticate comments or to create user profiles (without identifying a user or specific computer device).<br />
            Other third parties, such as those who collect traffic data (eg SATI) or those belonging to social networks (eg Facebook) integrated on the pages of <b>SHAKTI IN ECSTASY online</b> may use cookies for the purpose of collecting traffic information or to allow the sharing of content with the specific social network.<br />
            Users who do not want third-party access to data stored on your computer (cookies) may use browser settings to delete or block the abovesaid data. To help our users, the following links for the three main browsers on the market are for this purpose:<br />
            &ndash; Internet Explorer &ndash; <a href="http://support.microsoft.com/kb/278835/ro" target="_blank">http://support.microsoft.com/kb/278835/ro</a><br />
            &ndash; Mozilla Firefox &ndash; <a href="http://support.mozilla.org/ro/kb/cookie-urile" target="_blank">http://support.mozilla.org/ro/kb/cookie-urile</a><br />
            &ndash; Google Chrome &ndash;<a href="http://support.google.com/chrome/bin/answer.py?hl=en&amp;answer=95647" target="_blank">http://support.google.com/chrome/bin/answer.py?hl=en&amp;answer=95647</a></p>

            <p class="mt-3"><strong>6.2 The information we collect</strong><br />
            <b>SHAKTI IN ECSTASY online</b> collects information from its users in three ways: directly from the user, from traffic reports recorded by the servers that host our sites, and through cookies.<br />
            Information required for registration: name, surname, date of birth, course group, city, tapas, phone number, email address, photo.<br>
            Information provided directly by the user: when you create an account on <b>SHAKTI IN ECSTASY online</b>, we ask for your name, e-mail address, and other personal information. The data can be amended in the Your Profile section, located in the upper right corner of the portal and accessible at any time. Your personal information, submitted by you, will not be shared with any third party.<br />
            Server traffic report information: On visiting a website, information is disclosed about you, such as your IP address, time of visit, the place where you entered our site. <b>SHAKTI IN ECSTASY online</b> records this information for a specified period of time. We use services external to the traffic analysis company &ndash; such as those provided by Trafic.ro, Google Analytics or SATI &ndash; Audience Study and Internet Traffic.<br />
            Cookies: in order to offer a personalized service to our users, <b>SHAKTI IN ECSTASY online</b> may use cookies to facilitate access to your account and the benefits it brings.<br />
            Cookies are &ldquo;.txt &rdquo; files, provided to your browser by a web server and then stored on the hard drive of your computer. The use of cookies is a current standard on many important websites you visit.<br />
            Most browsers are set to accept cookies. If you do not wish to accept cookies, you can reset your browser, either to notify you whenever you receive a cookie, or not to accept cookies. Cookies allow us to save your access passwords and your preferences so that you do not have to enter them again the next time you visit this website.</p>

            <p class="mt-3"><strong>6.3. How we protect the information we collect from you</strong><br />
            The confidentiality and protection of the information collected from you is of vital importance to us. <b>SHAKTI IN ECSTASY online</b> does not share the information collected from you with third parties without your expressed and prior consent. Traffic statistics of our users are used only as data and do not include any personally identifiable information about any individual user.<br />
            Your access to some services and information on the site is password protected.<br />
            When we receive information sent by you, we guarantee that we will make every effort to ensure their security in our systems, according to the security standards imposed by the Romanian legislation in force.</p>

            <p class="mt-3"><strong>6.4. Who has access to the information collected from you?</strong><br />
            <b>SHAKTI IN ECSTASY online</b> will not disclose any personally identifiable information about its users to third parties without first receiving the express consent of users.<br />
            <b>SHAKTI IN ECSTASY online</b> may disclose personally identifiable information when required by law, when requested by a competent authority or when this is necessary to protect the rights and interests of <b>SHAKTI IN ECSTASY online</b>.</p>

            <p class="mt-3"><strong>7. Approval of comments</strong><br />
            <b>SHAKTI IN ECSTASY online</b> reserves the right not to approve or deactivate information or comments, without further possibility for users to reactivate said information or comments, sent for publication or published that contravene the terms and conditions of use, which are outside the subject of the main article or which they consider, unilaterally, to be illegal, discriminatory, abusive, inappropriate or harmful in any way to their own image, to those of partners or third parties.<br />
            The user is solely responsible for the content of messages sent for publication. For this, the posting or transmission of communications or information through the communication platforms provided by <b>SHAKTI IN ECSTASY online</b> is subject to these Terms and Conditions, and the information may not appear on the platform <b>SHAKTI IN ECSTASY online</b>, if it is not approved by administrators of <b>SHAKTI IN ECSTASY online</b>.<br />
            The user must also understand that they may not publish, transmit or refer to users or members of <b>SHAKTI IN ECSTASY online</b> any unsolicited commercial messages, messages with confidential information, messages containing viruses or any other code sequences that prove to be destructive, or which may interrupt, eliminate or limit the functionality of <b>SHAKTI IN ECSTASY online</b>, &ldquo;pyramid system&rdquo; type messages or any other activity meant to deceive the trust of other people, as well as any messages containing illegal, immoral, insulting, threatening, abusive, indecent texts, which infringe in any way the intellectual property right or other rights that a third party may have.</p>

            <p class="mt-3"><strong>8. Modification of the present Terms and Conditions</strong><br />
            <b>SHAKTI IN ECSTASY online</b> reserves the right to change these terms, modifying the version and date of adopting of new regulations without fulfilling other formalities. When these terms change, <b>SHAKTI IN ECSTASY online</b> will be able to notify you by email or via a message in your user <b>SHAKTI IN ECSTASY online</b> account, and by publishing a link that refers to the new form of this document on the first page of the site. Access to the site, to your user account and use of our services after the moment of notification or display of the link regarding the changes on the first page of the site implies that you have agreed to the new terms.</p>

        @endif
    </x-container>

</x-guest-layout>
