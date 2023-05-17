<!doctype html>
<html>
@include ('agreement.pdf.head')
<body>


<img class="topImage" src="https://resources.vdu.lt/images/vdu_pdf_header.png" />

@if ($agreement->agreement_date) <p class="alignRight">{{$agreement->agreement_date}}</p> @endif

<h2 class="centerTextPart">KLAUSYTOJO SUTARTIS</h2>
@if ($bpoPakviestiEsign->stud_sut_nr)
    <p class="centerTextPart larger">Reg. Nr {{$bpoPakviestiEsign->stud_sut_nr}}</p>
@endif
<br />

<table class="listTableLarge">
    <tr>
        <td>Vytauto Didžiojo universitetas (toliau – Universitetas), atstovaujamas rektoriaus Juozo Augučio, ir {{$bpoPakviestiEsign->vardas}} {{$bpoPakviestiEsign->pavarde}}, a.k. {{$bpoPakviestiEsign->asmens_kodas}} (toliau – Klausytojas), vadovaudamiesi Lietuvos Respublikos Mokslo ir studijų įstatymu, ŠMM Standartinės sutarties sąlygomis, Lietuvos Respublikos teisės aktais, sudarome šią sutartį priėmimo dokumente nurodytam terminui: </td>
    </tr>
</table>

<p class="centerTextPart larger">I. BENDROSIOS NUOSTATOS</p>

<table class="listTableLarge">
    <tr>
        <td class="numLarge">1.</td><td>Ši sutartis nustato Universiteto ir Klausytojo studijų sutarties galiojimo, keitimo ir nutraukimo, studijų sąlygas ir tvarką, šalių teises ir pareigas, studijų kainą, jos keitimo ir mokėjimo už studijas sąlygas.</td>
    </tr>
    <tr>
        <td class="numLarge">2.</td><td>Klausytojas moka už dalykų studijas pagal dalyko apimtį ir kredito kainą, kuri nustatoma pagal tai, kuriai studijų krypčiai ar studijų programai studijuojamas dalykas priklauso, jeigu Universiteto teisės aktai nenumato kitaip. </td>
    </tr>
    <tr>
        <td class="numLarge">3.</td><td>Sutartis yra mokėjimo už studijas pagrindas. </td>
    </tr>
</table>

<p class="centerTextPart larger">II. UNIVERSITETO ĮSIPAREIGOJIMAI</p>

<table class="listTableLarge">
    <tr>
        <td class="numLarge">4.</td><td>Universitetas įsipareigoja:</td>
    </tr>
    <tr>
        <td class="numLarge">4.1.</td><td>Sudaryti Klausytojui tokias pat sąlygas dalykų studijoms, kaip ir studentams.</td>
    </tr>
    <tr>
        <td class="numLarge">4.2.</td><td>Užtikrinti pasirinktų dalykų studijų kokybę.</td>
    <tr>
        <td class="numLarge">4.3.</td><td>Išduoti Klausytojui nustatytos formos akademinę pažymą apie studijuotus ir įvertintus dalykus. Jei klausytojas studijavo pagal papildomųjų studijų planą, išduoti papildomųjų studijų pažymėjimą.</td>
    </tr>
    <tr>
        <td class="numLarge">4.4.</td><td>Tvarkyti Klausytojo asmens duomenis vadovaujantis Asmens duomenų teisinės apsaugos įstatymu.</td>
    </tr>
</table>

<p class="centerTextPart larger">III. KLAUSYTOJO ĮSIPAREIGOJIMAI</p>

<table class="listTableLarge">
    <tr>
        <td class="numLarge">5.</td><td>Klausytojas įsipareigoja: </td>
    </tr>
    <tr>
        <td class="numLarge">5.1.</td><td>mokėti universiteto nustatytą mokestį už dalykų studijas pagal Sutarties IV dalyje numatytas sąlygas; </td>
    </tr>
    <tr>
        <td class="numLarge">5.2.</td><td>savarankiškai susipažinti su Universiteto tinklalapyje, Studentų savitarnos portale skelbiama informacija ir dokumentais, reglamentuojančiais studijas, ir nuolat juos sekti studijų metu; </td>
    <tr>
        <td class="numLarge">5.3.</td><td>laikytis Etikos kodekso nuostatų, akademinės drausmės ir sąžiningumo principų, Universiteto vidaus tvarkos taisyklių;</td>
    </tr>
    <tr>
        <td class="numLarge">5.4.</td><td>vykdyti Universiteto statute ir Studijų reguliamine bei vidaus tvarką reglamentuojančiuose dokumentuose nustatytus įsipareigojimus. </td>
    </tr>
</table>

<p class="centerTextPart larger">IV. MOKĖJIMAS UŽ DALYKŲ STUDIJAVIMĄ</p>

<table class="listTableLarge">
    <tr>
        <td class="numLarge">6.</td><td>Klausytojas, kuris priimamas į valstybės nefinansuojamas studijas, mokant už pasirinktus studijų dalykų kreditus, turi mokėti visą sumą iš karto per dvidešimt darbo dienų nuo Klausytojo sutarties pasirašymo datos. </td>
    </tr>
    <tr>
        <td class="numLarge">7.</td><td>Klausytojas, nesumokėjęs mokesčio iki paskutinės semestro paskaitų dienos, braukiamas kaip nesumokėjęs už dalykų studijavimą, skaičiuojant išnaudotą mokestį už 15 savaičių. </td>
    </tr>
    <tr>
        <td class="numLarge">8.</td><td>Klausytojui, nutraukusiam sutartį savo noru arba išbrauktam dėl Studijų reguliamino nuostatų pažeidimo, skaičiuojamas išnaudotas mokestis už praėjusias studijų savaites nuo semestro pradžios iki Rektoriaus įsakymo dėl išbraukimo datos (semestro trukmė 20 savaičių). </td>
    <tr>
        <td class="numLarge">9.</td><td>Neišnaudotas klausytojo mokestis grąžinamas vadovaujantis „Mokesčių už studijas mokėjimo ir grąžinimo tvarkos aprašu“. </td>
    </tr>
</table>

<br />

<div style="page-break-before: always;"></div>

<img class="topImage" src="https://resources.vdu.lt/images/vdu_pdf_header.png" />

<p class="centerTextPart larger" >V. BAIGIAMOSIOS NUOSTATOS</p>

<table class="listTableLarge">
    <tr>
        <td class="numLarge">10.</td><td>Klausytojas turi teisę bet kada nutraukti šią sutartį pateikdamas prašymą. </td>
    </tr>
    <tr>
        <td class="numLarge">11.</td><td>Universitetas turi teisę nutraukti sutartį, jei Klausytojas: </td>
    </tr>
    <tr>
        <td class="numLarge">11.1</td><td>grubiai pažeidžia Universiteto statutą, Studijų reguliaminą bei vidaus tvarkos taisykles, reglamentuotas universiteto dokumentuose; </td>
    </tr>
    <tr>
        <td class="numLarge">11.2.</td><td>nevykdo dalykų studijų programos reikalavimų. </td>
    </tr>
    <tr>
        <td class="numLarge">12.</td><td>Sutartis sudaroma dviem vienodą teisinę galią turinčiais egzemplioriais, po vieną kiekvienai šaliai. Sutartis sudaroma pasirašant rašytine arba elektronine forma, sutinkant (akceptuojant) su Universiteto informacinėje sistemoje pateiktomis sąlygomis. Šalių susitarimu sutarties elektroninė forma prilyginama rašytinei formai. </td>
    </tr>
    <tr>
        <td class="numLarge">13.</td><td>Sutartis įsigalioja kai rektorius pasirašo įsakymą dėl Klausytojo priėmimo. </td>
    </tr>
    <tr>
        <td class="numLarge">14.</td><td>Sutarties galiojimas baigiasi 10 ir 11 punktuose numatytais pagrindais ją nutraukus. </td>
    </tr>
    <tr>
        <td class="numLarge">15.</td><td>Tarp šalių kilę ginčai sprendžiami Lietuvos Respublikos įstatymų nustatyta tvarka. </td>
    </tr>
</table>

<p class="centerTextPart larger">ŠALIŲ REKVIZITAI</p>
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