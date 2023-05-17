<div class="alert alert-danger" role="alert">
    Sutarties nuorodas viešinti draudžiama!!!
</div>

    <form id="uploadForm">
        <label class="custom-file-label" for="customFile">Pasirinkite failą</label>
        <input type="file" name="file" value="" class="custom-file-input" id="uploadFileField">
        <label for="file_upload_comment">Komentaras</label>
        <input type="text" name="comment" value="" maxlength="200" id="file_upload_comment" class="form-control"/>
        <input type="hidden" name="agreement_id" value="{{$agreement->id}}">
        {{ csrf_field() }}
        <br />
        <button class="btn" onclick="uploadFile();">Pridėti</button>
    </form>
<br />

<table class="table table-sm">
    <thead>
    <tr><th class="text-left">Pavadinimas</th><th class="text-left">Data</th><th class="text-left">Komentaras</th><th></th></tr>
    </thead>
    <tbody>
@if ($agreement->php_file_name != '')
    <tr><td class="text-left"><a href="{{$siteName}}/{{$agreement->php_file_name}}" target="_blank"><i class="fa fa-file" aria-hidden="true"></i> Sutarties dokumentas</a></td><td class="text-left">{{$agreement->agreement_date}}</td><td></td><td></td></tr>
@endif
<tr><td class="text-left"><a href="{{$agreement->getGeneratedAgreementTemplate()}}" target="_blank"><i class="fa fa-file" aria-hidden="true"></i> Sugeneruotas sutarties dokumentas</a></td><td class="text-left"></td><td></td><td></td></tr>
@if ($fileList->count() != 0)
    <tr><th class="text-left">Papildomi failai</th><th class="text-left"></th><th class="text-left"></th><th></th></tr>
    @foreach ($fileList as $file)
        <tr>
            <td class="text-left">
                @if ($file->php_file_name != '')
                    <a href="@if ($file->php_file_name != '') {{$siteName}}/{{$file->php_file_name}} @else # @endif" target="_blank" download><i class="fa fa-file " aria-hidden="true"></i> {{substr($file->file_name, strpos($file->file_name, '/'))}} </a>
                @else
                    <form method="POST" target="_blank" action="{{route('epasirassymas.agreement_search.agreementOracleFile')}}">
                        <input type="hidden" name="file_name" value="{{$file->file_name}}"/>
                        <a href="#" onclick="parentNode.submit();"><i class="fa fa-file " aria-hidden="true"></i> {{substr($file->file_name, strpos($file->file_name, '/') + 1)}} </a>
                        {{ csrf_field() }}
                    </form>
                @endif
            </td>
            <td class="text-left">{{$file->upload_date}}</td>
            <td class="text-left">{{$file->comments}}</td>
            <td><a href="#" onclick="deleteFile({{$file->id}});"><i class="fa fa-trash-alt" aria-hidden="true"></i></a></td>
        </tr>
    @endForEach
@else
    <tr><td class="text-left"><b>Sutartis papildomų dokumentų neturi</b></td><td></td><td></td><td></td></tr>
@endif
    </tbody>
</table>
<script>
    $("#uploadFileField").filestyle(
        {
            text: "Naršyti",
            placeholder: "Pasirinkite failą",
            btnClass: "btn-sm btn-secondary"
        }
    );
</script>
