<div class="modal-header">
    <h3 class="modal-title pull-left">
        Sutarties nutraukimas
    </h3>
</div>
<div class="modal-body">
    <form action="{{route('epasirasymas.magistrai.konkursine_eile.terminate_agreement', ['reqList' => $masterReqList])}}" method="POST" id="terminate-agreement-form">
        {{csrf_field()}}
        <div class="row justify-content-md-center mb-4">
            <div class="col">
                <label for="terminate-reason-input"> <b> Nurodykite sutarties nutraukimo priežastį </b> </label>
                <textarea class="form-control" name="terminate-reason-input" id="terminate-reason-input"></textarea>
            </div>
        </div>
        <div class="row justify-content-md-center">
            <div class="col text-center">
                <button type="button" class="btn btn-dark terminate-agreement-form-btn"> Nutraukti </button>
            </div>
        </div>
    </form>
</div>
<script>
    $(".terminate-agreement-form-btn").click(function(){
        var reasonText = $("#terminate-reason-input").val();
        if(reasonText !== "") {
            $("#terminate-agreement-form").submit();
        } else {
            $("#terminate-reason-input").css('border', '3px solid red');
        }
    });
</script>
