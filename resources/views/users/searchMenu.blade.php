 @include ('layouts/main')
@yield ('scripts')
@yield ('header')
<div class="container-fluid">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <h3>Ieškoti naudotojo</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-borderless">
                    <tr>
                        <td>
                            <input type="text" class="form-control" required="" maxlength="30" id="searchPhrase" name="searchPhrase" value="" placeholder="vardas / pavardė / el. paštas / asm. kodas">
                            <label><input type="radio" name="userType" value="user" checked>&nbsp;<small>Naudotojas</small></label>
                            <label><input type="radio" name="userType" value="vdu">&nbsp;<small>VDU</small></label>
                            <br /><label><small>Įveskite bent 5 simbolius</small></label>
                        </td>
                        <td>
                            <button id="find" class="btn btn-dark center-block" >Ieškoti</button>
                            <button id="new" class="btn btn-dark center-block" data-toggle="modal" data-target="#newModal">Kurti</button>
                        </td>
                        <td>
                        </td>
                        <td>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
<hr />
</div>

<div class="container-fluid" >
    <div class="row">
        <div class="col-md-12" id="searchResults">
        </div>
    </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="editModal">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Naudotojo tvarkymas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="userEdit">

            </div>
        </div>
    </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="newModal">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Naudotojo kūrimas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert  alert-danger" style="display:none"></div>
                        <div class="alert  alert-success" style="display:none"></div>
                            <form method="POST" action="{{'epasirasymas.users.usersNewSave'}}" id="userNewForm">
                            <label>Vardas *</label>
                            <input type="text" class="form-control" required="" maxlength="100" id="name" name="name" value="">
                            <label>Pavardė *</label>
                            <input type="text" class="form-control" required="" maxlength="100" id="surname" name="surname" value="">
                            <label>Asmens kodas *</label>
                            <input type="text" class="form-control" required="" maxlength="100" id="pers_code" name="pers_code" value="">
                            <label>El. paštas *</label>
                            <input type="text" class="form-control" required="" maxlength="100" id="email" name="email" value="">
                            <label>Slaptažodis</label>
                            <input type="password" class="form-control" maxlength="100" id="password" name="password" value="">
                            <label>Pakartoti slaptažodį</label>
                            <input type="password" class="form-control" maxlength="100" id="password_confirmation" name="password_confirmation" value="">
                            <hr />
                            <p>Slaptažodžio vesti nebūtina, naudotojas galės jį susikurti paspaudęs "Pamiršau slaptažodį"</p>
                            <p>* - privalomi laukai</p>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary newSave">Išsaugoti</button>
                <button type="button" class="btn btn-dark" data-dismiss="modal">Uždaryti</button>
            </div>
        </div>
    </div>
</div>


<script>
    $("#find").on("click", function()
    {
        $("#searchResults").html('');
        var searchPhrase = $("#searchPhrase").val();
        var _token = $("input[name=_token]").val();
        var userType = $("input[name=userType]:checked").val();

        var request = $.ajax({
            url: "{{route('epasirasymas.users.usersList')}}",
            method: "POST",
            data: { searchPhrase: searchPhrase, _token: _token, userType: userType}
        });

        request.done(function(data){
            if(data === ''){
                $("#searchResults").html('Nieko nerasta');
            } else {
                $("#searchResults").html(data);
            }
        });

        request.fail(function(data){
            $("#searchResults").html('Klaida, tikriausiai duomenų kiekis per didelis, įveskite tikslesnę paieškos užklausą!');
        });
    });

    $(document).on("click", ".editUser", function()
    {
        var id = $(this).attr('data-id');
        var type = $(this).attr('data-type');
        var _token = $("input[name=_token]").val();

        var request = $.ajax({
            url: "{{route('epasirasymas.users.usersEdit')}}",
            method: "POST",
            data: { type: type, _token: _token, id: id}
        });

        request.done(function(data){
                $("#userEdit").html(data);
        });

        request.fail(function(data){
            $("#searchResults").html('Klaida');
        });
    });


    $(document).on("click", "#editSave", function(e) {
        e.preventDefault();

        var formData = $("#userForm").serialize();

        var request = $.ajax({
            url: "{{route('epasirasymas.users.usersEditSave')}}",
            method: "POST",
            data: formData
        });

       request.done(function(data){
            if(data.errors){
                $(".alert-danger").html("");
                $.each(data.errors, function(key, value){

                    $(".alert-success").hide();
                    $(".alert-danger").show();
                    $(".alert-danger").append("<p>"+value+"</p>");
                });
            } else {
                $(".alert-success").html("");
                $(".alert-danger").hide();
                $(".alert-success").show();
                $(".alert-success").append("<p>"+data.success+"</p>");
            }
        });

        request.fail(function(data){
            $(".alert-danger").show();
            $(".alert-danger").html("<p>Klaida</p>");
        });
    });


    $(document).on("click", ".newSave", function(e) {
        e.preventDefault();

        var formData = $("#userNewForm").serialize()+"&_token="+$("input[name=_token]").val();

        var request = $.ajax({
            url: "{{route('epasirasymas.users.usersNewSave')}}",
            method: "POST",
            data: formData
        });

        request.done(function(data){
            if(data.errors){
                $(".alert-danger").html("");
                $.each(data.errors, function(key, value){

                    $(".alert-success").hide();
                    $(".alert-danger").show();
                    $(".alert-danger").append("<p>"+value+"</p>");
                });
            } else {
                $(".alert-success").html("");
                $(".alert-danger").hide();
                $(".alert-success").show();
                $(".alert-success").append("<p>"+data.success+"</p>");
            }
        });

        request.fail(function(data){
            $(".alert-danger").show();
            $(".alert-danger").html("<p>Klaida</p>");
        });
    });

</script>
