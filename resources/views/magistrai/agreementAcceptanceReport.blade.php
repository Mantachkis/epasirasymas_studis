@include ('layouts.main')
@include('magistrai.partials.agreementAcceptanceSearch')
@yield ('scripts')
@yield ('header')
@yield('js')


{{Breadcrumbs::render()}}
<div class="container-fluid">
    <div class="row">
        @yield('search')
    </div>
    <div class="row">
        @if(!empty($url))
            <a href="{{$url}}"> Spauskite norint peržiūrėti ataskaitą </a>
        @endif
    </div>
</div>