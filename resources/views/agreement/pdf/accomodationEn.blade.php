<!doctype html>
<html>
@include ('agreement.pdf.head')
<body>


<img class="topImage" src="https://resources.vdu.lt/images/vdu_pdf_header.png" />

@if ($agreement->agreement_date) <p class="alignRight">{{$agreement->agreement_date}}</p> @endif

<div>
    APPROVED:<br />
    By Order No. SRD 17/18-263<br />
    of the Rector of 08 August 2018
</div>

<h2 class="centerTextPart">AGREEMENT FOR ACCOMODATION </h2>
@if ($bpoPakviestiEsign->stud_sut_nr)
    <p class="centerTextPart larger">Reg. No. {{$bpoPakviestiEsign->stud_sut_nr}}</p>
@endif
<br />

<table class="listTableLarge">
    <tr>
        <td>Vytautas Magnus University (hereinafter - University) represented by Mantas Simanavicius, Director of the Office of Student Affairs, acting pursuant to authority granted by the Rector (Order No. 231 of 01 September 2016), and {{$bpoPakviestiEsign->vardas}} {{$bpoPakviestiEsign->pavarde}} (hereinafter – Resident), hereinafter referred to collectively as the “Parties” or individually as a “Party“ have entered into the following Agreement for Accommodation (hereinafter – the Agreement) in accordance to the Procedure for University Dormitory Management (hereinafter – Procedure): </td>
    </tr>
</table>

<p class="centerTextPart larger">I. SUBJECT OF THE AGREEMENT</p>

<table class="listTableLarge">
    <tr>
        <td class="numLarge">1.</td><td>The University, for the charge laid down in chapter II of this Agreement and in accordance with the procedure and conditions laid down herein, shall make available to the Resident occupation of room No. 413 (hereinafter – Residence) located at Vytauto pr. 71, Kaune, for the period indicated in clause 9 of this Agreement. The Resident shall use this Residence for their intended purpose and pay the rent indicated in the Agreement. </td>
    </tr>
</table>

<p class="centerTextPart larger">II. PAYMENTS AND ACCOUNTS</p>

<table class="listTableLarge">
    <tr>
        <td class="numLarge">2.</td><td>Charge for accommodation in the Residence shall be 4 Eur/day (four euro and zero ct/day). This charge includes the payment for utilities and exploitation, related with the Place of Residence. </td>
    </tr>
    <tr>
        <td class="numLarge">3.</td><td>If the Resident resides for: </td>
    </tr>
    <tr>
        <td class="numLarge">3.1.</td><td>a period longer than 2 (two) months - the Resident shall pay the charge for the current month by the 15th (fifteenth) calendar day of the current month.</td>
    <tr>
        <td class="numLarge">3.2.</td><td>a period shorter than 2 (two) months (inclusive) - the Resident shall pay the charge for the whole period of residence, which is indicated in the Agreement, within 1 (one) day from his/her residence. </td>
    </tr>
    <tr>
        <td class="numLarge">4.</td><td>Accommodation fee is included in the Student portal http://studentas.vdu.lt at the beginning of each month, for each Resident personally and it shall be paid in accordance to information that is provided in the payment information. If payment is made in a different way from that indicated in this section - payment will not be recognized.</td>
    </tr>
</table>

<p class="centerTextPart larger">III. RIGHTS AND DUTIES OF THE PARTIES</p>

<table class="listTableLarge">
    <tr>
        <td class="numLarge">5.</td><td>The Resident has the right:</td>
    </tr>
    <tr>
        <td class="numLarge">5.1.</td><td>to use residential and common areas, appliances and equipment for their intended purpose in accordance to the conditions and period indicated in this Agreement; </td>
    </tr>
    <tr>
        <td class="numLarge">5.2.</td><td>to use the University dormitories‘ Internet network, if the Resident lives in the University dormitory, after registering at http://connect.vdu.lt and using the Resident network code VVAQS4K0</td>
    <tr>
        <td class="numLarge">5.3.</td><td>other rights which are indicated in Internal Rules of the Dormitories of Vytautas Magnus University (hereinafter – Rules), Procedure and other internal legal acts of the University. </td>
    </tr>
    <tr>
        <td class="numLarge">6.</td><td>Duties of the Resident: </td>
    </tr>
    <tr>
        <td class="numLarge">6.1.</td><td>By moving into the Place of Residence, the Resident shall make sure that it is clean and orderly, that the University’s individual usage inventory and equipment which is granted for the Resident for the period of residence is undamaged, is functioning and is in a condition for safe operation. In case of any observed compliance failure the Resident shall notify the University (Dormitory) administration. All of the complaints on the cleanliness of the Place of Residence, damage or malfunctioning will not be accepted later than 24 hours after accommodation procedures. </td>
    </tr>
    <tr>
        <td class="numLarge">6.2.</td><td>During the period covered by the Agreement the Resident shall use the Residence only for its intended purposes and take care of it as well as of the University equipment, inventory and any other property in the residential and common areas, shall act in compliance with fire-safety regulations and other legal acts and rules related to both the exploitation of the Residence and the common areas in such a way that the condition of the place of Residence would be of the same condition as it was before assigning it to the Resident as much as possible;</td>
    </tr>
    <tr>
        <td class="numLarge">6.3.</td><td>The Resident shall pay the charge for the accommodation in the Residence in time and in accordance with the conditions defined in the Agreement; </td>
    </tr>
    <tr>
        <td class="numLarge">6.4.</td><td>The Resident shall obey the legal requirements of the University (Dormitory) executives;</td>
    </tr>
    <tr>
        <td class="numLarge">6.5.</td><td>The Resident shall personally familiarise with and present the Rules to his/her guests and take responsibility for breaking the rules either personally or by his/her guests in the Place of Residence and common areas;</td>
    </tr>
    <tr>
        <td class="numLarge">6.6.</td><td>In case the Resident breaches the obligations indicated in this Agreement or neglects the duties, responsibilities and prohibitions provided in Rules, he/she shall be responsible for his/her actions in accordance with the Agreement regulations and, on demand of the University, shall pay the penalty which equals forfeit and the amount of which is defined by the Rector’s order. The Resident shall compensate the damage experienced by the University through the Resident’s or his/her guests’ fault, non-compliance or inappropriate compliance with the duties indicated in this Agreement or Rules. The Resident shall also compensate the damage to the third party if it occurred because of the Resident’s or his/her guest’s fault or negligence. </td>
    </tr>
    <tr>
        <td class="numLarge">6.7.</td><td>The Resident shall not accommodate strangers in the Place of Residence on his/her own will, dispose the University property or otherwise allow them to use the property or the Place of Residence. The University has the right: </td>
    </tr>
    <tr>
        <td class="numLarge">7.</td><td>The University has the right: </td>
    </tr>
    <tr>
        <td class="numLarge">7.1,</td><td>In accordance with the conditions indicated in the Agreement, to impose penalties and require the forfeit and compensation of damage from the Resident for the negligence of or inappropriate treatment of commitments, in case the Resident or his/her guest, which the Resident is responsible for, breach the regulations which are indicated in this Agreement or Rules. </td>
    </tr>
    <tr>
        <td class="numLarge">7.2.</td><td>To move Resident from one room to another or from one dormitory to another, after a prior notification, in case of reconstructing, renovating or restructuring the dormitory, as well as for a rational management of the premises, to achieve energy savings, to develop utilities, in case of conflicts between residents or to ensure the compliance of hygiene standards. </td>
    </tr>
    <tr>
        <td class="numLarge">7.3.</td><td>After a prior notification to the Resident unilaterally change the size of the charge for accommodation and any other fees and conditions related to accommodation, that are determined in the Agreement and internal legal acts of the University. </td>
    </tr>
    <tr>
        <td class="numLarge">7.4.</td><td>Other rights, which are laid down in Rules, Procedure and other internal legal acts of the University.</td>
    </tr>
    <tr>
        <td class="numLarge">8.</td><td>Duties of the University:</td>
    </tr>
    <tr>
        <td class="numLarge">8.1.</td><td>To provide the Resident with a tidy Place of Residence;</td>
    </tr>
    <tr>
        <td class="numLarge">8.2.</td><td>To assign the property related to accommodation to the Resident, according to the conditions and terms indicated herein; </td>
    </tr>
    <tr>
        <td class="numLarge">8.3.</td><td>To remove inventory faults and ensure the operation of engineering systems and other equipment, after timely report of the Resident;</td>
    </tr>
    <tr>
        <td class="numLarge">8.4.</td><td>To take care of comfortable life, study and relaxation conditions and the suitable environment for the Resident.</td>
    </tr>
</table>

<p class="centerTextPart larger">IV. VALIDITY, AMENDMENT AND TERMINATION OF THE AGREEMENT</p>

<table class="listTableLarge">
    <tr>
        <td class="numLarge">9.</td><td>This Agreement shall be in force from the date of the Resident’s settlement, which is recorded by the University (Dormitory) executive, and shall be valid until June 30th, 2019 or until the day of moving out of the Residence, recorded by the University (Dormitory) administration. </td>
    </tr>
    <tr>
        <td class="numLarge">10.</td><td>The Resident has to move out of the Place of Residence by the last day of the validity date of the Agreement, in case of its premature termination, the Resident has to move out of the Place of Residence within the time limit set by University's Administration</td>
    </tr>
    <tr>
        <td class="numLarge">11.</td><td>The Agreement shall be terminated prematurely :</td>
    <tr>
        <td class="numLarge">11.1.</td><td>Under bilateral agreement of the Parties; </td>
    </tr>
    <tr>
        <td class="numLarge">11.2.</td><td>If the Resident disagrees with the change of accommodation fees or conditions, the Agreement shall be terminated from the date of the changes of accommodation fees or conditions entering into force. </td>
    </tr>
    <tr>
        <td class="numLarge">11.3.</td><td>Unilaterally by one of the Parties having announced this to another Party not less than 5 (five) working days before the termination and indicating the date and reason of the Agreement termination. </td>
    </tr>
    <tr>
        <td class="numLarge">11.4.</td><td>Without additional notice if the Resident is expelled from or terminates the studies at the University or if new circumstances arise, because of which the Resident has no legitimate ground to be in the territory of the Republic of Lithuania;</td>
    </tr>
    <tr>
        <td class="numLarge">11.5.</td><td>In compliance to the court’s decision.</td>
    </tr>
    <tr>
        <td class="numLarge">12.</td><td>After the expiry or premature termination of the Agreement and if the Resident does not move out of the room during the set term he/she has to pay the daily fee for every day after the term as a penalty for violating an Agreement for Accommodation, which is 10 (ten) times bigger than the previous daily fee, set in the previous Agreement for Accommodation. If the Resident does not move out, does not free up and does not transfer his/her Residence place to the responsible executives of the University (Dormitory) in 14 calendar days, the University has a right to address law enforcement authorities for forced eviction and after 30 (thirty) calendar days – to a court of law. </td>
    </tr>
    <tr>
        <td class="numLarge">13.</td><td>All written changes, amendments and annexes are inseparable parts of the Agreement, which are in force upon signing them by both Parties. </td>
    </tr>
</table>

<br />

<div style="page-break-before: always;"></div>

<img class="topImage" src="https://resources.vdu.lt/images/vdu_pdf_header.png" />

<p class="centerTextPart larger" >V. CONCLUDING PROVISIONS</p>

<table class="listTableLarge">
    <tr>
        <td class="numLarge">14.</td><td>This Agreement is composed and shall be interpreted according to the law of the Republic of Lithuania. </td>
    </tr>
    <tr>
        <td class="numLarge">15.</td><td>If this Agreement and publicly announced internal legal acts of the University regulate the same practices differently, higher power belongs to the provisions of the publicly announced internal legal acts of the University. </td>
    </tr>
    <tr>
        <td class="numLarge">16.</td><td>Any dispute arising in connection with this Agreement or related to it is resolved in the local court of the University headquarters following the procedures established by the law of the Republic of Lithuania, unless it is resolved in 14 (fourteen) calendar days in negotiation after one of the Parties makes a claim. </td>
    </tr>
    <tr>
        <td class="numLarge">17.</td><td>Upon signing the Agreement, the Resident confirms that he/she is familiar with the Description, Rules and promises to obey them. </td>
    </tr>
    <tr>
        <td class="numLarge">18.</td><td>Upon signing the Agreement, the Resident agrees that:</td>
    </tr>
    <tr>
        <td class="numLarge">18.1.</td><td>for the security purposes he/she would be under video-surveillance in the territory and com-mon areas of the Dormitory;</td>
    </tr>
    <tr>
        <td class="numLarge">18.2.</td><td>his/her personal data would be processed at Vytautas Magnus university (code 111950396, address: K. Donelaičio g. 58, 44248, Kaunas), in order to create favourable accommodation condi-tions, for accessing to information about accommodation services that are provided by VMU and other purposes related to accommodation. </td>
    </tr>
    <tr>
        <td class="numLarge">19.</td><td>This Agreement has been executed in two original copies with equal legal power, one copy for each Party. Both Parties have read the Agreement. The Parties understood its content and consequences and have signed this Agreement as a document, which corresponds to their true will, aims and intentions. Under the agreement between the Parties, the electronic form of the Agreement is treated as a written form. </td>
    </tr>
</table>

<p class="centerTextPart larger">REQUISITES AND SIGNATURES OF THE PARTIES</p>
<br />
<table class="bottomTable">
    <tr>
        <td class="textTop">
            <u>University:</u><br />
            Vytautas Magnus University<br />
            K. Donelaicio g. 58, LT-44248 Kaunas<br />
            Code 111950396 <br />
            VAT identifier LT119503917<br />
            Tel.: +370 37 751 175 <br />
            E-mail: info@studentas.vdu.lt<br />
        </td>
        <td class="textTop">
            <u>Resident</u><br />
            {{$bpoPakviestiEsign->vardas}}{{$bpoPakviestiEsign->pavarde}}<br />
            Address: {{$bpoPakviestiEsign->gyvvieta}}<br />
            Tel.: {{$bpoPakviestiEsign->pirmas_telef}}<br />
            E-mail: {{$bpoPakviestiEsign->elpastas}}<br />

        </td>
    </tr>
</table>

@if ($agreement->agreement_date)
    <p class="centerTextPart larger">ŠALIŲ PARAŠAI</p>
    <br />
    <table class="bottomTable">
        <tr>
            <td class="textTop">
                <b>Director of the Office of Student Affairs department</b><br /><br />
                <b>MANTAS SIMANAVIČIUS</b><br />
                <img class="sign" src="https://resources.vdu.lt/pictures/simanavicius_parasas.png">  </img>

            </td>
            <td class="textTop">
                <b>This document was electronically approved by</b><br />
                <b>{{$bpoPakviestiEsign->vardas}} {{$bpoPakviestiEsign->pavarde}}</b>
                <b>{{$agreement->agreement_date}}</b>
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


<p class="centerTextPart larger" >INTERNAL RULES OF THE DORMITORIES OF VYTAUTAS MAGNUS UNIVERSITY</p>
<p class="centerTextPart larger" >I. GENERAL PROVISIONS </p>

<table class="listTableLarge">
    <tr>
        <td class="numLarge">1.</td><td> Internal Rules (hereinafter - Rules) of the Dormitories of Vytautas Magnus University (hereinafter - University) define the internal order in the University's dormitories and the rights, duties and responsibilities of the person who makes Agreement for Accommodation (hereinafter - Resident) with the University. </td>
    </tr>
</table>

<p class="centerTextPart larger" >II. RIGHTS AND DUTIES OF A RESIDENT</p>

<table class="listTableLarge">
    <tr>
        <td class="numLarge">2.</td><td>Resident has rights:</td>
    </tr>
    <tr>
        <td class="numLarge">2.1.</td><td>To make proposals to the executives of the University with respect to improvement of life, work and rest conditions, cleanliness of the residence, as well as the procedures of accommodation and their improvement; </td></tr>
    <tr>
        <td class="numLarge">2.2.</td><td>To accept visitors during the period of time from 7:00 to 24:00;</td>
    </tr>
    <tr>
        <td class="numLarge">2.3.</td><td>To accommodate guests on the basis of procedures established by the University. </td>
    </tr>
    <tr>
        <td class="numLarge">2.4.</td><td>To enter and exit the dormitory freely any time; </td>
    </tr>
    <tr>
        <td class="numLarge">2.5.</td><td>To demand for timely elimination of current breakdowns; </td>
    </tr>
    <tr>
        <td class="numLarge">2.6</td><td>Elect or to be elected to the Dormitory's self-government structures;</td>
    </tr>
    <tr>
        <td class="numLarge">2.7.</td><td>To inform executives of the University as well as executives of the dormitory, in which resident lives, Dormitory self-government, Student's representative council of the University on notice of cases or actions when the dormitory Resident(s) do not obey these Contractual obligations, the Rules or the living norms regulated by the University or Lithuanian legislations and norms acceptable to the society. </td>
    </tr>
    <tr>
        <td class="numLarge">3.</td><td>Resident is obliged: </td>
    </tr>
    <tr>
        <td class="numLarge">3.1.</td><td>To familiarize with these Rules, to follow them and to comply with the norms indicated in the legal acts of the Republic of Lithuania as well as living norms acceptable to the society; </td>
    </tr>
    <tr>
        <td class="numLarge">3.2.</td><td>To pay the fee (s) related to accommodation on time; </td>
    </tr>
    <tr>
        <td class="numLarge">3.3.</td><td>Having broken or damaged equipment, inventory or other property or having noticed their damage, to inform the University Dormitory executives urgently and, if found, to pay compensation for damage to the University; </td></tr>
    <tr>
        <td class="numLarge">3.4.</td><td>To keep still from 10 p.m. to 6 a.m.; </td>
    </tr>
    <tr>
        <td class="numLarge">3.5.</td><td>To not violate the rights and legal interests of other Residents; </td>
    </tr>
    <tr>
        <td class="numLarge">3.6.</td><td>To maintain cleanliness and sanitary hygiene norms; </td>
    </tr>
    <tr>
        <td class="numLarge">3.7.</td><td>To save energy sources; </td>
    </tr>
    <tr>
        <td class="numLarge">3.8.</td><td>To make the room available for checks by the University and Dormitory, in which Resident is accommodated, executives or special service officers upon their reasonable request at any time; </td>
    </tr>
    <tr>
        <td class="numLarge">3.9</td><td>To save and take care of him/herself as well as the personal belongings left in the Residence or the public (common) areas of the dormitory; </td>
    </tr>
    <tr>
        <td class="numLarge">3.10.</td><td>To be responsible for the actions of his/her guests in the dormitory and for the safety of their left belongings;</td>
    </tr>
    <tr>
        <td class="numLarge">3.11.</td><td>To maintain cleanliness and order, to maintain and protect equipment, inventory and other property in the Residence or the public (common) areas of the dormitory; </td>
    </tr>
    <tr>
        <td class="numLarge">3.12.</td><td>To fulfil obligations set by the University to the Resident, that are related to the maintenance of cleanliness and order in public (common) areas; </td>
    </tr>
    <tr>
        <td class="numLarge">3.13.</td><td>To fulfil the other requirements, that are set by the University and dormitory in which Resident is accommodated, administration, dormitory's self-governance and Office of Student Affairs (hereinafter - OSA) of the University, and that are related with accommodation in the dormitory. </td>
    </tr>
    <tr>
        <td class="numLarge">3.14.</td><td>To comply with the norms indicated in the legal acts of the Republic of Lithuania as well as living norms acceptable to the society. </td>
    </tr>
    <tr>
        <td class="numLarge">4.</td><td>A Resident is prohibited:</td>
    </tr>
    <tr>
        <td class="numLarge">4.1.</td><td>To move to another room in the dormitory upon his/her own will; </td>
    </tr>
    <tr>
        <td class="numLarge">4.2.</td><td>To distribute and (or) overuse alcoholic drinks or to use them in the public (common) areas of the dormitory; </td>
    </tr>
    <tr>
        <td class="numLarge">4.3.</td><td>To possess, distribute bring and (or) use drugs, psychotropic or other psychoactive substances; </td>
    </tr>
    <tr>
        <td class="numLarge">4.4.</td><td>To pollute and litter public (common) areas and the dormitory surroundings;</td>
    </tr>
    <tr>
        <td class="numLarge">4.5.</td><td>To smoke, except in the specially designed places; </td>
    </tr>
    <tr>
        <td class="numLarge">4.6.</td><td>To use dormitory premises for economic or commercial activities;</td>
    </tr>
    <tr>
        <td class="numLarge">4.7.</td><td>To insult, treat badly or threaten the University and Dormitory, where the Resident is accommodated, executives, other Residents and (or) guests; </td>
    </tr>
    <tr>
        <td class="numLarge">4.8.</td><td>To bring in, possess and use guns, other explosives or flammable materials, that are dangerous for life and (or) health; </td>
    </tr>
    <tr>
        <td class="numLarge">4.9.</td><td>To damage the property and (or) inventory in the territory of the Dormitory, to move inventory upon his/her own will from one premise to another; </td>
    </tr>
    <tr>
        <td class="numLarge">4.10.</td><td>To accommodate outsiders;</td>
    </tr>
    <tr>
        <td class="numLarge">4.11.</td><td>To keep animals in the dormitory premises;</td>
    </tr>
    <tr>
        <td class="numLarge">4.12.</td><td>To perform repair work in the room without the permission of the University (Dormitory) executives; </td>
    </tr>
    <tr>
        <td class="numLarge">4.13.</td><td>To use electric heating and other appliances with a total voltage of more than 2 KW per room; </td>
    </tr>
    <tr>
        <td class="numLarge">4.14.</td><td>To glue clippings, posters, photos, etc. in the places which are not designated for this purpose without informing the University (Dormitory) executives; </td>
    </tr>
    <tr>
        <td class="numLarge">4.15.</td><td>To engage in other activities that could damage the Dormitory or harm its administration or Residents, as well as the name and prestige of Vytautas Magnus University. </td>
    </tr>
</table>

<p class="centerTextPart larger" >III. RESPONSIBILITY FOR VIOLATING THE RULES</p>

<table class="listTableLarge">
    <tr>
        <td class="numLarge">5.</td><td>For violation of these Rules, denial or incorrect fulfillment of obligations dissuasive penalties shall be assigned in accordance to the Procedure for University residences administration. </td>
    </tr>
    <tr>
        <td class="numLarge">6.</td><td>The decisions regarding dissuasive measures for Resident, shall be announced publicly at the University; the Resident shall be informed by the Office of Student Affairs by sending a notice to the Resident's personal email box on the University's intranet system and any other email box which is known to the Office of Student Affairs. The Resident can also get acquainted with the dissuasive measures and (or) forfeit in written form at the Office of Student Affairs. </td>
    </tr>
</table>

<p class="centerTextPart larger" >IV. FINAL PROVISIONS</p>

<table class="listTableLarge">
    <tr>
        <td class="numLarge">7.</td><td>These rules shall be amended and (or) updated by the University Rector's order and shall take effect upon the date of approval by the University Rector's order. </td>
    </tr>
</table>
