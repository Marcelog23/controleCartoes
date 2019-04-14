<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        {{--Font Awesome--}}
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
              integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">


    </head>
        <body>
        <div id="app">
            <nav class="navbar navbar-default navbar-static-top">
                <div class="container">

                    <div class="collapse navbar-collapse" id="app-navbar-collapse">
                        <!-- Left Side Of Navbar -->
                        @if (Route::has('login'))
                            <div class="top-right links">
                                @auth
                                    <ul class="nav navbar-nav">
                                        <li class="nav-item ">
                                            <a class="nav-link " href="{{route('cartao.index')}}">Listagem</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{route('cartao.create')}}">Criar</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{route('cartao.geraPdf')}}" target="_blank">Gerar PDF</a>
                                        </li>
                                    </ul>
                                    @else

                                        @endauth
                            </div>
                    @endif


                    <!-- Right Side Of Navbar -->
                        <ul class="nav navbar-nav navbar-right">
                            <!-- Authentication Links -->
                            @guest
                                <li><a href="{{ route('login') }}">Login</a></li>
                                <li><a href="{{ route('register') }}">Register</a></li>
                                @else
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                           aria-expanded="false" aria-haspopup="true" v-pre>
                                            {{ Auth::user()->name }} <span class="caret"></span>
                                        </a>

                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="{{ route('logout') }}"
                                                   onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                                                    Logout
                                                </a>

                                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                      style="display: none;">
                                                    {{ csrf_field() }}
                                                </form>
                                            </li>
                                        </ul>
                                    </li>
                                    @endguest
                        </ul>
                    </div>
                </div>
            </nav>



            <div>
                @include('flash::message')
                @yield('content')
            </div>
        </div>

        <!-- Scripts -->
        <script src="https://code.jquery.com/jquery-3.4.0.min.js" integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg=" crossorigin="anonymous"></script>
        <script src="{{ asset('js/app.js') }}"></script>

        <script>
            $('#flash-overlay-modal').modal();
        </script>

    </body>
</html>
