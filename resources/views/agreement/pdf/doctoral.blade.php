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
            <h6 class="centerTextUpper">VYTAUTO DIDŽIOJO UNIVERSITETO IR DOKTORANTO(-ĖS)
                STUDIJŲ SUTARTIS</h6>

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
        <td class="num">1.</td><td>Sutartis sudaroma tarp Vytauto Didžiojo universiteto (toliau – Universitetas), atstovaujamo mokslo prorektorės Julijos Kiršienės ir asmens (toliau – Doktorantas), kurio duomenys nurodyti sutarties specialiosios dalies 2 punkte (toliau kartu vadinamų Šalimis). </td>
    </tr>
    <tr>
        <td class="num">2.</td><td>Sutartis sudaroma vadovaujantis Lietuvos Respublikos Mokslo ir studijų įstatymu, Standartinės studijų sutarties sąlygomis, Universiteto Statutu, mokslo krypties doktorantūros reglamentu, Priėmimo į Vytauto Didžiojo universitetą taisyklėmis ir kitais Lietuvos Respublikos ir Universiteto vidaus teisės aktais.</td>
    </tr>
    <tr>
        <td class="num">3.</td><td>Sutartis nustato šalių teises ir įsipareigojimus, galiojimo, keitimo ir nutraukimo tvarką, studijų sąlygas, kainą, jos keitimo ir mokėjimo už studijas sąlygas.</td>
    </tr>
    <tr>
        <td class="num">4.</td><td>Sutartis sudaroma pasirašant elektronine forma, sutinkant (akceptuojant) su Universiteto informacinėje sistemoje pateiktomis sąlygomis Universiteto priėmimo taisyklėse nustatyta tvarka. Šalių susitarimu sutarties elektroninė forma prilyginama rašytinei formai.</td>
    </tr>
    <tr>
        <td class="num">5.</td><td>Sutartis įsigalioja nuo jos pasirašymo dienos. Doktoranto statusas įgyjamas nuo akademinių metų semestro pradžios.</td>
    </tr>
</table>

<p class="centerTextPart">II. UNIVERSITETO ĮSIPAREIGOJIMAI</p>

<table class="listTable">
    <tr>
        <td class="num">6.</td><td>Universitetas įsipareigoja:</td>
    </tr>
    <tr>
        <td class="num">6.1.</td><td>skirti doktorantui mokslinį vadovą ir, jei reikia - konsultantus;</td>
    </tr>
    <tr>
        <td class="num">6.2.</td><td>sudaryti doktorantui tinkamas sąlygas vykdyti doktoranto darbo planą bei parengti disertaciją; </td>
    <tr>
        <td class="num">6.3.</td><td>doktorantui sėkmingai parengusiam ir apgynusiam disertaciją, suteikti mokslo daktaro laipsnį ir išduoti tai patvirtinantį diplomą;</td>
    </tr>
    <tr>
        <td class="num">6.4.</td><td>vykdyti kitus įsipareigojimus, nustatytus Universiteto statute ir kituose Universiteto vidaus tvarką reglamentuojančiuose teisės aktuose;</td>
    </tr>
    <tr>
        <td class="num">6.5.</td><td>tvarkyti Doktoranto asmens duomenis vadovaujantis Asmens duomenų teisinės apsaugos įstatymu;</td>
    </tr>
    <tr>
        <td class="num">6.6.</td><td>suteikti Doktorantui prieigą prie visų studijų procesui reikalingų informacinių sistemų ir studijų išteklių;</td>
    </tr>
    <tr>
        <td class="num">6.7.</td><td>suteikti reikiamą informaciją ir teikti konsultacijas studijų klausimais;</td>
    </tr>
</table>

<p class="centerTextPart">III. DOKTORANTO ĮSIPAREIGOJIMAI</p>

<table class="listTable">
    <tr>
        <td class="num">7.</td><td>Doktorantas įsipareigoja:</td>
    </tr>
    <tr>
        <td class="num">7.1. </td><td>vykdyti patvirtintą doktoranto darbo planą ir dalyvauti Universiteto atliekamose studijų kokybės vertinimo ir karjeros stebėsenos apklausose;</td>
    </tr>
    <tr>
        <td class="num">7.2.</td><td>savarankiškai susipažinti su Universiteto tinklalapyje ir Intranete skelbiamais dokumentais, reglamentuojančiais studijas, ir nuolat juos sekti studijų metu; </td>
    </tr>
    <tr>
        <td class="num">7.3.</td><td>laikytis Universiteto akademinės etikos kodekso nuostatų, akademinės drausmės ir sąžiningumo principų, vidaus tvarkos taisyklių, bendrųjų reikalavimų
            doktorantams;</td>
    </tr>
    <tr>
        <td class="num">7.4.</td><td>pasikeitus gyvenamai vietai ar kitai kontaktinei informacijai nedelsiant informuoti Universitetą</td>
    </tr>
    <tr>
        <td class="num">7.5.</td><td>vykdyti kitus įsipareigojimus, nustatytus Universiteto statute ir kituose Universiteto vidaus tvarką reglamentuojančiuose dokumentuose.</td>
    </tr>
    <tr>
        <td class="num">8.</td><td>Pasirašydamas Sutartį, doktorantas sutinka su Universiteto doktoranto sąžiningumo deklaracijoje numatytais principais ir įsipareigoja:</td>
    </tr>
    <tr>
        <td class="num">8.1.</td><td>visą studijų laikotarpį laikytis Universiteto akademinės etikos kodekso, mokslo krypties doktorantūros reglamento, Studijų reguliamino ir kitų teisės aktų nuostatų bei etikos normų;</td>
    </tr>
    <tr>
        <td class="num">8.2.</td><td>atsakingai žvelgti į savo kaip doktoranto pareigas ir sąžiningai jas vykdyti;</td>
    </tr>
    <tr>
        <td class="num">8.3.</td><td>būdamas doktorantu rodyti pavyzdį kitiems akademinės bendruomenės nariams, netoleruoti akademinio nesąžiningumo atvejų ir vykdyti savo pareigą apie tokius atvejus pranešti, atskleisti;</td>
    </tr>
    <tr>
        <td class="num">8.4.</td><td>aktyviais veiksmais prisidėti prie sąžiningos akademinės aplinkos kūrimo ir puoselėjimo Universitete.</td>
    </tr>
    <tr>
        <td class="num">9.</td><td>Pasirašydamas Sutartį, doktorantas sutinka, kad už akademinės etikos pažeidimus laikant egzaminus ar rengiant daktaro disertaciją, atliekant mokslinius tyrimus, skelbiant mokslinių tyrimų rezultatus jam turi būti skiriamos Universiteto akademinės etikos kodekse, mokslo krypties doktorantūros reglamente, Studijų reguliamine ir kituose teisės aktuose numatytos sankcijos.</td>
    </tr>
</table>

<br />
<p class="centerTextPart" style="page-break-before: always;">IV. STUDIJŲ FINANSINĖS SĄLYGOS</p>
<table class="listTable">
    <tr>
        <td class="num">10.</td><td>Doktoranto, kurio studijas finansuojama valstybė, studijų kaina apmokama valstybės biudžeto lėšomis Lietuvos Respublikos teisės aktų nustatyta tvarka.</td>
    </tr>
    <tr>
        <td class="num">11.</td><td>Doktorantas, priimtas į valstybės nefinansuojamas studijas, už studijas turi mokėti jo priėmimo metais Universiteto Senato nustatytą studijų kainą nurodytą sutarties specialiosios dalies 2 punkte. </td>
    </tr>
    <tr>
        <td class="num">12.</td><td>Studijų mokestį už semestrą doktorantas turi sumokėti Universiteto Mokesčių už studijas mokėjimo ir grąžinimo tvarkos apraše nurodytais terminais:</td>
    </tr>
    <tr>
        <td class="num">12.1.</td><td>Mokestis už pirmąjį semestrą turi būti sumokėtas per 15 kalendorinių dienų nuo šios Sutarties pasirašymo dienos.; </td>
    </tr>
    <tr>
        <td class="num">12.2.</td><td>Studijų mokesčiai už kitus semestrus turi būti sumokami pagal Universiteto Senato patvirtintą Mokesčių už studijas mokėjimo ir grąžinimo tvarkos aprašą į nurodytą sąskaitą banke nurodytais terminais.</td>
    </tr>
    <tr>
        <td class="num">13.</td><td>Valstybės nefinansuojamų studijų doktorantas, atitinkantis Lietuvos Respublikos Mokslo ir studijų įstatyme nustatytas normas, atsiradus laisvai valstybės biudžeto finansuojamai studijų vietai toje pačioje mokslo kryptyje ir tame pačiame kurse, turi teisę Universiteto nustatyta tvarka pretenduoti į šią valstybės biudžeto finansuojamą vietą. </td>
    </tr>
    <tr>
        <td class="num">14.</td><td>Atleisti Doktorantą nuo studijų kainos mokėjimo, sumažinti jos dydį, pakeisti mokėjimo terminus gali Universiteto rektorius ar jo įgaliotas asmuo.</td>
    </tr>
    <tr>
        <td class="num">15.</td><td>Nutraukęs studijas ar pašalintas iš Universiteto doktorantas privalo sumokėti išnaudotą studijų kainą pagal Universiteto Senato patvirtintą Mokesčių už studijas mokėjimo ir grąžinimo tvarkos aprašą.</td>
    </tr>
    <tr>
        <td class="num">16.</td><td>Nutraukusiam studijas ar pašalintam iš Universiteto Doktorantui sumokėta ir neišnaudota studijų kainos dalis grąžinama pagal Universiteto Senato patvirtintą Mokesčių už studijas mokėjimo ir grąžinimo tvarkos aprašą. </td>
    </tr>
    <tr>
        <td class="num">17.</td><td>Ne Lietuvos Respublikos piliečiams studijų mokestis negrąžinamas, jei:</td>
    </tr>
    <tr>
        <td class="num">17.1.</td><td>pateikti išsilavinimo ir/ar asmens dokumentai yra neautentiški ar padirbti;</td>
    </tr>
    <tr>
        <td class="num">17.2</td><td>Doktorantas atvyko į Universitetą, bet nestudijavo.</td>
    </tr>
    <tr>
        <td class="num">18.</td><td>Sutartis yra mokėjimo už studijas pagrindas.</td>
    </tr>
</table>
<p class="centerTextPart">V. BAIGIAMOSIOS NUOSTATOS</p>

<table class="listTable">
    <tr>
        <td class="num">19.</td><td>Doktorantas turi teisę bet kada pateikti raštišką prašymą ir nutraukti šią sutartį su Universitetu.</td>
        </td>
    </tr>
    <tr>
        <td class="num">20.</td><td>Universitetas turi teisę be išankstinio pranešimo nutraukti sutartį su Doktorantu, kuris:</td>
    </tr>
    <tr>
        <td class="num">20.1.</td><td>grubiai pažeidžia Universiteto statutą, Mokslo krypties doktorantūros reglamentą, ir (ar) vidaus tvarkos taisykles, reglamentuotas dokumentais;</td>
    </tr>
    <tr>
        <td class="num">20.2.</td><td>doktorantūros krypties komiteto sprendimu neatestuojamas dėl nevykdomo doktoranto darbo plano;</td>
    </tr>
    <tr>
        <td class="num">20.3.</td><td>iki doktorantūros laikotarpio pabaigos nepateikia parengtos disertacijos;</td>
    </tr>
    <tr>
        <td class="num">20.4.</td><td>iki nustatytų terminų nesumoka visų mokesčių už semestro studijas.</td>
    </tr>
    <tr>
        <td class="num">21.</td><td>Lietuvos Respublikos Vyriausybės nustatytais atvejais ir tvarka, valstybės biudžeto lėšomis finansuojamas doktorantas, šios sutarties 19 ir 20 punktuose nurodytais atvejais nutraukęs Sutartį, privalo į valstybės biudžetą grąžinti studijų kainai valstybės finansuojamoje studijų vietoje apmokėti skirtas lėšas ar jų dalį.</td>
    </tr>
    <tr>
        <td class="num">22.</td><td>Doktorantui keičiant studijų formą arba kitais Universiteto numatytais atvejais, sutarties sąlygos gali būti pakeistos, įforminant atskirą dokumentą, kuris abiems šalims pasirašius tampa neatskiriama šios sutarties dalimi.</td>
    </tr>
    <tr>
        <td class="num">23.</td><td>Sutartis pasibaigia:</td>
    </tr>
    <tr>
        <td class="num">23.1.</td><td>išdavus doktorantui daktaro diplomą;</td>
    </tr>
    <tr>
        <td class="num">23.2.</td><td>šios sutarties 19 ir 20 punktuose numatytais pagrindais ją nutraukus.</td>
    </tr>
    <tr>
        <td class="num">24.</td><td>Ginčai dėl Sutarties vykdymo sprendžiami šalių susitarimu. Šalims nesusitarus, ginčai sprendžiami Lietuvos Respublikos įstatymų nustatyta tvarka teisme, esančiame Kauno mieste.</td>
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
            <b>Doktorantas</b><br />
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
                <b>Mokslo prorektorė Julija Kiršienė</b><br />
                <img class="sign" src="https://resources.vdu.lt/images/julija_krisiene_anstspaudas.png">  </img>
            </td>
            <td class="textTop">
                <b>Doktorantas</b><br /><br />
                <b>Dokumentą elektroniniu būdu patvirtino</b><br />
                <b>{{$bpoPakviestiEsign->vardas}} {{$bpoPakviestiEsign->pavarde}}</b>
                <b>Data: {{$agreement->agreement_date}}</b>
            </td>
        </tr>
    </table>
    <p class="signature"></p>
@endif
</body>