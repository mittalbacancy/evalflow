<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>ConnectThat</title>
        <link rel="shortcut icon" href="{{ url('dist/img/ct_fav.png') }}">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
         <link href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}" rel="stylesheet">
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height:calc(100vh - 113px);
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            .page-footer{background:#f65874;color:#fff;padding:10px;font-size:15px;}
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/dashboard') }}">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        <!-- @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif -->
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    <span class="logo-lg"><img height="500px" width="500px" src="{{ url('dist/img/connect-Logo.png') }}" class="" alt="User Image"></span>
                </div>
            </div>
  
        </div>
  
<!-- Footer -->
<footer class="page-footer font-small mdb-color darken-3 pt-4">

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">
      <p> <b>Email :</b> connectthatapp@gmail.com</p>
      <p><b>Address :</b> 3740 Balfour Avenue, Oakland, California, 94610</p>
      <p><b>Phone number :</b> 440.537.9410 </p>
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->
        
    </body>
</html>
