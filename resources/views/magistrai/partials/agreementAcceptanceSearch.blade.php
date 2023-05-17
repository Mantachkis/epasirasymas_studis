@section('search')
<form id="studentSelForm" action="{{route('epasirasymas.reports.ordersReportFull')}}">
    {{csrf_field()}}
    <div class="card mb-4">
        <div class="card-body">
            <div class="form-row">
                <div class="form-group ml-3 col-md-2">
                    <label for="year_sel"> Metai </label>
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
                    <label for="faculty_select"> Fakultetas </label>
                    <select class="form-control" id="faculty_select" name="faculty">
                        @foreach($faculties as $fac)
                            <option value="{{$fac->apv_kods}}"> {{$fac->stnosauk}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group ml-3 col-md-2">
                    <label for="extra_select"> Priedo nr. </label>
                    <select class="form-control" id="extra_select" name="extra">
                        @for($i = 1; $i < 17; $i++)
                            <option value="{{$i}}"> {{$i}} </option>
                        @endfor
                    </select>
                </div>
                <div class="form-group ml-3 col-md-1">
                    <label for="extra_select"> Etapas </label>
                    <select class="form-control" id="stage-select" name="stage">
                        @for($i = 1; $i <= 3; $i++)
                            <option value="{{$i}}"> {{$i}} </option>
                        @endfor
                    </select>
                </div>
                <div class="form-group ml-3 col-md-1" style="margin-top:2rem;">
                    <button type="submit" class="btn btn-dark ml-3"> Ieškoti </button>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection