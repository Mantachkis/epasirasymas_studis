@include ('layouts.main')
@include('magistrai.partials.programStatisticsSearch')
@yield ('scripts')
@yield ('header')
@yield('js')

{{Breadcrumbs::render()}}
<div class="container-fluid">
    <div class="row">
        @yield('programStatisticsSearch')
        <div class="table-responsive">
            <table class="table" id="statistics-table">
                <thead>
                <tr>
                    <th><b>Programa</b> </th>
                    <th> Krypčių grupė </th>
                    <th> Kaina EUR</th>
                    @if(!empty($faculty)&& $faculty[0]=="all")
                    <th> Fakultetas </th>
                    @endif
                    <th> Minimali kvota </th>
                    <th> Po perskirstymo VF </th>
                    <th> Pateikę prašymus I prioritetu </th>
                    <th> Pasirašė VF </th>
                    <th> Pasirašė VNF </th>
                    <th> Viso pasirašiusių  </th>
                </tr>
                </thead>
                <tbody>
                @if(!empty($programs))
                    @foreach($programs as $program)
                        <tr>
                            <td>{{$program->sp_progr_pavad }}</td>
                            <td>{{$program->programma->tipsVirzieni->tnosauk??''}}</td>
                            <td>{{$program->sp_kaina}}</td>
                            @if(!empty($faculty)&& $faculty[0]=="all")
                            <td>{{$program->programma->strukturvStkods->stnosauk}}</td>
                            @endif
                            <td>{{$program->sp_minimali_kvota ??0}}</td>
                            <td>  {{$program->sp_kvota_vf ??0}}</td>
                            <td>{{$program->countFirstPriorityAplicationsByProgram($program->sp_progr_id,$program->sp_priemimas)}} </td>
                            <td>{{$program->countSignedAplications($program->sp_progr_id,'VF',$program->sp_priemimas)}}</td>
                            <td>{{$program->countSignedAplications($program->sp_progr_id,'VNF',$program->sp_priemimas)}}</td>
                            <td> {{$program->countTotalSignedAplications($program->sp_progr_id,$year)}}</td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    $(document).ready( function () {
        $('#statistics-table').DataTable({
            processing: true,
            serverside: true,
                paging: false,
            language:
                {
                    search: "Ieškoti:",
                    info: "Rodoma nuo _START_ iki _END_ įrašų",
                    zeroRecords: "Kriterijus atitinkančių įrašų nebuvo rasta",
                    emptyTable: "Nėra įrašų",
                    infoEmpty: "Rodoma nuo 0 iki 0 įrašų",
                },
            })


    } );
</script>
