<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
<!-- Favicons -->
<link rel="apple-touch-icon" href="{{asset('img/icons/AVFAV.svg')}}">
<link rel="icon" href="{{asset('img/icons/AVFAV.svg')}}">
<title>
Entreprise Resource Planning
</title>
<!--     Fonts and icons     -->
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
<link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}" />
<link rel="stylesheet" href="{{asset('css/material-dashboard.min790f.css?v=2.0.1')}}">
</head>
<body class="off-canvas-sidebar login-page">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-primary navbar-transparent navbar-absolute" color-on-scroll="500">
	<div class="container">
    <div class="navbar-wrapper">
        <img src="{{asset('img/icons/AV.svg')}}" alt="">
          <a class="navbar-brand" href="#pablo">AceVel</a>
    </div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
      <span class="sr-only">Toggle navigation</span>
      <span class="navbar-toggler-icon icon-bar"></span>
      <span class="navbar-toggler-icon icon-bar"></span>
      <span class="navbar-toggler-icon icon-bar"></span>
    </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbar">
            <ul class="navbar-nav">

                <li class= "nav-item">
                    <a href="#" class="nav-link login" data-toggle="modal" data-target="#loginModal">
                        <i class="material-icons">fingerprint</i>
                        Login
                    </a>
                </li>


            </ul>
        </div>
	</div>
</nav>
<!-- End Navbar -->
    <div class="wrapper" style="background-size: cover;">
            <div class="page-header   bg   header-filter" filter-color="black" style="background-image: url({{asset('img/login.jpg')}}); background-size: cover; background-position: top center;">
        <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
            <div class="container">


            </div>
            <footer class="footer ">
                <div class="pull-left ml-3">
                    <img src="{{asset('img/icons/AV.png')}}" alt="AV" style="height: 100px">
                </div>
        <div class="container" style="margin-top: 30px;">

        <nav class="pull-left">
            <ul>
                <li>
                    <a href="#">
                        AceVel
                    </a>
                </li>
                <li>
                    <a href="#">
                       About Us
                    </a>
                </li>
                <li>
                    <a href="#">
                       Blog
                    </a>
                </li>
                <li>
                    <a href="#">
                        Licenses
                    </a>
                </li>
            </ul>
        </nav>

    </div>



</footer>


            </div>

</div>


    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-login" role="document">
            <div class="modal-content">
                <div class="card card-signup">
                    <div class="card-header card-header-primary text-center">
                        <i class="material-icons">fingerprint</i>
                        <h5 class="card-title" style="font-family:Roboto Slab, Times New Roman, serif">Log in</h5>

                    </div>
                    <div class="modal-body">
                        <form class="form" method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="card-body">

                                <div class="form-group bmd-form-group">
                                    <div class="input-group">
                                                        <span class="input-group-addon" style="margin-right: 20px; margin-top: 10px">
                                                            <i class="material-icons">email</i>
                                                        </span>
                                        <input id="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" placeholder="Email..." type="text" required autofocus>
                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group bmd-form-group">
                                    <div class="input-group">
                                                        <span class="input-group-addon" style="margin-right: 20px; margin-top: 10px">
                                                            <i class="material-icons">lock_outline</i>
                                                        </span>
                                        <input id="password" placeholder="Password..." name="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" type="password" required>
                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                            </div>


                    <div class="modal-footer justify-content-center">
                        <button type="submit" class="btn btn-primary btn-link btn-wd btn-lg">Get Started</button>
                    </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

    <!--   Core JS Files   -->
<script src="{{asset('js/jquery-2.1.3.min.js')}}"></script>
<script src="{{asset('js/popper.min.js')}}"></script>
<script src="{{asset('js/bootstrap-material-design.min.js')}}"></script>
<script src="{{asset('js/perfect-scrollbar.jquery.min.js')}}"></script>
<!--	Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<script src="{{asset('js/nouislider.min.js')}}"></script>
<!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
<script src="{{asset('js/bootstrap-selectpicker.js')}}"></script>
<!-- Plugins for presentation and navigation  -->
<script src=""></script>
<!-- Material Kit Core initialisations of plugins and Bootstrap Material Design Library -->
<script src="{{asset('js/material-dashboard790f.js?v=2.0.1')}}"></script>
<!-- Library for adding dinamically elements -->
<script src="{{asset('js/arrive.min.js')}}" type="text/javascript"></script>
<!-- Forms Validations Plugin -->
<script src="{{asset('js/jquery.validate.min.js')}}"></script>
<!--  Notifications Plugin, full documentation here: http://bootstrap-notify.remabledesigns.com/    -->
<script src="{{asset('js/bootstrap-notify.js')}}"></script>
<!-- Sweet Alert 2 plugin, full documentation here: https://limonte.github.io/sweetalert2/ -->
<script src="{{asset('js/sweetalert2.js')}}"></script>

</html>
<script type="text/javascript">
    $(".document").ready(function() {
        setTimeout(function() {
            $(".login").trigger('click');
        },10);
    });
    $(".login").click(function () {

        $('li').removeClass(' active');
        $(this).closest('li').addClass(' active');

    });







</script>
