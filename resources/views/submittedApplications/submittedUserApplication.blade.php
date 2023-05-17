<div class="container-fluid">
        <table class="table table-bordered">
            <tbody>
            @foreach($applicationFields as $field)
                <tr>
                    <td style="width:50%"> {{$lang == 'lt' ? $field->classification->text_lt : $field->classification->text_en}}</td>
                    <td style="width:50%">
                        @if($userInfo->app_status != 'AS0003') {{-- reiktu geresnio sprendimo --}}
                            @switch($field->type)
                                @case('FTYP0002')
                                    <select class="form-control" id="{{$field->application_classification_id}}" name="{{$field->application_classification_id}}">
                                        <option selected disabled> --- </option>
                                        @if(in_array($field->dropdown_data_source, ['B20000', 'C40000', 'VA0000']))
                                            @foreach($field->getClassificationTipsOptions() as $option)
                                                @if($option->tkods == optional($userFields->where('classification_id', $field->application_classification_id)->first())->answer_id)
                                                    <option value="{{$option->tkods}}" selected> {{$lang == 'lt' ? $option->tnosauk : $option->tnosauka}}</option>
                                                @else
                                                    <option value="{{$option->tkods}}"> {{$lang == 'lt' ? $option->tnosauk : $option->tnosauka}}</option>
                                                @endif
                                            @endforeach
                                        @else
                                            @foreach($field->getSelectClassificatorOptions() as $option)
                                                @if($option->id == optional($userFields->where('classification_id', $field->application_classification_id)->first())->answer_id)
                                                    <option value="{{$option->id}}" selected> {{$lang == 'lt' ? $option->text_lt : $option->text_en}}</option>
                                                @else
                                                    <option value="{{$option->id}}"> {{$lang == 'lt' ? $option->text_lt : $option->text_en}}</option>
                                                @endif
                                            @endforeach
                                        @endif
                                    </select>
                                @break
                                @case('FTYP0003')
                                {{optional($userFields->where('classification_id', $field->application_classification_id)->first())->answer_id}}
                                @break
                                @case('FTYP0004')
                                {{optional($userFields->where('classification_id', $field->application_classification_id)->first())->answer_id}}
                                @break
                                @case('FTYP0005')
                                <input type="text" class="datepicker form-control" value="{{optional($userFields->where('classification_id', $field->application_classification_id)->first())->answer_id}}">
                                @break
                                @case('FTYP0006')
                                <a href="#" onclick="window.open('https://epasirasymas.vdu.lt/{{optional($userFields->where('classification_id', $field->application_classification_id)->first())->answer_id}}')">
                                    @empty($userFields->where('classification_id', $field->application_classification_id)->first())

                                    @else
                                        <i class="far fa-file-pdf"></i>
                                    @endif
                                </a>
                                @break
                                @case('FTYP0007')
                                <input type="text" class="form-control" id="{{$field->application_classification_id}}" name="{{$field->application_classification_id}}" value="{{optional($userFields->where('classification_id', $field->application_classification_id)->first())->answer_id}}">
                                @break
                                @case('FTYP0012')
                                <textarea type="text" class="form-control" id="{{$field->application_classification_id}}" name="{{$field->application_classification_id}}">{{optional($userFields->where('classification_id', $field->application_classification_id)->first())->answer_id}}</textarea>
                                @break
                            @endswitch
                        @else
                            @if($field->type == 'FTYP0002')
                                {{$field->getClassificatorText($lang, optional($userFields->where('classification_id', $field->application_classification_id)->first())->answer_id)}}
                            @elseif($field->type == 'FTYP0006')
                                <a href="#" onclick="window.open('https://epasirasymas.vdu.lt/{{optional($userFields->where('classification_id', $field->application_classification_id)->first())->answer_id}}')">
                                    @empty($userFields->where('classification_id', $field->application_classification_id)->first())

                                    @else
                                        <i class="far fa-file-pdf"></i>
                                    @endif
                                </a>
                            @else
                                {{optional($userFields->where('classification_id', $field->application_classification_id)->first())->answer_id}}
                            @endif
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        @if($userInfo->app_status == 'AS0001')
            <div class="row justify-content-md-center">
                <div class="col text-center">
                    <form action="{{route('epasirasymas.lockSubmittedUserApplication', ['userApplication' => $userInfo->id])}}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-dark"> Patvirtinti prašymą </button>
                    </form>

                </div>
            </div>
        @elseif($userInfo->app_status == 'AS0003')
        <div class="row justify-content-md-center">
            <div class="col text-center">
                <form action="{{route('epasirasymas.unlockSubmittedUserApplication', ['userApplication' => $userInfo->id])}}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-dark"> Atrakinti prašymą </button>
                </form>

            </div>
        </div>
        @endif
</div>
<br>



