@include ('layouts/main')
@include ('magistrai.partials.search')
@include ('magistrai.partials.uninvitedConfirm')
@include ('magistrai.agreementTerminateModal')
@yield ('scripts')
@yield ('header')
@yield('js')
@yield('agreementTerminateModal')

{{Breadcrumbs::render()}}

<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            @yield('search')
        </div>
        <div class="col-md-6">
            @role('sd_admin_mag')
                <button onclick="window.location.href='{{route('epasirasymas.settings.magistrai.stage')}}'"
                        class="btn btn-dark float-right" style="margin-top:2rem;"> <i class="fas fa-cog"></i>
                </button>
            @endrole
        </div>
    </div>
    <div class="flash-message">
        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
            @if(Session::has('alert-' . $msg))
                <p class="alert alert-{{ $msg }} text-center">{{ Session::get('alert-' . $msg) }}</p>
            @endif
        @endforeach
    </div>
    <div class="row">
        <div class="table-responsive">
            <table class="table table-condensed">
                <thead>
                <tr>
                    <th> # </th>
                    <th> Prioritetas </th>
                    <th> Vardas </th>
                    <th> Pavardė </th>
                    <th> A. k. </th>
                    <th> El. paštas </th>
                    <th> Tel. nr. </th>
                    <th> Finansavimas </th>
                    <th> Balas </th>
                    <th> Kviesti </th>
                    <th> Stabdyti</th>
                    <th> Nutraukti</th>
                    <th> Sutartis </th>
                    <th> <i class="fa fa-envelope" aria-hidden="true"></i> </th>
                    <th> <i class="fas fa-comment-dots"></i>  </th>
                </tr>
                </thead>
                <tbody>
                <?php $counter = 1; $greenBorder = true;?>
                @if(!empty($students))
                    @foreach($students as $key => $student)
                            @if($student->finance_type == 'VNF' && $greenBorder)
                                {{$greenBorder = false}}
                                <tr id="{{$student->id}}" style="border-top:5px solid green" data-toggle="tooltip" data-placement="top" title="Visi žmonės esantys tarp žalio ir raudono brūkšnio pagal konkursinę eilę pateko į VNF vietas pagal kvotas">
                            @else
                                <tr id="{{$student->id}}">
                            @endif
                            <td> {{$counter ++}} </td>
                            <td> {{$student->priority_no}} </td>
                            <td> {{$student->masterInfo->name}} </td>
                            <td> {{$student->masterInfo->surname}} </td>
                            <td> {{$student->masterInfo->person_code}}</td>
                            <td> {{$student->masterInfo->email}} </td>
                            <td> {{$student->masterInfo->phone_no}} </td>
                            <td> {{$student->finance_type}} </td>
                            <td> {{number_format($student->cum_score, 4)}} </td>
                            <td>
                                @if($student->cum_score > 0.00)
                                    @if(empty($student->bpoPakviestiEsign))

                                        @adminRights($stage, $year, 'agreement')
                                        <form action="{{route('epasirasymas.magistrai.konkursine_eile.store_inv_agree', ['reqList' => $student->id])}}" method="POST">
                                            {{csrf_field()}}
                                            <button type="submit"
                                                    onclick="return confirm('Siųsti kvietimą?')"
                                                    class="btn btn-sm btn-vertical-short btn-dark addAgreementBtn"
                                                    data-toggle="tooltip" data-placement="top"
                                                    title="Kviesti ir siųsti laišką"> <i class="fas fa-check"></i>
                                            </button>
                                        </form>

                                        @endadminRights
                                    @else
                                        <i class="fas fa-check" data-toggle="tooltip" data-placement="top" title="Kvietimas išsiųstas"></i>
                                    @endif
                                @endif
                            </td>
                            <td>
                                @if(!empty($student->bpoPakviestiEsign))
                                    @if($student->bpoPakviestiEsign->agreement->agreement_status == 'AS0001')
                                        @adminRights($stage, $year, 'agreement')
                                            {{--<form action="{{route('epasirasymas.magistrai.konkursine_eile.stop_agreement', ['reqList' => $student->id])}}" method="POST">--}}
                                                {{--{{csrf_field()}}--}}
                                                <button class="btn btn-sm btn-vertical-short btn-dark timeout-btn"
                                                        data-toggle="tooltip" data-placement="top"
                                                        title="Stabdyti sutarties pasirašymo laiką">
                                                    <i class="far fa-calendar-times"></i>
                                                </button>
                                            {{--</form>--}}
                                        @endadminRights
                                    @endif
                                @endif
                            </td>
                            <td>
                                @if(!empty($student->bpoPakviestiEsign))
                                    @if($student->bpoPakviestiEsign->agreement->agreement_status == 'AS0002')
                                        @adminRights($stage, $year, 'agreement')
                                            {{--<form action="{{route('epasirasymas.magistrai.konkursine_eile.terminate_agreement', ['reqList' => $student->id])}}" method="POST">--}}
                                                {{--{{csrf_field()}}--}}
                                                <button class="btn btn-sm btn-vertical-short btn-dark terminate-agreement-btn"
                                                        data-toggle="tooltip" data-placement="top"
                                                        title="Nutraukti sutartį"> <i class="fas fa-minus-square"></i>
                                                </button>
                                            {{--</form>--}}
                                        @endadminRights
                                    @endif
                                @endif
                            </td>
                            <td>
                                @if(!empty($student->bpoPakviestiEsign))
                                    @empty($student->bpoPakviestiEsign->agreement->php_file_name)
                                        @if($student->bpoPakviestiEsign->agreement->agreement_status == 'AS0001')
                                            <a href="{{$student->bpoPakviestiEsign->agreement->getGeneratedAgreementTemplate()}}" data-toggle="tooltip" data-placement="top" title="Spauskite norint peržiūrėti sutartį"> Nepasirašyta sutartis </a>
                                        @elseif($student->bpoPakviestiEsign->agreement->agreement_status == 'AS0003')
                                            <a href="{{$student->bpoPakviestiEsign->agreement->getGeneratedAgreementTemplate()}}" data-toggle="tooltip" data-placement="top" title="Spauskite norint peržiūrėti sutartį"> Nutraukta sutartis </a>
                                        @elseif($student->bpoPakviestiEsign->agreement->agreement_status == 'AS0004')
                                            <a href="{{$student->bpoPakviestiEsign->agreement->getGeneratedAgreementTemplate()}}" data-toggle="tooltip" data-placement="top" title="Spauskite norint peržiūrėti sutartį"> Sustabdytas pasirašymas </a>
                                        @else
                                            <a href="{{$student->bpoPakviestiEsign->agreement->getGeneratedAgreementTemplate()}}" data-toggle="tooltip" data-placement="top" title="Spauskite norint peržiūrėti sutartį"> Pasirašyta sutartis </a>
                                        @endif
                                    @else
                                        @if($student->bpoPakviestiEsign->agreement->agreement_status == 'AS0001')
                                            <a href="https://epasirasymas.vdu.lt/{{$student->bpoPakviestiEsign->agreement->php_file_name}}" data-toggle="tooltip" data-placement="top" title="Spauskite norint peržiūrėti sutartį"> Nepasirašyta sutartis </a>
                                        @elseif($student->bpoPakviestiEsign->agreement->agreement_status == 'AS0003')
                                            <a href="https://epasirasymas.vdu.lt/{{$student->bpoPakviestiEsign->agreement->php_file_name}}" data-toggle="tooltip" data-placement="top" title="Spauskite norint peržiūrėti sutartį"> Nutraukta sutartis </a>
                                        @elseif($student->bpoPakviestiEsign->agreement->agreement_status == 'AS0004')
                                            <a href="https://epasirasymas.vdu.lt/{{$student->bpoPakviestiEsign->agreement->php_file_name}}" data-toggle="tooltip" data-placement="top" title="Spauskite norint peržiūrėti sutartį"> Sustabdytas pasirašymas </a>
                                        @else
                                            <a href="https://epasirasymas.vdu.lt/{{$student->bpoPakviestiEsign->agreement->php_file_name}}" data-toggle="tooltip" data-placement="top" title="Spauskite norint peržiūrėti sutartį"> Pasirašyta sutartis </a>
                                        @endif
                                    @endif
                                @endif
                            </td>
                            <td>
                                @adminRights($stage, $year, 'agreement')
                                    <button class="btn btn-sm btn-dark btn-vertical-short" data-toggle="tooltip"
                                            data-placement="top" title="Siųsti laišką">
                                        <i class="fa fa-envelope" aria-hidden="true"></i>
                                    </button>
                                @endadminRights
                            </td>
                            <td class="text-truncate" style="max-width:15rem;" data-toggle="tooltip" data-placement="top" title="{{$student->admin_comment}}">
                                {{$student->admin_comment}}
                            </td>
                        </tr>
                    @endforeach
                @endif
                @if(!empty($uninvitedStudents))
                    <?php $redStripeBool = true;?>
                    @foreach($uninvitedStudents as $student)

                        @if($student->checkIfApplicationWasAccepted())
                            @continue
                        @endif
                        @if($redStripeBool)
                            {{$redStripeBool = false}}
                            <tr id="{{$student->id}}" style="border-top:5px solid red" data-toggle="tooltip" data-placement="top" title="Visi esantys žemiau šito brūkšnio nepateko pagal balus ">
                        @else
                            <tr id="{{$student->id}}">
                        @endif
                            <td> {{$counter ++}} </td>
                            <td> {{$student->priority_no}} </td>
                            <td> {{$student->masterInfo->name}} </td>
                            <td> {{$student->masterInfo->surname}} </td>
                            <td> {{$student->masterInfo->person_code}}</td>
                            <td> {{$student->masterInfo->email}} </td>
                            <td> {{$student->masterInfo->phone_no}} </td>
                            <td> {{$student->finance_type}} </td>
                            <td> {{number_format($student->cum_score, 4)}} </td>
                            <td>
                                @if($student->cum_score > 0.00)
                                    @if(empty($student->bpoPakviestiEsign))
                                        @adminRights($stage, $year, 'agreement')
                                            <button class="btn btn-sm btn-vertical-short btn-dark add-agreement-finance-btn"

                                                    data-toggle="tooltip" data-placement="top"
                                                    title="Kviesti ir siųsti laišką"> <i class="fas fa-check"></i>
                                            </button>
                                        @endadminRights
                                    @else
                                        <i class="fas fa-check" data-toggle="tooltip" data-placement="top" title="Kvietimas išsiųstas"></i>
                                    @endif
                                @endif
                            </td>
                            <td>
                                @if(!empty($student->bpoPakviestiEsign))
                                    @if($student->bpoPakviestiEsign->agreement->agreement_status == 'AS0001')
                                        @adminRights($stage, $year, 'agreement')
                                            {{--<form action="{{route('epasirasymas.magistrai.konkursine_eile.stop_agreement', ['reqList' => $student->id])}}" method="POST">
                                                {{csrf_field()}}--}}
                                                <button class="btn btn-sm btn-vertical-short btn-dark timeout-btn"
                                                        data-toggle="tooltip" data-placement="top"
                                                        title="Stabdyti sutarties pasirašymo laiką">
                                                    <i class="far fa-calendar-times"></i>
                                                </button>
                                            {{--</form>--}}
                                        @endadminRights
                                    @endif
                                @endif
                            </td>
                            <td>
                                @if(!empty($student->bpoPakviestiEsign))
                                    @if($student->bpoPakviestiEsign->agreement->agreement_status == 'AS0002')
                                        @adminRights($stage, $year, 'agreement')
                                            {{--<form action="{{route('epasirasymas.magistrai.konkursine_eile.terminate_agreement', ['reqList' => $student->id])}}" method="POST">
                                                {{csrf_field()}}--}}
                                                <button class="btn btn-sm btn-vertical-short btn-dark terminate-agreement-btn"
                                                        data-toggle="tooltip" data-placement="top" title="Nutraukti sutartį">
                                                    <i class="fas fa-minus-square"></i>
                                                </button>
                                            {{--</form>--}}
                                        @endadminRights
                                    @endif
                                @endif
                            </td>
                            <td>
                                @if(!empty($student->bpoPakviestiEsign))
                                    @empty($student->bpoPakviestiEsign->agreement->php_file_name)
                                        @if($student->bpoPakviestiEsign->agreement->agreement_status == 'AS0001')
                                            <a href="{{$student->bpoPakviestiEsign->agreement->getGeneratedAgreementTemplate()}}" data-toggle="tooltip" data-placement="top" title="Spauskite norint peržiūrėti sutartį"> Nepasirašyta sutartis </a>
                                        @elseif($student->bpoPakviestiEsign->agreement->agreement_status == 'AS0003')
                                            <a href="{{$student->bpoPakviestiEsign->agreement->getGeneratedAgreementTemplate()}}" data-toggle="tooltip" data-placement="top" title="Spauskite norint peržiūrėti sutartį"> Nutraukta sutartis </a>
                                        @elseif($student->bpoPakviestiEsign->agreement->agreement_status == 'AS0004')
                                            <a href="{{$student->bpoPakviestiEsign->agreement->getGeneratedAgreementTemplate()}}" data-toggle="tooltip" data-placement="top" title="Spauskite norint peržiūrėti sutartį"> Sustabdytas pasirašymas </a>
                                        @else
                                            <a href="{{$student->bpoPakviestiEsign->agreement->getGeneratedAgreementTemplate()}}" data-toggle="tooltip" data-placement="top" title="Spauskite norint peržiūrėti sutartį"> Pasirašyta sutartis </a>
                                        @endif
                                    @else
                                        @if($student->bpoPakviestiEsign->agreement->agreement_status == 'AS0001')
                                            <a href="https://epasirasymas.vdu.lt/{{$student->bpoPakviestiEsign->agreement->php_file_name}}" data-toggle="tooltip" data-placement="top" title="Spauskite norint peržiūrėti sutartį"> Nepasirašyta sutartis </a>
                                        @elseif($student->bpoPakviestiEsign->agreement->agreement_status == 'AS0003')
                                            <a href="https://epasirasymas.vdu.lt/{{$student->bpoPakviestiEsign->agreement->php_file_name}}" data-toggle="tooltip" data-placement="top" title="Spauskite norint peržiūrėti sutartį"> Nutraukta sutartis </a>
                                        @elseif($student->bpoPakviestiEsign->agreement->agreement_status == 'AS0004')
                                            <a href="https://epasirasymas.vdu.lt/{{$student->bpoPakviestiEsign->agreement->php_file_name}}" data-toggle="tooltip" data-placement="top" title="Spauskite norint peržiūrėti sutartį"> Sustabdytas pasirašymas </a>
                                        @else
                                            <a href="https://epasirasymas.vdu.lt/{{$student->bpoPakviestiEsign->agreement->php_file_name}}" data-toggle="tooltip" data-placement="top" title="Spauskite norint peržiūrėti sutartį"> Pasirašyta sutartis </a>
                                        @endif
                                    @endif
                                @endif
                            </td>
                            <td>
                                @adminRights($stage, $year, 'agreement')
                                    <button class="btn btn-sm btn-dark btn-vertical-short" data-toggle="tooltip"
                                            data-placement="top" title="Siųsti laišką">
                                        <i class="fa fa-envelope" aria-hidden="true"></i>
                                    </button>
                                @endadminRights
                            </td>
                                <td class="text-truncate" style="max-width:15rem;" data-toggle="tooltip" data-placement="top" title="{{$student->admin_comment}}">
                                    {{$student->admin_comment}}
                                </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>
    @yield('invitationModal')
</div>
@if(!empty($program))
    <script>
        function confirmBeforeSending() {
            if (confirm("Siūsti")) {

            } else {

            }

        }


        $(".clickable").click(function()
        {
            $("#userApplicationModal").modal("show");
            var masterId = $(this).parent().attr("id");

            $.ajax({
                url: "/epasirasymas/userApplicationAnswers/",
                type: "get",
                data: {
                    "masterInfoId": masterId,
                }
            }).done(function(result)
            {
                $("#userApplicationModal .modal-body").html(result);
            })
        });
        $(function () {
            $('[data-toggle="tooltip"]').tooltip({
                html: true
            });
        });

        $(".add-agreement-finance-btn").click(function(){

                $("#master-req-id").val($(this).parents().eq(1).attr('id'));
                $("#agreementSendModal").modal('show');

        });
        $(".terminate-agreement-btn").click(function(){
            var masterId = $(this).parents().eq(1).attr('id');

            $.ajax({
                url: "/epasirasymas/magistrai/konkursine_eile/terminate_agreement_modal/"+masterId,
                type: "get"
            }).done(function(result)
            {
                $("#agreementTerminateModal .modal-content").html(result);
                $("#agreementTerminateModal").modal("show");
            })
        });

        $(".timeout-btn").click(function(){
            var masterId = $(this).parents().eq(1).attr('id');
            $.ajax({
                url: "/epasirasymas/magistrai/konkursine_eile/stop_agreement_modal/"+masterId,
                type: "get"
            }).done(function(result)
            {
                $("#agreementTerminateModal .modal-content").html(result);
                $("#agreementTerminateModal").modal("show");
            })
        })

    </script>
@endif
