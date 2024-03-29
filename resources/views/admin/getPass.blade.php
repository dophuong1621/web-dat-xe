<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets')}}/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="{{ asset('assets')}}/img/ava-xe-2.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Forgot Password</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <!-- Bootstrap core CSS     -->
    <link href="{{ asset('assets')}}/css/bootstrap.min.css" rel="stylesheet" />
    <!--  Material Dashboard CSS    -->
    <link href="{{ asset('assets')}}/css/material-dashboard.css?v=1.2.1" rel="stylesheet" />
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="{{ asset('assets')}}/css/demo.css" rel="stylesheet" />
    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body class="off-canvas-sidebar">
    <nav class="navbar navbar-primary navbar-transparent navbar-absolute">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                {{-- <a class="navbar-brand" href=" ../dashboard.html ">Material Dashboard Pro</a> --}}
            </div>
            {{-- <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="../dashboard.html">
                            <i class="material-icons">dashboard</i> Dashboard
                        </a>
                    </li>
                    <li class=" active ">
                        <a href="register.html">
                            <i class="material-icons">person_add</i> Register
                        </a>
                    </li>
                    <li class="">
                        <a href="login.html">
                            <i class="material-icons">fingerprint</i> Login
                        </a>
                    </li>
                    <li class="">
                        <a href="lock.html">
                            <i class="material-icons">lock_open</i> Lock
                        </a>
                    </li>
                </ul>
            </div> --}}
        </div>
    </nav>
    <div class="wrapper wrapper-full-page">
        <div class="full-page register-page" filter-color="black" data-image="{{ asset('assets')}}/img/register.jpeg">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-6 col-md-offset-4 col-sm-offset-3">
                    </h4>
                    <form method="POST" action="{{ route('postGetPass', $admin->id) }}">
                            @csrf
                            <div class="card card-login card-hidden">
                                <div class="card-header text-center" data-background-color="rose">
                                    <h4 class="card-title">Reset Password</h4>
                                </div>
                                <div class="card-content">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons"></i>
                                        </span>
                                        <div class="form-group label-floating">
                                            <label class="control-label">Password</label>
                                            <input type="password" name="password" class="form-control"> 
                                        </div>
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons"></i>
                                        </span>
                                        <div class="form-group label-floating">
                                            <label class="control-label">Confirm Password</label>
                                            <input type="password" name="confirm_password" class="form-control">
                                        </div>
                                    </div>
                                    @error('password') 
                                                {{ $message }}
                                    @enderror 
                                    
                                </div>
                                <div class="footer text-center">
                                    
                                    <button type="submit" class="btn btn-rose btn-simple btn-wd btn-lg">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
           
        </div>
    </div>
</body>
<!--   Core JS Files   -->
<script src="{{ asset('assets')}}/js/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="{{ asset('assets')}}/js/bootstrap.min.js" type="text/javascript"></script>
<script src="{{ asset('assets')}}/js/material.min.js" type="text/javascript"></script>
<script src="{{ asset('assets')}}/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
<!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
<!-- Library for adding dinamically elements -->
<script src="{{ asset('assets')}}/js/arrive.min.js" type="text/javascript"></script>
<!-- Forms Validations Plugin -->
<script src="{{ asset('assets')}}/js/jquery.validate.min.js"></script>
<!--  Plugin for Date Time Picker and Full Calendar Plugin-->
<script src="{{ asset('assets')}}/js/moment.min.js"></script>
<!--  Charts Plugin, full documentation here: https://gionkunz.github.io/chartist-js/ -->
<script src="{{ asset('assets')}}/js/chartist.min.js"></script>
<!--  Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
<script src="{{ asset('assets')}}/js/jquery.bootstrap-wizard.js"></script>
<!--  Notifications Plugin, full documentation here: http://bootstrap-notify.remabledesigns.com/    -->
<script src="{{ asset('assets')}}/js/bootstrap-notify.js"></script>
<!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
<script src="{{ asset('assets')}}/js/bootstrap-datetimepicker.js"></script>
<!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
<script src="{{ asset('assets')}}/js/jquery-jvectormap.js"></script>
<!-- Sliders Plugin, full documentation here: https://refreshless.com/nouislider/ -->
<script src="{{ asset('assets')}}/js/nouislider.min.js"></script>
<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!--  Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
<script src="{{ asset('assets')}}/js/jquery.select-bootstrap.js"></script>
<!--  DataTables.net Plugin, full documentation here: https://datatables.net/    -->
<script src="{{ asset('assets')}}/js/jquery.datatables.js"></script>
<!-- Sweet Alert 2 plugin, full documentation here: https://limonte.github.io/sweetalert2/ -->
<script src="{{ asset('assets')}}/js/sweetalert2.js"></script>
<!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="{{ asset('assets')}}/js/jasny-bootstrap.min.js"></script>
<!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
<script src="{{ asset('assets')}}/js/fullcalendar.min.js"></script>
<!-- Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
<script src="{{ asset('assets')}}/js/jquery.tagsinput.js"></script>
<!-- Material Dashboard javascript methods -->
<script src="{{ asset('assets')}}/js/material-dashboard.js?v=1.2.1"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="{{ asset('assets')}}/js/demo.js"></script>
<script type="text/javascript">
    $().ready(function() {
        demo.checkFullPageBackgroundImage();

        setTimeout(function() {
            // after 1000 ms we add the class animated to the login/register card
            $('.card').removeClass('card-hidden');
        }, 700)
    });
</script>

</html>