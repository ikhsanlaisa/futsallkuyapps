<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sufee Admin - HTML5 Admin Template</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="{{asset('css/normalize.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/cs-skin-elastic.css')}}">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="{{asset('scss/style.css')}}">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>
<body class="bg-dark">


<div class="sufee-login d-flex align-content-center flex-wrap">
    <div class="container">
        <div class="login-content">
            <div class="login-logo">
                <a href="index.html">
                    <img class="align-content" src="images/logo.png" alt="">
                </a>
            </div>
            <div class="login-form">
                <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label>Email address</label>
                        <input type="email" name="email" class="form-control" placeholder="Email">
                        @if ($errors->has('email'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password">
                        @if ($errors->has('password'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                        </label>
                        <label class="pull-right">
                            <a href="{{ route('password.request') }}">Forgotten Password?</a>
                        </label>

                    </div>
                    <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Sign in</button>
                    {{--<div class="social-login-content">--}}
                        {{--<div class="social-button">--}}
                            {{--<button type="button" class="btn social facebook btn-flat btn-addon mb-3"><i class="ti-facebook"></i>Sign in with facebook</button>--}}
                            {{--<button type="button" class="btn social twitter btn-flat btn-addon mt-2"><i class="ti-twitter"></i>Sign in with twitter</button>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    <div class="register-link m-t-15 text-center">
                        <p>Don't have account ? <a href="{{ route('register') }}"> Sign Up Here</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<script src="{{asset('js/vendor/jquery-2.1.4.min.js')}}"></script>
<script src="{{asset('js/popper.min.js')}}"></script>
<script src="{{asset('js/plugins.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>


</body>
</html>
