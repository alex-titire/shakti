<x-guest-layout>

    <x-slot name="meta_title">
        {{ __('general.about') }}
    </x-slot>

    <x-header class="container">
        <a class="" href="{{ route("events.registration", ['event' => $event]) }}">
            {{ __('general.registration') }}
        </a>
    </x-header>

    <x-container>

        @if ($locale == "ro")
            <h1 class="text-2xl">Tabăra internațională pentru femei SHAKTI ÎN EXTAZ online, {{ __('general.timestamp') }}</h1>

            <h2 class="text-xl mt-6">Tema taberei:</h2>

            <p class="mt-3"><strong>DEZVĂLUIRI DESPRE TAINELE IUBIRII DUMNEZEIEȘTI SUBLIME, OCEANICE ȘI COPLEȘITOARE CE NE SUNT DESTĂINUITE ÎN FELURITE MODURI DE CĂTRE MAHA SHAKTI</strong></p>

            <h2 class="text-xl mt-6">Taxa de participare:</h2>
            <p class="mt-3"><strong>Pentru cursantele din România:</strong></p>

            <ul class="mt-3 list-disc ml-4">
                <li>Taxă întreagă &ndash; 175 lei</li>
                <li>Coordonatoare de grup de shakti, instructoare yoga și tantra, lectori ayurveda &ndash; 150 lei</li>
                <li>Așezămintele din România vor primi cod gratuit de participare. Participantele care doresc cod separat, vor plăti una dintre taxele de mai sus.</li>
            </ul>

            <p class="mt-3"><strong>Pentru cursantele din străinătate:</strong></p>

            <ul class="mt-3 list-disc ml-4">
                <li>Taxă întreagă &ndash; 90 eur</li>
                <li>Coordonatoare de grup de shakti, instructoare yoga și tantra, lectori ayurveda &ndash; 65 eur</li>
                <li>Persoane care locuiesc în așezământ &ndash; 45 eur</li>
            </ul>

            <p class="mt-3">Înscrierile se fac <strong>până pe data de 7 octombrie 2021, inclusiv. Cele care se înscriu în tabără după data limită, vor plăti taxa majorată cu 50 lei/ 10 eur.</strong></p>
            <p class="mt-3"><strong>CADOU:</strong> cele înscrise înainte de 7 octombrie vor avea acces nelimitat timp pe 4 zile (11-14 Octombrie) la înregistrările materialelor ediției anterioare - Shakti în Extaz 2020</p>
            <p class="mt-3">Plata se poate face cash, prin transfer bancar sau prin card. Detalii veți primi după înregistrare.</p>

            <p class="mt-3"><strong>Persoanele care se vor înscrie în tabără vor avea acces la materialele expuse în această tabără pentru o perioadă de încă 30 de zile de la încheierea acesteia.</strong></p>

            <p class="mt-3"><span class="text-red-500">!!!Atenție</span> &ndash; pentru înscriere este necesară o fotografie față în format electronic, realizată după data de 01 Mai 2021, în costum de baie două piese și în care să se vadă trupul întreg și data(zi/lună/an)</p>

            <h2 class="text-xl mt-6">Din programul taberei:&nbsp;</h2>

            <ul class="mt-3 list-disc ml-4">
                <li>Aspecte inițiatice importante referitoare la taina energiei creatoare universale care în ezoterismul tantric si alchimic al tradiției Mahasiddha Yoga este denumită simbolic "Sperma cea tainică a lui <em>Shiva</em>" – <strong>Nicolae Catrina (Adinathananda)</strong></li>
                <li>Uimitoarele și inepuizabilele resurse ale artei ezoterice tantrice, prin care copleșitoarea <em>Maha Shakti</em> ne revelează misterioase și fermecătoare forme ale iubirii dumnezeiești – <strong>Aghora Vidya</strong></li>
                <li>Asumarea reciprocă prin iubire și susținerea reciprocă la nivel sufletesc a celor doi iubiți în cadrul unui cuplu erotic-amoros fericit - Celui care are și fructifică într-un mod dumnezeiesc integrat ceea ce are, i se va mai da – <strong>Ștefania și Ionuț Costin</strong></li>
                <li>Trezirea și amplificarea focului  iubirii dumnezeiești în inimile și în ființele noastre feminine prin activarea anumitor structuri subtile energetice cu ajutorul masajului tantric ezoteric – <strong>Crina Atomulesă</strong></li>
                <li>Modalități practice de a depăși unele situații generatoare de tensiuni lăuntrice, în cadrul relației de cuplu, prin amplificarea iubirii și a comuniunii inefabile cu <em>Maha Shakti</em> – <strong>Lalita Dochinoiu</strong></li>
                <li>Manifestarea sublimă, îndumnezeitoare a lui <em>Maha Shakti</em> în și prin yoni-ul, inima și conștiința femeii inițiate care Îl adoră neîncetat pe Dumnezeu – <strong>Simona Corduneanu</strong></li>
                <li>Starea euforică de libertate interioară nesfârșită și generatoare de extaz a unei femei care îl pune pe Dumnezeu pe primul loc în viața ei – <strong>Aida Călin</strong></li>
                <li>Workshop dans: Captarea din abundență a energiei subtile sublime a Iubirii Dumnezeiești în ființa noastră prin intermediul dansului transfigurator, ce ne ajută totodată să ne conectăm la sfera gigantică de forță a lui <em>Maha Shakti</em> – <strong>Ami Răduț</strong></li>
                <li>Trăsături ale stării de adorație a lui Parvati față de <em>Shiva</em> sau cum să iubim feminin, profund, plenar, copleșitor, reușind astfel să-l trezim pe <em>Shiva</em> în iubiții noștri – <strong>Paula Dafinoiu</strong></li>
                <li>Workshop dans: Trezirea gradată, prin dans, a stării de dăruire și abandon profund pe care <em>Maha Shakti</em> o are față de Preaiubitul ei, Dumnezeu – <strong>Daniela Mărunțelu</strong></li>
                <li>Cum am reușit să mă deschid în fața iubirii, să construiesc și să consolidez o relație de cuplu împlinitoare, profund transformatoare punând în aplicare principiul ocult al emulației erotice amoroase – <strong>Relatare Loredana Pulpan</strong></li>
                <li>Grația extraordinară a lui <em>Maha Shakti</em> manifestată prin intermediul a două femei unite în iubire reciprocă și efectul ocult puternic transformator al multiplicității într-o relație tantrică poliamoroasă în trei – <strong>Neza și Benedict Newton</strong></li>
                <li>Necesitatea unei atitudini pline de înțelegere, acceptare și iertare reciprocă pentru aprofundarea stării de iubire și adorație într-o relație de cuplu spiritual – <strong>Raluca Popescu</strong></li>
                <li>Practica încântătoare și transformatoare a rugăciunii și a comuniunii cu Atributele Dumnezeiești în contextul relațiilor romantice de iubire și de cuplu spiritual – <strong>Maria Blandine Wegener</strong></li>
                <li>Să ne lăsăm inspirate de <em>Maha Shakti</em> și să alegem întotdeauna într-un mod înțelept să manifestăm activ iubirea dumnezeiască depășind cu succes încercările spirituale – <strong>Victoria Trif</strong></li>
                <li>Dumnezeu in ipostaza de Preaiubit al inimilor noastre : intimitatea inefabila a relatiei cu Dumnezeu ce a fost experimentata de unele fiinte umane exceptionale ce l-au adorat pe Dumnezeu si cateva modalitati practice de amplificare a iubirii  de Dumnezeu – <strong>Laura Mosor</strong></li>
                <li>Ritual de comuniune cu <em>Maha Shakti</em>.</li>
                <li>Tehnici de intrare în rezonanță cu sfera de forță a supremei Mame Dumnezeiești <em>Maha Shakti</em></li>
                <li>Exemplificări speciale susținute de Ghidul nostru spiritual.</li>
            </ul>

            <p class="mt-3"><strong>Telefon:</strong> <a href="tel:+40737620999" target="_blank">0737620999</a></p>
            <p class="mt-3"><strong>Email:</strong> <a href="mailto:{{ config('site.contact_email') }}" target="_blank">{{ config('site.contact_email') }}</a></p>

            <div class="mt-8 mb-4 text-center">
                <x-link-button href="{{ route('registration', ['locale' => 'ro']) }}">Înscriere</x-link-button>
            </div>

        @else

            <h1 class="text-2xl">THE INTERNATIONAL CAMP FOR WOMEN, SHAKTI IN ECSTASY online {{ __('general.timestamp') }}</h1>

            <h2 class="text-xl mt-6">The theme of the camp:</h2>
            <p class="mt-3"><strong>REVELATIONS Of THE SECRETS OF SUBLIME, OCEANIC AND OVERWHELMING GODLY LOVE, WHICH ARE REVEALED BY MAHA SHAKTI</strong></p>

            <h2 class="text-xl mt-6">Participation fee:</h2>

            <p class="mt-3"><strong>For students in Romania:</strong></p>

            <ul class="mt-3 list-disc ml-4">
                <li>Full fee - 175 lei</li>
                <li>Shakti group coordinators, Yoga and Tantra instructors, Ayurveda lecturers - 150 lei</li>
                <li>Establishments from Romania will receive a free participation code. Participants who wish to have a separate code will pay one of the above fees.</li>
            </ul>

            <p class="mt-3"><strong>For students from abroad:</strong></p>

            <ul class="mt-3 list-disc ml-4">
                <li>Full fee - 90 eur</li>
                <li>Shakti group coordinators, Yoga and Tantra instructors, Ayurveda lecturers - 65 eur</li>
                <li>Persons living in the settlements/integrations - 45 eur</li>
            </ul>

            <p class="mt-3 font-bold">Registration is open until the end of October 7-th 2021 (EEST Bucharest, Romania). Those who will register for the camp after the deadline, will pay the fee increased by 50 lei/ 10 eur.</p>

            <p class="mt-3"><strong>FREE GIFT</strong>: Those registered before the end of October 7-th (EEST Bucharest, Romania) will have access to recordings of the previous edition - Shakti in Ecstasy 2020, for 4 days (Oct. 11-14)</p>

            <p class="mt-3">Payment can be done cash, by bank transfer or by credit card. You will receive details after signing-up.</p>

            <p class="mt-3"><strong>The people who will register in the camp will have access to the materials exhibited in this camp for a period of another 30 days from its conclusion.</strong></p>

            <p class="mt-3"><span class="text-red-500">!!!Attention</span> - for signing-up you need one electronic photos taken after 1st of May 2021, taken after 1st of May 2021, in a two-piece swimsuit and showing the whole body and date (day/month/year).</p>

            <h2 class="text-xl mt-6">From the camp program:&nbsp;</h2>

            <ul class="mt-3 list-disc ml-4">
                <li>Important initiatic aspects concerning the mystery of the universal creative energy, which in the Tantric and alchemical esoteric knowledge of the Mahasiddha Yoga tradition, is symbolically referred to as "<em>Shiva</em>'s Semen" - <strong>Nicolae Catrina (Adhinathananda)</strong></li>
                <li>The amazing and inexhaustible gifts of Tantric esoteric art, through which the overwhelming <em>Maha Shakti</em> reveals mysterious and fascinating forms of godly love  - <strong>Aghora Vidya</strong></li>
                <li>The assuming in a love relationship and the mutual support at the soul level of the two lovers in an erotic-loving couple. To the one who has, and makes the most of what he has in a godly integrated way, more will be given - <strong>Ștefania and Ionuț Costin</strong></li>
                <li>Workshop: Awakening and amplifying the fire of godly love in our feminine hearts and beings by activating certain subtle energetic structures with the help of esoteric Tantric massage - <strong>Crina Atomulesă</strong></li>
                <li>Practical ways to overcome - within the happy couple relationship - some situations that generate inner tensions, by amplifying love for and ineffable communion with <em>Maha Shakti</em> - <strong>Lalita Dochinoiu</strong></li>
                <li>The sublime, deifying manifestation of <em>Maha Shakti</em> in and through the yoni, heart and consciousness of the initiated woman who adores God unceasingly - <strong>Simona Corduneanu</strong></li>
                <li>The euphoric, bliss giving state of endless inner freedom of that woman who puts God in the first place in her life - <strong>Aida Calin</strong></li>
                <li>Dance Workshop: Capturing the abundant subtle sublime energy of Godly Love in our being through transfiguring dance, which also helps us in connecting to the gigantic sphere of <em>Maha Shakti</em>'s power - <strong>Amy Răduț</strong></li>
                <li>Traits of Parvati's state of adoration towards <em>Shiva</em> or how to love femininely, deeply, fully, overwhelmingly, thus managing to awaken <em>Shiva</em> within our lovers - <strong>Paula Dafinoiu</strong></li>
                <li>Dance workshop: The gradual awakening through dance of <em>Maha Shakti</em>'s state of deep surrender and self-giving towards her beloved - God - <strong>Daniela Mărunțelu</strong></li>
                <li>How I managed to open myself to love, to build and consolidate a fulfilling, deeply transforming couple relationship by implementing the occult principle of erotic love emulation - <strong>Loredana Pulpan</strong></li>
                <li>The extraordinary grace of <em>Maha Shakti</em> manifested through two women united in mutual love and the powerfully transformative occult effect of multiplicity in a polyamorous tantric threesome relationship - <strong>Neza and Benedict Newton</strong></li>
                <li>The necessity of an attitude of mutual understanding, acceptance and forgiveness to deepen the state of love and adoration in a spiritual couple relationship - <strong>Raluca Popescu</strong></li>
                <li>The delightful and transforming practice of prayer and communion with the Godly Attributes in the context of romantic relationships of love and spiritual couples - <strong>Maria Blandine Wegener</strong></li>
                <li>God as the Beloved of our hearts: the ineffable intimacy of the relationship with God that has been experienced by some exceptional human beings who have worshiped God and some practical ways to amplify one's love of God - <strong>Laura Mosor</strong></li>
                <li>Let us allow ourselves to be inspired by <em>Maha Shakti</em> and to always choose wisely to actively manifest godly love by successfully overcoming spiritual tests - <strong>Victoria Trif</strong></li>
                <li>Communion ritual with <em>Maha Shakti</em>.</li>
                <li>Techniques for entering into resonance with the sphere of force of the supreme Godly Mother <em>Maha Shakti</em>.</li>
                <li>Special examplifications supported by our Spiritual Guide.</li>
            </ul>

            <p class="mt-3"><strong>Phone:</strong> <a href="tel:+40737620999" target="_blank">0737620999</a></p>
            <p class="mt-3"><strong>Email:</strong> <a href="mailto:{{ config('site.contact_email') }}" target="_blank">{{ config('site.contact_email') }}</a></p>

            <div class="mt-8 mb-4 text-center">
                <x-link-button href="{{ route('registration', ['locale' => 'en']) }}">Registration</x-link-button>
            </div>

        @endif

    </x-container>
</x-guest-layout>
