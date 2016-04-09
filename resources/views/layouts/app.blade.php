<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>

    <!-- Styles -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>
<body id="app-layout" onload="getLocation()">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    Laravel
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/home') }}">Home</a></li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                <i class="fa fa-user"></i> {{ Auth::user()->username }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js??key=AIzaSyCveq31tTYW2q2K-Y6x0-OWJy1XtUYS34A?libraries=places&region=ZA&sensor=false&ver=4.0.1"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
    <script>

        csrf_token = '{!!csrf_token() !!}';

        /**
         * getLocation()
         */
       function getLocation()
       {

           if ("geolocation" in navigator) {

               navigator.geolocation.getCurrentPosition(function(position) {
                   console.log(position);
                   logLocation(position.coords.latitude, position.coords.longitude);
               });

               var bodyClass = "with-map";

           } else {

               console.log("Navigation is not available.  Please upgrade your web-browser.");
               var bodyClass = "no-map";

           }

       }

        /**
         * Log Location
         * @param lat
         * @param lng
         */
        function logLocation(lat, lng)
        {

            var newLoc = new google.maps.LatLng(lat, lng);

            $.ajax({
                method: 'POST',
                url: '{{ route('user.location') }}',
                data: {
                    'lalng': newLoc,
                    '_token': csrf_token
                },
                type: 'json',
                success: function(jqXHR, xhr, responseText) {
                    console.log("SUCCESS" + JSON.stringify(jqXHR));
                },
                error: function(jqXHR, xhr, responseText) {
                    console.log("ERROR" + JSON.stringify(jqXHR));
                }
            });

        }

    </script>
</body>
</html>
