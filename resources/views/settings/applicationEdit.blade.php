@include ('layouts/main')
@include('settings.partials.applicationSearch')
@include('settings.partials.appEditModal')
@yield ('scripts')
@yield ('header')
@yield('js')

{{Breadcrumbs::render()}}

@yield('applicationSearch')
@yield('applicationEditModal')
<div class="container-fluid">
    <div class="table-responsive">
        <table class="table" id="app-table">
            <thead>
                <tr>
                    <th> # </th>
                    <th> Pavadinimas (lt)</th>
                    <th> Pavadinimas (en) </th>
                    <th> Metai </th>
                    <th> Šablonas </th>
                    <th> Kalbos </th>
                    <th> Pradžios data </th>
                    <th> Pabaigos data </th>
                </tr>
            </thead>
            <tbody>
                @foreach($applications as $k => $app)
                    <tr data-app-id="{{$app->id}}">
                        <td> {{$app->id}} </td>
                        <td> {{$app->name_lt}} </td>
                        <td> {{$app->name_en}} </td>
                        <td> {{$app->year}}</td>
                        <td> {{$app->agreement_template}} </td>
                        <td> {{$app->lang}} </td>
                        <td> {{date('Y-m-d', strtotime($app->start_date))}} </td>
                        <td> {{date('Y-m-d', strtotime($app->end_date))}} </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @if(!empty($applications))
        <div class="row">
            <div class="col">{{ $applications->links('pagination::bootstrap-4') }}</div>
        </div>
    @endif
</div>

<script>
    $("#app-table tr").click(function(){
        var id = $(this).attr('data-app-id');

        $.ajax({
            url: "/epasirasymas/nustatymai/prasymai/app_content/"+id
        }).done(function(result){
            $("#application-edit-modal .modal-content").html(result);

            $("#application-edit-modal").modal("show");
        })
    });
</script>