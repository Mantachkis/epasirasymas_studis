@include ('layouts.main')
@include ('layouts.studentInfoViewBase')
@include ('magistrai.partials.search')
@include ('magistrai.partials.subjectCoef')
@include('emailForms.mailBaseModal')
@include('magistrai.partials.fileAddModal')
@yield ('scripts')
@yield ('header')
@yield('js')
@yield('mailModal')
@yield('fileAddModal')
{{Breadcrumbs::render()}}
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            @yield('search')
        </div>
        <div class="col-md-2">
            @if(!empty($program))
                @yield('coefListing')
            @endif
        </div>
        <div class="col-md-4">
            <div class="alert alert-info" style="font-size:13px">
                <i class="far fa-question-circle"></i> Raudonai apibrauktų žmonių informacijoje yra klaidų dėl kurių sutartyse
                esanti informacija gali būti neteisinga ir sutartys būtų negaliojančios, todėl gali reikėti
                pataisyti vieną iš šitų laukų: Vardas/Pavardė, asmens kodas per ilgas/trumpas, paso numeris per ilgas/trumpas
                paso data nėra xxxx-xx-xx formato, elpaštas blogo formato
            </div>
        </div>
    </div>
    <div class="flash-message">
        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
            @if(Session::has('alert-' . $msg))
                <p class="alert alert-{{ $msg }} text-center">{{ Session::get('alert-' . $msg) }}</p>
            @endif
        @endforeach
    </div>
    <div class="flash-message">
        @if($errors->count() > 0)
            <div class="alert alert-danger">Balai nebuvo išsaugoti <br>
            @foreach($errors->all() as $key => $msg)
                 {{($key+1).'. '.$msg.'.'}} <br>
            @endforeach
            </div>
        @endif

    </div>
    <div class="row">
        <div class="table-responsive">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Prioritetas</th>
                        <th>Vardas</th>
                        <th>Pavardė</th>
                        <th>A. k.</th>
                        <th>El. paštas</th>
                        <th>Tel. nr.</th>
                        <th>Balai</th>
                        <th>Galutinis balas</th>
                        <th><i class="fas fa-check"></i> <i class="fas fa-slash"></i> <i class="fas fa-times"></i></th>
                        <th><i class="fa fa-upload"></i></th>
                        <th><i class="fa fa-envelope" aria-hidden="true"></i></th>
                    </tr>
                </thead>
                <tbody>
                    @if(!empty($students))
                        @foreach($students as $student)
                            <tr id="{{$student->id}}" @if(in_array($student->id, $badStudents)) style="background:#ff00006b" @endif>
                                <td class="clickable"> {{$student->masterRequestList->where('pkods', $program)->first()->priority_no}}</td>
                                <td class="clickable">{{$student->name}}</td>
                                <td class="clickable">{{$student->surname}}</td>
                                <td>{{$student->person_code}}</td>
                                <td>{{$student->email}}</td>
                                <td>{{$student->phone_no}}</td>
                                <td>@if($student->getStudentProgramGrades($program) != null)
                                    @foreach($student->getStudentProgramGrades($program)->sortBy('subject_coef_id') as $mark)
                                        <span> {{$mark->mark}}  </span>
                                    @endforeach
                                        @endif
                                </td>
                                <td>
                                    @if($student->status != 'RS0001')
                                        {{number_format($student->getEnteredGradeAverage($program), 4)}}
                                    @endif
                                </td>
                                <td class="clickable">
                                    @switch($student->request_status)
                                        @case('RS0001')

                                        @break
                                        @case('RS0002')
                                        <i class="fas fa-check" data-toggle="tooltip" data-placement="top" title="Balai suvesti bent vienoje iš pasirinktų studijų. "></i>
                                        @break
                                        @case('RS0004')
                                            <i class="fas fa-times"></i>
                                        @break
                                    @endswitch
                                </td>
                                <td>
                                    @adminRights($stage, $year, 'edit')
                                        <button class="btn btn-sm btn-dark btn-vertical-short add-file-btn"
                                                data-toggle="tooltip" data-placement="top"
                                                title="Paspaudus mygtuką atsidarys failo pridėjimo forma">
                                            <i class="fa fa-upload"></i>
                                        </button>
                                    @endadminRights
                                </td>
                                <td>
                                    @adminRights($stage, $year, 'edit')
                                        <button class="btn btn-sm btn-dark btn-vertical-short send-email-btn"
                                                data-toggle="tooltip" data-placement="top"
                                                title="Paspaudus mygtuką atsidarys laiško siuntimo forma">
                                            <i class="fa fa-envelope" aria-hidden="true"></i>
                                        </button>
                                    @endadminRights
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
    @if(!empty($students))
        <div class="row">
            <div class="col">{{ $students->links('pagination::bootstrap-4') }}</div>
        </div>
    @endif
</div>

@yield('studentInfoModal')
@if(!empty($program))
<script>
    $(".clickable").click(function()
    {
        $("#userApplicationModal").modal("show");
        var masterId = $(this).parent().attr("id");

        $.ajax({
            // url: "/epasirasymas/userApplicationAnswers/",
           url: "http://localhost/epasirasymas_studis/public/userApplicationAnswers/",
           type: "get",
           data: {
               "masterInfoId": masterId,
               "program" : "{{$program}}"
           }
        }).done(function(result)
        {
           $("#userApplicationModal .modal-body").html(result);
        })
    });

    $(".send-email-btn").click(function(){
        var id = $(this).parents().eq(1).attr("id");
        $("#mail-modal").modal('show');

        $.ajax({
            url: "{{route('epasirasymas.emails.missingDocs')}}",
            type: "get",
            data: {
                "masterInfoId": id,
            }
        }).done(function(result)
        {
            $("#mail-modal .modal-body").html(result);
        })
    });

    $(".add-file-btn").click(function(){
        var id = $(this).parents().eq(1).attr("id");
        $("#file-add-modal").modal('show');

        $.ajax({
            // url: "/epasirasymas/magistrai/balu_suvedimas/file_upload/"+id,
            url: "/epasirasymas_studis/public/magistrai/balu_suvedimas/file_upload/"+id,
            type: "get"
        }).done(function(result)
        {
            $("#file-add-modal .modal-content").html(result);
        })
    })
</script>
@endif
<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip({
            html: true
        });
    });
</script>

