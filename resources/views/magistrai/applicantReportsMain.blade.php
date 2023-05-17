@include ('layouts.main')
@include('magistrai.partials.applicantsReportSearch')
@yield ('scripts')
@yield ('header')
@yield('js')

{{Breadcrumbs::render()}}
<div class="container-fluid">
    <div class="row">
        @yield('search')
    </div>
    <div class="row">
        <div class="table-responsive">
            <table class="table table-condensed display compact" id="applicants-table" style="width:100%">
                <thead>
                    <tr>
                        <th> Vardas </th>
                        <th> Pavardė </th>
                        <th> El. paštas </th>
                        <th> Pateikimo data </th>
                        <th> Išsilavinimas (vieta) </th>
                        <th> Išsilavinimas (metai) </th>
                        <th> 1 prioritetas </th>
                        <th> 1 finansavimas </th>
                        <th> 2 prioritetas </th>
                        <th> 2 finansavimas </th>
                        <th> 3 prioritetas </th>
                        <th> 3 finansavimas </th>
                        <th> 4 prioritetas </th>
                        <th> 4 finansavimas </th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
<script>
    var datatable = $('#applicants-table').DataTable({
            processing: true,
            serverside: true,
            ajax: {
                url: "{{route('epasirasymas.reports.applicantData')}}",
                data: function(d){
                    d._token = "{{csrf_token()}}";
                    d.startDate = $("#start-date-input").val();
                    d.endDate = $("#end-date-input").val();
                    d.program = $("#program-select").val();
                    d.finance = $("#finance-type-select").val();
                    d.stage = $("#stage-select").val();
                    $("#app-id").is(':checked') ? d.appId = $("#app-id").val() : null;

                },
                type: "get"
            },
            columns: [
                { data: 'name', name: 'name' },
                { data: 'surname', name: 'surname' },
                { data: 'email', name: 'email' },
                { data: 'submit_date', name: 'submit_date' },
                { data: 'education_place', name: 'education_place' },
                { data: 'education_year', name: 'education_year' },
                { data: 'first_program', name: 'first_program' },
                { data: 'first_finance', name: 'first_finance' },
                { data: 'second_program', name: 'second_program' },
                { data: 'second_finance', name: 'second_finance' },
                { data: 'third_program', name: 'third_program' },
                { data: 'third_finance', name: 'third_finance' },
                { data: 'fourth_program', name: 'fourth_program' },
                { data: 'fourth_finance', name: 'fourth_finance' }
            ],
            dom: '<"col-md-6"l><"col-md-6"f>rBt<"col-md-6"i><"col-md-6"p>',
            buttons:{
                buttons:
                    [
                        {
                            extend:'excelHtml5',
                            text: 'Exportuoti lentelę į Excel failą',
                            className: 'btn btn-dark ml-3'
                        }
                    ]
            },
            language:
            {
                search: "Ieškoti:",
                lengthMenu: "Rodyti įrašų: _MENU_ ",
                info: "Rodoma nuo _START_ iki _END_ įrašų",
                infoEmpty: "Rodoma nuo 0 iki 0 įrašų",
                infoFiltered: "(Išfiltruota iš _MAX_ įrašų)",
                zeroRecords: "Kriterijus atitinkančių įrašų nebuvo rasta",
                emptyTable: "Nėra įrašų",
                processing: "Prašome palaukti..."
            },
            order: [[3, 'desc']]
        });
    datatable.buttons().container().appendTo("#excel_btn");
    $("#submit-btn").on('click', function(){
        $("#applicants-table").DataTable().ajax.url('{{route('epasirasymas.reports.applicantData')}}').load();
    })
</script>
