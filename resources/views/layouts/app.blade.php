<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Messenger App') }}</title>
</head>
<body>
    <div id="app">

        <b-navbar toggleable="sm" type="dark" variant="primary">
            <b-navbar-toggle target="nav-text-collapse"></b-navbar-toggle>
            
            <b-navbar-brand href="{{ url('/') }}">
                {{ config('app.name', "Messenger App") }}
            </b-navbar-brand>
            
            <b-collapse id="nav-text-collapse" is-nav>
                    <b-navbar-nav class="ml-auto">
                        <b-nav-item href="#">Home</b-nav-item>

                        @guest
                        <b-nav-item href="{{ route('login') }}">Entrar</b-nav-item>
                        <b-nav-item href="{{ route('register') }}">Registrarse</b-nav-item>
                        @else
                        <b-nav-item-dropdown text="{{ auth()->user()->name }}" right>
                            <b-dropdown-item href="{{ route('logout') }}"
                                @click="logout">Cerrar sesión</b-dropdown-item>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                        </b-nav-item-dropdown>
                        @endguest
                    </b-navbar-nav>
            </b-collapse>
        </b-navbar>


        {{-- <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">

                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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
        </nav> --}}

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</body>
</html>
