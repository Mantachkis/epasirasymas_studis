@include ('layouts/main')
@include ('settings.partials.programEdit')
@include ('settings.partials.programCreateModal')
@yield ('scripts')
@yield ('header')
@yield('js')

<div class="container-fluid">
    @yield('programCreateModal')
    <div class="row pt-5">
        <div class="alert alert-primary col-12 text-center" role="alert">
            <i class="fas fa-question-circle"></i>  Norint pridėti programą, pradžiai įveskite norimos programos pavadinimą į paieškos lauką ir suraskite norimą programą. Tuomet paspauskite ant programos unikalaus kodo ir atsiras lentelė leidžianti pridėti programą.
        </div>
    </div>

    <form action="{{route('epasirasymas.settings.magistrai.program_create_view')}}" method="POST">
        {{csrf_field()}}
        <div class="row pt-5">
            <div class="col-3 offset-4">
                <input type="text" class="form-control" name="program-name" placeholder="Programos pavadinimas">
            </div>
            <div class="col-3">
                <button type="submit" class="btn btn-dark"> Ieškoti </button>
            </div>
        </div>
    </form>
    <div class="row pt-5">
        <div class="col-12">
            <table class="table table-bordered" id="program-create-table">
                <thead>
                    <tr>
                        <th> Unikalus kodas </th>
                        <th> Pavadinimas </th>
                        <th> Fakultetas </th>
                        <th> Studijų tipas </th>
                        <th> Valst. kodas </th>
                    </tr>
                </thead>
                <tbody>
                    @if(isset($programs))
                        @foreach($programs as $program)
                            <tr>
                                <td> {{$program->pkods}} </td>
                                <td> {{$program->pnosauk}} </td>
                                <td> {{$program->strukturvStkods->stnosauk}} </td>
                                <td> {{$program->tipsNodala->tnosauk}} </td>
                                <td> {{$program->gkods}} </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="5"> Nebuvo rasta nieko pagal pasirinktus kriterijus </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    $("#program-create-table tbody tr td:first-child").click(function(){
        var rowElements  = $(this).parent().children();
        $("#program-pkods").val(rowElements.eq(0).html());
        $("#program-name").val(rowElements.eq(1).html());
        $("#program-code").val(rowElements.eq(-1).html())

        $("#program-create-modal").modal('show');
    })
</script>
