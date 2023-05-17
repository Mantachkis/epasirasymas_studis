@include('layouts.main')
@yield('scripts')
@yield('header')
@yield('js')
{{Breadcrumbs::render()}}
<div class="container">
    <div class="row">
        <div class="col-md-2 mb-2">
            <label for="year_sel"> <b>Metai</b> </label>
            <select class="form-control" id="year_sel" name="year">
                @for($i = date('Y'); $i >= 2020; $i--)
                    @if($year == $i)
                        <option value="{{$i}}" selected> {{$i}} </option>
                    @else
                        <option value="{{$i}}"> {{$i}} </option>
                    @endif
                @endfor
            </select>
        </div>
        <!--<div class="col-md-2" style="margin-top:2rem;">
            <button type="button" class="btn btn-dark"> Generuoti eilę</button>
        </div>
        <div class="col-md-2" style="margin-top:2rem;">
            <button type="button" class="btn btn-dark"> Išvalyti eilę</button>
        </div>
        <div class="col-md-2" style="margin-top:2rem;">
            <button type="button" class="btn btn-dark"> Anketų užrakinimas?</button>
        </div>-->
    </div>
    <form action="{{route('epasirasymas.settings.magistrai.stage.update', ['year' => $year])}}" method="POST">
        {{csrf_field()}}
       <div class="row">
            <table class="table">
                <thead>
                <tr>
                    <th colspan="20"> Magistrai </th>
                </tr>
                <tr>
                    <th> Etapas </th>
                    <th> Koreguoti duomenis </th>
                    <th> Suvesti balus </th>
                    <th> Sutartys </th>
                    <th> Aktyvus etapas </th>
                    <th> Sutarties pasirašymo pradžia</th>
                    <th> Sutarties pasirašymo pabaiga </th>
                </tr>
                </thead>
                <tbody>
                @if($stages->count() != 0)
                    @foreach($stages as $stage)
                        <tr data-stage="{{$stage->stage}}">
                            <td> {{$stage->stage}}</td>
                            <td> <input type="checkbox" name="edit[]" value="{{$stage->stage}}" @if($stages->where('stage', $stage->stage)->first()->edit == 'Y') checked @endif> </td>
                            <td> <input type="checkbox" name="grades[]" value="{{$stage->stage}}" @if($stages->where('stage', $stage->stage)->first()->grades == 'Y') checked @endif> </td>
                            <td> <input type="checkbox" name="agreement[]" value="{{$stage->stage}}" @if($stages->where('stage', $stage->stage)->first()->agreement == 'Y') checked @endif> </td>
                            <td> <input type="radio" name="is_current[]" value="{{$stage->stage}}" @if($stages->where('stage', $stage->stage)->first()->is_current == 'Y') checked @endif></td>
                            <td> <input class="form-control datepicker" id="valid-from-{{$stage->stage}}" type="text" name="valid_from[]" value="{{date('Y-m-d', strtotime($stages->where('stage', $stage->stage)->first()->agreement_valid_from)) ?? ''}}" autocomplete="off"></td>
                            <td> <input class="form-control datepicker" id="valid-until-{{$stage->stage}}" type="text" name="valid_until[]" value="{{date('Y-m-d', strtotime($stages->where('stage', $stage->stage)->first()->agreement_valid_until)) ?? ''}}" autocomplete="off"></td>
                        </tr>
                    @endforeach
                @else
                    <tr> <td colspan="20"> Nėra sukurtų etapų </td> </tr>
                @endif
                </tbody>
                <thead>
                    <tr><th colspan="20">Pedagogai</th></tr>
                </thead>
                <tbody>
                @if($pedStages->count() != 0 )
                    @foreach($pedStages as $stage)
                        <tr data-stage="{{$stage->stage}}">
                            <td> {{$stage->stage}}</td>
                            <td> <input type="checkbox" name="ped-edit[]" value="{{$stage->stage}}" @if($pedStages->where('stage', $stage->stage)->first()->edit == 'Y') checked @endif> </td>
                            <td> <input type="checkbox" name="ped-grades[]" value="{{$stage->stage}}" @if($pedStages->where('stage', $stage->stage)->first()->grades == 'Y') checked @endif> </td>
                            <td> <input type="checkbox" name="ped-agreement[]" value="{{$stage->stage}}" @if($pedStages->where('stage', $stage->stage)->first()->agreement == 'Y') checked @endif> </td>
                            <td> <input type="radio" name="ped-is_current[]" value="{{$stage->stage}}" @if($pedStages->where('stage', $stage->stage)->first()->is_current == 'Y') checked @endif></td>
                            <td> <input class="form-control datepicker" id="valid-from-{{$stage->stage}}" type="text" name="ped-valid_from[]" value="{{date('Y-m-d', strtotime($pedStages->where('stage', $stage->stage)->first()->agreement_valid_from)) ?? ''}}" autocomplete="off"></td>
                            <td> <input class="form-control datepicker" id="valid-until-{{$stage->stage}}" type="text" name="ped-valid_until[]" value="{{date('Y-m-d', strtotime($pedStages->where('stage', $stage->stage)->first()->agreement_valid_until)) ?? ''}}" autocomplete="off"></td>
                        </tr>
                    @endforeach
                @else
                    <tr> <td colspan="20"> Nėra sukurtų etapų </td> </tr>
                @endif
                </tbody>
            </table>
        </div>
        <div class="row justify-content-center">
            <button type="submit" class="btn btn-dark ml-3 text-center"> Tvirtinti </button>
        </div>
    </form>
</div>
<script>
    $(document).ready(function() {
        let currStage = $("input[name='is_current[]']:checked").val();
        let pedStage = $("input[name='ped-is_current[]']:checked").val();
        disableAllRowsExceptCurrent(currStage);
        disableAllPedRowsExceptCurrent(pedStage);

        if($("input[name='agreement[]'][value='"+currStage+"'").is(':checked')) {
            disableEditingAndGrades(currStage);
        }
        if($("input[name='ped-agreement[]'][value='"+pedStage+"']").is(':checked')) {
            disablePedEditingAndGrades(pedStage);
        }
    });
    $("#year_sel").change(function(){
        let year = $(this).val();
        window.location.href="/epasirasymas/nustatymai/magistrai/etapai/"+year;
    });
    $(".datepicker").datepicker({
        format: 'yyyy-mm-dd',
        orientation: 'bottom',
        language: 'lt',
        setDate: '',
    });
    $("input[name='is_current[]']").change(function() {
       let stageVar = $(this).val();
       disableAllRowsExceptCurrent(stageVar);
    });
    $("input[name='ped-is_current[]']").change(function() {
        let stageVar = $(this).val();
        disableAllPedRowsExceptCurrent(stageVar);
    });

    function disableControlRow(stage) {
        $("input[name='edit[]'][value='"+stage+"']").prop('checked', false).prop('disabled', true);
        $("input[name='grades[]'][value='"+stage+"']").prop('checked', false).prop('disabled', true);
        $("input[name='agreement[]'][value='"+stage+"']").prop('checked', false).prop('disabled', true);
        /*$("#valid-from-"+stage).prop('disabled', true); // leaving just in case it may be needed in future
        $("#valid-until-"+stage).prop('disabled', true);*/
    }
    function enableControlRow(stage) {
        $("input[name='edit[]'][value='"+stage+"']").prop('disabled', false);
        $("input[name='grades[]'][value='"+stage+"']").prop('disabled', false);
        $("input[name='agreement[]'][value='"+stage+"']").prop('disabled', false);
        /*$("#valid-from-"+stage).prop('disabled', false); // leaving just in case it may be needed in future
        $("#valid-until-"+stage).prop('disabled', false);*/
    }
    function disablePedControlRow(stage) {
        $("input[name='ped-edit[]'][value='"+stage+"']").prop('checked', false).prop('disabled', true);
        $("input[name='ped-grades[]'][value='"+stage+"']").prop('checked', false).prop('disabled', true);
        $("input[name='ped-agreement[]'][value='"+stage+"']").prop('checked', false).prop('disabled', true);
        /*$("#valid-from-"+stage).prop('disabled', true); // leaving just in case it may be needed in future
        $("#valid-until-"+stage).prop('disabled', true);*/
    }
    function enablePedControlRow(stage) {
        $("input[name='ped-edit[]'][value='"+stage+"']").prop('disabled', false);
        $("input[name='ped-grades[]'][value='"+stage+"']").prop('disabled', false);
        $("input[name='ped-agreement[]'][value='"+stage+"']").prop('disabled', false);
        /*$("#valid-from-"+stage).prop('disabled', false); // leaving just in case it may be needed in future
        $("#valid-until-"+stage).prop('disabled', false);*/
    }
    function getStageNames() {
        return ['1', '2', '3', '1PED','3PED'];
    }
    function disableAllRowsExceptCurrent(currStage) {
        let stages = getStageNames();
        for (let i = 0; i < stages.length; i++) {
            if(i == currStage) {
                enableControlRow(i);
                continue;
            }
            disableControlRow(i);
        }
    }
    function disableAllPedRowsExceptCurrent(pedStage) {
        let stage1 = '1PED';
        let stage2 = '3PED';

            if(stage1 == pedStage) {
                enablePedControlRow(stage1);
                disablePedControlRow(stage2);

            }else if(stage2 == pedStage){
                enablePedControlRow(stage2);
                disablePedControlRow(stage1);
            }
    }
    function getCurrStage() {
        return $("input[name='is_current[]']:checked").val();
    }
    function getCurrPedStage() {
        return $("input[name='ped-is_current[]']:checked").val();
    }
    $("input[name='agreement[]']").change(function() {
        let stage = getCurrStage(); // in theory the enabled checkbox should align with the active stage
        if($(this).is(':checked', true)) {
            disableEditingAndGrades(stage);
        } else {
            enableEditingAndGrades(stage);
        }
    });

    $("input[name='ped-agreement[]']").change(function() {
        let stage = getCurrPedStage(); // in future ped programs may have extra stages
        if($(this).is(':checked', true)) {
            disablePedEditingAndGrades(stage);
        } else {
            enablePedEditingAndGrades(stage);
        }
    });


    function enableEditingAndGrades(stage) {
        $("input[name='edit[]'][value='"+stage+"'], input[name='ped-edit[]'][value='"+stage+"']").prop('disabled', false);
        $("input[name='grades[]'][value='"+stage+"'], input[name='ped-grades[]'][value='"+stage+"']").prop('disabled', false);
    }

    function disableEditingAndGrades(stage) {
        $("input[name='edit[]'][value='"+stage+"'], input[name='ped-edit[]'][value='"+stage+"']").prop('disabled', true);
        $("input[name='grades[]'][value='"+stage+"'], input[name='ped-grades[]'][value='"+stage+"']").prop('disabled', true);
    }

    function enablePedEditingAndGrades(stage) {
        $("input[name='ped-edit[]'][value='"+stage+"']").prop('disabled', false);
        $("input[name='ped-grades[]'][value='"+stage+"']").prop('disabled', false);
    }

    function disablePedEditingAndGrades(stage) {
        $("input[name='ped-edit[]'][value='"+stage+"']").prop('disabled', true);
        $("input[name='ped-grades[]'][value='"+stage+"']").prop('disabled', true);
    }
</script>
