<!doctype html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'PHizza') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-danger shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}" style="font-weight: 800; color:white">
                    🍕 PHizza Hut
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}"style="font-weight: 500; color:white">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}"style="font-weight: 500; color:white">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else

                            @if (Auth::user()->role =='Admin')

                            <li class="nav-item">
                            <a class="nav-link" href="{{'/viewAllTransaction'}}"style="font-weight: 500; color:white">{{ __('View All User Transaction') }}</a>
                            </li>

                            <p style="padding-top:0.5em; color:white; user-select: none;"> | </p>

                            <li class="nav-item">
                               <a class="nav-link" href="{{'/viewAllUser'}}"style="font-weight: 500; color:white">{{ __('View All User') }}</a>
                            </li>

                            <p style="padding-top:0.5em; color:white; user-select: none;"> | </p>

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" style="font-weight: 500; color:white" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    admin
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            @endif
                            @if(Auth::user()->role =='Member')

                            <li class="nav-item">
                                <a class="nav-link" href="{{url('transactionHistory')}}"style="font-weight: 500; color:white">{{ __('View Transaction History') }}</a>
                            </li>

                            <p style="padding-top:0.5em; color:white; user-select: none;"> | </p>

                            <li class="nav-item">
                               <a class="nav-link" href="{{url('cart')}}" style="font-weight: 500; color:white">{{ __('View Cart') }}</a>
                            </li>

                            <p style="padding-top:0.5em; color:white; user-select: none;"> | </p>

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" style="font-weight: 500; color:white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->username }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            @endif

                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
