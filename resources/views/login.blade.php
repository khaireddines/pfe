<!doctype html>
<html lang="en">


<head>

<meta charset="utf-8">
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
<!-- Favicons -->
<link rel="apple-touch-icon" href="">
<link rel="icon" href="">
<title>

Iset

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
          <a class="navbar-brand" href="#pablo">Laravel</a>
    </div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
      <span class="sr-only">Toggle navigation</span>
      <span class="navbar-toggler-icon icon-bar"></span>
      <span class="navbar-toggler-icon icon-bar"></span>
      <span class="navbar-toggler-icon icon-bar"></span>
    </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="{{route('home')}}" class="nav-link">
                        <i class="material-icons">dashboard</i>
                        Dashboard
                    </a>
                </li>
                <li class= "nav-item ">
                    <a href="#" class="nav-link register" data-toggle="modal" data-target="#signupModal">
                        <i class="material-icons">person_add</i>
                        Register
                    </a>
                </li>
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

        <div class="container">
        <nav class="pull-left">
            <ul>
                <li>
                    <a href="#">
                        AceWings
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

    <div class="modal fade" id="signupModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-signup" role="document">
            <div class="modal-content">
                <div class="card card-signup card-plain">
                    <div class="modal-header">
                        <h5 class="modal-title card-title" style="font-family:Roboto Slab, Times New Roman, serif">Register</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i class="material-icons">clear</i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-5 ml-auto">
                                <div class="info info-horizontal">
                                    <div class="icon" style="color: rgb(233, 30, 99);" >
                                        <i class="material-icons">timeline</i>
                                    </div>
                                    <div class="description">
                                        <h4 class="info-title">Marketing</h4>
                                        <p class="description">
                                            We've created the marketing campaign of the website. It was a very interesting collaboration.
                                        </p>
                                    </div>
                                </div>

                                <div class="info info-horizontal">
                                    <div class="icon icon-primary" style="color: rgb(156, 39, 176);">
                                        <i class="material-icons" >code</i>
                                    </div>
                                    <div class="description">
                                        <h4 class="info-title">Fully Coded in HTML5</h4>
                                        <p class="description">
                                            We've developed the website with HTML5 and CSS3. The client has access to the code using GitHub.
                                        </p>
                                    </div>
                                </div>

                                <div class="info info-horizontal">
                                    <div class="icon icon-info" style="color: rgb(0, 188, 212);">
                                        <i class="material-icons">group</i>
                                    </div>
                                    <div class="description">
                                        <h4 class="info-title">Built Audience</h4>
                                        <p class="description">
                                            There is also a Fully Customizable CMS Admin Dashboard for this product.
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-5 mr-auto">


                                <form class="form" method="" action="">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <div class="input-group">
                            <span class="input-group-addon" style="color: rgb(73, 80, 87);">
                            <i class="material-icons">face</i>
                        </span>
                                                <input type="text" class="form-control" placeholder="First Name...">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="input-group">
                      <span class="input-group-addon">
                          <i class="material-icons">email</i>
                      </span>
                                                <input type="text" class="form-control" placeholder="Email...">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="input-group">
                      <span class="input-group-addon">
                          <i class="material-icons">lock_outline</i>
                      </span>
                                                <input type="password" placeholder="Password..." class="form-control" />
                                            </div>
                                        </div>

                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="checkbox" value="" checked>
                                                <span class="form-check-sign">
                          <span class="check"></span>
                      </span>
                                                I agree to the <a href="#something">terms and conditions</a>.
                                            </label>
                                        </div>
                                    </div>
                                    <div class="modal-footer justify-content-center">
                                        <a href="#pablo" class="btn btn-primary btn-round">Get Started</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-login" role="document">
            <div class="modal-content">
                <div class="card card-signup">
                    <div class="card-header card-header-primary text-center">
                        <h5 class="card-title" style="font-family:Roboto Slab, Times New Roman, serif">Log in</h5>

                    </div>
                    <div class="modal-body">
                        <form class="form" method="" action="#">

                            <div class="card-body">
                                <div class="form-group bmd-form-group">
                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="material-icons">face</i>
                                                        </span>
                                        <input class="form-control" placeholder="First Name..." type="text">
                                    </div>
                                </div>
                                <div class="form-group bmd-form-group">
                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="material-icons">email</i>
                                                        </span>
                                        <input class="form-control" placeholder="Email..." type="text">
                                    </div>
                                </div>
                                <div class="form-group bmd-form-group">
                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="material-icons">lock_outline</i>
                                                        </span>
                                        <input placeholder="Password..." class="form-control" type="password">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer justify-content-center">
                        <a href="#pablo" class="btn btn-primary btn-link btn-wd btn-lg">Get Started</a>
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
    $(".login").click(function () {
        $(".bg").css('background-image','url({{asset("img/login.jpg")}})');
        $('li').removeClass(' active');
        $(this).closest('li').addClass(' active');
        $('.card1').removeClass('card-hidden');
    });
    $(".register").click(function () {
        $(".bg").css('background-image','url({{asset("img/register.jpg")}})');
        $('li').removeClass(' active');
       $(this).closest('li').addClass(' active');
       $(".card2").removeClass('card-hidden');
    });






</script>
