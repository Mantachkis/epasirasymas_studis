@include('layouts.main')
@yield('scripts')
@yield('header')
@yield('js')

{{Breadcrumbs::render()}}

<div class="container">
    <form action="{{route('epasirasymas.foreignerDataEntry.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <h2> Kvalifikacijos turėtojo asmens duomenys </h2>
        <div class="row">
            <div class="col-4">
                <label for="name-field"> <b> Vardas </b> </label>
                <input type="text" class="form-control" name="name" id="name-field">
            </div>
            <div class="col-4">
                <label for="surname-field"> <b> Pavardė </b> </label>
                <input type="text" class="form-control" name="surname" id="surname-field">
            </div>
            <div class="col-4">
                <label for="citizenship-field"> <b> Pilietybė </b> </label>
                <select class="form-control" name="citizenship" id="citizenship-field">
                    <option selected disabled> Pasirinkite pilietybę </option>
                    @foreach($countryList as $country)
                        <option value="{{$country->tnosauk}}"> {{$country->tnosauk}} </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <label for="birthdate-field"> <b> Gimimo metai </b> </label>
                <input type="text" class="form-control datepicker" name="birthdate" id="birthdate-field" autocomplete="off">
            </div>
            <div class="col-8">
                <label for="email-field"> <b> El. paštas </b> </label>
                <input type="text" class="form-control" name="email" id="email-field">
            </div>
        </div>
        <h2> Pripažinimas reikalingas siekiant studijuoti </h2>
        <div class="row">
            <div class="col-4">
                <label for="study-stage-select"> <b> Pakopa </b> </label>
                <select class="form-control" name="study-stage" id="study-stage-select">
                    <option disabled selected> Pasirinkite pakopą </option>
                    @foreach($studyStages as $stage)
                        <option value="{{$stage}}"> {{$stage}} </option>
                    @endforeach
                </select>
            </div>
            <div class="col-4">
                <label for="faculty-field"> <b> Fakultetas </b></label>
                <select class="form-control" name="faculty" id="faculty-field">
                    <option selected disabled> Pasirinkite fakultetą </option>
                    @foreach($facultyList as $faculty)
                        <option id="{{$faculty->stkods}}" value="{{$faculty->stnosauk}}"> {{$faculty->stnosauk}} </option>
                    @endforeach
                </select>
            </div>
            <div class="col-4">
                <label for="study-program-field"> <b> Studijų programa </b> </label>
                <select class="form-control" name="study-program" id="study-program-field">
                    <option selected disabled> Pasirinkite fakultetą </option>
                </select>
            </div>
        </div>
        <h2> Kvalifikacija, kurią norima pripažinti </h2>
        <div class="row">
            <div class="col-6">
                <label for="qualification-field">  <b> Kvalifikacijos pavadinimas (anglų k.) </b> </label>
                <input type="text" class="form-control" name="qualification" id="qualification-field">
            </div>
            <div class="col-6">
                <label for="learning-institution-field"> <b> Mokymo (studijų) įstaigos pavadinimas (anglų k.) </b> </label>
                <input type="text" class="form-control" name="learning-institution" id="learning-institution-field">
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <label for="qualification-country-field"> <b> Valstybė, kurioje įgyta kvalifikacija </b> </label>
                <select class="form-control" name="qualification-country" id="qualification-country-field">
                    <option selected disabled> Pasirinkite valstybę </option>
                    @foreach($countryList as $country)
                        <option value="{{$country->tnosauk}}"> {{$country->tnosauk}} </option>
                    @endforeach
                </select>
            </div>
            <div class="col-4">
                <label for="qualification-study-start-date-field"> <b> Mokymosi (studijų) pradžia </b> </label>
                <input type="text" class="form-control datepicker" name="qualification-study-start-date" id="qualification-study-start-date-field" autocomplete="off">
            </div>
            <div class="col-4">
                <label for="qualification-study-end-date-field"> <b> Mokymosi (studijų) pabaiga </b> </label>
                <input type="text" class="form-control datepicker" name="qualification-study-end-date" id="qualification-study-end-date-field" autocomplete="off">
            </div>
        </div>
        <h2> Pirminis kvalifikacijos vertinimas </h2>
        <div class="row">
            <div class="col-4">
                <label for="is-qualification-institution-accredited-field"> <b> Kvalifikaciją liudijančius dokumentus suteikusios institucijos statusas </b> </label>
                <select class="form-control" id="is-qualification-institution-accredited-field" name="qualification-institution-accreditation">
                    <option selected disabled> Pasirinkite institucijos statusą </option>
                    @foreach($accreditationStatuses as $status)
                        <option value="{{$status}}"> {{$status}} </option>
                    @endforeach
                </select>
                <div class="row">

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <label> <b> Studijų programos, kurią stojantysis baigė, statusas, trukmė, paskirtis, apimtis ir akreditacija </b> </label>
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <label for="program-statuses"> <b> Statusas </b> </label>
                <select class="form-control" id="program-statuses" name="program-status">
                    <option selected disabled> Pasirinkite programos statusą </option>
                    @foreach($programActivityStatuses as $programStatus)
                        <option value="{{$programStatus}}"> {{$programStatus}} </option>
                    @endforeach
                </select>
            </div>
            <div class="col-4">
                <label for="program-duration-field"> <b> Trukmė (metais) </b> </label>
                <input type="text" class="form-control" name="program-duration" id="program-duration-field">
            </div>
            <div class="col-4">
                <label for="program-purpose-field"> <b> Paskirtis </b> </label>
                <select class="form-control" id="program-purpose-field" name="program-purpose">
                    <option selected disabled> Pasirinkite programos paskirtį </option>
                    @foreach($programPurposesList as $purpose)
                        <option value="{{$purpose}}"> {{$purpose}} </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <label for="program-credit-number-field"> <b> Apimtis (kreditais) </b> </label>
                <input type="text" class="form-control" name="program-credit-number" id="program-credit-number-field">
            </div>
            <div class="col-6">
                <label for="program-accreditation-status-field"> <b> Akreditacija: </b> </label>
                <select class="form-control" id="program-accreditation-status-field" name="program-accreditation-status">
                    <option selected disabled> Pasirinkite akreditacijos statusą </option>
                    @foreach($programAccreditationStatuses as $accreditationStatus)
                        <option value="{{$accreditationStatus}}"> {{$accreditationStatus}} </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <label for="document-authenticity-status-field"> <b> Ar gautas patvirtinimas iš aukštosios mokyklos? </b> </label>
                <select class="form-control" id="document-authenticity-status-field" name="document-authenticity">
                    <option selected disabled> Pasirinkite ar gautas patvirtinimas </option>
                    @foreach($yesNoStatuses as $status)
                        <option value="{{$status}}"> {{$status}} </option>
                    @endforeach
                </select>
            </div>
            <div class="col-6">
                <label> <b> Ar dokumentai išsiųsti į SKVC individualiai rekomendacijai gauti? </b> </label> <br>
                <select class="form-control" id="sent-to-skvc-status-field" name="sent-to-skvc">
                    <option selected disabled> Pasirinkite išsiuntimo statusą </option>
                    @foreach($yesNoOtherStatuses as $status)
                        <option value="{{$status}}"> {{$status}} </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <label for="skvc-recommendation-date-field"> <b> SKVC gautos individualios rekomendacijos data </b> </label>
                <input type="text" class="form-control datepicker" name="skvc-recommendation-date" id="skvc-recommendation-date-field" autocomplete="off">
            </div>
            <div class="col-6">
                <label for="skvc-recommendation-number-field"> <b> SKVC gautos individualios rekomendacijos nr. </b> </label>
                <input type="text" class="form-control" name="skvc-recommendation-number" id="skvc-recommendation-number-field">
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <label for="skvc-decision-status-field"> <b> Pirminės kvalifikacijos sprendimas: </b> </label>
                <select class="form-control" id="skvc-decision-status-field" name="skvc-decision-status">
                    <option selected disabled> Pasirinkite sprendimą </option>
                    @foreach($skvcDecisionStatuses as $status)
                        <option value="{{$status}}"> {{$status}} </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <label for="skvc-recommendation-comments"> <b> Pastabos / Komentarai </b> </label>
                <textarea type="text" class="form-control" name="skvc-recommendation-comments" id="skvc-recommendation-comment-field"> </textarea>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label for="skvc-recommendation-file-field"> <b> SKVC rekomendacija </b> </label>
                <input type="file" class="form-control" name="skvc-recommendation-file" id="skvc-recommendation-file-field">
            </div>
        </div>
        <h2> Kokybinis / specialybinis kvalifikacijos vertinimas (pildyti pagal fakulteto protokolo duomenis) </h2>
        <div class="row">
            <div class="col-4">
                <label for="program-content-qualification-status-field"> <b> Baigtos studijų programos turinys </b> </label>
                <select class="form-control" id="program-content-qualification-status-field" name="program-content-qualification">
                    <option selected disabled> Pasirinkite programos turinio statusą </option>
                    @foreach($qualificationStatuses as $status)
                        <option value="{{$status}}"> {{$status}} </option>
                    @endforeach
                </select>

            </div>
            <div class="col-4">
                <label for="program-result-qualification-status-field"> <b> Baigtos studijų programos rezultatai </b> </label>
                <select class="form-control" id="program-result-qualification-status-field" name="program-qualification-result-status">
                    <option selected disabled> Pasirinkite programos rezultato statusą </option>
                    @foreach($qualificationStatuses as $status)
                        <option value="{{$status}}"> {{$status}} </option>
                    @endforeach
                </select>
            </div>
            <div class="col-4" style="display:none">
                <label for="program-result-rejection-reason-field"> <b> Kodėl neatitinka studijų rezultatai: </b> </label>
                <input type="text" class="form-control" name="program-result-rejection-reason" id="program-result-rejection-reason-field" disabled>
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <label for="acceptance-final-grade-field"> <b> Galutinis priėmimo balas: </b> </label>
                <input type="text" class="form-control" name="acceptance-final-grade" id="acceptance-final-grade-field">
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <label for="acceptance-decision-field"> <b> Specialybinės kvalifikacijos sprendimas: </b> </label>
                <select class="form-control" id="acceptance-decision-field" name="acceptance-decision">
                    <option selected disabled> Pasirinkite kvalifikacinį sprendimą </option>
                    @foreach($acceptanceDecisionList as $decision)
                        <option value="{{$decision}}"> {{$decision}} </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label for="decision-date-field"> <b> Sprendimo priėmimo data (fakulteto priėmimo protokolas) </b> </label>
                <input type="text" class="form-control datepicker" name="decision-date" id="decision-date-field" autocomplete="off">
            </div>
            <div class="col-6">
                <label for="trd-worker-fullname-field"> <b> TRD darbuotojas </b> </label>
                <input type="text" class="form-control" name="trd-worker" id="trd-worker-fullname-field">
            </div>
        </div>
        <div class="row justify-content-center">
            <button type="submit" class="btn btn-dark"> Pateikti </button>
        </div>
    </form>

</div>

<style>
    h2 {
        padding-top:1rem;
        padding-bottom:1rem;
    }
    .row {
        padding-top:1rem;
    }
</style>

<script>
    $(".datepicker").datepicker({
        format: 'yyyy-mm-dd',
        orientation: 'top',
        language: 'lt',
        setDate: '',
    });

    $("#program-result-qualification-status-field").change(function() {
        if($(this).val() !== 'Neatitinka') {
            hideProgramResultRejectionFieldVisibility(true);
        } else {
            hideProgramResultRejectionFieldVisibility(false);
        }
    });


    function hideProgramResultRejectionFieldVisibility(status)
    {
        let field = $("#program-result-rejection-reason-field");
        if(status === true) {
            field.attr('disabled', true);
            field.parent().css('display', 'none');
        } else {
            field.attr('disabled', false);
            field.parent().css('display', 'initial');
        }
    }

    $("#faculty-field").change(function(){
        let faculty = $(this).children(':selected').prop('id');
        $.ajax({
            url: "/epasirasymas/foreigner-entry/get-programs/"+faculty,
            type: "get"
        }).done(function(result)
        {
            $("#study-program-field").html(result);
        })
    });
    $("#skvc-recommendation-file-field").filestyle(
        {
            text: "Naršyti",
            placeholder: "Pasirinkite failą",
            btnClass: "btn-dark"
        }
    );
</script>
