@if (count($programs) == 0)
    <div class="alert alert-danger">
        Nieko nerasta!
    </div>
@else
<table class="table table-hover">
    <thead class="thead-dark">
    <tr><th colspan="7">Atrinktos programos</th></tr>
    <tr>
        <th>VDU pavadinimas</th>
        <th>Pavadinimas sutartyje</th>
        <th>Kodas</th>
        <th>Metai</th>
        <th>Fakultetas</th>
        <th>Pakopa</th>
        <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($programs as $program)
    <tr>
        <td>
            @if ($program->luadmProgramma)
                {{$program->luadmProgramma->pnosauk}}
            @else
                ---
            @endif
        </td>
        <td>{{$program->pp_prog_pavad}}</td>
        <td>{{$program->pp_valst_kodas}}</td>
        <td>{{$program->pp_metai}}</td>
        <td>{{$program->pp_fakultetas}}</td>
        <td>
            @if ($program->luadmProgramma)
                {{$program->luadmProgramma->tipsLimenis->tnosauk}}
            @else
                ---
            @endif</td>
        <td><input type="radio" class="programRadio" name="program" value="" data-prog-name="{{$program->pp_prog_pavad}}" data-lama-kods="" data-prog-kods="" data-pkods-kods="" data-prog-year="{{$program->pp_metai}}" data-prog-id="{{$program->bpo_id}}" /></td>
    </tr>
    @endforeach
    </tbody>
</table>
@endif
