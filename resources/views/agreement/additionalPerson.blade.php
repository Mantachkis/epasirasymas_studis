<form class="additionalPersonSave">
    <input type="hidden" name="agreement_id" value="{{$agreement->id}}">
    <input type="text" class="form-control" name="additional_person" value="{{$agreement->additional_person}}">
    {{ csrf_field() }}
    <br />
    <button class="btn-dark form-control col-md-3" onclick="additionalPersonSave()">Išsaugoti</button>
</form>
