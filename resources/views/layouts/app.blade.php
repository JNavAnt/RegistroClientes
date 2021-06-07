<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <link rel="icon" href="{!! asset('public/favicon.ico') !!}"/>
    <!--<title>{{ config('app.name', 'Itech Registro Clientes') }}</title>-->
    <title>Itech</title>
    <!-- Scripts -->
    <script src="{{ asset('public/js/app.js') }}" defer></script>
    
    <!--sweetalert--><script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.16.6/sweetalert2.min.js" integrity="sha512-CrNI25BFwyQ47q3MiZbfATg0ZoG6zuNh2ANn/WjyqvN4ShWfwPeoCOi9pjmX4DoNioMQ5gPcphKKF+oVz3UjRw==" crossorigin="anonymous"></script>
    <!--todo: Buscar las versiones mas recientes de jquery y bootstrap-->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('public/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('public/css/buttons.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!--sweetalert--><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.16.6/sweetalert2.min.css" integrity="sha512-/D4S05MnQx/q7V0+15CCVZIeJcV+Z+ejL1ZgkAcXE1KZxTE4cYDvu+Fz+cQO9GopKrDzMNNgGK+dbuqza54jgw==" crossorigin="anonymous" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>
    
</head>
<body class="text-light container-fluid p-0" style="background-color: #151519; overflow: auto;">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark navbar-laravel m-0 p-0 w-100" style="background-color: #000000;">
            <div class="container-fluid flex justify-between ">
                <a class="navbar-brand text-light" style="width: 20%;" href="{{ url('/') }}">
                    <img  src="{{asset('public\assets\iTech-Logo-2021-2.png')}}" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
    
                <div class="collapse navbar-collapse " id="navbarSupportedContent" >
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto"></ul>


                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto align-items-center">
                        <!-- Authentication Links -->
                        @guest
                            <li><a class="nav-link m-3 text-light" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                            <!--<li><a class="nav-link m-3" href="{{ route('register') }}">{{ __('Register') }}</a></li>-->
                        @else
                            @can('Mostrar usuario')
                                <li><a class="nav-link m-3 text-light" href="{{ route('users.index') }}">Usuarios</a></li>
                            @endcan
                            @can('Mostrar rol')
                                <li><a class="nav-link m-3 text-light" href="{{ route('roles.index') }}">Roles</a></li>
                            @endcan
                            @can('Mostrar cliente')
                                <li><a class="nav-link m-3 text-light" href="{{ route('customers.index') }}">Clientes</a></li>
                            @endcan
                            @can('Mostrar reporte')
                                <li><a class="nav-link m-3 text-light" href="{{ route('reports.index') }}">Reportes</a></li>
                            @endcan
                            <li class="nav-item dropdown text-light">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle m-3 text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret "></span>
                                </a>
                                <div class="dropdown-menu m-3" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>


        <main class="py-3">
            <div class="container">
            @yield('content')
            </div>
        </main>
    </div>
</body>
</html>