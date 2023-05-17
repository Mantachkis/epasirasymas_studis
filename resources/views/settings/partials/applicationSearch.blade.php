@section('applicationSearch')
    <div class="row">
        <form action="{{route('epasirasymas.settings.applications.applicationsSearch')}}" method="get">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="form-row">
                        <div class="form-group ml-3 col-md-2">
                            <select class="form-control" id="year_sel" name="year">
                                @for($i = date('Y'); $i >= 2016; $i--)
                                    @if($year == $i)
                                        <option value="{{$i}}" selected> {{$i}} </option>
                                    @else
                                        <option value="{{$i}}"> {{$i}} </option>
                                    @endif
                                @endfor
                            </select>
                        </div>
                        <div class="form-group ml-3 col-md-5">
                            <select class="form-control" id="template-select" name="template">
                                <option selected value=""> Visi šablonai </option>
                                @foreach($templates as $template)
                                    <option value="{{$template->agreement_template}}" @if(!empty($selectedTemplate) && $selectedTemplate == $template->agreement_template) selected @endif>
                                        {{$template->agreement_template}} -  {{$template->template->name_lt ?? $template->template->name_en}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group ml-4 col-md-1">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="lt_LT" name="lang[]" id="lang-lt" @if(!empty($langs) && in_array('lt_LT', $langs)) checked @endif>
                                <label class="form-check-label" for="lang-lt">
                                    Lietuvių
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="en_GB" name="lang[]" id="lang-en" @if(!empty($langs) && in_array('en_GB', $langs) ) checked @endif>
                                <label class="form-check-label" for="lang-en">
                                    Anglų
                                </label>
                            </div>
                        </div>
                        <div class="form-group ml-3">
                            <button type="submit" class="btn btn-dark ml-3"> Ieškoti </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
