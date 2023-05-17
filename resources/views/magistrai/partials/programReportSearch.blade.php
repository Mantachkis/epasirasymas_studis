@section('programReportSearch')

<div class="row">
    <div class="card mb-2">
        <div class="card-body" style="width:95rem;">
            <div class="form-row">
                <div class="form-group ml-3">
                    <select class="form-control" id="program-select" name="program">
                        <!--<option value="l0000"> Visos </option>-->
                        @foreach($programs as $k => $program)
                            <option value="{{$program->sp_progr_id}}" @if (!empty($setProgram) && $setProgram == $program->sp_progr_id) selected @endif> {{$program->sp_progr_pavad}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group ml-3">
                    <select class="form-control" id="year-select" name="year">
                        <option disabled selected> Pasirinkite metus </option>
                        @for($i = 2017; $i <= date('Y'); $i++)
                            @if($i == $year)
                                <option value="{{$i}}" selected> {{$i}}</option>
                            @else
                                <option value="{{$i}}"> {{$i}} </option>
                            @endif
                        @endfor
                    </select>
                </div>
                <div class="form-group ml-3">
                    <select class="form-control" id="report-type-select" name="report-type">
                        <!--<option disabled selected> Pasirinkite ataskaitos tipą </option>-->
                        @foreach($reportTypes as $k => $reportType)
                            <option value="{{$k}}" @if(!empty($type) && $type == $k) selected @endif> {{$reportType}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group ml-3 col-md-2">
                    <select class="form-control" id="stage_select" name="stage">
                        <!--<option disabled selected> Etapas </option>-->
                        @if(!empty($stage))
                            @for($i = 1; $i <= 3; $i++)
                                @if($i == $stage)
                                    <option value="{{$i}}" selected> {{$i}} </option>
                                @else
                                    <option value="{{$i}}"> {{$i}} </option>
                                @endif
                            @endfor
                        @else
                            @for($i = 1; $i <= 3; $i++)
                                <option value="{{$i}}"> {{$i}} </option>
                            @endfor
                        @endif
                    </select>
                </div>
                <div class="form-group ml-3">
                    <button type="submit" class="btn btn-dark ml-3" id="submit-btn"> Ieškoti </button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $('#submit-btn').click(function(){
        var year = $("#year-select").val();
        var program = $("#program-select").val();
        var report = $("#report-type-select").val();
        var stage = $("#stage_select").val();
        // window.location.href = "/epasirasymas/ataskaitos/programu/"+year+"/"+program+"/"+report+"/"+stage;
        window.location.href = "/epasirasymas_studis/public/ataskaitos/programu/"+year+"/"+program+"/"+report+"/"+stage;
    });
</script>
@endsection
