@section('adminTableSearch')
    <div class="row">
        <div class="card mb-4">
            <div class="card-body">
                <div class="form-row">
                    <div class="form-group ml-3 col-md-5">
                        <select class="form-control" id="template-select" name="template">
                            <option disabled selected> Šablonas </option>
                            @foreach($templates as $template)
                                <option value="{{$template->agreement_template}}" @if(!empty($appId) && $appId == $template->agreement_template) selected @endif>
                                    {{$template->agreement_template}} -  {{$template->template->name_lt ?? $template->template->name_en}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group ml-3">
                        <button id="admin-table-search-btn" class="btn btn-dark ml-3"> Ieškoti </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $("#admin-table-search-btn").click(function(){
           var id = $("#template-select").val();
           window.location.href = "/epasirasymas/nustatymai/admin_lenteles/lentele/"+id
        });
    </script>
@endsection