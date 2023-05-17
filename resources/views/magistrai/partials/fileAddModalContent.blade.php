<div class="modal-header">
    <h3 class="modal-title pull-left">
        Dokumento pridėjimas
    </h3>
</div>
<div class="modal-body">
    <form action="{{route('epasirasymas.magistrai.uploadFile', ['userApp' => $userAppId])}}" id="file-upload-form" enctype="multipart/form-data" method="post">
        {{csrf_field()}}
        <div class="row">
            <div class="col-md-6">
                <label for="file-type"> Dokumento tipas </label>
                <select class="form-control" id="file-type" name="file-type">
                    @foreach($fileList as $file)
                        <option value="{{$file->application_classification_id}}"> {{$file->classification->text_lt}} </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <label for="uploadedFile"> Pasirinkti failą </label>
                <input type="file" id="uploadFileField" name="file">
            </div>
        </div>
        <div class="mt-4 row justify-content-md-center">
            <div class="text-center">
                <button type="submit" class="btn btn-dark"> Pridėti </button>
            </div>
        </div>
    </form>
</div>
<script>
    $("#uploadFileField").filestyle({
        text: "Naršyti",
        placeholder: "Pasirinkite failą",
        btnClass: "btn-sm btn-dark h-100"
    });
</script>
<style>
    .buttonText{
        vertical-align:middle;
    }
</style>