<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">


            <title>{{ config('app.name') }} - @yield('title')</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <!-- <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
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
        </style> -->

        <!-- Bootstrap core CSS -->
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" >

        <!-- Custom styles for this template -->
        <link href="{{ asset('css/sidebar.css') }}" rel="stylesheet" type="text/css" >
        <link href="{{ asset('css/all.css') }}" rel="stylesheet" type="text/css" >
    </head>
    <body>
      <div class="d-flex" id="wrapper">

        {{--<div class="bg-light border-right" id="sidebar-wrapper">
          <div class="sidebar-heading">Start Bootstrap </div>
          <div class="list-group list-group-flush">
            <a href="#" class="list-group-item list-group-item-action bg-light">Dashboard</a>
            <a href="#" class="list-group-item list-group-item-action bg-light">Shortcuts</a>
            <a href="#" class="list-group-item list-group-item-action bg-light">Overview</a>
            <a href="#" class="list-group-item list-group-item-action bg-light">Events</a>
            <a href="#" class="list-group-item list-group-item-action bg-light">Profile</a>
            <a href="#" class="list-group-item list-group-item-action bg-light">Status</a>
          </div>
        </div>--}}

        <!-- Page Content -->
        <div id="page-content-wrapper">
          <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
            {{--<button class="btn btn-primary" id="menu-toggle">Toggle Menu</button>--}}
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                @foreach(config('navbar.items') as $key => $items)
                <li class="nav-item{{ $__env->yieldContent('blade') == config('navbar.items.'.$key.'.blade') ? ' active' : '' }}{{ is_array(config('navbar.items.'.$key.'.dropdown')) ? ' dropdown' : '' }}">
                  <a class="nav-link{{ is_array(config('navbar.items.'.$key.'.dropdown')) ? ' dropdown-toggle' : '' }}" href="{{ config('navbar.items.'.$key.'.link') }}" @if(is_array(config('navbar.items.'.$key.'.dropdown'))) id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" @endif>{{ config('navbar.items.'.$key.'.label') }}</a>
                  @if(is_array(config('navbar.items.'.$key.'.dropdown')))
                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    @foreach(config('navbar.items.'.$key.'.dropdown') as $item => $dropdown)
                    @if(config('navbar.items.'.$key.'.dropdown.'.$item.'.divider'))
                    <div class="dropdown-divider"></div>
                    @endif
                    <a class="dropdown-item" href="{{ config('navbar.items.'.$key.'.dropdown.'.$item.'.link') }}">{{ config('navbar.items.'.$key.'.dropdown.'.$item.'.label') }}</a>
                    @endforeach
                  </div>
                  @endif
                </li>
                @endforeach
              </ul>
            </div>
          </nav>
          <div class="container-fluid">
            @yield('content')
          </div>
            <!-- /#page-content-wrapper -->

        {{--</div>--}}
        <!-- Bootstrap core JavaScript -->
        <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/all.js') }}"></script>

        <!-- Menu Toggle Script -->

    <script type="text/javascript">
        $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
        });
      </script>
    </body>
  </html>
