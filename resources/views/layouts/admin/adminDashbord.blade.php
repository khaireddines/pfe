<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Favicons -->
    <link rel="apple-touch-icon" href="{{asset('img/icons/AVFAV.svg')}}">
    <link rel="icon" href="{{asset('img/icons/AVFAV.svg')}}">

    <title>

        Entreprise Resources Planning(iset)

    </title>

    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" type="text/css" href="{{asset('css/font-awesome.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('css/material-dashboard.min790f.css?v=2.0.1')}}">





@yield('custemImp')

</head>

<body class="">

<div class="wrapper">
    <div class="sidebar " data-color="azure" data-background-color="black" data-image="{{asset("img/sidebar-2.jpg")}}">
        <!--
            Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

            Tip 2: you can also add an image using data-image tag
        -->

        <div class="logo">
            <a href="#AceVel" class="simple-text logo-mini">
                <img src="{{asset('img/icons/AV.svg')}}" alt="AV">
            </a>

            <a href="#AceVel" class="simple-text logo-normal">
                AceVel
            </a>

        </div>

        <div class="sidebar-wrapper">
            <div class="user">
                <div class="photo">
                    <img src="{{asset('img/profile_img/khaireddine.jpg')}}" />
                </div>
                <div class="user-info">
                    <a data-toggle="collapse" href="#collapseExample" class="username">
                    <span>
                      {{ Auth::user()->name }}
                      <b class="caret"></b>
                    </span>
                    </a>
                    <div class="collapse setting" id="collapseExample">
                        <ul class="nav">
                            <li class="nav-item profile">@php use App\User; $user=new User();
                                @endphp
                                <a class="nav-link" href="/create_Enseignant/{!! $user->AuthUserMat() !!}?type=profile">
                                    <span class="sidebar-mini"> MP </span>
                                    <span class="sidebar-normal"> My Profile </span>
                                </a>

                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <span class="sidebar-mini"> S </span>
                                    <span class="sidebar-normal"> Settings </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <ul class="nav">

                <li class="nav-item Dashboard">
                    <a class="nav-link " href="/Dashboard">
                        <i class="material-icons">dashboard</i>
                        <p> Dashboard </p>
                    </a>
                </li>

                <li class="nav-item pages">
                    <a class="nav-link" data-toggle="collapse" href="#pagesExamples">
                        <i class="material-icons">widgets</i>
                        <p> Resources
                            <b class="caret"></b>
                        </p>
                    </a>

                    <div class="collapse CRUD" id="pagesExamples">
                        <ul class="nav">
                            <li class="nav-item D">
                                <a class="nav-link dep" href="/departement">
                                    <span class="sidebar-mini"> D </span>
                                    <span class="sidebar-normal"> Department </span>
                                </a>
                            </li>
                            <li class="nav-item F">
                                <a class="nav-link" href="/formation">
                                    <span class="sidebar-mini"> T </span>
                                    <span class="sidebar-normal"> Training </span>
                                </a>
                            </li>
                            <li class="nav-item U">
                                <a class="nav-link" href="/Unite_ens">
                                    <span class="sidebar-mini"> TU </span>
                                    <span class="sidebar-normal"> Teaching Unit </span>
                                </a>
                            </li>
                            <li class="nav-item C">
                                <a class="nav-link" href="/Class">
                                    <span class="sidebar-mini"> C </span>
                                    <span class="sidebar-normal">  Class </span>
                                </a>
                            </li>

                            <li class="nav-item M">
                                <a class="nav-link" href="/Matiere">
                                    <span class="sidebar-mini"> S </span>
                                    <span class="sidebar-normal"> Subject </span>
                                </a>
                            </li>
                            <li class="nav-item E">
                                <a class="nav-link" href="/Enseignant">
                                    <span class="sidebar-mini"> P </span>
                                    <span class="sidebar-normal"> Professor </span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>



                <li class="nav-item AF">
                    <a class="nav-link" href="/affectMat">
                        <i class="material-icons">content_paste</i>
                        <p> Assignment </p>
                    </a>
                </li>

                <li class="nav-item RE">
                    <a class="nav-link" href="/repartition">
                        <i class="material-icons">grid_on</i>
                        <p> Search & Go </p>
                    </a>
                </li>

                <li class="nav-item EM">
                    <a class="nav-link" href="/emploi">
                        <i class="material-icons">date_range</i>
                        <p> Schedule </p>
                    </a>
                </li>

            </ul>
        </div>
    </div>


    <div class="main-panel">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-transparent  navbar-absolute fixed-top">
            <div class="container-fluid">
                <div class="navbar-wrapper">
                    <div class="navbar-minimize">
                        <button id="minimizeSidebar" class="btn btn-just-icon btn-white btn-fab btn-round">
                            <i class="material-icons text_align-center visible-on-sidebar-regular">more_vert</i>
                            <i class="material-icons design_bullet-list-67 visible-on-sidebar-mini">view_list</i>
                        </button>
                    </div>

                </div>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="navbar-toggler-icon icon-bar"></span>
                    <span class="navbar-toggler-icon icon-bar"></span>
                    <span class="navbar-toggler-icon icon-bar"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-end">
                    {{--<form class="navbar-form">--}}
                        {{--<div class="input-group no-border">--}}
                            {{--<input type="text" value="" class="form-control" placeholder="Search...">--}}
                            {{--<button type="submit" class="btn btn-white btn-round btn-just-icon">--}}
                                {{--<i class="material-icons">search</i>--}}
                                {{--<div class="ripple-container"></div>--}}
                            {{--</button>--}}
                        {{--</div>--}}
                    {{--</form>--}}

                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('log-viewer::dashboard')}}">
                                <i class="fa fa-dashboard"></i>
                                <p>
                                    <span class="d-lg-none d-md-block">logview</span>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('Activitylog')}}">
                                <i class="material-icons">history</i>
                                <p>
                                    <span class="d-lg-none d-md-block">Stats</span>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('Dashboard')}}">
                                <i class="material-icons">dashboard</i>
                                <p>
                                    <span class="d-lg-none d-md-block">Stats</span>
                                </p>
                            </a>
                        </li>




                        <li class="nav-item dropdown">
                            <a class="nav-link" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="cursor: pointer">
                                <i class="material-icons">person</i>
                                <p>
                                    <span class="d-lg-none d-md-block">Account</span>
                                </p>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="/create_Enseignant/{!! $user->AuthUserMat() !!}?type=profile">Profile</a>

                                <a class="dropdown-item" href="#">Setting</a>
                                <hr>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>

                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- End Navbar -->




        <div class="content">
            <div class="container-fluid">
               @yield('content')

            </div>
        </div>

        <footer class="footer ">
            <div class="pull-left ml-3">
                <img src="{{asset('img/icons/AV.png')}}" alt="AV" style="height: 100px">
            </div>


            <div class="container" style="margin-top: 30px;">

                <nav class="pull-left">
                    <ul>

                        <li>
                            <a href="#AceVel">

                                AceVel Team
                            </a>
                        </li>
                        <li>
                            <a href="#AceVel">
                                About Us
                            </a>
                        </li>
                        <li>
                            <a href="#AceVel">
                                Blog
                            </a>
                        </li>
                        <li>
                            <a href="#AceVel">
                                Licenses
                            </a>
                        </li>

                    </ul>
                </nav>
                <div class="copyright pull-right" >
                    &copy; <script>document.write(new Date().getFullYear())</script>, made with <i class="material-icons">favorite</i> by <a href="#AceVel" target="_blank">AceVel Team</a> for a better web.
                </div>
            </div>






        </footer>


    </div>
</div>

<div class="fixed-plugin">
    <div class="dropdown show-dropdown">
        <a href="#" data-toggle="dropdown">
            <i class="fa fa-cog fa-2x"> </i>
        </a>

        <ul class="dropdown-menu">
            <li class="header-title"> Sidebar Filters</li>
            <li class="adjustments-line">
                <a href="javascript:void(0)" class="switch-trigger active-color">
                    <div class="ml-auto mr-auto">
                        <span class="badge filter badge-purple" data-color="purple"></span>
                        <span class="badge filter badge-azure active" data-color="azure"></span>
                        <span class="badge filter badge-green" data-color="green"></span>
                        <span class="badge filter badge-orange" data-color="orange"></span>
                        <span class="badge filter badge-danger" data-color="danger"></span>
                        <span class="badge filter badge-rose " data-color="rose"></span>
                    </div>
                    <div class="clearfix"></div>
                </a>
            </li>

            <li class="header-title">Sidebar Background</li>
            <li class="adjustments-line">
                <a href="javascript:void(0)" class="switch-trigger background-color">
                    <div class="ml-auto mr-auto">
                        <span class="badge filter badge-white" data-color="white"></span>
                        <span class="badge filter badge-black active" data-color="black"></span>
                    </div>
                    <div class="clearfix"></div>
                </a>
            </li>

            <li class="adjustments-line">
                <a href="javascript:void(0)" class="switch-trigger">
                    <p>Sidebar Mini</p>
                    <label class="ml-auto">
                        <div class="togglebutton switch-sidebar-mini">
                            <label>
                                <input type="checkbox">
                                <span class="toggle"></span>
                            </label>
                        </div>
                    </label>
                    <div class="clearfix"></div>
                </a>
            </li>

            <li class="adjustments-line">
                <a href="javascript:void(0)" class="switch-trigger">
                    <p>Sidebar Images</p>
                    <label class="switch-mini ml-auto">
                        <div class="togglebutton switch-sidebar-image">
                            <label>
                                <input type="checkbox" checked="">
                                <span class="toggle"></span>
                            </label>
                        </div>
                    </label>
                    <div class="clearfix"></div>
                </a>
            </li>

            <li class="header-title">Images</li>

            <li>
                <a class="img-holder switch-trigger" href="javascript:void(0)">
                    <img src="{{asset('img/sidebar-1.jpg')}}" alt="" />
                </a>
            </li>
            <li class="active">
                <a class="img-holder switch-trigger" href="javascript:void(0)">
                    <img src="{{asset('img/sidebar-2.jpg')}}" alt="" />
                </a>
            </li>
            <li>
                <a class="img-holder switch-trigger" href="javascript:void(0)">
                    <img src="{{asset('img/sidebar-3.jpg')}}" alt="" />
                </a>
            </li>
            <li>
                <a class="img-holder switch-trigger" href="javascript:void(0)">
                    <img src="{{asset('img/sidebar-4.jpg')}}" alt="" />
                </a>
            </li>

        </ul>
    </div>
</div>


</body>
<!--   Core JS Files   -->
<script src="{{asset('js/sweetalert2.js')}}"></script>

<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/popper.min.js')}}"></script>
<script src="{{asset('js/bootstrap-material-design.min.js')}}"></script>



<script src="{{asset('js/perfect-scrollbar.jquery.min.js')}}"></script>
<!--  Plugin for Date Time Picker and Full Calendar Plugin  -->
<script src="{{asset('js/moment.min.js')}}"></script>
<!--	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
<script src="{{asset('js/bootstrap-datetimepicker.min.js')}}"></script>
<!--	Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<script src="{{asset('js/nouislider.min.js')}}"></script>
<!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
<script src="{{asset('js/bootstrap-selectpicker.js')}}"></script>
<!--	Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="{{asset('js/jasny-bootstrap.min.js')}}"></script>
<!-- Material Kit Core initialisations of plugins and Bootstrap Material Design Library -->
<script src="{{asset("js/material-dashboard790f.js")}}"></script>
<!-- Library for adding dinamically elements -->
<script src="{{asset('js/arrive.min.js')}}" type="text/javascript"></script>
<!-- Forms Validations Plugin -->
<script src="{{asset('js/jquery.validate.min.js')}}"></script>
<!--  Charts Plugin, full documentation here: https://gionkunz.github.io/chartist-js/ -->
<script src="{{asset('js/chartist.min.js')}}"></script>
<!--  Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
<script src="{{asset('js/jquery.bootstrap-wizard.js')}}"></script>
<!--  Notifications Plugin, full documentation here: http://bootstrap-notify.remabledesigns.com/    -->
<script src="{{asset('js/bootstrap-notify.js')}}"></script>
<!-- Sweet Alert 2 plugin, full documentation here: https://limonte.github.io/sweetalert2/ -->
<script src="{{asset('js/sweetalert2.all.min.js')}}"></script>
<!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
<script src="{{asset('js/fullcalendar.min.js')}}"></script>
<!-- demo init -->
<script src="{{asset('js/demo.js')}}"></script>
<script src="{{asset('js/jquery.datatables.js')}}"></script>


<script src="{{asset('js/perfect-scrollbar.min.js')}}"></script>
<script src="{{asset('js/sweetalert2.js')}}"></script>




<script src="{{asset('js/jquery-ui.min.js')}}"></script>


<script src="{{asset('js/arrive.min.js')}}"></script>
@yield('custemScript')
<script>

</script>
</html>
