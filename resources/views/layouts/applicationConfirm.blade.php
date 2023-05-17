
@section('master')

    <div class="row d-flex justify-content-center">
        <label> <b>Konkursinės eilės balai </b></label>
    </div>

    <form action="{{route('epasirasymas.magistrai.balu_suvedimas.gradeSubmit', ['id' => $userInfo->master_info_id])}}" method="POST">
        {{csrf_field()}}
        <div class="row">
            <input type="text" name="valst-code" value="{{$program->first()->subject_code}}" hidden>
            <div class="col-md-1">
            </div>
            @if(!empty($program))
{{--            {{dd($program)}}--}}
                @foreach($program as $prog)


                    <div class="col-md-2" >
                        <label class="d-flex justify-content-center"> {{$loop->index+1}} balas <i class="fas fa-question-circle" data-toggle="tooltip" data-placement="top" title="{{$prog->classification->description_lt}}"></i></label>
                        <input type="text" name="grade-{{$prog->id}}" value="{{$userInfo->masterInfo->masterMarks->where('subject_coef_id', $prog->id)->first()->mark ?? ''}}" class="form-control grade-enter">
                    </div>
                @endforeach
            @endif
        </div>
        <div class="row d-flex justify-content-center mt-2">
            <button class="btn btn-sm btn-dark">Išsaugoti</button>
        </div>
    </form>


    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        });
        $(".grade-enter").change(function(){
            var text = $(this).val().replace(',', '.');
            $(this).val(text);
        })
    </script>
    <style>
        .fas{
            line-height: unset;
        }
    </style>
@endsection
