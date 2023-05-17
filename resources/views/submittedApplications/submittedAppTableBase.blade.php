@include ('layouts/main')
@yield ('scripts')
@yield ('header')
@yield('js')
@include ('emailForms.submittedApplicationsEmailSendForm')
@include('layouts.studentInfoViewBase')
{{Breadcrumbs::render()}}

@yield('studentInfoModal')

@foreach($tableFields['buttons'] as $buttonFunction => $buttonText)
    @switch($buttonFunction)
        @case('commentAdd')
            @include('submittedApplications.partials.commentModal')
        @break
    @endswitch
@endforeach

<div class="container-fluid">
    <div class="flash-message">
        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
            @if(Session::has('alert-' . $msg))
                <p class="alert alert-{{ $msg }} text-center">{{ Session::get('alert-' . $msg) }}</p>
            @endif
        @endforeach
    </div>
     <div class="table-responsive">
         <div class="row">
             <a href="{{route('epasirasymas.exportAppDataToExcel', ['application' => $applicationId])}}" class="btn btn-dark btn-sm"> Eksportuoti į excel </a>
         </div>
        <table class="table" style="width:100%" id="data-table">
            <thead style="font-size:14px;">
                <tr>
                    @foreach($tableFields as $key => $header)
                        @if($key === 'customFields')
                            @foreach($header as $headerVal)
                                <th> {{$headerVal}} </th>
                            @endforeach
                            @continue
                        @endif
                        @if($key === 'buttons')
                            <th> # </th>
                            @continue
                        @endif
                        <th> {{$header}} </th>
                    @endforeach
                </tr>
            </thead>
            <tbody style="font-size:14px">
            @foreach($applicants as $applicantId => $applicant)
                <tr id="{{$applicantId}}">
                    @foreach($tableFields as $key => $field)
                        @if($key === 'customFields')
                            @foreach($field as $custKey => $custField)
                                <td class="{{$custKey}}"> {!!$applicant[$custKey]!!} </td>
                            @endforeach
                            @continue
                        @endif
                        @if($key === 'buttons')
                            <td>
                            @foreach($field as $buttonKey => $buttonVal)
                                @switch($buttonKey)
                                    @case('email')
                                        <button class="btn btn-sm btn-dark btn-vertical-short btn-send-email" data-toggle="tooltip"
                                                data-placement="top"  data-id="{{$applicantId}}" title="{{$buttonVal}}">
                                            <i class="fa fa-envelope" aria-hidden="true"></i>
                                        </button>
                                    @break
                                    @case('erasmusFileAdd')
                                        <button class="btn btn-sm btn-dark btn-vertical-short btn-add-erasmus-file" data-toggle="tooltip"
                                                data-placement="top" data-id="{{$applicantId}} "title="{{$buttonVal}}">
                                            <i class="fa fa-file" aria-hidden="true"></i>
                                        </button>
                                    @break
                                    @case('commentAdd')
                                        <button class="btn btn-sm btn-dark btn-vertical-short btn-add-comment" data-toggle="tooltip"
                                                data-placement="top" data-id="{{$applicantId}} "title="{{$buttonVal}}">
                                            <i class="fa fa-comment" aria-hidden="true"></i>
                                        </button>
                                    @break
                                    @default
                                @endswitch
                            @endforeach
                            </td>
                            @continue
                        @endif
                        <td> {{$applicant[$key] ?? ''}} </td>
                    @endforeach
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>

<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip({
            html: true
        });
    });
    $(".btn-send-email").click(function() {
       $("#mail-modal").modal('show');
    });
    attachModalOpenOnNameClick();
    attachCommentButtonClick();
    $("#data-table").DataTable({
        language:
            {
                search: "Ieškoti:",
                lengthMenu: "Rodyti įrašų: _MENU_ ",
                info: "Rodoma nuo _START_ iki _END_ įrašų",
                infoEmpty: "Rodoma nuo 0 iki 0 įrašų",
                infoFiltered: "(Išfiltruota iš _MAX_ įrašų)",
                zeroRecords: "Kriterijus atitinkančių įrašų nebuvo rasta",
                emptyTable: "Nėra įrašų",
                processing: "Prašome palaukti..."
            },
    }).on('page.dt', function() {
        attachModalOpenOnNameClick();
        attachCommentButtonClick();
    });

    function attachModalOpenOnNameClick()
    {
        $("#data-table tbody tr td:nth-child(1), #data-table tbody tr td:nth-child(2)").click(function(){
            $("#userApplicationModal").modal("show");
            var appId = $(this).parent().attr("id");

            $.ajax({
                url: "/epasirasymas/submittedUserApplication/"+appId,
                type: "get",
            }).done(function(result)
            {
                $("#userApplicationModal .modal-body").html(result);
            })
        });
    }

    function attachCommentButtonClick()
    {
        $(".btn-add-comment").click(function() {
            $("#comment-modal-user-application-id").val($(this).parents().eq(1).attr('id'));
            $("#comment-modal-textarea").val($(this).parents().eq(1).children('td.comment').text());
            $("#commentAddModal").modal('show');
        });
    }
</script>
<style>
    #data-table tbody tr td:nth-child(1), #data-table tbody tr td:nth-child(2){
        cursor:pointer;
    }
    #data-table tbody tr:hover{
        background-color:lightgrey;
    }
</style>
