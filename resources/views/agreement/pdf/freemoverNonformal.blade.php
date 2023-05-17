<!doctype html>
<html>
@include ('agreement.pdf.head')
<body>


<img class="topImage" src="https://resources.vdu.lt/images/vdu_pdf_header.png" />


@if ($agreement->agreement_date) <p class="alignRight">{{$agreement->agreement_date}}</p> @endif
<table class="nonformal">
    <tr>
        <td class="colFullNonformal">
            <h2 class="centerTextPart">NEFORMALIOJO MOKYMOSI SUTARTIS</h2>
        </td>
        <td class="colFullNonformal">
            <h2 class="centerTextPart">AGREEMENT FOR NON-FORMAL EDUCATION PROGRAMME COURSES</h2>
        </td>
    </tr>
   @if($bpoPakviestiEsign->stud_sut_nr)
    <tr>
        <td class="colFullNonformal">
            <p class="centerTextPart larger">Reg. Nr {{$bpoPakviestiEsign->stud_sut_nr}}</p><br />
        </td>
        <td class="colFullNonformal">
            <p class="centerTextPart larger">Reg. Nr {{$bpoPakviestiEsign->stud_sut_nr}}</p><br />
        </td>
    </tr>
    @endif
    <tr>
        <td class="colFullNonformal">
            <table class="innerNonformal">
                <tr>
                    <td>
                        Vytauto Didžiojo universitetas (toliau – Universitetas), atstovaujamas rektoriaus Juozo Augučio, ir {{$bpoPakviestiEsign->vardas}} {{$bpoPakviestiEsign->pavarde}}, a.k. {{$bpoPakviestiEsign->asmens_kodas}} (toliau – Klausytojas), vadovaudamiesi Lietuvos Respublikos Mokslo ir studijų įstatymu, Neformalaus suaugusiųjų švietimo įstatymu ir kitais teisės aktais, sudarome šią sutartį.
                    </td>
                </tr>
            </table>
        </td>
        <td class="colFullNonformal">
            <table class="innerNonformal">
                <tr>
                    <td>
                        Vytautas Magnus University (hereinafter – the University) represented by the Rector Juozas Augutis and {{$bpoPakviestiEsign->vardas}} {{$bpoPakviestiEsign->pavarde}}, personal No {{$bpoPakviestiEsign->asmens_kodas}} (hereinafter – the Unclassified Student), enter into this agreement drawn up in accordance with the law of Higher Education and Research of the Republic of Lithuania, Law on Non-Formal Adult Education and other legal acts of the Republic of Lithuania.
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td class="colFullNonformal">
            <p class="centerTextPart larger">I. BENDROSIOS NUOSTATOS</p>
        </td>
        <td class="colFullNonformal">
            <p class="centerTextPart larger">I. GENERAL PROVISIONS</p>
        </td>
    </tr>
    <tr>
        <td class="colFullNonformal">
            <table class="innerNonformal">
                <tr>
                    <td class="numNonformal">1.</td><td class="colNonformal">Ši sutartis nustato Universiteto ir Klausytojo studijų sutarties galiojimo, keitimo ir nutraukimo, studijų sąlygas ir tvarką, šalių teises ir pareigas, studijų kainą, jos keitimo ir mokėjimo už studijas sąlygas.</td>
                </tr>
                <tr>
                    <td class="numNonformal">2.</td><td class="colNonformal">Klausytojas moka {{$yearPrice}} eurų mokestį už pasirinktų neformaliojo švietimo programos ar dalykų (toliau - mokymosi dalykų) mokymąsi.</td>
                </tr>
                <tr>
                    <td class="numNonformal">3.</td><td class="colNonformal">Sutartis yra mokėjimo už studijas pagrindas.</td>
                </tr>
            </table>
        </td>
        <td class="colFullNonformal">
            <table class="innerNonformal">
                <tr>
                    <td class="numNonformal">1.</td><td class="colNonformal">This agreement stipulates the terms of validity, amendment and termination of the study agreement between the University and the Unclassified Student as well as the study conditions and order, the rights and obligations of the parties, and the tuition fee along with the terms of its change and payment.</td>
                </tr>
                <tr>
                    <td class="numNonformal">2.</td><td class="colNonformal">The Unclassified Student shall pay {{$yearPrice}} EUR tuition fee for the selected non-formal education programme course or courses (hereinafter – the Courses).</td>
                </tr>
                <tr>
                    <td class="numNonformal">3.</td><td class="colNonformal">This agreement is the basis for the payment of the tuition fee.</td>
                </tr>
            </table>
        </td>
    </tr>
</table>
<table class="nonformal">
    <tr>
        <td class="colFullNonformal">
            <p class="centerTextPart larger">II. UNIVERSITETO ĮSIPAREIGOJIMAI</p>

            <table class="innerNonformal">
                <tr>
                    <td class="numNonformal">4.</td><td>Suteikti Klausytojui prieigą prie mokymosi dalyko turinio pagal pasirinktą mokymosi formą ir mokymosi dalyko trukmę.</td>
                </tr>
                <tr>
                    <td class="numNonformal">5.</td><td>Užtikrinti pasirinktų mokymosi dalykų kokybę.</td>
                </tr>
                <tr>
                    <td class="numNonformal">6.</td><td>Išduoti Klausytojui nustatytos formos akademinę pažymą ir/ arba sertifikatą apie pasiektus ir įvertintus mokymosi rezultatus.</td>
                <tr>
                    <td class="numNonformal">7.</td><td>Tvarkyti Klausytojo asmens duomenis vadovaujantis Asmens duomenų teisinės apsaugos įstatymu.</td>
                </tr>
            </table>
        </td>
        <td class="colFullNonformal">
            <p class="centerTextPart larger">II. OBLIGATIONS OF THE UNIVERSITY</p>

            <table class="innerNonformal">
                <tr>
                    <td class="numNonformal">4.</td><td>To provide the Unclassified Student with the access to Course contents according to the chosen study form and Course duration.</td>
                </tr>
                <tr>
                    <td class="numNonformal">5.</td><td>To ensure the study quality of the chosen Courses.</td>
                </tr>
                <tr>
                    <td class="numNonformal">6.</td><td>To grant the Unclassified Student an academic transcript / or certificate on the achieved and evaluated study results.</td>
                <tr>
                    <td class="numNonformal">7.</td><td>To administer the Unclassified Student’s personal data in compliance with the Law on Legal Protection of Personal Data.</td>
                </tr>
            </table>
        </td>
    </tr>
</table>

<table class="nonformal">
    <tr>
        <td class="colFullNonformal">
            <p class="centerTextPart larger">III. KLAUSYTOJO ĮSIPAREIGOJIMAI</p>

            <table class="innerNonformal">
                <tr>
                    <td class="numNonformal">8.</td><td>Klausytojas įsipareigoja:</td>
                </tr>
                <tr>
                    <td class="numNonformal">8.1.</td><td>mokėti Universiteto nustatytą mokestį už mokymąsi pasirinktuose dalykuose;</td>
                </tr>
                <tr>
                    <td class="numNonformal">8.2.</td><td>savarankiškai susipažinti su Universiteto tinklalapyje skelbiamais dokumentais, reglamentuojančiais neformalųjį švietimą, ir nuolat juos sekti mokymosi metu;</td>
                </tr>
                <tr>
                    <td class="numNonformal">8.3.</td><td>dalyvauti mokymosi procese pagal pasirinktą mokymosi formą ir pasirinkto dalyko mokymosi planą;</td>
                </tr>
                <tr>
                    <td class="numNonformal">8.4.</td><td>dalyvaujant mokymosi rezultatų vertinimo sesijose nuotoliniu būdu, išpildyti asmens tapatybės atpažinimo reikalavimus (naudoti internetinę vaizdo kamerą, mikrofoną ir/ ar kitas priemones);</td>
                </tr>
                <tr>
                    <td class="numNonformal">8.5.</td><td>laikytis Etikos kodekso nuostatų, akademinės drausmės ir sąžiningumo principų, Universiteto vidaus tvarkos taisyklių;</td>
                </tr>
                <tr>
                    <td class="numNonformal">8.6.</td><td>vykdyti Universiteto statute ir Studijų reguliamine bei vidaus tvarką reglamentuojančiuose dokumentuose nustatytus įsipareigojimus</td>
                </tr>
            </table>
        </td>
        <td class="colFullNonformal">
            <p class="centerTextPart larger">III. OBLIGATIONS OF THE UNCLASSIFIED STUDENT</p>

            <table class="innerNonformal">
                <tr>
                    <td class="numNonformal">8.</td><td>The Unclassified Student shall be obliged:</td>
                </tr>
                <tr>
                    <td class="numNonformal">8.1.</td><td>to pay the stipulated tuition fee for the courses;</td>
                </tr>
                <tr>
                    <td class="numNonformal">8.2.</td><td>to individually familiarise himself/herself with the documents regulating non-formal education programmes in the University website and regularly follow them during the study period;</td>
                </tr>
                <tr>
                    <td class="numNonformal">8.3.</td><td>to take part in the learning process subject to the selected study form and selected Course learning plan;</td>
                </tr>
                <tr>
                    <td class="numNonformal">8.4.</td><td>when taking part in distance sessions of the evaluation of learning outcomes, to comply with personal identification requirements: use Internet video camera, microphone and/ or other necessary tools;</td>
                </tr>
                <tr>
                    <td class="numNonformal">8.5.</td><td>to comply with the provisions of the Code of Ethics, the principles of academic discipline and honesty and the internal rules of the University;</td>
                </tr>
                <tr>
                    <td class="numNonformal">8.6.</td><td>to assume obligations stipulated in the University Statute, the Study Regulations and other documents regulating the internal order of the University.</td>
                </tr>
            </table>
        </td>
    </tr>
</table>

<div style="page-break-before: always;"></div>

<img class="topImage" src="https://resources.vdu.lt/images/vdu_pdf_header.png" />

<table class="nonformal">
    <tr>
        <td class="colFullNonformal">
            <p class="centerTextPart larger">IV. MOKĖJIMAS UŽ DALYKŲ STUDIJAVIMĄ</p>

            <table class="innerNonformal">
                <tr>
                    <td class="numNonformal">9.</td><td>Klausytojas turi sumokėti nustatytą pasirinkto neformalaus švietimo dalyko mokestį iki mokymosi pradžios.</td>
                </tr>
                <tr>
                    <td class="numNonformal">10.</td><td>Klausytojas, nesumokėjęs mokesčio iki paskutinės semestro paskaitų dienos, braukiamas kaip nesumokėjęs už dalykų studijavimą, skaičiuojant išnaudotą mokestį už 15 savaičių. </td>
                </tr>
            </table>
        </td>
        <td class="colFullNonformal">
            <p class="centerTextPart larger" >IV. TUITION FEE</p>

            <table class="innerNonformal">
                <tr>
                    <td class="numNonformal">9.</td><td>The Unclassified Student shall pay a fixed tuition fee for the chosen non-formal education course before the course starts.</td>
                </tr>
                <tr>
                    <td class="numNonformal">10.</td><td>Should the Unclassified Student be expelled from the non-formal education course or terminate the studies voluntarily, the paid tuition fee shall not be refunded.</td>
                </tr>
            </table>
        </td>
    </tr>
</table>
<table class="nonformal">
    <tr>
        <td class="colFullNonformal">
            <p class="centerTextPart larger">V. BAIGIAMOSIOS NUOSTATOS</p>

            <table class="innerNonformal">
                <tr>
                    <td class="numNonformal">11.</td><td>Klausytojas turi teisę bet kada nutraukti šią sutartį.</td>
                </tr>
                <tr>
                    <td class="numNonformal">12.</td><td>Universitetas turi teisę nutraukti sutartį, jei Klausytojas:</td>
                </tr>
                <tr>
                    <td class="numNonformal">12.1.</td><td>grubiai pažeidžia Universiteto statutą, Studijų reguliaminą, Etikos kodekso nuostatus bei vidaus tvarkos taisykles, reglamentuotas universiteto dokumentuose;</td>
                </tr>
                <tr>
                    <td class="numNonformal">12.2.</td><td>nevykdo mokymosi plano, pateikiamo mokymosi dalyko apraše, reikalavimų.</td>
                </tr>
                <tr>
                    <td class="numNonformal">12.3.</td><td>baigiasi mokymuisi skirtas laikas.</td>
                </tr>
                <tr>
                    <td class="numNonformal">13.</td><td>Sutartis sudaroma dviem vienodą teisinę galią turinčiais egzemplioriais, po vieną kiekvienai šaliai. Sutartis sudaroma pasirašant rašytine arba elektronine forma, sutinkant (akceptuojant) su Universiteto informacinėje sistemoje pateiktomis sąlygomis. Šalių susitarimu sutarties elektroninė forma prilyginama rašytinei formai.</td>
                </tr>
                <tr>
                    <td class="numNonformal">14.</td><td>Sutartis įsigalioja kai Klausytojas sumoka nustatytą neformalaus švietimo dalykų mokymosi mokestį.</td>
                </tr>
                <tr>
                    <td class="numNonformal">15.</td><td>Sutarties galiojimas baigiasi 11 ir 12 punktuose numatytais pagrindais ją nutraukus.</td>
                </tr>
                <tr>
                    <td class="numNonformal">16.</td><td>Tarp šalių kilę ginčai sprendžiami Lietuvos Respublikos įstatymų nustatyta tvarka.</td>
                </tr>
            </table>
        </td>
        <td class="colFullNonformal">
            <p class="centerTextPart larger" >V. CONCLUDING PROVISIONS</p>

            <table class="innerNonformal">
                <tr>
                    <td class="numNonformal">11.</td><td>The Unclassified Student is entitled to terminate this agreement at any time of his/her convenience.</td>
                </tr>
                <tr>
                    <td class="numNonformal">12.</td><td>The University is entitled to terminate this agreement should the Unclassified Student:</td>
                </tr>
                <tr>
                    <td class="numNonformal">12.1.</td><td>be in serious breach of the University Statute, Study Regulations, the provisions of the Code of Ethics and internal rules determined in the University documents;</td>
                </tr>
                <tr>
                    <td class="numNonformal">12.2.</td><td>fail to fulfil the requirements established in the study plan indicated in the course description.</td>
                </tr>
                <tr>
                    <td class="numNonformal">12.3.</td><td>learning time is over.</td>
                </tr>
                <tr>
                    <td class="numNonformal">13.</td><td>This agreement is concluded in two copies of equal legal validity conferred to each party. The agreement is concluded in a written or electronic form by accepting the terms indicated in the University information system. Upon the consensus of the parties, the electronic form of the agreement is held equal to the written form.</td>
                </tr>
                <tr>
                    <td class="numNonformal">14.</td><td>The agreement shall come into force after the Unclassified Student pays the tuition fee for the nonformal education course.</td>
                </tr>
                <tr>
                    <td class="numNonformal">15.</td><td>The agreement shall cease to have effect upon its termination on the basis provided in Clauses 11 and 12.</td>
                </tr>
                <tr>
                    <td class="numNonformal">16.</td><td>Disputes arising between the parties shall be resolved in compliance with the order stipulated by the laws of the Republic of Lithuania.</td>
                </tr>
            </table>
        </td>
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