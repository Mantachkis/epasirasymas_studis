@include ('layouts/main')
@include ('settings.partials.coeficientEditModal')
@yield ('scripts')
@yield ('header')
@yield('js')

{{Breadcrumbs::render()}}
<div class="container-fluid">
    @yield('coefEditModal')
    <input type="text" id="program-year" value="{{$year}}" hidden>
    <div class="row">
        <div class="col-md-4">
            <form id="studentSelForm">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="card mb-4" style="width: 20rem">
                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group ml-3 col-md-4">
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
                            <div class="form-group ml-3">
                                <button type="submit" class="btn btn-dark ml-3"> Ieškoti </button>
                            </div>
                        </div>
                    </div>
                </div>
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
            <table class="table table-condensed" id="koeficient-table">
                <thead>
                    <tr>
                        <th> Programa</th>
                        <th> Valst. kodas</th>
                        <th> Konkursinio balo pavadinimas </th>
                        <th> Koef. </th>
                        <th> Konkursinio balo pavadinimas </th>
                        <th> Koef. </th>
                        <th> Konkursinio balo pavadinimas </th>
                        <th> Koef. </th>
                        <th> Konkursinio balo pavadinimas </th>
                        <th> Koef. </th>
                        <th> Konkursinio balo pavadinimas </th>
                        <th> Koef. </th>
                    </tr>
                </thead>
                <tbody style="font-size:12px;">
{{--                {{dd($coeficients)}}--}}
                    @foreach($coeficients as $code)
                        @if(count($code->masterSubjectCoef) < 1)
                            <tr style="background-color:rgba(255,73,73,0.2); border-top:none" data-program-code="{{$code->sp_valst_kodas}}">
                        @else
                            <tr style="border-top:none;" data-program-code="{{$code->sp_valst_kodas}}">
                        @endif
                            <td style="width:12rem;"> {{$code->sp_progr_pavad}} </td>
                            <td> {{$code->sp_valst_kodas}} <input type="hidden" name="pkods" value="{{$code->sp_progr_id}}"> </td>


                                @if($code->sp_valst_kodas == '6310MX006' )
                                    @foreach($code->masterSubjectCoef->where('pkods',$code->sp_progr_id) as $mark)
                                        <td>{{$mark->classification->description_lt}}</td>
                                        <td>{{number_format($mark->coef, 3, ',', null)}}</td>
                                    @endforeach
                                @else
                            @foreach($code->masterSubjectCoef as $mark)
                                <td>{{$mark->classification->description_lt}}</td>
                                <td>{{number_format($mark->coef, 3, ',', null)}}</td>
                            @endforeach
                                    @endif
                        </tr>
                    @endforeach
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
        window.location.href = "/epasirasymas/nustatymai/magistrai/koeficientai/"+year;
    });
    $("#koeficient-table tr").click(function(){
        var pkodsValue = $(this).find('input[name="pkods"]').val();
        $.ajax({
            url: "{{route('epasirasymas.settings.magistrai.coeficient_program_content')}}",
            data:{
                'programStateCode': $(this).attr('data-program-code'),
                'year': $("#year_sel").val(),
                'pkods':  pkodsValue
            }
        }).done(function(result){
            $("#coef-edit-modal .modal-content").html(result);
            $("#coef-edit-modal").modal('show');
        })
    });
</script>
<style>
    #koeficient-table tr td{
        border-top: none;
    }
</style>
