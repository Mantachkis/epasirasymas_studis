@section('programStatisticsSearch')

    <div class="row">
        <div class="card mb-2">
            <div class="card-body" style="width:95rem;">
                <div class="form-row">
                    <div class="form-group ml-3 col-md-4">
                        <select class="form-control" id="faculty_select" name="faculty">
                            <option disabled selected> Pasirinkite Fakultetą </option>
                            <option value="all"> Visi fakultetai </option>
                            @foreach($faculties as $fac)
                                <option value="{{$fac->stkods}}" @if (!empty($select) &&  $select == $fac->stkods) selected @endif> {{$fac->stnosauk}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group ml-3">
                        <select class="form-control" id="year-select" name="year">
                            <option disabled selected> Pasirinkite metus </option>
                            @for($i = 2016; $i <= date('Y'); $i++)
                                @if($i == $year)
                                    <option value="{{$i}}" selected> {{$i}}</option>
                                @else
                                    <option value="{{$i}}"> {{$i}} </option>
                                @endif
                            @endfor
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
            var faculty = $("#faculty_select").val();
            var year = $("#year-select").val();
            var stage = $("#stage_select").val();
            // window.location.href = "/epasirasymas/ataskaitos/statistika/"+year+"/"+faculty+"/"+stage;
            window.location.href = "/epasirasymas_studis/public/ataskaitos/statistika/"+year+"/"+faculty+"/"+stage;
        });
    </script>
@endsection
