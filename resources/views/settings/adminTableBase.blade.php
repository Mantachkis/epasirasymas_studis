@include ('layouts/main')
@include('settings.partials.adminTableSearch')
@yield ('scripts')
@yield ('header')
@yield('js')

{{Breadcrumbs::render()}}

<div class="container-fluid">
    <div class="row">
        @yield('adminTableSearch')
        @if(!empty($appId))
            <div class="col-md-6">
                <button type="button" class="btn btn-dark add-block-btn"> Pridėti lauką </button>
            </div>
        @endif
    </div>
    @if(!empty($appId))
    <div id="block-content-body">
        <form id="tableUpdate" action="{{route('epasirasymas.settings.adminTables.update', ['id' => $appId])}}">
            <div class="form-row">
                @empty($templateJson[$appId])
                    <script> $(document).ready(function(){
                            addNewBlock();
                        });
                    </script>
                @else
                    @foreach($templateJson[$appId]['data'] as $field)
                        <div class="col-md-2 form-group mb-2 field-block" data-block-num="{{$loop->index}}">
                            <div class="card">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        <select class="form-control source-type-select" name="{{$field['source']}}[]">
                                            <option selected disabled> Laukelio tipas </option>
                                            <option value="t" @if($field['source_type'] == 't') selected @endif> Tekstinis </option>
                                            <option value="c" @if($field['source_type'] == 'c') selected @endif> Kelių pasirinkimų </option>
                                            <option value="f" @if($field['source_type'] == 'f') selected @endif> Funkcionalumas </option>
                                        </select>
                                    </li>
                                    <li class="list-group-item">
                                        @if($field['source_type'] == 'f')
                                            @foreach(explode(' ',$field['source']) as $func)
                                                <select class="form-control @if($loop->index > 0) clone @else field-select @endif"name="{{$field['source']}}[]">
                                                    <option selected disabled> Laukelio identifikatorius </option>
                                                    @foreach($tableFunctions['data'] as $tableFunc)
                                                        @if($func == $tableFunc['source'])
                                                            <option value="{{$tableFunc['source']}}" selected> {{$tableFunc['name']}} </option>
                                                        @else
                                                            <option value="{{$tableFunc['source']}}"> {{$tableFunc['name']}} </option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            @endforeach
                                        @else
                                            @if($field['source_type'] == 'c')
                                                <?php $source = $multiFields;?>
                                            @else
                                                <?php $source = $singleFields;?>
                                            @endif
                                            <select class="form-control field-select" name="{{$field['source']}}[]">
                                                <option selected disabled> Laukelio identifikatorius </option>
                                                <option value="name" @if($field['source'] == 'name') selected @endif> Vardas </option>
                                                <option value="surname" @if($field['source'] == 'surname') selected @endif> Pavardė </option>
                                                <option value="email" @if($field['source'] == 'email') selected @endif> El. paštas </option>
                                                <option value="person_code" @if($field['source'] == 'person_code') selected @endif> Asmens kodas </option>
                                                @foreach($source as $templField)
                                                    @if($field['source'] == $templField->application_classification_id)
                                                        <option value="{{$templField->application_classification_id}}" selected> {{$templField->classification->text_lt ?? ''}} / {{$templField->classification->text_en ?? ''}} </option>
                                                    @else
                                                        <option value="{{$templField->application_classification_id}}"> {{$templField->classification->text_lt ?? ''}} / {{$templField->classification->text_en ?? ''}} </option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        @endif
                                    </li>
                                    <li class="list-group-item">
                                        <input type="text" class="form-control field-name" value="{{$field['name']}}" placeholder="Pavadinimas" name="{{$field['source']}}[]">
                                    </li>
                                    <li class="list-group-item add-function-btn-list">
                                        <button type="button" class="btn btn-dark add-function-btn" @if($field['source_type'] != 'f') style="display:none" @endif> Pridėti f-ja </button>
                                        @if($loop->index > 0)
                                            <button type="button" class="btn btn-dark remove-block-btn"> Ištrinti lauką </button>
                                        @endif
                                    </li>
                                </ul>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
            <button type="button" class="btn btn-sm btn-dark" id="admin-table-subm-btn"> Išsaugoti </button>
        </form>
    </div>

</div>

<style>
    .list-group-item{
        padding:0px;
    }
</style>
<script>
    max = Number(getMaxBlockNum());
    $(document).on('change', '.source-type-select', function(){

        var blockNum = getElementBlockNum($(this));
        if($(this).val() === 'f') {
            var url = "{{route('epasirasymas.settings.adminTables.getFunctions')}}";
             $(this).parent().siblings('.add-function-btn-list').find('.add-function-btn').show();
        } else if ($(this).val() === 'c'){
            url = "{{route('epasirasymas.settings.adminTables.getFields', ['id' => $appId])}}";
            var fieldData = {'multi' : 'true'};
            $(this).parent().siblings('.add-function-btn-list').find('.add-function-btn').hide();
            $("[data-block-num="+blockNum+"] .clone").remove();
        } else {
            url = "{{route('epasirasymas.settings.adminTables.getFields', ['id' => $appId])}}";
            var fieldData = {'single' : 'true'};
            $(this).parent().siblings('.add-function-btn-list').find('.add-function-btn').hide();
            $("[data-block-num="+blockNum+"] .clone").remove();
        }
        $.ajax({
            url: url,
            type: "GET",
            data: fieldData
        }).done(function(result) {
            $('[data-block-num="'+blockNum+'"] .field-select').html(result);
        });
    });

    $(document).on('click', ".add-function-btn", function(){
        var blockNum = getElementBlockNum($(this));
        var field = $("[data-block-num="+blockNum+"] .field-select").first();
        field.clone().appendTo(field.parent()).addClass('clone').removeClass('field-select');
    });

    $("#admin-table-subm-btn").click(function(){
        $("#tableUpdate").submit();
    });
    function addNewBlock()
    {
        $.ajax({
            url:"{{route('epasirasymas.settings.adminTables.getBlock', ['id' => $appId])}}",
            type: "get",
            data:{
                'blockNum': max+=1
            }
        }).done(function(result){
            $("#block-content-body .form-row").append(result) ;
        });
    }

    $(".add-block-btn").click(function(){
        addNewBlock();
    });

    function getElementBlockNum(element)
    {
        return $(element).closest('.field-block').attr('data-block-num');
    }
    function getMaxBlockNum()
    {
        var max = 0;
        $(".field-block").each(function(key, val){

           if ($(this).attr('data-block-num') > max) {
               max = $(this).attr('data-block-num');
           }
        });
        return max;
    }

    $(document).on("click", '.remove-block-btn', function(){
        $(this).closest('.field-block').remove();
    });
</script>
    @endif