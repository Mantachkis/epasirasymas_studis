@include ('layouts.main')
@yield ('scripts')
@yield ('header')
@yield('js')

<div class="container-fluid">
    <div class="row">
        <h5>Paraiška studijų fondo stipendijai gauti</h5><br /><br />
        <table class="table">
            <thead>
                <tr>
                    <th>Pateikta</th>
                    <th>Studentas</th>
                    <th>Telefonas</th>
                    <th>Programa</th>
                    <th>Balas</th>
                    <th>Motyvacinis laiškas</th>
                    <th>Failai</th>
                </tr>
            </thead>
            <tbody>
                @forelse($results as $result)
                <tr>
                    <td>{{date('Y-m-d', strtotime($result->submit_date))}}</td>
                    <td>{{$result->studentas}}</td>
                    <td>{{$result->tel}}</td>
                    <td>{{$result->prog}}</td>
                    <td>{{$result->paz}}</td>
                    <td><p><small>{{$result->motyv}}</small></p></td>
                    <td>@if($result->failas != '')<a href="{{$result->failas}}" target="blank">Parsisiųsti</a>@endif</td>
                </tr>
                @empty
                @endforelse
            </tbody>
        </table>
    </div>
</div>