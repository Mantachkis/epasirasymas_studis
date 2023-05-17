<div class="modal-header pl-4">
    <h3 class="modal-title">
        Sutarties stabdymas
    </h3>
</div>
<div class="modal-body">
    <form action="{{route('epasirasymas.magistrai.konkursine_eile.stop_agreement', ['reqList' => $masterReqList])}}" method="POST" id="stop-agreement-form">
        {{csrf_field()}}
        <div class="row justify-content-md-center mb-4">
            <div class="col">
                <label for="terminate-reason-input"> <b> Nurodykite sutarties sustabdymo priežastį </b> </label>
                <textarea class="form-control" name="stop-reason-input" id="stop-reason-input"></textarea>
            </div>
        </div>
        <div class="row justify-content-md-center">
            <div class="col text-center">
                <button type="button" class="btn btn-dark stop-agreement-form-btn"> Sustabdyti </button>
            </div>
        </div>
    </form>
</div>
<script>
    $(".stop-agreement-form-btn").click(function(){
        var reasonText = $("#stop-reason-input").val();
        if(reasonText !== "") {
            $("#stop-agreement-form").submit();
        } else {
            $("#stop-reason-input").css('border', '3px solid red');
        }
    });
</script>
