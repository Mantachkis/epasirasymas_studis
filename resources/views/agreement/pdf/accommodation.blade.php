<!doctype html>
<html>
@include ('agreement.pdf.head')
<body>


<img class="topImage" src="https://resources.vdu.lt/images/vdu_pdf_header.png" />

@if ($agreement->agreement_date) <p class="alignRight">{{$agreement->agreement_date}}</p> @endif

<div>
    PATVIRTINTA:<br />
    Vytauto Didžiojo Universiteto<br />
    Rektoriaus 2018 m rugpjūčio 8 d.<br />
    Įsakymu Nr. SRD 17/18-263
</div>

<h2 class="centerTextPart">APGYVENDINIMO SUTARTIS</h2>
@if ($bpoPakviestiEsign->stud_sut_nr)
    <p class="centerTextPart larger">Reg. Nr. {{$bpoPakviestiEsign->stud_sut_nr}}</p>
@endif
<br />

<table class="listTableLarge">
    <tr>
        <td>Vytauto Didžiojo universitetas (toliau – Universitetas), atstovaujamas Studentų reikalų departamento direktoriaus Manto Simanavičiaus, veikiančio pagal Universiteto rektoriaus 2016 m. rugsėjo 1 d. įsakymą Nr. 321, ir {{$bpoPakviestiEsign->vardas}} {{$bpoPakviestiEsign->pavarde}}, a.k. {{$bpoPakviestiEsign->asmens_kodas}} (toliau – Gyventojas), toliau kartu vadinami „Šalimis“ arba atskirai „Šalimi“, vadovaudamiesi Vytauto Didžiojo universiteto apgyvendinimo bendrabučiuose tvarkos aprašu (toliau – Aprašas), sudarė šią Apgyvendinimo sutartį (toliau – Sutartis): </td>
    </tr>
</table>

<p class="centerTextPart larger">I. SUTARTIES OBJEKTAS</p>

<table class="listTableLarge">
    <tr>
        <td class="numLarge">1.</td><td>Universitetas įsipareigoja už mokestį, nustatytą šios Sutarties II skyriuje, leisti Gyventojui Sutartyje nustatyta tvarka ir sąlygomis Sutarties 9 punkte nurodytą laikotarpį naudotis gyvenamąja vieta, esančia adresu Vytauto pr. 71, Kaune , kambaryje Nr. 816 (toliau – Gyvenamoji vieta), o Gyventojas įsipareigoja naudotis šia Gyvenamąja vieta pagal paskirtį ir laiku mokėti už ją Sutartyje nustatytą mokestį.</td>
    </tr>
</table>

<p class="centerTextPart larger">II. MOKĖJIMAI IR ATSISKAITYMAI</p>

<table class="listTableLarge">
    <tr>
        <td class="numLarge">2.</td><td>Mokestis už apgyvendinimą Gyvenamojoje vietoje yra 10 Eur (dešimt eurų 00 ct). Į šį mokestį įskaičiuoti mokesčiai už komunalines paslaugas ir eksploatacinės išlaidos, susijusios su naudojama Gyvenamąja vieta. </td>
    </tr>
    <tr>
        <td class="numLarge">3.</td><td>Jei Gyventojas gyvena:</td>
    </tr>
    <tr>
        <td class="numLarge">3.1.</td><td>ilgesnį kaip 2 (dviejų) mėnesių laikotarpį - jis mokestį už einamąjį mėnesį turi sumokėti iki einamojo mėnesio 15 (penkioliktos) kalendorinės dienos;</td>
    <tr>
        <td class="numLarge">3.2.</td><td>2 (dviejų) mėnesių ar trumpesnį laikotarpį - jis paskirtą mokestį už visą apgyvendinimo laikotarpį turi sumokėti per 1 (vieną) dieną nuo apsigyvenimo Gyvenamojoje vietoje dienos.</td>
    </tr>
    <tr>
        <td class="numLarge">4.</td><td>Mokestis už apgyvendinimą yra suformuojamas kiekvieno mėnesio pradžioje studentų portale adresu http://studentas.vdu.lt Gyventojui asmeniškai, kurį reikia apmokėti vadovaujantis prie mokesčio nurodytoje informacijoje. Mokestį sumokėjus kitaip negu nurodyta šiame punkte - įmoka nebus užskaityta. </td>
    </tr>
</table>

<p class="centerTextPart larger">III. ŠALIŲ TEISĖS IR PAREIGOS</p>

<table class="listTableLarge">
    <tr>
        <td class="numLarge">5.</td><td>Gyventojas turi teisę:</td>
    </tr>
    <tr>
        <td class="numLarge">5.1.</td><td>šioje Sutartyje nustatytomis sąlygomis ir terminu pagal paskirtį naudotis jam suteikta Gyvenamąja vieta ir bendrojo naudojimo patalpomis, įranga bei turtu; </td>
    </tr>
    <tr>
        <td class="numLarge">5.2.</td><td>naudotis Universiteto bendrabučių interneto tinklu, užsiregistravus elektroniniu adresu http://connect.vdu.lt ir nurodžius Gyventojui skirtą tinklo kodą MNK04SJ4 </td>
    <tr>
        <td class="numLarge">5.3.</td><td>kitas teises, nustatytas Universiteto bendrabučio vidaus tvarkos taisyklėse (toliau – Taisyklės), Vytauto Didžiojo universiteto apgyvendinimo bendrabučiuose tvarkos apraše (toliau – Aprašas) ir kituose Universiteto vidaus teisės aktuose. </td>
    </tr>
    <tr>
        <td class="numLarge">6.</td><td>Gyventojas įsipareigoja:</td>
    </tr>
    <tr>
        <td class="numLarge">6.1.</td><td>įsikeldamas į paskirtą Gyvenamąją vietą įsitikinti, kad ji yra švari, tvarkinga, apgyvendinimo laikotarpiui Gyventojui suteiktas Universiteto individualaus naudojimo turtas bei įranga neturi trūkumų, nėra sugedusi ar netinkama eksploatuoti. Pastebėjus neatitikimus, Gyventojas apie juos turi informuoti atsakingą Universiteto (bendrabučio) administracijos darbuotoją. Pretenzijos dėl Gyvenamosios vietos švaros, gedimų bei kitų trūkumų po apgyvendinimo procedūros praėjus 24 val. nepriimamos.</td>
    </tr>
    <tr>
        <td class="numLarge">6.2.</td><td>visą šios Sutarties galiojimo laikotarpį naudotis Gyvenamąja vieta tik pagal paskirtį, ją prižiūrėti, saugoti Gyvenamojoje vietoje bei bendro naudojimo patalpose esančią Universiteto įrangą ir turtą, griežtai laikytis priešgaisrinės saugos reikalavimų bei kitų teisės aktų ir taisyklių reikalavimų, susijusių tiek su Gyvenamosios vietos, tiek su viešo (bendro) naudojimo patalpų eksploatavimu tokiu būdu, kad tiek Gyvenamojoje vietoje, tiek bendro naudojimo patalpose esančių objektų būklė išsikėlimo iš bendrabučio metu kiek įmanoma atitiktų tą būklę, kokios ji buvo perduodant Gyventojui naudotis;</td>
    </tr>
    <tr>
        <td class="numLarge">6.3.</td><td>Sutartyje nustatytomis sąlygomis laiku mokėti mokestį už apgyvendinimą;</td>
    </tr>
    <tr>
        <td class="numLarge">6.4.</td><td>vykdyti atsakingų Universiteto (bendrabučio) administracijos darbuotojų teisėtus reikalavimus;</td>
    </tr>
    <tr>
        <td class="numLarge">6.5.</td><td>susipažinti su Taisyklėmis ir supažindinti su jomis savo svečius, o pažeidus Taisykles, atsakyti už savo ir savo svečių padarytus pažeidimus Gyvenamojoje vietoje ir bendro naudojimo patalpose;</td>
    </tr>
    <tr>
        <td class="numLarge">6.6.</td><td>pažeidus šia Sutartimi prisiimtus įsipareigojimus ar nevykdžius Taisyklėse numatytų pareigų, atsakomybių ir draudimų, atsakyti už tai, vadovaujantis Aprašo nuostatomis ir, Universitetui pareikalavus, sumokėti nustatyto dydžio netesybas, atitinkančias paskirtą drausminančią priemonę bei atlyginti žalą, kurią Universitetas patiria dėl šioje Sutartyje bei Taisyklėse numatytų Gyventojo ir (ar) jo svečių padarytų pažeidimų, įsipareigojimų nevykdymo ar netinkamo vykdymo. Gyventojas taip pat privalo atlyginti žalą tretiesiems asmenims, jei ji buvo padaryta dėl Gyventojo ir (ar) jo svečio kaltės ar aplaidumo;</td>
    </tr>
    <tr>
        <td class="numLarge">6.7.</td><td>savavališkai neapgyvendinti pašalinių asmenų Gyvenamojoje vietoje, perduoti jiems Universiteto turtą arba kaip kitaip leisti juo ar Gyvenamąja vieta naudotis tretiesiems asmenims.</td>
    </tr>
    <tr>
        <td class="numLarge">7.</td><td>Universitetas turi teisę:</td>
    </tr>
    <tr>
        <td class="numLarge">7.1,</td><td>gyventojui ar jo svečiui, už kurį Gyventojas atsako, pažeidus šios Sutarties ar Taisyklių nuostatas, vadovaujantis Aprašo nuostatomis, skirti drausminančias priemones ir reikalauti iš Gyventojo netesybų už įsipareigojimų nevykdymą ar netinkamą jų vykdymą bei padarytos žalos atlyginimo;</td>
    </tr>
    <tr>
        <td class="numLarge">7.2.</td><td>rekonstruojant, remontuojant ar pertvarkant bendrabutį, taip pat siekiant racionaliau panaudoti patalpas, taupyti energijos išteklius, gerinti komunalines paslaugas, Gyventojams konfliktuojant, siekiant užtikrinti higienos normų reikalavimų laikymosi, Gyventoją iš anksto įspėjus perkelti jį iš vieno kambario į kitą arba iš vieno bendrabučio į kitą;</td>
    </tr>
    <tr>
        <td class="numLarge">7.3.</td><td>Gyventoją iš anksto įspėjus vienašališkai keisti mokesčio už apgyvendinimą bendrabutyje dydį, taip pat kitus šioje Sutartyje ir Universiteto vidaus teisės aktuose numatytus mokesčius ar sąlygas susijusius su apgyvendinimu;</td>
    </tr>
    <tr>
        <td class="numLarge">7.4.</td><td>kitas teises, reglamentuotas Taisyklėse, Apraše ir kituose Universiteto vidaus teisės aktuose.</td>
    </tr>
    <tr>
        <td class="numLarge">8.</td><td>Universitetas įsipareigoja:</td>
    </tr>
    <tr>
        <td class="numLarge">8.1.</td><td>suteikti Gyventojui švarią ir tvarkingą Gyvenamąją vietą;</td>
    </tr>
    <tr>
        <td class="numLarge">8.2.</td><td>perduoti Gyventojui naudotis šioje Sutartyje nustatytomis sąlygomis ir terminui su apgyvendinimu susijusį turtą;</td>
    </tr>
    <tr>
        <td class="numLarge">8.3.</td><td>Gyventojui laiku nurodžius, pašalinti turto gedimus ir užtikrinti, kad nuolat veiktų inžinerinės sistemos bei kita įranga;</td>
    </tr>
    <tr>
        <td class="numLarge">8.4.</td><td>rūpintis, kad Gyventojui būtų sukurtos patogios gyvenimo, mokymosi ir poilsio sąlygos bei tam tinkama aplinka.</td>
    </tr>
</table>

<p class="centerTextPart larger">IV. SUTARTIES GALIOJIMAS, PAKEITIMAS IR NUTRAUKIMAS</p>

<table class="listTableLarge">
    <tr>
        <td class="numLarge">9.</td><td>Ši Sutartis įsigalioja nuo 2019-03-26 ir galioja iki 2019-03-28 arba Sutarties nutraukimo datos, kuomet atsakingas Universiteto (bendrabučio) administracijos darbuotojas fiksuoja išsikėlimą iš Gyvenamosios vietos. </td>
    </tr>
    <tr>
        <td class="numLarge">10.</td><td>Pasibaigus šiai Sutarčiai Gyventojas turi išsikelti su lyg paskutine Sutarties galiojimo data, nutraukus ją prieš terminą - Gyventojas turi išsikelti iš gyvenamosios vietos iki Universiteto administracijos nustatyto termino pabaigos, sumokėdamas visus jam priskirtus mokesčius, susijusius su apgyvendinimu ir atsiskaitydamas su atsakingu Universiteto (bendrabučio) administracijos darbuotoju už Gyventojui išduotą (patikėtą) turtą.</td>
    </tr>
    <tr>
        <td class="numLarge">11.</td><td>Sutartis gali būti nutraukta prieš terminą:</td>
    <tr>
        <td class="numLarge">11.1.</td><td>abipusiu Šalių susitarimu;</td>
    </tr>
    <tr>
        <td class="numLarge">11.2.</td><td>Gyventojui nesutikus su apgyvendinimo mokesčių ar sąlygų pakeitimu Apgyvendinimo sutartis nutrūksta įsigaliojus apgyvendinimo mokesčių arba sąlygų pasikeitimui;</td>
    </tr>
    <tr>
        <td class="numLarge">11.3.</td><td>vienašališkai vienos iš Šalių iniciatyva apie tai pranešus kitai Šaliai ne vėliau kaip prieš 5 (penkias) darbo dienas ir nurodžius Sutarties nutraukimo datą bei priežastį, dėl kurios yra nutraukiama Sutartis;</td>
    </tr>
    <tr>
        <td class="numLarge">11.4.</td><td>Sutartis be papildomo įspėjimo yra nutraukiama paaiškėjus aplinkybėms, dėl kurių Gyventojas neturi teisėto pagrindo būti Lietuvos Respublikos teritorijoje; </td>
    </tr>
    <tr>
        <td class="numLarge">11.5.</td><td>teismo sprendimu.</td>
    </tr>
    <tr>
        <td class="numLarge">12.</td><td>Pasibaigus šiai Sutarčiai arba nutraukus ją prieš terminą, jei Gyventojas neišsikelia iš bendrabučio per šioje Sutartyje nustatytą laikotarpį, jis už kiekvieną pradelstą parą moka 10 (dešimt) kartų didesnį mokestį negu iki tol buvęs jo apgyvendinimo sutartyje numatytas mokestis, kaip Sutarties netesybas. Jei per 14 kalendorinių dienų Gyventojas neišsikelia ir neatlaisvina bei neperduoda atsakingam Universiteto (bendrabučio) administracijos darbuotojui Gyvenamosios vietos, Universitetas turi teisę kreiptis į teisėsaugos instituciją dėl Gyventojo priverstinio iškeldinimo, o per 30 (trisdešimt) kalendorinių dienų – į teismą.</td>
    </tr>
    <tr>
        <td class="numLarge">13.</td><td>Visi šios Sutarties raštu sudaromi pakeitimai, papildymai bei priedai yra neatskiriamos Sutarties dalys ir įsigalioja nuo tos dienos, kada abi Šalys juos pasirašo.</td>
    </tr>
</table>

<br />

<div style="page-break-before: always;"></div>

<img class="topImage" src="https://resources.vdu.lt/images/vdu_pdf_header.png" />

<p class="centerTextPart larger" >V. BAIGIAMOSIOS NUOSTATOS</p>

<table class="listTableLarge">
    <tr>
        <td class="numLarge">14.</td><td>Ši Sutartis sudaryta ir turi būti aiškinama pagal Lietuvos Respublikos teisę.</td>
    </tr>
    <tr>
        <td class="numLarge">15.</td><td>Jei ši Sutartis ir viešai skelbiami Universiteto vidaus teisės aktai tuos pačius dalykus reglamentuoja skirtingai, aukštesnę galią turi viešai skelbiamų galiojančių Universiteto vidaus teisės aktų nuostatos.</td>
    </tr>
    <tr>
        <td class="numLarge">16.</td><td>Bet koks ginčas, kylantis iš šios Sutarties ar susijęs su ja, kuris per 14 (keturiolika) kalendorinių dienų nuo vienos Šalies pareikšto reikalavimo dėl šios Sutarties įsipareigojimų vykdymo neišsprendžiamas derybų būdu, sprendžiamas Universiteto buveinės vietos teisme, Lietuvos Respublikos teisės aktų nustatyta tvarka.</td>
    </tr>
    <tr>
        <td class="numLarge">17.</td><td>Gyventojas pasirašydamas šią Sutartį taip pat patvirtina, kad yra susipažinęs su Aprašu, Taisyklėmis ir įsipareigoja jų laikytis.</td>
    </tr>
    <tr>
        <td class="numLarge">18.</td><td>Pasirašydamas šią Sutartį Gyventojas išreiškia savo sutikimą, jog:</td>
    </tr>
    <tr>
        <td class="numLarge">18.1.</td><td>saugumo tikslais jis būtų stebimas vaizdo kameromis bendrabučio teritorijoje ir bendro naudojimo patalpose;</td>
    </tr>
    <tr>
        <td class="numLarge">18.2.</td><td>jo asmens duomenys būtų tvarkomi Vytauto Didžiojo universitete (kodas 111950396, buveinės adresas: K. Donelaičio g. 58, 44248, Kaunas), siekiant sudaryti palankias gyvenimo sąlygas universitete, gauti informaciją apie VDU teikiamas apgyvendinimo paslaugas ir kitais su apgyvendinimo reikalais susijusiais tikslais.</td>
    </tr>
    <tr>
        <td class="numLarge">19.</td><td>Ši Sutartis sudaryta dviem vienodą teisinę galią turinčiais egzemplioriais, po vieną kiekvienai Šaliai. Abi Šalys perskaitė šią Sutartį, suprato jos turinį bei pasekmes ir pasirašė ją kaip dokumentą, atitinkantį jų tikrąją valią, tikslus ir ketinimus. Šalių susitarimu Sutarties elektroninė forma prilyginama rašytinei formai. </td>
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
</body>

<div style="page-break-before: always;"></div>

<img class="topImage" src="https://resources.vdu.lt/images/vdu_pdf_header.png" />

<div>
    PATVIRTINTA:<br />
    Vytauto Didžiojo universiteto rektoriaus<br />
    2018 m. rugpjūčio 20 d.<br />
    įsakymu Nr. SRT - 266<br />
</div>


<p class="centerTextPart larger" >VYTAUTO DIDŽIOJO UNIVERSITETO BENDRABUČIŲ VIDAUS TVARKOS TAISYKLĖS</p>
<p class="centerTextPart larger" >I. BENDROSIOS NUOSTATOS</p>

<table class="listTableLarge">
    <tr>
        <td class="numLarge">1.</td><td>Vytauto Didžiojo universiteto bendrabučių vidaus tvarkos taisyklės (toliau - Taisyklės) reglamentuoja vidaus tvarką Vytauto Didžiojo universiteto (toliau - Universitetas) bendrabučiuose ir nustato asmenų, kurie sudaro su Universitetu Apgyvendinimo sutartis (toliau - Gyventojai) teises, pareigas ir atsakomybes. </td>
    </tr>
</table>

<p class="centerTextPart larger" >II. GYVENTOJO TEISĖS IR PAREIGOS</p>

<table class="listTableLarge">
    <tr>
        <td class="numLarge">2.</td><td>Gyventojas turi teisę:</td>
    </tr>
    <tr>
        <td class="numLarge">2.1.</td><td>teikti pasiūlymus Universiteto administracijai dėl gyvenimo, darbo ir poilsio sąlygų gerinimo, švaros priežiūros bei apgyvendinimo tvarkos ir jos procedūros vykdymo bei tobulinimo;</td>
    </tr>
    <tr>
        <td class="numLarge">2.2.</td><td>priimti svečius, pasitinkant juos bendrabučio pirmame aukšte bei užregistruojant, ir leisti jiems svečiuotis nuo 7 val. iki 24 val.;</td>
    </tr>
    <tr>
        <td class="numLarge">2.3.</td><td>Universiteto nustatyta tvarka, suteikti savo svečiams nakvynę;</td>
    </tr>
    <tr>
        <td class="numLarge">2.4.</td><td>laisvai įeiti ir išeiti iš bendrabučio teritorijos bet kuriuo paros metu;</td>
    </tr>
    <tr>
        <td class="numLarge">2.5.</td><td>reikalauti, kad esantys ar atsiradę eksploatacijos gedimai būtų laiku pašalinti;</td>
    </tr>
    <tr>
        <td class="numLarge">2.6</td><td>rinkti ir būti išrinktiems į bendrabučio savivaldos organus;</td>
    </tr>
    <tr>
        <td class="numLarge">2.7.</td><td>pastebėjus atvejus ar veiksmus kai nesilaikoma Universitetu Apgyvendinimo sutarties, Taisyklių, kitų su apgyvendinimu susijusių Universiteto vidaus bei Lietuvos Respublikos teisės aktuose nustatytų reikalavimų taip pat visuomenei priimtinų gyvenimo normų, apie tai pranešti atsakingiems Universiteto, taip pat bendrabučio, kuriame Gyventojas yra apgyvendintas,administracijos darbuotojams, bendrabučio savivaldai, Universiteto Studentų atstovybei. </td>
    </tr>
    <tr>
        <td class="numLarge">3.</td><td>Gyventojas privalo:</td>
    </tr>
    <tr>
        <td class="numLarge">3.1.</td><td>susipažinti su šiomis Taisyklėmis ir įsipareigoti laikytis jų, taip pat kitų su apgyvendinimu susijusių Universiteto vidaus bei Lietuvos Respublikos teisės aktuose nustatytų reikalavimų;</td>
    </tr>
    <tr>
        <td class="numLarge">3.2.</td><td>laiku mokėti mokesčius susijusius su apgyvendinimu;</td>
    </tr>
    <tr>
        <td class="numLarge">3.3.</td><td>įeinant arba išeinant iš bendrabučio naudoti įėjimo kortelę arba rodyti pažymėjimą leidžiantį patekti į bendrabučio patalpas atsakingiems Universiteto, kuriame Gyventojas apgyvendintas, administracijos darbuotojams ar specialių tarnybų pareigūnams; </td>
    </tr>
    <tr>
        <td class="numLarge">3.4.</td><td>sulaužius ar sugadinus įrangą, inventorių ar kitą turtą, taip pat atsiradus jų pažeidimams, laiku apie tai informuoti atsakingus Universiteto bendrabučio, kuriame Gyventojas gyvena, administracijos darbuotojus bei atlyginti Universiteto turtui padarytą žalą jei tokia nustatyta; </td>
    </tr>
    <tr>
        <td class="numLarge">3.5.</td><td>nekelti triukšmo, laikytis rimties ir ramybės nuo 22 val. iki 6 val.;</td>
    </tr>
    <tr>
        <td class="numLarge">3.6.</td><td>nepažeidinėti kitų Gyventojų teisių ir teisėtų interesų;</td>
    </tr>
    <tr>
        <td class="numLarge">3.7.</td><td>laikytis švaros ir sanitarinių higienos normų; </td>
    </tr>
    <tr>
        <td class="numLarge">3.8.</td><td>nedelsiant kreiptis į medicinos įstaigą, jei serga ar užsikrėtė liga, kuri kelia pavojų kitų Gyventojų gyvybei ir (ar) sveikatai;</td>
    </tr>
    <tr>
        <td class="numLarge">3.9</td><td>taupiai naudoti energijos išteklius;</td>
    </tr>
    <tr>
        <td class="numLarge">3.10.</td><td>laikytis gaisrinės saugos reikalavimų;</td>
    </tr>
    <tr>
        <td class="numLarge">3.11.</td><td>bet kuriuo paros metu įsileisti atsakingus Universiteto taip pat bendrabučio, kuriame Gyventojas yra apgyvendintas administracijos darbuotojus ar specialių tarnybų pareigūnus, esant pagrįstam jų reikalavimui;</td>
    </tr>
    <tr>
        <td class="numLarge">3.12.</td><td>saugoti ir prižiūrėti save bei Gyventojo kambaryje ar bendrabučio viešuose (bendro) naudojimo patalpose paliktus asmeninius daiktus;</td>
    </tr>
    <tr>
        <td class="numLarge">3.13.</td><td>atsakyti už savo svečių elgesį bendrabutyje ir jų paliktų daiktų saugumą;</td>
    </tr>
    <tr>
        <td class="numLarge">3.14.</td><td>prižiūrėti švarą ir tvarką, saugoti bei tausoti įrangą, inventorių ir kitą turtą, esančius tiek Gyventojo kambaryje, tiek ir viešose (bendro naudojimo) bendrabučio patalpose; </td>
    </tr>
    <tr>
        <td class="numLarge">3.15.</td><td>atlikti Universiteto nustatytas Gyventojui tenkančias prievoles susijusias su švaros ir tvarkos palaikymu viešose (bendro naudojimo) patalpose;</td>
    </tr>
    <tr>
        <td class="numLarge">3.16.</td><td>vykdyti kitus teisėtus su apgyvendinimu bendrabučiuose susijusius atsakingus Universiteto taip pat bendrabučio, kuriame Gyventojas gyvena, administracijos, bendrabučio savivaldos ir Universiteto Studentų reikalų departamento (toliau - SRD) reikalavimus;</td>
    </tr>
    <tr>
        <td class="numLarge">3.17.</td><td>laikytis kitų Lietuvos Respublikos teisės aktuose nustatytų ar visuomenėje priimtinų gyvenimo normų.</td>
    </tr>
    <tr>
        <td class="numLarge">4.</td><td>Gyventojui draudžiama:</td>
    </tr>
    <tr>
        <td class="numLarge">4.1.</td><td>savavališkai persikelti į kitą bendrabučio kambarį;</td>
    </tr>
    <tr>
        <td class="numLarge">4.2.</td><td>platinti ir (ar) piktnaudžiauti alkoholiniais gėrimais, vartoti juos taip pat rodytis neblaiviems viešose (bendro naudojimo) bendrabučio patalpose;</td>
    </tr>
    <tr>
        <td class="numLarge">4.3.</td><td>laikyti, platinti ir (ar) svaigintis taip pat rodytis apsvaigusiais narkotinėmis, psichotropinėmis ir kitomis psichiką veikiančiomis medžiagomis;</td>
    </tr>
    <tr>
        <td class="numLarge">4.4.</td><td>teršti, šiukšlinti viešose (bendro naudojimo) bendrabučio patalpose ir aplink bendrabučio teritoriją;</td>
    </tr>
    <tr>
        <td class="numLarge">4.5.</td><td>iš kambario išneštas buitines atliekas palikti bendrabučio bendro naudojimo patalpose;</td>
    </tr>
    <tr>
        <td class="numLarge">4.6.</td><td>rūkyti ne rūkymui skirtose vietose;</td>
    </tr>
    <tr>
        <td class="numLarge">4.7.</td><td>naudoti bendrabučio patalpas, Universiteto tiekiamo interneto paslaugas ūkinei ar komercinei veiklai;</td>
    </tr>
    <tr>
        <td class="numLarge">4.8.</td><td>nepagarbiai, šiurkščiai elgtis, grasinti ar įžeidinėti Universiteto ir bendrabučio, kuriame Gyventojas gyvena administracijos darbuotojus, kitus Gyventojus ir (ar) jų svečius;</td>
    </tr>
    <tr>
        <td class="numLarge">4.9.</td><td>įsinešti, laikyti ir (ar) naudoti ginklus, bet kokias sprogstamąsias ar padegamąsias gyvybei ir (ar) sveikatai pavojingas medžiagas;</td>
    </tr>
    <tr>
        <td class="numLarge">4.10.</td><td>niokoti bendrabučio turtą, gadinti jo teritorijoje esančią įrangą ir (ar) inventorių bei savavališkai jį perkelti iš vienos vietos į kitą;</td>
    </tr>
    <tr>
        <td class="numLarge">4.11.</td><td>apgyvendinti pašalinius asmenis;</td>
    </tr>
    <tr>
        <td class="numLarge">4.12.</td><td>laikyti bendrabučio patalpose gyvūnus;</td>
    </tr>
    <tr>
        <td class="numLarge">4.13.</td><td>be atsakingų bendrabučio, kuriame Gyventojas gyvena administracijos darbuotojų leidimo vykdyti remonto darbus gyvenamajame kambaryje; </td>
    </tr>
    <tr>
        <td class="numLarge">4.14.</td><td>naudoti elektrinius šildymo prietaisus ar kitus elektros prietaisus, kurių bendra galia viršija 2 kW tenkančiam vienam bendrabučio kambariui;</td>
    </tr>
    <tr>
        <td class="numLarge">4.15.</td><td>naudoti Universiteto interneto paslaugas nesąžiningam ir (ar) kitų asmenų teisėtus interesus pažeidžiančiam tikslui taip pat dalinantis interneto resursais su kitais asmenimis ir (ar) ekonominei naudai teikti ar gauti; </td>
    </tr>
    <tr>
        <td class="numLarge">4.16.</td><td>be atsakingų bendrabučio, kuriame Gyventojas yra apgyvendintas administracijos darbuotojų žinios, kabinti iškarpas, paveikslus, nuotraukas ar informacinio pobūdžio skelbimus (plakatus) tiek Gyventojo kambaryje, tiek viešose (bendro naudojimo) bendrabučio erdvėse; </td>
    </tr>
    <tr>
        <td class="numLarge">4.17.</td><td>užsiimti kita veikla, kuri yra susijusi su kenkimu bendrabučiui, jo administracijai ar Gyventojams bei pačiam Vytauto Didžiojo universiteto vardui ir prestižui. </td>
    </tr>
</table>

<p class="centerTextPart larger" >III. ATSAKOMYBĖ UŽ TAISYKLIŲ PAŽEIDIMUS</p>

<table class="listTableLarge">
    <tr>
        <td class="numLarge">5.</td><td>Už šių Taisyklių pažeidimus, įsipareigojimų nevykdymą ar netinkamą vykdymą, vadovaujantis Universiteto gyvenamųjų vietų administravimo tvarkos aprašu yra skiriamos drausminančios priemonės.</td>
    </tr>
    <tr>
        <td class="numLarge">6.</td><td>Gyventojas apie paskirtas drausminančias priemones informuojamas asmeniškai išsiunčiant pranešimą į Gyventojo Universiteto suteiktą, esant galimybei, ir kitą, SRD žinomą, elektroninę pašto dėžutę. Gyventojas su jam paskirtomis drausminančiomis priemonėmis ir (ar) mokėtinomis netesybomis gali susipažinti SRD.</td>
    </tr>
</table>

<p class="centerTextPart larger" >IV. BAIGIAMOSIOS NUOSTATOS</p>

<table class="listTableLarge">
    <tr>
        <td class="numLarge">7.</td><td>Šios Taisyklės tvirtinamos, keičiamos ir (ar) pildomos Universiteto rektoriaus įsakymu.</td>
    </tr>
    <tr>
        <td class="numLarge">8.</td><td>Taisyklės įsigalioja nuo jas patvirtinančiame Universiteto rektoriaus įsakyme nustatytos datos.</td>
    </tr>
</table>
