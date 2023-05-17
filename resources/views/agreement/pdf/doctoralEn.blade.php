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
            <h6 class="centerTextUpper">AGREEMENT BETWEEN VYTAUTAS MAGNUS UNIVERSITY
                AND THE DOCTORAL CANDIDATE</h6>

            <p class="centerTextLower">Reg. No. {{$bpoPakviestiEsign->stud_sut_nr}}</p>

        </td>
        <td>
            <p style="text-align: right;">@if ($agreement->agreement_date) {{$agreement->agreement_date}} @endif</p>
        </td>
    </tr>
</table>
<p class="centerTextPart">SPECIALIOJI DALIS</p>
<table class="listTable">
    <tr>
        <td class="num">1.</td><td>The Agreement of Studies (hereinafter– the Agreement) is comprised of the special and general parts that are inseparable.</td>
    </tr>
    <tr>
        <td class="num">2.</td><td>Data of the person entering into the Agreement with Vytautas Magnus University:</td>
    </tr>
</table>
<br />
<table class="table">
    <tr>
        <td class="tdLeft">Name, surname</td>
        <td class="tdRight">{{$bpoPakviestiEsign->vardas}} {{$bpoPakviestiEsign->pavarde}}</td>
    </tr>
    <tr>
        <td class="tdLeft">Personal code @if ($bpoPakviestiEsign->gimimo_data) / date of birth @endif </td>
        <td class="tdRight">{{$bpoPakviestiEsign->asmens_kodas}} @if ($bpoPakviestiEsign->gimimo_data) / {{$bpoPakviestiEsign->gimimo_data}} @endif</td>
    </tr>
    <tr>
        <td class="tdLeft">Study cycle</td>
        <td class="tdRight">{{$stage->tnosauka}}</td>
    </tr>
    <tr>
        <td class="tdLeft">Form of studies</td>
        <td class="tdRight">{{$form->tnosauka}}</td>
    </tr>
    <tr>
        <td class="tdLeft">Study programme</td>
        <td class="tdRight">{{$bpoProgramos->luadmProgramma->pnosauka}}</td>
    </tr>
    <tr>
        <td class="tdLeft">Type of financing</td>
        <td class="tdRight">@if (strtoupper($bpoPakviestiEsign->finansavimas) == 'VF') State funded  @else State non-funded  @endif</td>
    </tr>
    <tr>
        <td class="tdLeft">The size of the study basket/ annual price for studies</td>
        <td class="tdRight">{{$yearPrice}}</td>
    </tr>
    <tr>
        <td class="tdLeft">Price per semester</td>
        <td class="tdRight">{{$semesterPrice}}</td>
    </tr>
    <tr>
        <td class="tdLeft">Year of study terms</td>
        <td class="tdRight">{{$bpoPakviestiEsign->metai}}</td>
    </tr>
</table>
<p class="centerTextPart">GENERAL PART<br />I. GENERAL PROVISIONS</p>
<table class="listTable">
    <tr>
        <td class="num">1.</td><td>Vytautas Magnus University (hereinafter, the University) represented by Vice Rector for Research Julija Kiršienė and the person (hereinafter, the Doctoral candidate) whose data are indicated in Article 2 of the special part (hereinafter collectively referred to as Parties) enter into this Agreement. </td>
    </tr>
    <tr>
        <td class="num">2.</td><td>The Agreement is signed in accordance with the Law on Higher Education and Research of the Republic of Lithuania, the terms of the Standard Study Agreement, the Statute of Vytautas Magnus University, Regulations of Doctoral Studies in the Science field, Rules of Admission to Vytautas Magnus University and other legal acts of the Republic of Lithuania and internal regulations of the University.</td>
    </tr>
    <tr>
        <td class="num">3.</td><td>The Agreement stipulates rights and commitments of the parties, terms of validity, amendment and termination, study conditions, the tuition fee and changes to it, as well as terms of payment for studies.</td>
    </tr>
    <tr>
        <td class="num">4.</td><td>The Agreement is concluded by signing the electronic form and accepting the conditions specified in the information system of the University following the order stipulated in the University rules of admission. Under the agreement of the Parties, the electronic form shall be treated as the written form.</td>
    </tr>
    <tr>
        <td class="num">5.</td><td>The Agreement shall come into force on the day of signing. The status of a doctoral student is acquired at the beginning of the semester of the academic year.</td>
    </tr>
</table>

<p class="centerTextPart">II. COMMITMENTS OF THE UNIVERSITY</p>

<table class="listTable">
    <tr>
        <td class="num">6.</td><td>The University shall undertake the commitments:</td>
    </tr>
    <tr>
        <td class="num">6.1.</td><td>to provide the Doctoral candidate with a research advisor and, if necessary, other consultants;</td>
    </tr>
    <tr>
        <td class="num">6.2.</td><td>to afford the Doctoral candidate appropriate study conditions for implementing the doctoral work plan and preparing the dissertation</td>
    <tr>
        <td class="num">6.3.</td><td>upon the successful completion and defence of the doctoral dissertation, to grant the candidate the doctoral degree and to issue thereafter a certifying diploma;</td>
    </tr>
    <tr>
        <td class="num">6.4.</td><td>to assume other obligations stipulated in the University Statute and the acts regulating the internal order of the University;</td>
    </tr>
    <tr>
        <td class="num">6.5.</td><td>to process the Doctoral candidate’s personal data in accordance with the Law of the Republic of Lithuania;</td>
    </tr>
    <tr>
        <td class="num">6.6.</td><td>to provide the Doctoral candidate with access to the necessary information systems and study resources;</td>
    </tr>
    <tr>
        <td class="num">6.7.</td><td>to provide necessary information and consultations on the study issues.</td>
    </tr>
</table>

<p class="centerTextPart">III. COMMITMENTS OF THE DOCTORAL CANDID</p>

<table class="listTable">
    <tr>
        <td class="num">7.</td><td>The Doctoral candidate shall undertake the commitments:</td>
    </tr>
    <tr>
        <td class="num">7.1. </td><td>to implement the stipulated doctoral work plan and to participate in the study quality evaluation and career monitoring surveys carried out by the University;</td>
    </tr>
    <tr>
        <td class="num">7.2.</td><td>to independently familiarise with the documents regulating the studies published on the University website and Intranet, and follow them during the period of studies;</td>
    </tr>
    <tr>
        <td class="num">7.3.</td><td>to observe the provisions of the Code of Academic Ethics of the University, the principles of academic discipline and conduct, internal rules, and general regulations for doctoral candidates; </td>
    </tr>
    <tr>
        <td class="num">7.4.</td><td>upon changing the place of residence or other contact information, to immediately inform the University;</td>
    </tr>
    <tr>
        <td class="num">7.5.</td><td>to assume other obligations stipulated in the University Statute and the acts regulating the internal order of the University.</td>
    </tr>
    <tr>
        <td class="num">8.</td><td>By signing the Agreement, the Doctoral candidate agrees with the principles outlined in the Declaration of Academic Honesty of Doctoral Students and commit myself:</td>
    </tr>
    <tr>
        <td class="num">8.1.</td><td>to keeping to the Code of Academic Ethics of Vytautas Magnus University, the regulations of doctoral study programme within the scientific field research area, the Study Regulations, and other provisions and norms of ethical conduct for the entire period of studies; </td>
    </tr>
    <tr>
        <td class="num">8.2.</td><td>to responsibly assume and honestly implement the duties of a Doctoral candidate;</td>
    </tr>
    <tr>
        <td class="num">8.3.</td><td>as a Doctoral candidate, to set a good example for other members of the academic community, not to tolerate cases of academic dishonesty and fulfil the obligation to report about such cases;</td>
    </tr>
    <tr>
        <td class="num">8.4.</td><td>to actively support the creation and fostering of honest academic environment at Vytautas Magnus University.</td>
    </tr>
    <tr>
        <td class="num">9.</td><td>By signing this Agreement, the Doctoral candidate agrees that in case of academic dishonesty in the process of examinations, preparation of the doctoral dissertation, process of doing scientific research, and publication of research results, he/she shall be subject to the sanctions outlined in the Code of Academic Ethics of Vytautas Magnus University, the regulations of doctoral study programme in the scientific field of research area, the Study Regulations, and other legal acts. </td>
    </tr>
</table>

<br />
<p class="centerTextPart" style="page-break-before: always;">IV. FINANCIAL CONDITIONS OF THE STUDIES</p>
<table class="listTable">
    <tr>
        <td class="num">10.</td><td>The price for studies of a Doctoral candidate who is in the state-funded place is covered from the state budget according to the order stipulated in the legal acts of the Republic of Lithuania.</td>
    </tr>
    <tr>
        <td class="num">11.</td><td>The Doctoral Candidate who is admitted to the state non-funded study programme shall pay for studies the price determined by the University Senate in the year of the Doctoral candidate’s admission and indicated in Article 2 of the special part of the Agreement.</td>
    </tr>
    <tr>
        <td class="num">12.</td><td>The doctoral Candidate shall pay the tuition fee for the semester following the terms determined in the Description of the procedure for payment and recovery of tuition fees:</td>
    </tr>
    <tr>
        <td class="num">12.1.</td><td>The tuition fee for the first study semester shall be paid in the period of 15 calendar days since signing the Agreement;</td>
    </tr>
    <tr>
        <td class="num">12.2.</td><td>The tuition fee for the other semesters shall be paid in accordance with the order stipulated by the University. </td>
    </tr>
    <tr>
        <td class="num">13.</td><td>The Doctoral Candidate of the state non-funded studies complying with the norms determined in the Law on Higher Education and Research of the Republic of Lithuania is entitled to apply to a budget funded place if a free state budget funded study place appears in the same research area, in the same study year following the procedure set at the University.</td>
    </tr>
    <tr>
        <td class="num">14.</td><td>The University Rector or a person authorised by the Rector can exempt the Doctoral candidate from payment of tuition fee, reduce its amount, and change payment terms.</td>
    </tr>
    <tr>
        <td class="num">15.</td><td>Having terminated studies or being expelled from the University, the Doctoral candidate must pay the used part of the tuition fee according to the Description of the procedure for payment and recovery of tuition fees. </td>
    </tr>
    <tr>
        <td class="num">16.</td><td>In the case of termination of studies or expelling from the University, the Doctoral candidate shall be returned part of the paid tuition fee that has not been used according to the Description of the procedure for payment and recovery of tuition fees.</td>
    </tr>
    <tr>
        <td class="num">17.</td><td>Non-citizens of the Republic of Lithuania are not eligible for the recovery of the fees if:</td>
    </tr>
    <tr>
        <td class="num">17.1.</td><td>the provided education and/or personal identification documents are not authentic or fake;</td>
    </tr>
    <tr>
        <td class="num">17.2</td><td>the Doctoral candidate came to the University but did not study.</td>
    </tr>
    <tr>
        <td class="num">18.</td><td>The Agreement is the basis for the payment for studies.</td>
    </tr>
</table>
<p class="centerTextPart">V.  CONCLUDING PROVISIONS</p>

<table class="listTable">
    <tr>
        <td class="num">19.</td><td>The Doctoral candidate is entitled to provide a written application to terminate the present agreement with the University at any time. </td>
        </td>
    </tr>
    <tr>
        <td class="num">20.</td><td>The University is entitled, without prior notice, to terminate the agreement with the Doctoral candidate who:</td>
    </tr>
    <tr>
        <td class="num">20.1.</td><td>seriously violates the University Statute, Study Regulations, Regulations of doctoral studies in science field and (or) internal rules;</td>
    </tr>
    <tr>
        <td class="num">20.2.</td><td>fails to pass the attestation conducted by the doctoral programme committee within the scientific field due to the inadequate implementation of doctoral work plan;</td>
    </tr>
    <tr>
        <td class="num">20.3.</td><td>fails to complete and defend the dissertation before the stipulated end of doctoral studies;</td>
    </tr>
    <tr>
        <td class="num">20.4.</td><td>does not pay all fees for the semester studies until the by the stipulated payment deadline without a justifiable reason.</td>
    </tr>
    <tr>
        <td class="num">21.</td><td>The Doctoral candidate who was studying in the state-funded place and having terminated the Agreement on the basis of Articles 19 and 20 of the present Agreement must return the funds designated for the payment of state-funded study places into the state budget according to the order determined by the Government of the Republic of Lithuania.</td>
    </tr>
    <tr>
        <td class="num">22.</td><td>When the Doctoral candidate changes the study form of studies or in other cases specified by the University, the Agreement conditions can be changed by creating a separate document which, after signing by both parties, becomes the inseparable part of this Agreement.</td>
    </tr>
    <tr>
        <td class="num">23.</td><td>The Agreement comes to an end:</td>
    </tr>
    <tr>
        <td class="num">23.1.</td><td>after obtaining a doctoral diploma;</td>
    </tr>
    <tr>
        <td class="num">23.2.</td><td>when it is terminated on the basis of Articles 19 and 20.</td>
    </tr>
    <tr>
        <td class="num">24.</td><td>Disputes arising between the parties to the Agreement shall be resolved under the agreement between the parties. Should the agreement between the parties be not achieved, disputes are to be resolved in accordance with the laws of the Republic of Lithuania at the court in the city of Kaunas.</td>
    </tr>
</table>
<p class="centerTextPart">REQUISITE INFORMATION OF THE PARTIES</p>
<br />
<table class="bottomTable">
    <tr>
        <td class="textTop">
            <b>Vytauto Didžiojo Universitetas</b><br />
            code 111950396<br />
            K. Donelaičio g. 58, Kaunas 44248<br />
            Phone. (8 37) 222 739<br />
            Current bank accounts:<br />
            No. LT04 7044 0600 0284 8625, AB SEB bankas;<br />
            No. LT89 4010 0425 0278 5505, Luminor bank Ab;<br />
            No. LT79 7300 0101 3113 5650, "Swedbank", Ab
        </td>
        <td class="textTop">
            <b>Doctoral candidate</b><br />
            {{$bpoPakviestiEsign->vardas}} {{$bpoPakviestiEsign->pavarde}}<br />
            Personal card no, expiration date: {{$bpoPakviestiEsign->asmensdok}} {{$bpoPakviestiEsign->asmensdok_gal_iki}}<br />
            Phone: {{$bpoPakviestiEsign->pirmas_telef}}<br />
            Email: {{$bpoPakviestiEsign->elpastas}}<br />
            Address: {{$bpoPakviestiEsign->gyvvieta}}<br />
        </td>
    </tr>
</table>
<br />
@if ($agreement->agreement_date)
    <p class="centerTextPart">SIGNATURES OF THE PARTIES</p>
    <br />
    <table class="bottomTable">
        <tr>
            <td class="textTop">
                <b>Universiteto atstovas</b><br /><br />
                <b>Mokslo prorektorė Julija Kiršienė</b><br />
                <img class="sign" src="https://resources.vdu.lt/images/julija_krisiene_anstspaudas.png">  </img>
            </td>
            <td class="textTop">
                <b>Doctoral candidate</b><br /><br />
                <b>This document was electronically approved by</b><br />
                <b>{{$bpoPakviestiEsign->vardas}} {{$bpoPakviestiEsign->pavarde}}</b>
                <b>{{$agreement->agreement_date}}</b>
            </td>
        </tr>
    </table>
    <p class="signature"></p>
@endif
</body>