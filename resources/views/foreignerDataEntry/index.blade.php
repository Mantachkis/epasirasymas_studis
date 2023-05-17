@include('layouts.main')
@yield('scripts')
@yield('header')
@yield('js')

{{Breadcrumbs::render()}}

<div class="modal fade" id="submittedForeignerAppModal" tabindex="-1" role="dialog" aria-labelledby="submittedForeignerAppModal" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <h3 class="modal-title pull-left">Prašymo informacija</h3>
            </div>
            <div class="modal-body">

            </div>
        </div>
    </div>
</div>


<div class="container-fluid">
    <div class="table-responsive">
        <table class="table table-bordered" id="data-table">
            <thead>
                <tr>
                    <th> Registracijos nr. </th>
                    <th> Teikimo data </th>
                    <th> Vardas </th>
                    <th> Pavardė </th>
                    <th> Gimimo data </th>
                    <th> Pilietybė </th>
                    <th> Pakopa </th>
                    <th> Fakultetas </th>
                    <th> Studijų programa </th>
                    <th> Ar išsiųsta į SKVC </th>
                    <th> TRD darbuotojas </th>
                </tr>
            </thead>
            <tbody>
                @forelse($tableData as $data)
                    <tr id="{{$data['id']}}">
                        <td>{{$data['id']}}</td>
                        <td>{{$data['submitDate']}}</td>
                        <td>{{$data['name']}}</td>
                        <td>{{$data['surname']}}</td>
                        <td>{{$data['birthdate']}}</td>
                        <td>{{$data['citizenship']}}</td>
                        <td>{{$data['study-stage']}}</td>
                        <td>{{$data['faculty']}}</td>
                        <td>{{$data['study-program']}}</td>
                        <td>{{$data['sent-to-skvc']}}</td>
                        <td>{{$data['trd-worker']}}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9999"> Nerasta informacijos </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
<script>
    $("#data-table").DataTable({
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
    });

    $("#data-table tbody tr").click(function(){
        $("#submittedForeignerAppModal").modal("show");
        var appId = $(this).attr("id");

        $.ajax({
            url: "/epasirasymas/foreigner-entry/appData/"+appId,
            type: "get",
        }).done(function(result)
        {
            $("#submittedForeignerAppModal .modal-body").html(result);
        })
    });
</script>
