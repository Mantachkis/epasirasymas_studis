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
            <h6 class="centerTextUpper">AGREEMENT OF STUDIES</h6>
            @if ($bpoPakviestiEsign->stud_sut_nr)
            <p class="centerTextLower">Reg. No. {{$bpoPakviestiEsign->stud_sut_nr}}</p>
            @endif
        </td>
        <td>
            <p style="text-align: right;">@if ($agreement->agreement_date) {{$agreement->agreement_date}} @endif</p>
        </td>
    </tr>
</table>
<p class="centerTextPart">SPECIAL PART</p>
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
        <td class="num">1.</td><td>Vytautas Magnus University (hereinafter, the University) represented by Rector Juozas Augutis and the person (hereinafter, the Student) whose data are indicated in Article 2 of the special part (hereinafter collectively referred to as Parties) enter into this Agreement.</td>
    </tr>
    <tr>
        <td class="num">2.</td><td>The Agreement is signed in accordance with the Law on Higher Education and Research of the Republic of Lithuania, the terms of the Standard Study Agreement, the Statute of Vytautas Magnus University, Study Regulations, Rules of Admission to Vytautas Magnus University and other legal acts of the Republic of Lithuania and internal regulations of the University.</td>
    </tr>
    <tr>
        <td class="num">3.</td><td>The Agreement stipulates rights and commitments of the parties, terms of validity, amendment and termination, study conditions, the tuition fee and changes to it, as well as terms of payment for studies.</td>
    </tr>
    <tr>
        <td class="num">4.</td><td>The Agreement is concluded by signing the electronic form and accepting the conditions specified in the information system of the University following the order stipulated in the University rules of admission. Under the agreement of the Parties, the electronic form shall be treated as the written form.</td>
    </tr>
    <tr>
        <td class="num">5.</td><td>The Agreement shall come into force on the day of signing. The status of a student is acquired at the beginning of the semester of the academic year. If the Agreement is signed during the preliminary admission to the University, the status of a student is acquired at the beginning of the semester of the academic year, provided that the student meets all the conditions and complies with all the requirements stipulated in the Rules of Admission to the University. Otherwise the Agreement shall be terminated unilaterally.</td>
    </tr>
</table>

<p class="centerTextPart">II. COMMITMENTS OF THE UNIVERSITY</p>

<table class="listTable">
    <tr>
        <td class="num">6.</td><td>The University shall undertake the commitments:</td>
    </tr>
    <tr>
        <td class="num">6.1.</td><td>to create the conditions for the Student to implement the study programme;</td>
    </tr>
    <tr>
        <td class="num">6.2.</td><td>to ensure study quality;</td>
    <tr>
        <td class="num">6.3.</td><td>upon completion of the study programme, to grant the Student a qualification degree and (or) professional qualification corresponding with the study
            programme and issue a higher education diploma and diploma supplement confirming the completion of the programme;</td>
    </tr>
    <tr>
        <td class="num">6.4.</td><td>to administer personal data of the Student in accordance with the Law on Legal Protection of Personal Data;</td>
    </tr>
    <tr>
        <td class="num">6.5.</td><td>to provide the Student with access to the necessary information systems and study resources;</td>
    </tr>
    <tr>
        <td class="num">6.6.</td><td>to provide necessary information and consultations on the study issues;</td>
    </tr>
    <tr>
        <td class="num">6.7.</td><td>to provide necessary information for the Student who is a non-citizen of the Republic of Lithuania and, within its competences, mediate in visa or temporary permit acquisition for staying in the Republic of Lithuania in the cases specified in legal acts of the Republic of Lithuania. Applying for the visa or Temporary residence permit is upon student responsibility.</td>
    </tr>
</table>

<p class="centerTextPart">III. COMMITMENTS OF THE STUDENT</p>

<table class="listTable">
    <tr>
        <td class="num">7.</td><td>The Student shall undertake the commitments:</td>
    </tr>
    <tr>
        <td class="num">7.1. </td><td>to study according to the study programme indicated in the Special part of the Agreement and fulfil the requirements raised in the programme;</td>
    </tr>
    <tr>
        <td class="num">7.2.</td><td>to participate in the University surveys on study quality assessment and career monitoring;</td>
    </tr>
    <tr>
        <td class="num">7.3.</td><td>to pay for the repeated and (or) additional study subjects according to the description of the Description of the procedure for payment and recovery of tuition fees;</td>
    </tr>
    <tr>
        <td class="num">7.4.</td><td>to independently analyse the documents on study regulation posted on the University website and Student self-service portal and constantly follow them in the course of studies;</td>
    </tr>
    <tr>
        <td class="num">7.5.</td><td>to adhere to the provisions of the Code of Ethics, the principles of academic discipline and honesty, rules of internal order and general requirements for students;</td>
    </tr>
    <tr>
        <td class="num">7.6</td><td>to inform the University without delay about the changes of the living place or other contact information.</td>
    </tr>
    <tr>
        <td class="num">8.</td><td>Students of the non-Lithuanian citizenship, following the laws and other legal acts of the Republic of Lithuania must:</td>
    </tr>
    <tr>
        <td class="num">8.1.</td><td>provide documents (a diploma and its supplement) for the recognition and validation of academic qualification to be carried out at the University or Study quality assessment centre in Lithuania. Having provided original documents, academic recognition of qualification shall be completed over the first semester;</td>
    </tr>
    <tr>
        <td class="num">8.2.</td><td>provide original documents confirming education to the University in 30 calendar days from the day of arrival to studies at the University. If the provided documents turn out to be not authentic or fake, the studies at the University shall be unilaterally terminated at any period of studies. The validity of the visa or temporary permit shall be terminated, and the student shall leave for the country of origin in the shortest period;</td>
    </tr>
    <tr>
        <td class="num">8.3.</td><td>non-citizens of the European Union must provide the University with documents proving the legality of their stay in the Republic of Lithuania in 5 days from the acquisition of the document. If the documents proving the legality of the stay in the Republic of Lithuania are not provided, the Agreement shall be terminated unilaterally.</td>
    </tr>
    <tr>
        <td class="num">8.4.</td><td>assume other obligations determined in the University Statute, Study Regulations and other documents regulating the internal order of the University.</td>
    </tr>
    <tr>
        <td class="num">9.</td><td>The Student agrees with the principles stipulated in the Honesty declaration of the University student and commits to their implementation:<br />
            - to follow the Code of Academic Ethics of Vytautas Magnus University, provisions of Study Regulations and other documents regulating ethical behaviour throughout the full period of studies;<br />
            - to responsibly assume and honestly implement the duties of a Student;<br />
            - as a Student, to set a good example for other members of the academic community, not to tolerate cases of academic dishonesty and fulfil the obligation to
            report about such cases;<br />
            - to actively support the creation and fostering of honest academic environment at Vytautas Magnus University. </td>
    </tr>
    <tr>
        <td class="num">10</td><td>The Student agrees that sanctions specified in the Code of Ethics of Vytautas Magnus University, Study Regulations and other documents regulating ethical behaviour shall be imposed on him/her for infringement of academic ethics during exams or other interim tests, while preparing and delivering independent and final works, carrying out research, publishing research results.</td>
    </tr>
</table>

<br />
<p class="centerTextPart" style="page-break-before: always;">IV. FINANCIAL CONDITIONS OF THE STUDIES</p>
<table class="listTable">
    <tr>
        <td class="num">11.</td><td>The price for studies of a Student who is in the state-funded place is covered from the state budget according to the order stipulated in the legal acts of the Republic of Lithuania.</td>
    </tr>
    <tr>
        <td class="num">12.</td><td>The Student who is admitted to the state non-funded study programme or the Student of state-funded studies who has lost the right to state funding according to the legal acts of the Republic of Lithuania shall pay for studies the price determined by the University Council in the year of the Student’s admission and indicated in Article 2 of the special part of the Agreement. The price for the 5th year of integrated studies is equal to the annual price of the second–cycle studies determined by the University Council in the year of admission. </td>
    </tr>
    <tr>
        <td class="num">13.</td><td>The Student shall pay the tuition fee for the semester following the terms determined in the Description of the procedure for payment and recovery of tuition fees: </td>
    </tr>
    <tr>
        <td class="num">13.1.</td><td>50% of the tuition fee for the autumn semester shall be paid until September 10 and the remaining 50% - until November 10; </td>
    </tr>
    <tr>
        <td class="num">13.2.</td><td>50% of the tuition fee for the spring semester shall be paid until February 10 and the remaining 50% - until April 10.</td>
    </tr>
    <tr>
        <td class="num">14.</td><td>The non-European Union citizens shall pay the instalment for the first year of studies in 20 (twenty) calendar days from the signing of the study Agreement. The tuition fee for the subsequent years of study shall be paid to the indicated bank account according to the Description of the procedure for payment and recovery of tuition fees under the following terms:</td>
    </tr>
    <tr>
        <td class="num">14.1.</td><td>50% of the tuition fee for the autumn semester shall be paid until September 10 and the remaining 50% - until November 10;</td>
    </tr>
    <tr>
        <td class="num">14.2.</td><td>50% of the tuition fee for the spring semester shall be paid until February 10 and the remaining 50% - until April 10. </td>
    </tr>
    <tr>
        <td class="num">15.</td><td>The procedure for tuition fee payment for the students of part-time second-cycle students can be determined by the Dean’s decree.</td>
    </tr>
    <tr>
        <td class="num">16.</td><td>The Student of the state non-funded studies complying with the norms determined in the Law on Higher Education and Research of the Republic of Lithuania is entitled to apply to a budget funded place if a free state budget funded study place appears in the same study form, in the same study programme and in the same year following the procedure set at the University. </td>
    </tr>
    <tr>
        <td class="num">17.</td><td>Article 16 of the present Agreement is not applicable under at least one of the following conditions: </td>
    </tr>
    <tr>
        <td class="num">17.1.</td><td>The Student is repeating studies in the study programme of the same cycle if more than half of the study programme credits have been acquired on the state budget;</td>
    </tr>
    <tr>
        <td class="num">17.2</td><td>The Student is studying in two or more study programmes of the same cycle and his/her studies at least in one of them are state funded;</td>
    </tr>
    <tr>
        <td class="num">17.3.</td><td>The Student is a foreigner, with the exception of persons indicated in parts 7 and 8 of Article 82 of the Law on Higher Education and Research of the Republic of Lithuania if not stipulated otherwise in international agreements of the Republic of Lithuania and other legal acts.</td>
    </tr>
    <tr>
        <td class="num">18.</td><td>When transferred to the state-funded place the Student can lose state financing for studies under the order stipulated by legal acts of the Republic of Lithuania.</td>
    </tr>
    <tr>
        <td class="num">19.</td><td>The University Rector or a person authorised by the Rector can exempt the Student from payment of tuition fee, reduce its amount, and change payment terms</td>
    </tr>
    <tr>
        <td class="num">20.</td><td>Having terminated studies or being expelled from the University, the Student must pay the used part of the tuition fee according to the Description of the procedure for payment and recovery of tuition fees. </td>
    </tr>
    <tr>
        <td class="num">21.</td><td>In the case of termination of studies or expelling from the University, the Student shall be returned part of the paid tuition fee that has not been used according to the Description of the procedure for payment and recovery of tuition fees. </td>
    </tr>
    <tr>
        <td class="num">22.</td><td>Non-citizens of the Republic of Lithuania are not eligible for the recovery of the fees if:</td>
    </tr>
    <tr>
        <td class="num">22.1.</td><td>the provided education and/or personal identification documents are not authentic or fake;</td>
    </tr>
    <tr>
        <td class="num">22.2.</td><td>the Student came to the University but did not study and did not participate in interim and final exams.</td>
    </tr>
    <tr>
        <td class="num">23.</td><td>The Agreement is the basis for the payment for studies.</td>
    </tr>
    <tr>
        <td class="num">24.</td><td>The Student can receive a social scholarship from the state budget according to the order determined by the Government of the Republic of Lithuania.</td>
    </tr>
    <tr>
        <td class="num">25.</td><td>Full-time students can be granted an incentive scholarship from the University scholarship on the basis of their study results and other academic achievements
            fund, following the procedure set at the University.</td>
    </tr>
</table>
<p class="centerTextPart">V. CONCLUDING PROVISIONS</p>

<table class="listTable">
    <tr>
        <td class="num">26.</td><td>The Student is entitled to provide a written application to terminate the present agreement with the University at any time.</td>
        </td>
    </tr>
    <tr>
        <td class="num">27.</td><td>The University is entitled, without prior notice, to terminate the agreement with the Student who:</td>
    </tr>
    <tr>
        <td class="num">27.1.</td><td>seriously violates the University Statute, Study Regulations and (or) internal rules;</td>
    </tr>
    <tr>
        <td class="num">27.2.</td><td>does not fulfil the requirements of the study programme;</td>
    </tr>
    <tr>
        <td class="num">27.3.</td><td>does not pay all fees for the semester studies until the beginning of the exam session.</td>
    </tr>
    <tr>
        <td class="num">28.</td><td>The Student who was transferred to the state-funded place under the conditions set in Article 16 of the present Agreement and having terminated the Agreement on the basis of Articles 26, 27.1 and 27.2 of the present Agreement must return the funds designated for the payment of state-funded study places into the state budget according to the order determined by the Government of the Republic of Lithuania. </td>
    </tr>
    <tr>
        <td class="num">29.</td><td>When the Student changes the study programme, form of studies or in other cases specified by the University, the Agreement conditions can be changed by creating a separate document which, after signing by both parties, becomes the inseparable part of this Agreement. </td>
    </tr>
    <tr>
        <td class="num">30.</td><td>The Agreement comes to an end:</td>
    </tr>
    <tr>
        <td class="num">30.1.</td><td>when the Student is granted a higher education diploma and a diploma supplement confirming a completed study programme and the acquired qualification degree and (or) professional qualification;</td>
    </tr>
    <tr>
        <td class="num">30.2.</td><td>when it is terminated on the basis of Articles 26 and 27.</td>
    </tr>
    <tr>
        <td class="num">31.</td><td>Disputes arising between the parties to the Agreement shall be resolved under the agreement between the parties. Should the agreement between the parties be not achieved, disputes are to be resolved in accordance with the laws of the Republic of Lithuania at the court in the city of Kaunas.</td>
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
            <b>Student</b><br />
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
                <b>University representative</b><br /><br />
                <b>Rector Juozas Augutis</b><br />
                <img class="sign" src="https://resources.vdu.lt/images/rektoriaus_parasas.png">  </img>

            </td>
            <td class="textTop">
                <b>Student</b><br /><br />
                <b>This document was electronically approved by</b><br />
                <b>{{$bpoPakviestiEsign->vardas}} {{$bpoPakviestiEsign->pavarde}}</b>
                <b>{{$agreement->agreement_date}}</b>
            </td>
        </tr>
    </table>
    <p class="signature"></p>
@endif
</body>