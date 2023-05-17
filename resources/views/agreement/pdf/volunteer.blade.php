<!doctype html>
<html>
@include ('agreement.pdf.head')
<body>


<img class="topImage" src="https://resources.vdu.lt/images/vdu_pdf_header.png" />

<h2 class="centerTextPart">SAVANORIŠKOS VEIKLOS SUTARTIS</h2>
@if ($bpoPakviestiEsign->stud_sut_nr)
    <p class="centerTextPart larger">{{$agreement->agreement_date}} Nr. {{$bpoPakviestiEsign->stud_sut_nr}}</p>
    <p class="centerTextPart larger">Kaunas</p>
@endif
<br />

<table class="listTableLarge">
    <tr>
        <td>Savanoriškos veiklos organizatorius, Vytauto Didžiojo universitetas, kodas 111950396, buveinės adresas K. Donelaičio g. 58, Kaunas (toliau – Universitetas), atstovaujamas Studentų reikalų departamento direktoriaus Manto Simanavičiaus, veikiančio pagal 2016-09-01 rektoriaus įsakymą Nr. 321 ir savanorišką veiklą atliekantis asmuo {{$bpoPakviestiEsign->vardas}} {{$bpoPakviestiEsign->pavarde}} {{$bpoPakviestiEsign->gimimo_data}} (toliau – savanoris), toliau kiekvienas atskirai vadinama šalimi, o kartu – šalimis, sudarė šią Savanoriškos veiklos sutartį.</td>
    </tr>
</table>

<p class="centerTextPart larger">1. Sutarties objektas:</p>

<table class="listTableLarge">
    <tr>
        <td class="numLarge">1.1.</td><td>Šia sutartimi yra apibrėžiamas savanorio ir Universiteto bendradarbiavimas, susijęs su savanorio savanoriška veikla Universitete, numatant konkrečius šalių įsipareigojimus.</td>
    </tr>
</table>

<p class="centerTextPart larger">2. Universitetas įsipareigoja:</p>

<table class="listTableLarge">
    <tr>
        <td class="numLarge">2.1.</td><td>Aptarti su savanoriu atliekamos savanoriškos veiklos pobūdį, laiką, saugą ją atliekant.</td>
    </tr>
    <tr>
        <td class="numLarge">2.2.</td><td>Universitetas gali kompensuoti savanoriui su savanoriška veikla susijusias išlaidas, dėl kurių iš anksto susitarė savanoris ir savanoriškos veiklos organizatorius. Išlaidos kompensuojamos Lietuvos Respublikos socialinės apsaugos ir darbo ministro 2011 m. liepos 14 d. įsakymu Nr. A1-330 patvirtinto „Savanoriškos veiklos išlaidų kompensavimo sąlygų ir tvarkos aprašo“ nustatyta tvarka.</td>
    </tr>
    <tr>
        <td class="numLarge">2.3.</td><td>Sudaryti sąlygas dalyvauti Universiteto organizuojamuose seminaruose, susitikimuose, konferencijose, susirinkimuose ir pan.</td>
    </tr>
    <tr>
        <td class="numLarge">2.4.</td><td>Esant poreikiui ir (ar) galimybei, deleguoti savanorį kelti savo kvalifikaciją, įgyti žinių ar tobulinti turimas kompetencijas, atstovaujant Universitetui santykiuose su kitais juridiniais ir fiziniais asmenimis Lietuvoje ir užsienyje.</td>
    </tr>
    <tr>
        <td class="numLarge">2.5.</td><td>Paskirti Universiteto padalinio atstovą, atsakingą už savanorių koordinavimą, kuris galėtų apmokyti ir konsultuoti savanorį įgyvendinant jo savanorišką veiklą, taip pat dėl šios veiklos atlikimo specifikos ir kitų atvejų.</td>
    </tr>
    <tr>
        <td class="numLarge">2.6.</td><td>Pagal galimybes įtraukti savanorį į Universiteto veiklas, jų planavimą, organizavimą ir įgyvendinimą.</td>
    </tr>
    <tr>
        <td class="numLarge">2.7.</td><td>Atsižvelgiant į savanoriškos veiklos rezultatus, jų kokybę ir skyrus ne mažiau kaip 40 valandų savanorystės veikloms, skatinti savanorį Universiteto nustatyta tvarka.</td>
    </tr>
</table>

<p class="centerTextPart larger">3. Savanoris įsipareigoja:</p>

<table class="listTableLarge">
    <tr>
        <td class="numLarge">3.1.</td><td>Atlikti savanorišką veiklą, kurią aptarė ir suderino su Universiteto padalinio atstovu, atsakingu už savanorių koordinavimą.</td>
    </tr>
    <tr>
        <td class="numLarge">3.2.</td><td>Savo veikloje vadovautis konfidencialumo principu ir laikyti paslaptyje bet kokią su asmens duomenimis susijusią informaciją, su kuria jie susipažino vykdydami savo pareigas ir laikytis šio principo netgi pasibaigus savanoriškai veiklai.</td>
    </tr>
    <tr>
        <td class="numLarge">3.3.</td><td>Laikytis saugos ir sveikatos reikalavimų, kurie yra numatyti Universitete.</td>
    </tr>
    <tr>
        <td class="numLarge">3.4.</td><td>Tausoti, prižiūrėti ir efektyviai naudoti Universiteto turtą.</td>
    </tr>
    <tr>
        <td class="numLarge">3.5.</td><td>Savo veikloje vadovautis Universiteto statutu, kitais vidaus teisės aktais.</td>
    </tr>
    <tr>
        <td class="numLarge">3.6.</td><td>Vykdyti teisėtus Universiteto darbuotojų prašymus, pavedimus, nurodymus.</td>
    </tr>
    <tr>
        <td class="numLarge">3.7.</td><td>Laikytis Universiteto vidaus teisės aktuose nurodytų savanoriškos veiklos reikalavimų.</td>
    </tr>
</table>

<p class="centerTextPart larger">4. Baigiamosios nuostatos:</p>

<table class="listTableLarge">
    <tr>
        <td class="numLarge">4.1.</td><td>Ši sutartis įsigalioja nuo jos pasirašymo momento.</td>
    </tr>
    <tr>
        <td class="numLarge">4.2.</td><td>Universitetas organizuoja savanorišką veiklą, o savanoris ją atlieka vadovaudamasis Lietuvos Respublikos Savanoriškos veiklos įstatymu ir kitais tokio pobūdžio veiklą reglamentuojančiais teisės aktais.</td>
    </tr>
    <tr>
        <td class="numLarge">4.3.</td><td>Ši sutartis gali būti nutraukta abiejų šalių susitarimu arba vienai iš šalių nevykdant sutartinių įsipareigojimų. Apie sutarties nutraukimą viena šalis informuoja kitą rekvizituose nurodytais kontaktais ne vėliau kaip prieš 7 kalendorines dienas iki sutarties nutraukimo.</td>
    </tr>
    <tr>
        <td class="numLarge">4.4.</td><td>Savanoriškos veiklos atlikimo metu Universitetui ar savanoriui padaryta žala atlyginama Lietuvos Respublikos įstatymų nustatyta tvarka.</td>
    </tr>
    <tr>
        <td class="numLarge">4.5.</td><td>Ši sutartis gali būti keičiama arba papildoma rašytiniu susitarimu. Visi rašytiniai susitarimai yra neatskiriami šios sutarties priedai.</td>
    </tr>
    <tr>
        <td class="numLarge">4.6.</td><td>Visus iškilusius tarpusavio ginčus ir nesutarimus šalys sprendžia tarpusavyje derybų keliu, nepavykus susitarti – teisminiu būdu, vadovaudamiesi Lietuvos Respublikoje galiojančiais teisės aktais.</td>
    </tr>
    <tr>
        <td class="numLarge">4.7.</td><td>Ši sutartis sudaryta dviem egzemplioriais, turinčiais tokią pat juridinę galią, po vieną kiekvienai šaliai.</td>
    </tr>
    <tr>
        <td class="numLarge">4.7.</td><td>Sutarties šalys:</td>
    </tr>
</table>

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

@if ($agreement->agreement_date)
    <p class="centerTextPart larger">ŠALIŲ PARAŠAI</p>
    <br />
    <table class="bottomTable">
        <tr>
            <td class="textTop">
                <b>Studentų reikalų departamento direktorius</b><br /><br />
                <b>MANTAS SIMANAVIČIUS</b><br />
                <img class="sign" src="https://resources.vdu.lt/pictures/simanavicius_parasas.png">  </img>

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