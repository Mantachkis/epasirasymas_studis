@include ('layouts/main')
@yield ('scripts')
@yield ('header')
<div class="container-fluid">
    <form method="POST" action="{{route('epasirasymas.agreement_create.saveAgreement')}}" id="createForm" enctype="multipart/form-data">
        @csrf
        <h3>Sutartčių formavimas</h3>
        <hr />
        <div class="row">
            <div class="col-md-4">
                <label> Asmens kodas *</label>
                <div class="d-flex">
                    <input type="text" class="form-control" required="" max="100" id="person_code" name="person_code" value="">
                    &nbsp;&nbsp;&nbsp;
                    <button type="submit" id="nameSearch" class="btn center-block"> Ieškoti </button>
                </div>
            </div>
            <div class="col-md-4">
                <label> Vardas *</label>
                <input type="text" class="form-control" required="" max="100" id="name" name="name" value="">
            </div>
            <div class="col-md-4">
                <label> Pavardė *</label>
                <input type="text" class="form-control" required="" max="100" id="surname" name="surname" value="">
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <label> Prašymo metai *</label>
                <input type="text" class="form-control year_datepicker" data-date-format="yyyy"  required="" id="year" name="year" value="{{$year}}">
            </div>
            <div class="col-md-4">
                <label> Gimimo data </label>
                <input type="text" class="form-control datepicker" max="100" id="birth_date" name="birth_date" value="">
            </div>
            <div class="col-md-4">
                <label> Telefono nr. </label>
                <input type="text" class="form-control" max="100" id="phone" name="phone" value="">
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <label> Asmens dokumento tipas </label>
                <select class="form-control" id="doc_type" name="doc_type">
                @foreach ($documentTypes as $key => $value)
                    <option value="{{$value}}">{{$key}}</option>
                @endforeach
                </select>
            </div>

            <div class="col-md-4">
                <label> Asmens dokumento nr. </label>
                <input type="text" class="form-control" id="doc_no" name="doc_no" value="">
            </div>

            <div class="col-md-4">
                    <label> Studijų kaina (Metams / semestrui)
                    <div class="d-flex">
                        <input type="text" class="form-control" id="price_year" name="price_year" placeholder="2600" value="">&nbsp;&nbsp;&nbsp;
                        <input type="text" class="form-control" id="price_sem" name="price_sem" placeholder="1300" value="">
                    </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <label> El. paštas </label>
                <input type="text" class="form-control" max="100" id="email" name="email" value="">
            </div>
            <div class="col-md-4">
                <label> Adresas </label>
                <input type="text" class="form-control" max="100" id="address" name="address" value="">
            </div>
            <div class="col-md-4">
                <label> Sutarties šablonas </label>
                <select class="form-control" id="agreement" name="agreement">
                    @foreach ($agreementTypes as $key => $value)
                        <option value="{{$value}}">{{$key}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <label> Pakopa </label>
                <select class="form-control" id="stage_type" name="stage_type">
                @foreach ($stageTypes as $key => $value)
                    <option value="{{$value}}">{{$key}}</option>
                @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <label> Finansavimas </label>
                <select class="form-control" id="finance" name="finance">
                    @foreach ($financeTypes as $financeType)
                        <option value="{{$financeType}}">{{$financeType}}</option>
                    @endforeach
                </select>
            </div>
        <div class="col-md-2">
                <label>&nbsp;</label>
                <button type="submit" id="subm_btn" class="btn btn-dark center-block form-control"> Pateikti </button>
        </div>

    </div>
        <input type="hidden" type="hidden" name="program_id" value="99999" id="programId">
    </form>
    <div class="row">
        <div class="col-md-4">
            <label>Programa</label>
            <div class="d-flex">
                <input placeholder="Įveskite bent 3 simbolius" width="200" type="text" class="form-control" id="program_input" name="program_input">
                &nbsp;&nbsp;&nbsp;
                <button type="submit" id="programSearch" class="btn center-block"> Ieškoti </button>
            </div>
        </div>
        <div class="col-md-8">
            <label>Pasirinkta</label>
            <p><b id="progName"></b></p>
        </div>
    </div>
    <div class="row" >
        <div class="col-md-12">
            <hr />
            <div id="searchResults">
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $('.datepicker').datepicker({
            format: 'yyyy-mm-dd'
        });
        $('.year_datepicker').datepicker({
            format: "yyyy",
            viewMode: "years",
            minViewMode: "years"
        });


    });

    $('#programSearch').on('click', function (e){
        e.preventDefault();

        var text = $('#program_input').val();

        if (text.length >= 3) {
            $.ajax({
                url: '{{route('epasirasymas.agreement_create.programSearchItems')}}/'+text,
                success: function(result){
                    $('#searchResults').html(result);
                }
            });
        } else {
            $('#searchResults').html('');
        }
    });

    $('#nameSearch').on('click', function(e){
        e.preventDefault();

        var text = $('#person_code').val();

        if (text.length >= 5) {
            $.ajax({
                url: '{{route('epasirasymas.agreement_create.nameSurnameByPersonCode')}}/'+text,
                success: function(result){
                    $('#name').val(result.name);
                    $('#surname').val(result.surname);
                    $('#email').val(result.email);
                }
            });
        } else {
            $('#name').val('');
            $('#surname').val('');
            $('#email').val('');
        }
    });

    $(document).on('click', '.programRadio', function(){
        $('#progName').html($(this).attr('data-prog-name')+' ['+$(this).attr('data-prog-year')+']');
        $('#programId').val($(this).attr('data-prog-id'));
    });
</script>