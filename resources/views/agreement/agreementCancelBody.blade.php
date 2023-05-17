<p>{{$agreement->vardas}} {{$agreement->pavarde}} ({{$agreement->programos_pavadinimas}})
@if ($agreement->agreement->agreement_status == 'AS0003')
    <b>Sutartis yra nutraukta!</b>
@endif
</p>
