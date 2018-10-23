<!DOCTYPE HTML>
<html>
<head>
    <title>Live Info | Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel='stylesheet' type='text/css'/>
    <!-- Custom CSS -->
    <link href="{{ asset('css/style.css')}}" rel='stylesheet' type='text/css'/>
    <!-- Graph CSS -->
    <link href="{{ asset('css/font-awesome.css')}}" rel="stylesheet">
    <!-- jQuery -->
    <!-- lined-icons -->
    <link rel="stylesheet" href="{{ asset('css/icon-font.min.css')}}" type='text/css'/>
    <!-- //lined-icons -->

    <!-- webfonts -->
    <link href='//fonts.googleapis.com/css?family=Nunito:400,700,300' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Francois+One' rel='stylesheet' type='text/css'>
    <!--// webfonts -->
    <!-- Meters graphs -->
    <script src="{{ asset('js/jquery-1.11.1.min.js')}}"></script>
    <!-- Placed js at the end of the document so the pages load faster -->
</head>

<body class="sticky-header left-side-collapsed">
<section>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="col-sm-4 col-xs-12" >
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                    <div class="top-logo">
                        <h1><a href="{{ url('/') }}">Live Info</a></h1>
                    </div>

            </div>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <div class="col-sm-4">
                <ul class="nav navbar-nav">
                    {{--<li class="active"><a href="#">Home</a></li>--}}
                    {{--<li><a href="#">About</a></li>--}}
                    {{--<li><a href="#">Gallery</a></li>--}}
                    {{--<li><a href="#">Contact</a></li>--}}
                    <li>
                        <div class="clock-bottom">
                            <div class="clock">
                                <div id="Date"></div>
                                <ul>
                                    <li id="hours"></li>
                                    <li id="point">:</li>
                                    <li id="min"></li>
                                    <li id="point">:</li>
                                    <li id="sec"></li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li>

                    </li>
                    <li></li>
                </ul>
                </div>
                <ul class="nav navbar-nav navbar-right">
                    @if (Auth::guest())
                        <li><a href="#" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-log-in"></span> Sign In</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle btn " data-toggle="dropdown"
                               role="button" aria-expanded="false">
                                <span class="glyphicon glyphicon-user"></span> {{ Auth::user()->name }}
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ url('/logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST"
                                          style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                  @endif
                        @if (Auth::guest())
                        <li><a href="{{ url('/register') }}"><span class="glyphicon glyphicon-log-in"></span> Sign Up</a></li>
                        @endif
            </ul>
        </div>
        </div>
    </nav>
    <!-- left side start-->
@yield('left_teams')
<!-- left side end-->
    <!-- main content start-->
    <div class="main-content">

    @yield('content')
    <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <div class="login-body">
                            <div class="login-heading">
                                <h3>Login</h3>
                            </div>
                            <div class="login-info">
                                <form method="POST" action="{{ url('/login') }}">
                                    {{ csrf_field() }}

                                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                        <input type="text" id="email" class="user" name="email"
                                               value="{{ old('email') }}" placeholder="Email" required autofocus>
                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                        @endif
                                    </div>

                                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                        <input type="password" name="password" id="password" class="lock"
                                               placeholder="Password" required/>
                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                        @endif
                                    </div>

                                    <input type="submit" name="Sign In" value="Login">
                                    <div class="signup-text">
                                        <a href="{{ url('/register') }}">Don't have an account? Create one now</a>
                                    </div>
                                    <hr>
                                    <h2>or login with</h2>
                                    <div class="login-icons">
                                        <ul>
                                            <li><a href="#" class="facebook"><i class="fa fa-facebook"></i></a></li>
                                            <li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
                                            <li><a href="#" class="google"><i class="fa fa-google-plus"></i></a></li>
                                            <li><a href="#" class="dribbble"><i class="fa fa-dribbble"></i></a></li>
                                        </ul>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- //	Modal -->
        <!--footer section start-->
        <footer>
            <div class="footer-left">
                <ul>
                    <li><a href="{{ url('/contact') }}">Contact</a></li>
                    <li><a href="{{ url('/about') }}">About Us</a></li>
                </ul>
            </div>
            <div class="social">
                <ul>
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-rss"></i></a></li>
                    <li><a href="#"><i class="fa fa-vk"></i></a></li>
                </ul>
            </div>
            <div class="clearfix"></div>
        </footer>
        <!--footer section end-->
    </div>


    <!-- main content end-->
</section>
<script src=" {{ asset('js/modernizr.custom.js') }}"></script>
<!--pop-up-->
<script src=" {{ asset('js/menu_jquery.js') }}"></script>
<!--//pop-up-->
<script src="{{ asset('js/jquery.nicescroll.js') }}"></script>
<script src="{{ asset('js/scripts.js') }}"></script>
<!-- Bootstrap Core JavaScript -->
<script src=" {{ asset('js/bootstrap.min.js') }}"></script>
<!--pop-up-->
<script src="{{ asset('js/menu_jquery.js') }}"></script>
<!--//pop-up-->
<!-- clock-bottom -->
<script type="text/javascript">
    $(document).ready(function () {
        // Create two variable with the names of the months and days in an array
        var monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
        var dayNames = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"]

        // Create a newDate() object
        var newDate = new Date();
        // Extract the current date from Date object
        newDate.setDate(newDate.getDate());
        // Output the day, date, month and year
        $('#Date').html(dayNames[newDate.getDay()] + " " + newDate.getDate() + ' ' + monthNames[newDate.getMonth()] + ' ' + newDate.getFullYear());

        setInterval(function () {
            // Create a newDate() object and extract the seconds of the current time on the visitor's
            var seconds = new Date().getSeconds();
            // Add a leading zero to seconds value
            $("#sec").html((seconds < 10 ? "0" : "") + seconds);
        }, 1000);

        setInterval(function () {
            // Create a newDate() object and extract the minutes of the current time on the visitor's
            var minutes = new Date().getMinutes();
            // Add a leading zero to the minutes value
            $("#min").html((minutes < 10 ? "0" : "") + minutes);
        }, 1000);

        setInterval(function () {
            // Create a newDate() object and extract the hours of the current time on the visitor's
            var hours = new Date().getHours();
            // Add a leading zero to the hours value
            $("#hours").html((hours < 10 ? "0" : "") + hours);
        }, 1000);

    });
</script>
<!-- clock-bottom -->
<!-- ResponsiveTabs -->
<script src="{{ asset('js/easyResponsiveTabs.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#horizontalTab').easyResponsiveTabs({
            type: 'default', //Types: default, vertical, accordion
            width: 'auto', //auto or any width like 600px
            fit: true   // 100% fit in a container
        });
    });
</script>
<!-- //ResponsiveTabs -->
<!-- video -->
<script src=" {{ asset('js/simplePlayer.js') }}"></script>
<script>
    $("document").ready(function () {
        $("#video").simplePlayer();
    });
</script>
<!-- //video -->
</body>
</html>