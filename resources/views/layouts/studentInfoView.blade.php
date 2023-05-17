@include('layouts.applicationConfirm')
    <div class="container-fluid">
        <form action="{{route('epasirasymas.userAppUpdate', ['id' => $userInfo->id])}}" method="post">
            {{csrf_field()}}
            <table class="table table-bordered">
                <input type="text" id="master-id" value="{{$userInfo->master_info_id}}" name="master-id" hidden>
                <tbody>
                    @foreach($applicationFields as $field)
                        <tr>
                            <td style="width:50%"> {{$lang = 'lt' ? $field->classification->text_lt : $field->classification->text_en}}</td>
                            <td style="width:50%">
                                @if(
                                    ($userInfo->app_status != 'AS0003' && !in_array($userInfo->getTemplateId(), [2,6])) ||
                                    \App\Models\Esp\MasterStageAdmin::isEditAllowed(
                                        $userInfo->masterInfo->request_year,
                                        $stage
                                    ) == 'Y'
                                ) {{-- reiktu geresnio sprendimo --}}
                                    @switch($field->type)
                                        @case('FTYP0002')
                                            @if(in_array($field->application_classification_id, $field->getStudySubjectClassificators()))
                                                {{   \App\Models\Esp\ProgramList::getProgramName($userFields->where('classification_id', $field->application_classification_id)->first()->answer_id ?? '', $year)}}
                                            @else
                                            <select class="form-control" id="{{$field->application_classification_id}}" name="{{$field->application_classification_id}}">
                                                    <option selected disabled> --- </option>
                                                @if(in_array($field->dropdown_data_source, ['B20000', 'C40000', 'VA0000']))
                                                    @foreach($field->getClassificationTipsOptions() as $option)
                                                        @if($option->tkods == optional($userFields->where('classification_id', $field->application_classification_id)->first())->answer_id)
                                                            <option value="{{$option->tkods}}" selected> {{$lang = 'lt' ? $option->tnosauk : $option->tnosauka}}</option>
                                                        @else
                                                            <option value="{{$option->tkods}}"> {{$lang = 'lt' ? $option->tnosauk : $option->tnosauka}}</option>
                                                        @endif
                                                    @endforeach
                                                @else
                                                    @foreach($field->getSelectClassificatorOptions() as $option)
                                                        @if($option->id == optional($userFields->where('classification_id', $field->application_classification_id)->first())->answer_id)
                                                            <option value="{{$option->id}}" selected> {{$lang = 'lt' ? $option->text_lt : $option->text_en}}</option>
                                                        @else
                                                            <option value="{{$option->id}}"> {{$lang = 'lt' ? $option->text_lt : $option->text_en}}</option>
                                                        @endif
                                                    @endforeach
                                                @endif
                                            </select>
                                            @endif
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
                                            <textarea type="text" class="form-control" id="{{$field->application_classification_id}}" name="{{$field->application_classification_id}}">{{optional($userFields->where('classification_id', $field->application_classification_id)->first())->answer_id}}"</textarea>>
                                        @break
                                    @endswitch
                                @else
                                    @if($field->type == 'FTYP0002')
                                        @if(in_array($field->application_classification_id, $field->getStudySubjectClassificators()))
                                            {{   \App\Models\Esp\ProgramList::getProgramName($userFields->where('classification_id', $field->application_classification_id)->first()->answer_id ?? '', $year)}}
                                        @else
                                            {{$field->getClassificatorText('lt', optional($userFields->where('classification_id', $field->application_classification_id)->first())->answer_id)}}
                                        @endif
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
            @if(
                ($userInfo->app_status == 'AS0001' && !in_array($userInfo->getTemplateId(), [2,6])) ||
                \App\Models\Esp\MasterStageAdmin::isEditAllowed(
                    $userInfo->masterInfo->request_year,
                    $stage
                ) == 'Y'
            )
                <div class="row justify-content-md-center">
                    <div class="col text-center">
                        <button type="submit" class="btn btn-dark"> Atnaujinti informaciją </button>
                    </div>
                </div>
            @endif
        </form>
    </div>
<br>
@switch($userInfo->getTemplateId())
    @case('2')
    @case('6')
        @if(!is_null($userInfo->user->luadmCilveksCkods)) {{-- nenaudoti count(), nes live php versijoje nepalaiko --}}
            @foreach($userInfo->user->luadmCilveksCkods->studijas as $studkods)
                <div class="row" style="font-size:12px">
                    <div class="col-md-3 p-0">
                        <a href="https://studis.vdu.lt/liet.isklotine?l=3&p_studkods={{$studkods->studkods}}"> Akademinė pažyma </a>
                    </div>
                    <div class="col-md-3 p-0">
                        Baigiamojo darbo pažymys: {{$studkods->getThesisGrade()}}
                    </div>
                    <div class="col-md-3 p-0">
                        Aritmetinis vidurkis: {{$studkods->getGradeAvg()}}
                    </div>
                    <div class="col-md-3 p-0">
                        Svertinis vidurkis: {{$studkods->getGradeAvgByCredits()}}
                    </div>
                    <div class="col-md-3 offset-3 p-0">
                        Kryptinis vidurkis: {{$studkods->getGradesByStudyType()->grade}}
                    </div>
                </div>
            @endforeach
        @endif
        <br>
        @adminRights($stage, $userInfo->masterInfo->request_year, 'grades')
            @yield('master')
        @endadminRights
    @break
    @case('192')
@endswitch


