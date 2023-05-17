<!doctype html>
<html>
@include ('agreement.pdf.head')
<body>


<img class="topImage" src="https://resources.vdu.lt/images/vdu_pdf_header.png" />

@if ($agreement->agreement_date) <p class="alignRight">{{$agreement->agreement_date}}</p> @endif

<h2 class="centerTextPart">UNCLASSIFIED STUDY AGREEMENT</h2>
    @if ($bpoPakviestiEsign->stud_sut_nr)
<p class="centerTextPart larger">Reg. No. {{$bpoPakviestiEsign->stud_sut_nr}}</p>
    @endif
<br />

<table class="listTableLarge">
    <tr>
        <td>Vytautas Magnus University (hereinafter – the University) represented by the Rector Juozas Augutis and {{$bpoPakviestiEsign->vardas}} {{$bpoPakviestiEsign->pavarde}}, personal No {{$bpoPakviestiEsign->asmens_kodas}} (hereinafter – the Unclassified Student), enter into this agreement drawn up in accordance with the law of Higher Education and Research of the Republic of Lithuania, provisions of the standard study agreement of the Ministry of Education and Science and other legal acts of the Republic of Lithuania for one study semester:</td>
    </tr>
</table>

<p class="centerTextPart larger">I. GENERAL PROVISIONS</p>

<table class="listTableLarge">
    <tr>
        <td class="numLarge">1.</td><td>This agreement stipulates the terms of validity, amendment and termination of the study agreement between the University and the Unclassified Student as well as the study conditions and order, the rights and obligations of the parties, and the tuition fee along with the terms of its change and payment. </td>
    </tr>
    <tr>
        <td class="numLarge">2.</td><td>The Unclassified Student shall pay for the studies on the basis of the course volume and the credit cost which is determined by the field of studies or study programme of a particular course, If University legislation does not foresee otherwise. </td>
    </tr>
    <tr>
        <td class="numLarge">3.</td><td>This agreement is the basis for the payment of the tuition fee.</td>
    </tr>
</table>

<p class="centerTextPart larger">II. OBLIGATIONS OF THE UNIVERSITY</p>

<table class="listTableLarge">
    <tr>
        <td class="numLarge">4.</td><td>The University shall be obliged:</td>
    </tr>
    <tr>
        <td class="numLarge">4.1.</td><td>To provide the Unclassified Student with the same study conditions as of the regular students.</td>
    </tr>
    <tr>
        <td class="numLarge">4.2.</td><td>To ensure the study quality of the chosen courses.</td>
    <tr>
        <td class="numLarge">4.3.</td><td>To grant the Unclassified Student an academic transcript of a set form on the completed and evaluated courses. In case of the Unclassified Student’s completion of a supplementary study plan, to issue a certificate of supplementary studies. </td>
    </tr>
    <tr>
        <td class="numLarge">4.4.</td><td>To administer the Unclassified Student’s personal data in compliance with the Law on Legal Protection of Personal Data.</td>
    </tr>
</table>

<p class="centerTextPart larger">III. OBLIGATIONS OF THE UNCLASSIFIED STUDENT</p>

<table class="listTableLarge">
    <tr>
        <td class="numLarge">5.</td><td>The Unclassified Student shall be obliged:</td>
    </tr>
    <tr>
        <td class="numLarge">5.1.</td><td>to pay the stipulated tuition fee for the courses according to conditions foreseen in IV section of this agreement;</td>
    </tr>
    <tr>
        <td class="numLarge">5.2.</td><td>to individually familiarise himself/herself with the documents regulating studies in the University website and Intranet and regularly follow them during the study period;</td>
    <tr>
        <td class="numLarge">5.3.</td><td>to comply with the provisions of the Code of Ethics, the principles of academic discipline and honesty and the internal rules of the University;</td>
    </tr>
    <tr>
        <td class="numLarge">5.4.</td><td>to assume obligations stipulated in the University Statute, the Regulations on Studies and other documents regulating the internal order of the University.</td>
    </tr>
</table>

<p class="centerTextPart larger">IV. TUITION FEE</p>

<table class="listTableLarge">
    <tr>
        <td class="numLarge">6.</td><td>The Unclassified Student admitted to non-state funded studies shall pay the tuition fee for the credits in 20 working days after signing the unclassified student agreement.</td>
    </tr>
    <tr>
        <td class="numLarge">7.</td><td>Unclassified students who have not paid the tuition fee before the beginning of the exam session shall be removed from student lists and shall pay the tuition fee used for the study period of 15 weeks.</td>
    </tr>
    <tr>
        <td class="numLarge">8.</td><td>Unclassified students removed from student lists on the basis of their request or for violation of the University’s Study regulations shall pay the tuition fee used for the study period before the date of the abovementioned request or the Rector’s order (term of semester – 20 weeks).</td>
    <tr>
        <td class="numLarge">9.</td><td>Should the Unclassified Student be expelled from the University or terminate the studies voluntarily, the tuition fee paid and not used shall be refunded in compliance with “The Order on Conclusion of Agreements and Payment and Refund of Tuition Fees” approved by the Rector. </td>
    </tr>
</table>

<br />

<div style="page-break-before: always;"></div>

<img class="topImage" src="https://resources.vdu.lt/images/vdu_pdf_header.png" />

<p class="centerTextPart larger" >V. CONCLUDING PROVISIONS</p>

<table class="listTableLarge">
    <tr>
        <td class="numLarge">10.</td><td>The Unclassified Student is entitled to terminate this agreement at any time of his/her convenience.</td>
    </tr>
    <tr>
        <td class="numLarge">11.</td><td>The University is entitled to terminate this agreement should the Unclassified Student:</td>
    </tr>
    <tr>
        <td class="numLarge">11.1</td><td>be in serious breach of the University Statute, the Regulations on Studies and internal rules determined in the University documents;</td>
    </tr>
    <tr>
        <td class="numLarge">11.2.</td><td>fail to fulfil the requirements established in the study programme.</td>
    </tr>
    <tr>
        <td class="numLarge">12.</td><td>This agreement is concluded in two copies of equal legal validity conferred to each party. The agreement is concluded in a written or electronic form by accepting the terms indicated in the University information system. Upon the consensus of the parties, the electronic form of the agreement is held equal to the written form.</td>
    </tr>
    <tr>
        <td class="numLarge">13.</td><td>The agreement shall come into force after the order of the Unclassified Student’s admission is signed by the Rector.</td>
    </tr>
    <tr>
        <td class="numLarge">14.</td><td>The agreement shall cease to have effect upon its termination on the basis provided in clauses 10 and 11.</td>
    </tr>
    <tr>
        <td class="numLarge">15.</td><td>Disputes arising between the parties shall be resolved in compliance with the order stipulated by the laws of the Republic of Lithuania.</td>
    </tr>
</table>

<p class="centerTextPart larger">CONTACTS OF THE PARTIES</p>
<br />
<table class="bottomTable">
    <tr>
        <td class="textTop">
            <b>The University: Vytautas Magnus University</b><br />
            Code 111950396<br />
            K. Donelaičio g. 58, Kaunas 44248<br />
            Tel. (8 37) 222 739<br />
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
            E-mail: {{$bpoPakviestiEsign->elpastas}}<br />
            Address: {{$bpoPakviestiEsign->gyvvieta}}
        </td>
    </tr>
</table>

@if ($agreement->agreement_date)
    <p class="centerTextPart larger">SIGNATURES OF THE PARTIES</p>
    <br />
    <table class="bottomTable">
        <tr>
            <td class="textTop">
                <b>On behalf of the University</b><br /><br />
                <b>Rector Juozas Augutis</b><br />
                <img class="sign" src="https://resources.vdu.lt/images/rektoriaus_parasas.png">  </img>

            </td>
            <td class="textTop">
                <b>The Unclassified Student</b><br /><br />
                <b>This document was electronically approved by</b><br />
                <b>{{$bpoPakviestiEsign->vardas}} {{$bpoPakviestiEsign->pavarde}}</b>
                <b>{{$agreement->agreement_date}}</b>
            </td>
        </tr>
    </table>
    <p class="signature"></p>
@endif
</body>