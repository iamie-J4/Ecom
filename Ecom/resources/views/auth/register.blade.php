<!DOCTYPE html>
<html>
<head>
<title>E-Com</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Modern Shoppe Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
        function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--//for-mobile-apps -->
<!--Custom Theme files -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
<!--//Custom Theme files -->
<!--js-->
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/modernizr.custom.js"></script>
<!--//js-->
<!--cart-->
<script src="js/simpleCart.min.js"></script>
<!--cart-->
<!--web-fonts-->
<link href='//fonts.googleapis.com/css?family=Raleway:400,100,100italic,200,200italic,300,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic' rel='stylesheet' type='text/css'><link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Pompiere' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Fascinate' rel='stylesheet' type='text/css'>
<!-- Theme style -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.3/css/AdminLTE.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.3/css/skins/_all-skins.min.css">
<!-- iCheck -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/skins/square/_all.css">
<!--web-fonts-->
<!--animation-effect-->
<link href="css/animate.min.css" rel="stylesheet"> 
<script src="js/wow.min.js"></script>
    <script>
     new WOW().init();
    </script>
<!--//animation-effect-->
<!--start-smooth-scrolling-->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script> 
<script type="text/javascript">
        jQuery(document).ready(function($) {
            $(".scroll").click(function(event){     
                event.preventDefault();
                $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
            });
        });
</script>
<!--//end-smooth-scrolling-->
</head>
<body>
    <!--header-->
    <div class="header">
        <div class="top-header navbar navbar-default"><!--header-one-->
            <div class="container">
                <div class="nav navbar-nav wow fadeInLeft animated" data-wow-delay=".5s">
                    <p>Welcome to E-Com Shop 
                        @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        Or
                         <a href="{{ url('/register')}}">Register</a> 
                        <!--<a href="{{ route('register') }}">Register</a>-->
                    @endauth
                </div>
            @endif  
                </div>
                <div class="nav navbar-nav navbar-right social-icons wow fadeInRight animated" data-wow-delay=".5s">
                    <ul>
                        <li><a href="#"> </a></li>
                        <li><a href="#" class="pin"> </a></li>
                        <li><a href="#" class="in"> </a></li>
                        <li><a href="#" class="be"> </a></li>
                        <li><a href="#" class="you"> </a></li>
                        <li><a href="#" class="vimeo"> </a></li>
                    </ul>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
        
    </div>
    <!--//header-->
    <!--banner-->
    <div class="banner">
        <div class="container">
            <div class="banner-text">           

<div class="col-md-5 col-lg-5 col-sm-5 col-xs-6" style="margin-left: 35%; background-color: #F0F8FF">
    <div class="register-logo">
        <a href="{{ url('/home') }}"><b>E-com </b>Registration</a>
    </div>

    <div class="register-box-body">
        <form method="post" action="{{ url('/register') }}">

            {!! csrf_field() !!}
            <div class="form-group has-feedback{{ $errors->has('role_id') ? ' has-error' : '' }}">
                <label style="color: #FF7F50">Choose Account type</label>
            <select name="role_id" class="form-control">
              <option value="SGFHDdfhhdfoodhfRShsxxsydv">Customer</option>
              <option value="sjfhTHDBskbfajbjfswwnsfh">Seller</option>
            </select>
            @if ($errors->has('role_id'))
                    <span class="help-block">
                        <strong>{{ $errors->first('role_id') }}</strong>
                    </span>
                @endif

            </div>
            {{--first name--}}
            <div class="form-group has-feedback{{ $errors->has('first_name') ? ' has-error' : '' }}">
                <input type="text" class="form-control" name="first_name" value="{{ old('first_name') }}" placeholder="First Name">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>

                @if ($errors->has('first_name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('first_name') }}</strong>
                    </span>
                @endif
            </div>

            {{--last name--}}
            <div class="form-group has-feedback{{ $errors->has('last_name') ? ' has-error' : '' }}">
                <input type="text" class="form-control" name="last_name" value="{{ old('name') }}" placeholder="Last Name">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>

                @if ($errors->has('last_name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('last_name') }}</strong>
                    </span>
                @endif
            </div>


            <div class="form-group has-feedback{{ $errors->has('email') ? ' has-error' : '' }}">
                <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>

                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group has-feedback{{ $errors->has('password') ? ' has-error' : '' }}">
                <input type="password" class="form-control" name="password" placeholder="Password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>

                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group has-feedback{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>

                @if ($errors->has('password_confirmation'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                    </span>
                @endif
            </div>

            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck">
                        <label>
                            <input type="checkbox"> I agree to the <a href="#">terms & Conditions</a>
                        </label>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
                </div>
                <!-- /.col -->
            </div>
        </form>

        <a href="{{ url('/login') }}" class="text-center">I already have a membership</a>
    </div>
    <!-- /.form-box -->
</div>
<!-- /.register-box -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<!-- AdminLTE App -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.3/js/adminlte.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/icheck.min.js"></script>

<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
    });
</script>
</body>
</html>
