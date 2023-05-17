

@section('search')

<form id="studentSelForm">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="card mb-4">
        <div class="card-body">
            <div class="form-row">
                <div class="form-group ml-3 col-md-2">
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
                <div class="form-group ml-3 col-md-5">
                    <select class="form-control" id="program_select" name="program">
                        <!--<option disabled selected> Programa </option>-->
                        @if(!empty($program))
                            @foreach($programs as $prog)
                                @if($prog->sp_progr_id == $program)
                                    <option value="{{$prog->sp_progr_id}}" selected> {{$prog->sp_progr_pavad}}</option>
                                @else
                                    <option value="{{$prog->sp_progr_id}}"> {{$prog->sp_progr_pavad}}</option>
                                @endif
                            @endforeach
                        @else
                            @foreach($programs as $prog)
                                    <option value="{{$prog->sp_progr_id}}"> {{$prog->sp_progr_pavad}}</option>
                            @endforeach
                        @endif
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
                    <button type="submit" class="btn btn-dark ml-3"> Ieškoti </button>
                </div>
            </div>
        </div>
    </div>
</form>
<script>
    $(document).ready(function(){
        $("#year_sel").change(function()
        {
            {{--window.location.href = "/epasirasymas/magistrai/{{$subsite}}/"+$(this).val();--}}
            window.location.href = "/epasirasymas_studis/public/magistrai/{{$subsite}}/"+$(this).val();
        });

        $("#studentSelForm").submit(function()
        {
            event.preventDefault();
            var year = $("#year_sel").val();
            var program = $("#program_select").val();
            var stage = $("#stage_select").val();
            {{--window.location.href = "/epasirasymas/magistrai/{{$subsite}}/"+year+"/"+program+"/"+stage;--}}
            window.location.href = "/epasirasymas_studis/public/magistrai/{{$subsite}}/"+year+"/"+program+"/"+stage;
        });
    });
</script>
<style>

    .card-body>p{
        white-space: nowrap;
        margin-bottom:0;
        font-size:12px;
    }
    .card-body-low-padding{
        max-width:initial;
        z-index: 0;
        padding-top:0.1rem;
        padding-bottom:0.1rem;
    }
    #coefBtn{
        margin-top:1.7rem;
    }
</style>
@endsection
