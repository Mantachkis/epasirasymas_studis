@section('search')
<div class="row">
    <div class="card mb-2">
        <div class="card-body" style="width:95rem;">
            <div class="form-row">
                <div class="form-group ml-3">
                    <input type="text" class="form-control datepicker" id="start-date-input" name="start-date" placeholder="Pradžios data" autocomplete="off">
                </div>
                <div class="form-group ml-3">
                    <input type="text" class="form-control datepicker" id="end-date-input" name="end-date" placeholder="Pabaigos data" autocomplete="off">
                </div>
                <div class="form-group ml-3">
                    <select class="form-control" id="stage-select" name="stage">
                        <option disabled selected> Etapas </option>
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
                    <input type="checkbox" value="6" name="appId" id="app-id"> Pedagogai
                </div>
                <div class="form-group ml-3">
                    <button type="submit" class="btn btn-dark ml-3" id="submit-btn"> Ieškoti </button>
                </div>
                <div class="form-group ml-3"  id="excel_btn"> </div>
            </div>
        </div>
    </div>
</div>

    <script>
        $(".datepicker").datepicker({
            format: 'yyyy-mm-dd',
            orientation: 'bottom',
            language: 'lt'
        });
    </script>
@endsection
