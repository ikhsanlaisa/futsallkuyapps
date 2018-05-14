<!DOCTYPE html>
<html>
    <head>
        <title>@yield('title')</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Bootstrap CSS-->
        <link rel="stylesheet" href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}">
        <!-- Font Awesome CSS-->
        <link rel="stylesheet" href="{{asset('vendor/font-awesome/css/font-awesome.min.css')}}">
        <!-- Google fonts - Roboto-->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,700">
        <!-- Bootstrap Select-->
        <link rel="stylesheet" href="{{asset('vendor/bootstrap-select/css/bootstrap-select.min.css')}}">
        <!-- owl carousel-->
        <link rel="stylesheet" href="{{asset('vendor/owl.carousel/assets/owl.carousel.css')}}">
        <link rel="stylesheet" href="{{asset('vendor/owl.carousel/assets/owl.theme.default.css')}}">
        <!-- theme stylesheet-->
        <link rel="stylesheet" href="{{asset('css/style.default.css')}}" id="theme-stylesheet">
        <!-- Custom stylesheet - for your changes-->
        <link rel="stylesheet" href="{{asset('css/custom.css')}}">
        {{--    <script src="{{asset('myscripts.js')}}"></script>--}}
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Universal - All In 1 Template</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="robots" content="all,follow">
        <!-- Bootstrap CSS-->
        <link rel="stylesheet" href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}">
        <!-- Font Awesome CSS-->
        <link rel="stylesheet" href="{{asset('vendor/font-awesome/css/font-awesome.min.css')}}">
        <!-- Google fonts - Roboto-->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,700">
        <!-- Bootstrap Select-->
        <link rel="stylesheet" href="{{asset('vendor/bootstrap-select/css/bootstrap-select.min.css')}}">
        <!-- owl carousel-->
        <link rel="stylesheet" href="{{asset('vendor/owl.carousel/assets/owl.carousel.css')}}">
        <link rel="stylesheet" href="{{asset('vendor/owl.carousel/assets/owl.theme.default.css')}}">
        <!-- theme stylesheet-->
        <link rel="stylesheet" href="{{asset('css/style.default.css')}}" id="theme-stylesheet">
        <!-- Custom stylesheet - for your changes-->
        <link rel="stylesheet" href="{{asset('css/custom.css')}}">
        {{--<!-- Favicon and apple touch icons-->--}}
        {{--<link rel="shortcut icon" href="{{asset('img/favicon.ico')}}" type="image/x-icon">--}}
        {{--<link rel="apple-touch-icon" href="{{asset('img/apple-touch-icon.png')}}">--}}
        {{--<link rel="apple-touch-icon" sizes="57x57" href="{{asset('img/apple-touch-icon-57x57.png')}}">--}}
        {{--<link rel="apple-touch-icon" sizes="72x72" href="{{asset('img/apple-touch-icon-72x72.png')}}">--}}
        {{--<link rel="apple-touch-icon" sizes="76x76" href="{{asset('img/apple-touch-icon-76x76.png')}}">--}}
        {{--<link rel="apple-touch-icon" sizes="114x114" href="{{asset('img/apple-touch-icon-114x114.png')}}">--}}
        {{--<link rel="apple-touch-icon" sizes="120x120" href="{{asset('img/apple-touch-icon-120x120.png')}}">--}}
        {{--<link rel="apple-touch-icon" sizes="144x144" href="{{asset('img/apple-touch-icon-144x144.png')}}">--}}
        {{--<link rel="apple-touch-icon" sizes="152x152" href="{{asset('img/apple-touch-icon-152x152.png')}}">--}}
        <link rel="stylesheet" type="text/css" href="{{asset('css/jquery-gmaps-latlon-picker.css')}}"/>
        <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
        <style>
        #map {
        height: 400px;
        width: 100%;
        }
        .dropdown-menu-center {
        right: auto;
        left: 50%;
        -webkit-transform: translate(-50%, 0);
        -o-transform: translate(-50%, 0);
        transform: translate(-50%, 0);
        }
        </style>
        @yield('style')
    </head>
    <body>
        <div>
            <!-- Navbar Start-->
            <header class="nav-holder make-sticky">
                <div id="navbar" role="navigation" class="navbar navbar-expand-lg">
                    <div class="container">
                        <a href="/" class="navbar-brand home"><img src="{{asset('images/template/logo.png')}}"
                            alt="Universal logo" class="d-none d-md-inline-block" style="height: 42px;"><img
                            src="{{asset('images/template/logo-small.png')}}" alt="Universal logo"
                            class="d-inline-block d-md-none"><span class="sr-only">Universal - go to homepage</span></a>
                            <button type="button" data-toggle="collapse" data-target="#navigation"
                            class="navbar-toggler btn-template-outlined"><span class="sr-only">Toggle navigation</span><i
                            class="fa fa-align-justify"></i></button>
                            <div id="navigation" class="navbar-collapse collapse">
                                <ul class="nav navbar-nav ml-auto">
                                    <li class="nav-item"><a href="javascript: void(0)">About</a></li>
                                    <li class="nav-item"><a href="javascript: void(0)">Features</a></li>
                                    <li class="nav-item"><a href="javascript: void(0)">Support</a></li>
                                    @guest
                                    <li class="nav-item dropdown">
                                        <a href="#/login" class="dropdown-toggle" data-toggle="dropdown">Login</a>
                                        <div class="dropdown-menu dropdown-menu-right" style="padding: 20px 5px; min-width: 350px;">
                                            @include('content_signin')
                                        </div>
                                    </li>
                                    @else
                                    <li class="nav-item dropdown">
                                        <a title="Notofication" href="#notif" class="" data-toggle="dropdown">&nbsp;<i class="fa fa-bell-o"></i>&nbsp;<span style="font-size:12px; color:#f5f5f5;" class="badge badge-primary badge-pill">0</span>&nbsp;</a>
                                        <div class="dropdown-menu dropdown-menu-center" style="padding: 20px 5px; min-width: 350px;">
                                            <span style="text-align: center; margin:2% 5%; display: block; color:#bbb;">Belum Ada Notifikasi</span>
                                        </div>
                                    </li>
                                    <li class="nav-item dropdown"><a href="javascript: void(0)" class="dropdown-toggle"
                                        data-toggle="dropdown">{{ Auth::user()->name }} <b
                                    class="caret"></b></a>
                                    <ul class="dropdown-menu dropdown-menu-right" style="min-width: 250px;">
                                        <li class="dropdown-item"><a href="/lobbies" class="nav-link"><i class="fa fa-circle-o-notch"></i>&nbsp;Lobbies</a></li>
                                        <li class="dropdown-item"><a href="/my" class="nav-link"><i class="fa fa-user"></i>&nbsp;My Profile</a></li>
                                        <li class="dropdown-item"><a href="/my/booking" class="nav-link"><i class="fa fa-check-square-o"></i>&nbsp;My Booking</a></li>
                                        <li class="dropdown-item"><a href="/my/topup" class="nav-link"><i class="fa fa-usd"></i>&nbsp;Top Up</a></li>
                                        <li class="dropdown-item"><a href="{{ route('logout') }}" class="nav-link"
                                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                            <i class="fa fa-power-off"></i>&nbsp;Logout
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            style="display: none;">
                                            {{ csrf_field() }}
                                        </form></li>
                                    </ul>
                                </li>
                                @endguest
                            </ul>
                        </div>
                    </div>
                </div>
            </header>
            <!-- Navbar End-->
            <div class="container">
                @yield('content')
            </div>
            <footer>
            </footer>
        </div>
        <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/sweetalert.min.js')}}"></script>
        <script src="{{asset('vendor/popper.js/umd/popper.min.js')}}"></script>
        <script src="{{asset('vendor/bootstrap/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('vendor/jquery.cookie/jquery.cookie.js')}}"></script>
        <script src="{{asset('vendor/waypoints/lib/jquery.waypoints.min.js')}}"></script>
        <script src="{{asset('vendor/jquery.counterup/jquery.counterup.min.js')}}"></script>
        <script src="{{asset('vendor/owl.carousel/owl.carousel.min.js')}}"></script>
        <script src="{{asset('vendor/owl.carousel2.thumbs/owl.carousel2.thumbs.min.js')}}"></script>
        <script src="{{asset('js/jquery.parallax-1.1.3.js')}}"></script>
        <script src="{{asset('vendor/bootstrap-select/js/bootstrap-select.min.js')}}"></script>
        <script src="{{asset('vendor/jquery.scrollto/jquery.scrollTo.min.js')}}"></script>
        <script src="{{asset('js/front.js')}}"></script>
@yield('script')
        {{--<script>--}}
        {{--$(document).ready(function () {--}}
        {{--$(".gllpLatlonPicker").each(function () {--}}
        {{--$obj = $(document).gMapsLatLonPicker();--}}
        {{--$obj.params.strings.markerText = "Drag this Marker (example edit)";--}}
        {{--$obj.params.displayError = function (message) {--}}
        {{--console.log("MAPS ERROR: " + message); // instead of alert()--}}
        {{--};--}}
        {{--$obj.init($(this));--}}
        {{--});--}}
        {{--});--}}
        {{--</script>--}}
        {{--<script src="{{asset ('js/jquery-gmaps-latlon-picker.js')}}"></script>--}}
        {{--<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBCiRGtghXH7VPZ_6WpZKBCqsovwRql6ww&callback=initMap"></script>--}}
        {{--<script>--}}
        {{--$.gMapsLatLonPickerNoAutoInit = 1;--}}
        {{--</script>--}}
        {{--<script type="text/javascript" src="{{asset('vendor/jquery/jquery.min.js')}}"></script>--}}
        
    </body>
</html>