@include ('layouts/main')
@include ('settings.partials.programEdit')
@yield ('scripts')
@yield ('header')
@yield('js')

{{Breadcrumbs::render()}}
@yield('programEditModal')
<div class="container-fluid">
    <input type="text" id="program-year" value="{{$year}}" hidden>
    <div class="row">
        <div class="col-md-4">
            <form id="studentSelForm">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="card mb-6">
                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group ml-3 col-md-4">
                                <select class="form-control" id="year_sel" name="year">
                                    @for($i = date('Y'); $i >= 2016; $i--)
                                        @if($year == $i)
                                            <option value="{{$i}}" selected> {{$i}} </option>
                                        @else
                                            <option value="{{$i}}"> {{$i}} </option>
                                        @endif
                                    @endfor
                                </select>
                            </div>
                            <div class="form-group ml-3 col-md-4">
                                <select class="form-control" id="stage_sel" name="stage">
                                    @for($i = 1; $i <= 3; $i++)
                                        @if($stage == $i)
                                            <option value="{{$i}}" selected> {{$i}} </option>
                                        @else
                                            <option value="{{$i}}"> {{$i}} </option>
                                        @endif
                                    @endfor
                                </select>
                            </div>
                            <div class="form-group ml-3">
                                <button type="submit"  class="btn btn-dark ml-3"> Ieškoti </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="col-md-4">
            @if($countPrograms<=50)
            <form action="{{route('epasirasymas.settings.magistrai.export', ['year' => $year])}}" id="program-export-form" method="GET">
                <button type="button"
                       type="" id="export-submit-btn" class="btn btn-dark"> Perimportuoti programas iš pirmo etapo į kitus metus </button>

            </form>
            @else
                <button type="" onclick="alert('Programos jau buvo perkeltos į kitus metus')"   id="export-submit-btn" class="btn btn-dark"> Perimportuoti programas iš pirmo etapo į kitus metus </button>
            @endif

            <form action="{{route('epasirasymas.settings.magistrai.program_create_base_view')}}"  method="GET">
            <button type="submit" id="add-new-program-btn" class="btn btn-dark mt-3"> Pridėti naują programą </button>
            </form>
        </div>
    </div>
    <div class="flash-message">
        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
            @if(Session::has('alert-' . $msg))
                <p class="alert alert-{{ $msg }} text-center">{{ Session::get('alert-' . $msg) }}</p>
            @endif
        @endforeach
    </div>
    <div class="row">
        <div class="table-responsive">
            <table class="table table-condensed" id="program-table">
                <thead>
                <tr>
                    <th> Pavadinimas </th>
                    <th> Valstybinis kodas </th>
                    <th> Minimali kvota </th>
                    <th> VF kvota </th>
                    <th> VNF Kvota </th>
                    <th> Kaina </th>
                    <th> Statusas </th>
                    <th> Balų suvedimas </th>
                </tr>
                </thead>
                <tbody>
                @if(!empty($programs))
                    @foreach($programs as $f => $program)
                        <tr data-program-id="{{$program->sp_progr_id}}">
                            <td> {{$program->sp_progr_pavad}} </td>
                            <td> {{$program->sp_valst_kodas}} </td>
                            <td> {{$program->sp_minimali_kvota ??0}}  </td>
                            <td> {{$program->sp_kvota_vf}} </td>
                            <td> {{$program->sp_kvota_vnf}} </td>
                            <td> {{$program->sp_kaina}} </td>
                            <td> {{is_null($program->sp_priemimas) ? 'Neaktyvi' : 'Aktyvi'}} {{is_null($program->sp_stabdomas_priemimas) ? '' : ' - Sustabdytas priėmimas'}}</td>
                            <td data-toggle="tooltip" data-placement="top"
                                title="Rodomi skaičiai yra bendri programoms su tuo pačiu valstybiniu kodu"> {{$program->getProgramEnteredGrades()}} / {{$program->getProgramCount()}} </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    $("#studentSelForm").submit(function()
    {
        event.preventDefault();
        var year = $("#year_sel").val();
        var stage = $("#stage_sel").val();
        window.location.href = "list/"+year+"/"+stage;
    });

    $("#program-table tr").click(function(){
        $.ajax({
            url: "{{route('epasirasymas.settings.magistrai.program_modal_content')}}",
            data:{
                'year': $("#year_sel").val(),
                'pkods': $(this).attr('data-program-id'),
                'stage': "{{$stage}}"
            }
        }).done(function(result){
            $("#program-edit-modal .modal-content").html(result);
            $("#program-edit-modal").modal('show');
        })
    });

    $(function () {
        $('[data-toggle="tooltip"]').tooltip({
            html: true
        });
    });
    @if($countPrograms<=50)
    $("#export-submit-btn").click(function(){
        if(confirm("Ar tikrai norite perkelti į kitus metus?")){
            $("#program-export-form").submit();
        }
    })
    @endif
</script>
