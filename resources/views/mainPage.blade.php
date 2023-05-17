@include ('layouts/main')

@yield ('scripts')
@yield ('header')

{{Breadcrumbs::render('epasirasymas')}}

<div class="container-fluid">
    <h5>Priėmimas ir e-sutarčių pasirašymas</h5>
    <p> Dėl techninių nesklandumų ar klausimų prašome kreiptis:</p>
    <p>Dėl bakalaurų: <b><a href="giedrius.brusokas@vdu.lt"> Giedrius Brusokas</a> </b></p>
   <p>Dėl magistrų: <b> <a href="mantas.garliauskas@vdu.lt"> Mantas Garliauskas</a> </b></p>
</div>

@yield('footer')