<!doctype html>
@section('scripts')
    <html lang="lt">
    <head>
        <title>Elektroninių sutarčių pasirašymas</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!--link href="https://resources.vdu.lt/css/default/bootstrap-theme.min.css" rel="stylesheet"-->
        <link href="https://resources.vdu.lt/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css">
        <link href="https://resources.vdu.lt/js/bootstrap-datepicker/bootstrap-datepicker.standalone.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://resources.vdu.lt/css/default/datatables_bs4.min.css">
        <link href="https://resources.vdu.lt/css/default/simple-sidebar.css" rel="stylesheet">
        <link href="https://resources.vdu.lt/css/custom/epasirasymas/style_new.css" rel="stylesheet">
        <link href="https://resources.vdu.lt/css/default/loading.css" rel="stylesheet">

        <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
        <script type="text/javascript" src="https://resources.vdu.lt/js/default/tether.min.js"> </script>
        <script type="text/javascript" src="https://resources.vdu.lt/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>

        <script src="https://resources.vdu.lt/js/default/jquery.dataTables.min.js"></script>
        <script src="https://resources.vdu.lt/js/default/dataTables.bootstrap.min.js"></script>
        <script src="https://resources.vdu.lt/js/default/dataTables.buttons.min.js" charset="UTF-8"></script>
        <script type="text/javascript" src="https://resources.vdu.lt/js/default/jquery.tablesorter.min.js"></script>

        <script type="text/javascript" src="https://resources.vdu.lt/js/default/bootstrap-filestyle-2.1.0.min.js"> </script>
        <script src="https://resources.vdu.lt/js/default/bootbox.min.js" charset="UTF-8"></script>
        <script type="text/javascript" src="https://resources.vdu.lt/js/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
        <script src="https://resources.vdu.lt/js/default/jszip.min.js" charset="UTF-8"></script>

        <script src="https://resources.vdu.lt/js/default/buttons.html5.min.js" charset="UTF-8"></script>
        <script src="https://resources.vdu.lt/js/default/buttons.print.min.js" charset="UTF-8"></script>
        <script type="text/javascript" src="https://resources.vdu.lt/js/bootstrap-datepicker/locales/bootstrap-datepicker.lt.min.js"></script>


        <script>
            $(document).ready(function() {
                $("body").append('<div class="loading" style="display:none; z-index: 100000;">Loading&#8230;</div>');
            });
            $(document).on({
                ajaxStart: function () {
                    $('.loading').css("display", "block");
                },
                ajaxStop: function () {
                    $('.loading').css("display", "none");
                }
            });
        </script>
    </head>
@endsection
@section ('header')
    <body>
    <nav class="navbar fixed-top navbar-expand-lg  navbar-dark bg-dark">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="https://resources.vdu.lt/images/vdu_logo_white_135.png" alt="Vytautas Magnus University">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav">
                {{--<li class="nav-item active">
                    <a class="nav-link" href="{{route('epasirasymas.agreement_search.searchIndex')}}">Sutartys <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('epasirasymas.agreement_create.createIndex')}}">Sutarčių formavimas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('epasirasymas.users.usersIndex')}}">Naudotojai</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Ataskaitos</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Prašymai
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="#">Išankstinių bakalaurų</a>
                        <a class="dropdown-item" href="#">Magistrų</a>
                        <a class="dropdown-item" href="#">Nuotoliniai</a>
                        <a class="dropdown-item" href="#">Papildomosios studijos</a>
                        <a class="dropdown-item" href="#">Ištęstinės studijos</a>
                        <a class="dropdown-item" href="#">Klausytojų</a>
                        <a class="dropdown-item" href="#">Doktorantų</a>
                        <a class="dropdown-item" href="#">Pedagogų perkvalifikavimo</a>
                    </div>
                </li>--}}
                @role('epasirasymas_erasmus_applications')
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Erasmus prašymai
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        {{--<a class="dropdown-item" href="{{route('epasirasymas.submittedApplications', ['app' => 3])}}">Erasmus</a>
                        <a class="dropdown-item" href="{{route('epasirasymas.submittedApplications', ['app' => 9])}}">Dvišalių mainų</a>
                        <a class="dropdown-item" href="#">Nominavimo sistema</a>
                        <a class="dropdown-item" href="#">Student traineeship</a>
                        <a class="dropdown-item" href="#">Recent graduate traineeship</a>
                        <a class="dropdown-item" href="#">VMU scholarship traineeship</a>
                        <a class="dropdown-item" href="#">Outgoing students / Erasmus+</a>
                        <a class="dropdown-item" href="#">Bilateral exchange</a>
                        <a class="dropdown-item" href="#">Personal data / Recent graduate</a>
                        <a class="dropdown-item" href="#">Personal data / Outgoing</a>
                        <a class="dropdown-item" href="#">Personal data / Outgoing (Non-EU)</a>--}}
                        <a class="dropdown-item" href="{{route('epasirasymas.submittedApplications', ['app' => 192])}}"> Scholarships for Prospective students</a>
                        <a class="dropdown-item" href="{{route('epasirasymas.submittedApplications', ['app' => 222])}}"> Scholarship for VMU International Full-time Degree Students</a>
                        <a class="dropdown-item" href="{{route('epasirasymas.submittedApplications', ['app' => 223])}}"> Application Form for English Foundation Courses at VMU</a>
                        <a class="dropdown-item" href="{{route('epasirasymas.submittedApplications', ['app' => 224])}}"> Application Form for Online PREP-Course (For Individual Participants)</a>
                        <a class="dropdown-item" href="{{route('epasirasymas.submittedApplications', ['app' => 225])}}"> PREP-Course Application Form (For Participants From Organised Groups)</a>
                    </div>
                </li>
                @endrole
                @role('faculty_workers')

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Magistrų priėmimas
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="{{route('epasirasymas.magistrai.balu_suvedimas')}}">Duomenų tikrinimas ir balų suvedimas</a>
                        <a class="dropdown-item" href="{{route('epasirasymas.magistrai.konkursine_eile')}}">Konkursinė eilė</a>
                    </div>
                </li>
                @endrole
                @role('sd_workers_mag')
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Nustatymai
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="{{route('epasirasymas.settings.applications.main')}}">Prašymų laiko koregavimas</a>
                        <a class="dropdown-item" href="{{route('epasirasymas.settings.surnameChange.surnMain')}}"> Pavardžių keitimo ataskaita </a>
                        {{--<a class="dropdown-item" href="{{route('epasirasymas.settings.adminTables.getTable')}}">Administracijos lentelių redagavimas</a>--}}
                        <a class="dropdown-item dropdown-toggle dropdown-submenu" href="#">Magistrai</a>
                        <div class="dropdown-menu">
                            @role('sd_admin_mag')
                                <a class="dropdown-item" href="{{route('epasirasymas.settings.magistrai.stage')}}">Etapai</a>
                            @endrole
                            <a class="dropdown-item" href="{{route('epasirasymas.settings.magistrai.programos')}}">Programų koregavimas</a>
                            <a class="dropdown-item" href="{{route('epasirasymas.settings.magistrai.koeficientai')}}">Programų koeficientų koregavimas</a>
                            <a class="dropdown-item" href="{{route('epasirasymas.settings.magistrai.program_create_base_view')}}"> Programų pridėjimas </a>
                        </div>
{{--                        <a class="dropdown-item dropdown-toggle dropdown-submenu" href="#">Pedagogai</a>--}}
{{--                        <div class="dropdown-menu">--}}
{{--                            @role('sd_admin_mag')--}}
{{--                            <a class="dropdown-item" href="{{route('epasirasymas.settings.pedagogai.stage')}}">Etapai</a>--}}
{{--                            @endrole--}}

{{--                        </div>--}}
                    </div>
                </li>
                @endrole
                @role('faculty_workers')
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Magistrų ataskaitos
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="{{route('epasirasymas.reports.applicantsBase')}}">Kandidatų į magistrantūros studijas statistika</a>
                        <a class="dropdown-item" href="{{route('epasirasymas.reports.programReportBase')}}">Programų ataskaita</a>
                        <a class="dropdown-item" href="{{route('epasirasymas.reports.ordersReport')}}"> Priėmimų įsakymų ataskaita </a>
                        <a class="dropdown-item" href="{{route('epasirasymas.reports.statisticsReportBase')}}"> Programų statistika </a>
                    </div>
                </li>
                @endrole

                @role('epasirasymas_foreigner_entry')
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Atvykstančiųjų įvedimas
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="{{route('epasirasymas.foreignerDataEntry.create')}}">Įvesti naują</a>
                        <a class="dropdown-item" href="{{route('epasirasymas.foreignerDataEntry.index')}}">Peržiūrėti esamus</a>
                    </div>
                </li>
                @endrole
                @role('epasirasymas_stip')
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Stipendijų prašymai
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="{{route('epasirasymas.scholarship.view')}}">Peržiūra</a>
                    </div>
                </li>
                @endrole
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLinkUser" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="material-icons float-left">face</i>&nbsp;&nbsp;{{$name}}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLinkUser">
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Atsijungti</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="post" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <div style="padding-top:90px"></div>
    <!--https://stackoverflow.com/a/45755948-->
    <script>
        $('.dropdown-menu a.dropdown-toggle').on('click', function(e) {
            if (!$(this).next().hasClass('show')) {
                $(this).parents('.dropdown-menu').first().find('.show').removeClass("show");
            }
            var $subMenu = $(this).next(".dropdown-menu");
            $subMenu.toggleClass('show');


            $(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function(e) {
                $('.dropdown-submenu .show').removeClass("show");
            });


            return false;
        });
    </script>

    <style>
        .dropdown-submenu {
            position: relative;
        }

        .dropdown-submenu a::after {
            transform: rotate(-90deg);
            position: absolute;
            right: 6px;
            top: .8em;
        }

        .dropdown-submenu .dropdown-menu {
            top: 0;
            left: 100%;
            margin-left: .1rem;
            margin-right: .1rem;
        }
        .dropdown-item:focus{
            color: red;
            text-decoration: none;
            background-color: initial;
        }
        .modal-xl {
            min-width:1080px;
        }
    </style>
@endsection

@section('footer')

    </body>
@endsection



