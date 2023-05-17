<div class="modal-header">
    <h3 class="modal-title pull-left">
        Anketos: {{$application->name_lt ?? $application->name_en}} redagavimas
    </h3>
</div>
<div class="modal-body">
    <form action="{{route('epasirasymas.settings.applications.update', ['app' => $application->id])}}" id="app-upload-form">
        <div class="row mb-4">
            <div class="col">
                <label for="program-name-lt"> Programos pavadinimas(lt) </label>
                <input type="text" class="form-control" id="program-name-lt" name="name_lt" value="{{$application->name_lt}}">
            </div>
        </div>
        <div class="row mb-4">
            <div class="col">
                <label for="program-name-en"> Programos pavadinimas(en) </label>
                <input type="text" class="form-control" id="program-name-en" name="name_en" value="{{$application->name_en}}">
            </div>
        </div>
        <div class="row mb-4">
            <div class="col">
                <label for="year-input"> Metai </label>
                <input type="text" class="form-control" id="year-input" name="year" value="{{$application->year}}">
            </div>
        </div>
        {{--<div class="row mb-4">
            <div class="col">
                <label for="template-select"> Šablonas </label>
                <select class="form-control" id="template-select" name="template">
                    <option disabled selected> Šablonas </option>
                    @foreach($templates as $template)
                        <option value="{{$template->agreement_template}}" @if(!empty($selectedTemplate) && $selectedTemplate == $template->agreement_template) selected @endif>
                            {{$template->agreement_template}} -  {{$template->template->name_lt ?? $template->template->name_en}}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>--}}
        <div class="row mb-4" style="margin-left:1rem">
            <span> Kalbos: </span>
            <div class="form-check form-check-inline ml-4">
                <input class="form-check-input" type="checkbox" value="lt_LT" name="lang[]" id="lang-lt" @if(in_array('lt_LT', explode(' ', $application->lang))) checked @endif>
                <label class="form-check-label" for="lang-lt">
                    Lietuvių
                </label>
            </div>
            <div class="form-check form-check-inline ml-4">
                <input class="form-check-input" type="checkbox" value="en_GB" name="lang[]" id="lang-en" @if(in_array('en_GB', explode(' ', $application->lang)) ) checked @endif>
                <label class="form-check-label" for="lang-en">
                    Anglų
                </label>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col">
                <label for="year-input"> Pradžios data </label>
                <input type="text" class="form-control datepicker" id="start-date-input" name="start_date" value="{{date('Y-m-d', strtotime($application->start_date))}}" autocomplete="off">
            </div>
        </div>
        <div class="row mb-4">
            <div class="col">
                <label for="year-input"> Pabaigos data </label>
                <input type="text" class="form-control datepicker" id="end-date-input" name="end_date" value="{{date('Y-m-d', strtotime($application->end_date))}}" autocomplete="off">
            </div>
        </div>
        <div class="row justify-content-md-center">
            <div class="col text-center">
                <button type="submit" class="btn btn-dark"> Atnaujinti </button>
            </div>

            {{--<div class="col text-center">
                <button id="duplicate-app-btn" class="btn btn-dark"> Duplikuoti anketą </button>
            </div>--}}
        </div>
    </form>
</div>
<script>
    $(".datepicker").datepicker({
        format: 'yyyy-mm-dd',
        orientation: 'bottom',
        language: 'lt'
    });
</script>