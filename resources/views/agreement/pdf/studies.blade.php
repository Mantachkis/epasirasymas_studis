<!doctype html>
<html>
@include ('agreement.pdf.head')
<body>

<table class="headTable">
    <tr>
        <td>
            <img src="https://resources.vdu.lt/images/vdu_logo_black_small.png" alt="" width="160">
        </td>
        <td>
            <h6 class="centerTextUpper">STUDIJŲ SUTARTIS</h6>

            <p class="centerTextLower">Reg. Nr. {{$bpoPakviestiEsign->stud_sut_nr}}</p>

        </td>
        <td>
            <p style="text-align: right;">@if ($agreement->agreement_date) {{$agreement->agreement_date}} @endif</p>
        </td>
    </tr>
</table>
<p class="centerTextPart">SPECIALIOJI DALIS</p>
<table class="listTable">
    <tr>
        <td class="num">1.</td><td>Studijų sutartį (toliau – sutartis) sudaro specialioji ir bendroji dalys, kurios yra neatsiejamos.</td>
    </tr>
    <tr>
        <td class="num">2.</td><td>Sutartį su Vytauto Didžiojo universitetu sudarančio asmens duomenys:</td>
    </tr>
</table>
<br />
<table class="table">
    <tr>
        <td class="tdLeft">Vardas, pavardė</td>
        <td class="tdRight">{{$bpoPakviestiEsign->vardas}} {{$bpoPakviestiEsign->pavarde}}</td>
    </tr>
    <tr>
        <td class="tdLeft">Asmens kodas @if ($bpoPakviestiEsign->gimimo_data) / gimimo data @endif </td>
        <td class="tdRight">{{$bpoPakviestiEsign->asmens_kodas}} @if ($bpoPakviestiEsign->gimimo_data) / {{$bpoPakviestiEsign->gimimo_data}} @endif</td>
    </tr>
    <tr>
        <td class="tdLeft">Studijų pakopa</td>
        <td class="tdRight">{{$stage->tnosauk}}</td>
    </tr>
    <tr>
        <td class="tdLeft">Studijų forma</td>
        <td class="tdRight">{{$form->tnosauk}}</td>
    </tr>
    <tr>
        <td class="tdLeft">Studijų programa</td>
        <td class="tdRight">{{$bpoProgramos->pp_pavad}}</td>
    </tr>
    <tr>
        <td class="tdLeft">Finansavimo tipas</td>
        <td class="tdRight">@if (strtoupper($bpoPakviestiEsign->finansavimas) == 'VF') valstybės finansuojamos @else valstybės nefinansuojamos @endif</td>
    </tr>
    <tr>
        <td class="tdLeft">Studijų krepšelio dydis / Metinė studijų kaina</td>
        <td class="tdRight">{{$yearPrice}}</td>
    </tr>
    <tr>
        <td class="tdLeft">Semestro kaina</td>
        <td class="tdRight">{{$semesterPrice}}</td>
    </tr>
    <tr>
        <td class="tdLeft">Studijų sąlygų metai</td>
        <td class="tdRight">{{$bpoPakviestiEsign->metai}}</td>
    </tr>
</table>
<p class="centerTextPart">BENDROJI DALIS<br />I. BENDROSIOS NUOSTATOS</p>
<table class="listTable">
    <tr>
        <td class="num">1.</td><td>Sutartis sudaroma tarp Vytauto Didžiojo universiteto (toliau – Universitetas), atstovaujamo rektoriaus Juozo Augučio ir asmens (toliau – Studentas), kurio
        duomenys nurodyti sutarties specialiosios dalies 2 punkte (toliau kartu vadinamų Šalimis).</td>
    </tr>
    <tr>
        <td class="num">2.</td><td>Sutartis sudaroma vadovaujantis Lietuvos Respublikos Mokslo ir studijų įstatymu, Standartinės studijų sutarties sąlygomis, Universiteto Statutu, Studijų
    reguliaminu, Priėmimo į Vytauto Didžiojo universitetą taisyklėmis ir kitais Lietuvos Respublikos ir Universiteto vidaus teisės aktais.</td>
    </tr>
    <tr>
        <td class="num">3.</td><td>Sutartis nustato šalių teises ir įsipareigojimus, galiojimo, keitimo ir nutraukimo tvarką, studijų sąlygas, kainą, jos keitimo ir mokėjimo už studijas sąlygas.</td>
    </tr>
    <tr>
        <td class="num">4.</td><td>Sutartis sudaroma pasirašant elektronine forma, sutinkant (akceptuojant) su Universiteto informacinėje sistemoje pateiktomis sąlygomis Universiteto
    priėmimo taisyklėse nustatyta tvarka. Šalių susitarimu sutarties elektroninė forma prilyginama rašytinei formai.</td>
    </tr>
    <tr>
        <td class="num">5.</td><td>Sutartis įsigalioja nuo jos pasirašymo dienos. Studento statusas įgyjamas nuo akademinių metų semestro pradžios. Jei sutartis pasirašoma išankstinio
    priėmimo į Universitetą metu, studento statusas įgyjamas nuo akademinių metų semestro pradžios, jei studentas atitinka visas sąlygas ir vykdo visus
    keliamus reikalavimus, kurie yra numatyti Priėmimo į universitetą taisyklėse. Kitu atveju Sutartis vienašališkai nutraukiama.</td>
    </tr>
</table>

<p class="centerTextPart">II. UNIVERSITETO ĮSIPAREIGOJIMAI</p>

<table class="listTable">
    <tr>
        <td class="num">6.</td><td>Universitetas įsipareigoja:</td>
    </tr>
    <tr>
        <td class="num">6.1.</td><td>sudaryti Studentui sąlygas vykdyti studijų programą;</td>
    </tr>
    <tr>
        <td class="num">6.2.</td><td>užtikrinti studijų kokybę;</td>
    <tr>
        <td class="num">6.3.</td><td>Studentui, įvykdžius studijų programą, suteikti studijų programą atitinkantį kvalifikacinį laipsnį ir (arba) profesinę kvalifikaciją ir išduoti tai patvirtinantį
                aukštojo mokslo diplomą bei diplomo priedėlį;</td>
    </tr>
    <tr>
        <td class="num">6.4.</td><td>tvarkyti Studento asmens duomenis vadovaujantis Asmens duomenų teisinės apsaugos įstatymu;</td>
    </tr>
    <tr>
        <td class="num">6.5.</td><td>suteikti studentui prieigą prie visų studijų procesui reikalingų informacinių sistemų ir studijų išteklių;</td>
    </tr>
    <tr>
        <td class="num">6.6.</td><td>suteikti reikiamą informaciją ir teikti konsultacijas studijų klausimais;</td>
    </tr>
    <tr>
        <td class="num">6.7.</td><td>suteikti reikiamą informaciją ne Lietuvos Respublikos pilietybę turinčiam studentui ir pagal kompetencijas tarpininkauti Lietuvos Respublikos teisės aktų
                numatytais atvejais dėl vizos ar leidimo laikinai gyventi Lietuvos Respublikoje gavimo. Vizos arba laikino leidimo gyventi prašymo pateikimas yra studento atsakomybė.</td>
    </tr>
</table>

<p class="centerTextPart">III. STUDENTO ĮSIPAREIGOJIMAI</p>

<table class="listTable">
    <tr>
        <td class="num">7.</td><td>Studentas įsipareigoja:</td>
    </tr>
    <tr>
        <td class="num">7.1. </td><td>studijuoti pagal Sutarties Specialiojoje dalyje nurodytą studijų programą ir įvykdyti joje keliamus reikalavimus;</td>
    </tr>
    <tr>
        <td class="num">7.2.</td><td>dalyvauti Universiteto atliekamose studijų kokybės vertinimo ir karjeros stebėsenos apklausose;</td>
    </tr>
    <tr>
        <td class="num">7.3.</td><td>mokėti už kartojamus ir (arba) papildomus studijų dalykus pagal Universiteto Senato patvirtintą Mokesčių už studijas mokėjimo ir grąžinimo tvarkos aprašą;</td>
    </tr>
    <tr>
        <td class="num">7.4.</td><td>savarankiškai susipažinti su Universiteto tinklalapyje ir Studentų savitarnos portale skelbiamais dokumentais, reglamentuojančiais studijas, ir nuolat juos
    sekti studijų metu;</td>
    </tr>
    <tr>
        <td class="num">7.5.</td><td>laikytis Etikos kodekso nuostatų, akademinės drausmės ir sąžiningumo principų, vidaus tvarkos taisyklių, bendrųjų reikalavimų studentams;</td>
    </tr>
    <tr>
        <td class="num">7.6</td><td>pasikeitus gyvenamai vietai ar kitai kontaktinei informacijai nedelsiant informuoti Universitetą.</td>
    </tr>
    <tr>
        <td class="num">8.</td><td>Ne Lietuvos Respublikos pilietybę turintys studentai, laikydamiesi Lietuvos Respublikos įstatymų ir kitų teisės aktų, privalo:</td>
    </tr>
    <tr>
        <td class="num">8.1.</td><td>pateikti dokumentus (diplomą ir jo priedėlį) akademiniam kvalifikacijos pripažinimui atlikti Universitete ar Studijų kokybės vertinimo centre Lietuvoje.
                Pristačius dokumentų originalus, akademinis kvalifikacijos pripažinimas turi būti užbaigtas per pirmąjį semestrą;</td>
    </tr>
    <tr>
        <td class="num">8.2.</td><td>pateikti išsilavinimą liudijančių dokumentų originalus Universitetui per 30 kalendorinių dienų nuo atvykimo studijuoti į Universitetą dienos. Paaiškėjus,
    kad pateikti dokumentai yra neautentiški ar padirbti, studijos Universitete vienašališkai nutraukiamos bet kuriuo studijų metu. Vizos ar laikino leidimo
                galiojimas sustabdomas ir studentas turi išvykti į savo kilmės šalį per trumpiausią laikotarpį;</td>
    </tr>
    <tr>
        <td class="num">8.3.</td><td>ne Europos Sąjungos piliečiai – privalo Universitetui pateikti legalų buvimą Lietuvos Respublikoje įrodančius dokumentus per 5 dienas nuo dokumento
    gavimo. Nepateikus legalų buvimą Lietuvos Respublikoje įrodančių dokumentų, sutartis vienašališkai nutraukiama.</td>
    </tr>
    <tr>
        <td class="num">8.4.</td><td>vykdyti kitus įsipareigojimus, nustatytus Universiteto statute, Studijų reguliamine ir kituose Universiteto vidaus tvarką reglamentuojančiuose
        </td>
    </tr>
    <tr>
        <td class="num">9.</td><td>Studentas sutinka su Universiteto studento sąžiningumo deklaracijoje numatytais principais ir įsipareigoja juos vykdyti:<br />
        - visą studijų laikotarpį laikytis Vytauto Didžiojo universiteto akademinės etikos kodekso, Studijų reguliamino ir kitų dokumentų, reglamentuojančių etišką
        elgesį, nuostatų;<br />
        - atsakingai žvelgti į savo kaip studento(-ės) pareigas ir sąžiningai jas vykdyti;<br />
        - būdamas studentu(-e) rodyti pavyzdį kitiems akademinės bendruomenės nariams, netoleruoti akademinio nesąžiningumo atvejų ir vykdyti savo pareigą apie
        tokius atvejus pranešti, atskleisti;<br />
        - aktyviais veiksmais prisidėti prie sąžiningos akademinės aplinkos kūrimo ir puoselėjimo Vytauto Didžiojo universitete.</td>
    </tr>
    <tr>
        <td class="num">10</td><td>Studentas sutinka, kad už akademinės etikos pažeidimus laikant įskaitas, egzaminus ir kitus tarpinius atsiskaitymus, ruošiant ir atsiskaitant už savarankiškus
        ar baigiamąjį darbus, atliekant mokslinius tyrimus, skelbiant mokslinių tyrimų rezultatus jam turi būti skiriamos Vytauto Didžiojo universiteto akademinės
        etikos kodekse, Studijų reguliamine ir kituose dokumentuose, reglamentuojančiuose etišką elgesį numatytos sankcijos.</td>
    </tr>
</table>

<br />
    <p class="centerTextPart" style="page-break-before: always;">IV. STUDIJŲ FINANSINĖS SĄLYGOS</p>
<table class="listTable">
    <tr>
        <td class="num">11.</td><td>Studento, kurio studijas finansuojama valstybė, studijų kaina apmokama valstybės biudžeto lėšomis Lietuvos Respublikos teisės aktų nustatyta tvarka.</td>
    </tr>
    <tr>
        <td class="num">12.</td><td>Studentas, priimtas į valstybės nefinansuojamas studijas ar valstybės finansuojamų studijų studentas, netekęs valstybės finansavimo Lietuvos Respublikos
        teisės aktų nustatyta tvarka, už studijas turi mokėti jo priėmimo metais Universiteto Tarybos nustatytą studijų kainą nurodytą sutarties specialiosios dalies 2
        punkte. Vientisųjų studijų penkto kurso kaina yra lygi priėmimo metų Universiteto Tarybos patvirtintai antrosios pakopos metinei studijų kainai.</td>
    </tr>
    <tr>
        <td class="num">13.</td><td>Studijų mokestį už semestrą studentas turi sumokėti Universiteto Mokesčių už studijas mokėjimo ir grąžinimo tvarkos apraše nurodytais terminais:</td>
    </tr>
    <tr>
        <td class="num">13.1.</td><td>50% studijų kainos už rudens semestrą privaloma sumokėti iki rugsėjo 10 d., likusius 50% - iki lapkričio 10 d.;</td>
    </tr>
    <tr>
        <td class="num">13.2.</td><td>50% studijų kainos sumos už pavasario semestrą privaloma sumokėti iki vasario 10 d., likusius 50% - iki balandžio 10 d.</td>
    </tr>
    <tr>
        <td class="num">14.</td><td>Ne Europos Sąjungos piliečiai studijų mokestį už pirmuosius studijų metus, turi sumokėti per 20 (dvidešimt) kalendorinių dienų po studijų sutarties
        pasirašymo datos. Už kitus studijų metus studijų mokestis privalo būti sumokėtas sumokėti pagal Universiteto Senato patvirtintą Mokesčių už studijas
        mokėjimo ir grąžinimo tvarkos aprašą į nurodytą sąskaitą banke nurodytais terminais:</td>
    </tr>
    <tr>
        <td class="num">14.1.</td><td>50% studijų kainos už rudens semestrą privaloma sumokėti iki rugsėjo 10 d., likusius 50% - iki lapkričio 10 d.;</td>
    </tr>
    <tr>
        <td class="num">14.2.</td><td>50% studijų kainos sumos už pavasario semestrą privaloma sumokėti iki vasario 10 d., likusius 50% - iki balandžio 10 d.</td>
    </tr>
    <tr>
        <td class="num">15.</td><td>Ištęstinės formos antrosios pakopos studentams studijų kainos mokėjimo tvarka gali būti nustatomi fakulteto dekano potvarkiu.</td>
    </tr>
    <tr>
        <td class="num">16.</td><td>Valstybės nefinansuojamų studijų studentas, atitinkantis Lietuvos Respublikos Mokslo ir studijų įstatyme nustatytas normas, atsiradus laisvai valstybės
    biudžeto finansuojamai studijų vietai toje pačioje studijų formoje, toje pačioje studijų programoje ir tame pačiame kurse turi teisę Universiteto nustatyta
    tvarka pretenduoti į šią valstybės biudžeto finansuojamą vietą.</td>
    </tr>
    <tr>
        <td class="num">17.</td><td>Šios sutarties 16 punktas netaikomas, jeigu egzistuoja bent viena iš šių sąlygų:</td>
    </tr>
    <tr>
        <td class="num">17.1.</td><td>Studentas pakartotinai studijuoja tos pačios pakopos studijų programoje, jeigu daugiau kaip pusę tos studijų programos kreditų įgijo valstybės biudžeto
                lėšomis;</td>
    </tr>
    <tr>
        <td class="num">17.2</td><td>Studentas vienu metu studijuoja dviejose ar daugiau tos pačios pakopos studijų programų, jeigu jo studijos bent vienoje iš jų finansuojamos valstybės
        biudžeto lėšomis;</td>
    </tr>
    <tr>
        <td class="num">17.3.</td><td>Studentas yra užsienietis, išskyrus Lietuvos Respublikos Mokslo ir studijų įstatymo 82 straipsnio 7 ir 8 dalyse nurodytus asmenis, jeigu Lietuvos
        Respublikos tarptautinės sutartys ar kiti teisės aktai nenustato kitaip.</td>
    </tr>
    <tr>
        <td class="num">18.</td><td>Studentas, pervestas į valstybės biudžeto finansuojamą vietą, gali netekti valstybės finansavimo studijoms Lietuvos Respublikos teisės aktų nustatyta tvarka.</td>
    </tr>
    <tr>
        <td class="num">19.</td><td>Atleisti Studentą nuo studijų kainos mokėjimo, sumažinti jos dydį, pakeisti mokėjimo terminus gali Universiteto rektorius ar jo įgaliotas asmuo.</td>
    </tr>
    <tr>
        <td class="num">20.</td><td>Nutraukęs studijas ar pašalintas iš Universiteto Studentas privalo sumokėti išnaudotą studijų kainą pagal Universiteto Senato patvirtintą Mokesčių už studijas
        mokėjimo ir grąžinimo tvarkos aprašą.</td>
    </tr>
    <tr>
        <td class="num">21.</td><td>Nutraukusiam studijas ar pašalintam iš Universiteto Studentui sumokėta ir neišnaudota studijų kainos dalis grąžinama pagal Universiteto Senato patvirtintą
        Mokesčių už studijas mokėjimo ir grąžinimo tvarkos aprašą.</td>
    </tr>
    <tr>
        <td class="num">22.</td><td>Ne Lietuvos Respublikos piliečiams studijų mokestis negrąžinamas, jei:</td>
    </tr>
    <tr>
        <td class="num">22.1.</td><td>pateikti išsilavinimo ir/ar asmens dokumentai yra neautentiški ar padirbti;</td>
    </tr>
    <tr>
        <td class="num">22.2.</td><td>Studentas atvyko į Universitetą, bet nestudijavo, nelaikė tarpinių ir galutinių atsiskaitymų.</td>
    </tr>
    <tr>
        <td class="num">23.</td><td>Sutartis yra mokėjimo už studijas pagrindas.</td>
    </tr>
    <tr>
        <td class="num">24.</td><td>Studentas Lietuvos Respublikos Vyriausybės nustatyta tvarka iš valstybės biudžeto lėšų gali gauti socialinę stipendiją.</td>
    </tr>
    <tr>
        <td class="num">25.</td><td>Atsižvelgus į studijų rezultatus ir kitus akademinius pasiekimus, Universiteto nustatyta tvarka nuolatinių studijų studentams iš Universiteto stipendijų fondų
        gali būti skiriama skatinamoji stipendija.</td>
    </tr>
</table>
    <p class="centerTextPart">V. BAIGIAMOSIOS NUOSTATOS</p>

<table class="listTable">
    <tr>
        <td class="num">26.</td><td>Studentas turi teisę bet kada pateikti raštišką prašymą ir nutraukti šią sutartį su Universitetu.</td>
        </td>
    </tr>
    <tr>
        <td class="num">27.</td><td>Universitetas turi teisę be išankstinio pranešimo nutraukti sutartį su Studentu, kuris:</td>
    </tr>
    <tr>
        <td class="num">27.1.</td><td>grubiai pažeidžia Universiteto statutą, Studijų reguliaminą ir (ar) vidaus tvarkos taisykles;</td>
    </tr>
    <tr>
        <td class="num">27.2.</td><td>nevykdo studijų programoje nustatytų reikalavimų;</td>
    </tr>
    <tr>
        <td class="num">27.3.</td><td>iki egzaminų sesijos pradžios nesumoka visų mokesčių už semestro studijas.</td>
    </tr>
    <tr>
        <td class="num">28.</td><td>Studentas pagal šios sutarties 16 punkte numatytas sąlygas pervestas į valstybės biudžeto finansuojamą vietą ir šios sutarties 26, 27.1 ir 27.2 punktuose
        nurodytais atvejais nutraukęs sutartį, Lietuvos Respublikos Vyriausybės nustatyta tvarka privalo į valstybės biudžetą grąžinti studijų kainai valstybės
        finansuojamose studijų vietose apmokėti skirtas lėšas.</td>
    </tr>
    <tr>
        <td class="num">29.</td><td>Studentui keičiant studijų programą, studijų formą arba kitais Universiteto numatytais atvejais, sutarties sąlygos gali būti pakeistos, įforminant atskirą
        dokumentą, kuris abiems šalims pasirašius tampa neatskiriama šios sutarties dalimi.</td>
    </tr>
    <tr>
        <td class="num">30.</td><td>Sutartis pasibaigia:</td>
    </tr>
    <tr>
        <td class="num">30.1.</td><td>išdavus Studentui aukštojo mokslo diplomą ir diplomo priedėlį, patvirtinančius baigtą studijų programą bei įgytą kvalifikacinį laipsnį ir (arba) profesinę
                kvalifikaciją;</td>
    </tr>
    <tr>
        <td class="num">30.2.</td><td>šios sutarties 27 ir 28 punktuose numatytais pagrindais ją nutraukus.</td>
    </tr>
    <tr>
        <td class="num">31.</td><td>Ginčai dėl Sutarties vykdymo sprendžiami šalių susitarimu. Šalims nesusitarus, ginčai sprendžiami Lietuvos Respublikos įstatymų nustatyta tvarka teisme,
        esančiame Kauno mieste.</td>
    </tr>
</table>
    <p class="centerTextPart">ŠALIŲ REKVIZITAI</p>
    <br />
    <table class="bottomTable">
        <tr>
            <td class="textTop">
                <b>Vytauto Didžiojo Universitetas</b><br />
                kodas 111950396<br />
                K. Donelaičio g. 58, Kaunas 44248<br />
                Tel. (8 37) 222 739<br />
                Atsiskaitomosios sąskaitos<br />
                Nr. LT04 7044 0600 0284 8625, AB SEB bankas;<br />
                Nr. LT89 4010 0425 0278 5505, Luminor bank Ab;<br />
                Nr. LT79 7300 0101 3113 5650, "Swedbank", Ab
            </td>
            <td class="textTop">
                <b>Studentas</b><br />
                Asmens tapatybės kortelės numeris, galiojimo data: {{$bpoPakviestiEsign->asmensdok}} {{$bpoPakviestiEsign->asmensdok_gal_iki}}<br />
                Telefonas: {{$bpoPakviestiEsign->pirmas_telef}}<br />
                Elektroninis paštas: {{$bpoPakviestiEsign->elpastas}}<br />
                Adresas: {{$bpoPakviestiEsign->gyvvieta}}<br />
            </td>
        </tr>
    </table>
    <br />
    @if ($agreement->agreement_date)
    <p class="centerTextPart">ŠALIŲ PARAŠAI</p>
    <br />
    <table class="bottomTable">
        <tr>
            <td class="textTop">
                <b>Universiteto atstovas</b><br /><br />
                <b>Rektorius Juozas Augutis</b><br />
                <img class="sign" src="https://resources.vdu.lt/images/rektoriaus_parasas.png">  </img>

            </td>
            <td class="textTop">
                <b>Studentas</b><br /><br />
                <b>Dokumentą elektroniniu būdu patvirtino</b><br />
                <b>{{$bpoPakviestiEsign->vardas}} {{$bpoPakviestiEsign->pavarde}}</b>
                <b>Data: {{$agreement->agreement_date}}</b>
            </td>
        </tr>
    </table>
    <p class="signature"></p>
    @endif
</body>