<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-100">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Messenger Clone App') }}</title>
</head>
<body class="h-100">
    <div id="app" class="h-100">

        <b-navbar toggleable="sm" type="dark" variant="primary">
            <b-navbar-toggle target="nav-text-collapse"></b-navbar-toggle>
            
            <b-navbar-brand href="{{ url('/') }}">
                {{ config('app.name', "Messenger App") }}
            </b-navbar-brand>
            
            <b-collapse id="nav-text-collapse" is-nav>
                    <b-navbar-nav class="ml-auto">
                        <b-nav-item href="{{ route('home') }}">Home</b-nav-item>

                        @guest
                        <b-nav-item href="{{ route('login') }}">Entrar</b-nav-item>
                        <b-nav-item href="{{ route('register') }}">Registrarse</b-nav-item>
                        @else
                        <b-nav-item-dropdown text="{{ auth()->user()->name }}" right>
                            <b-dropdown-item href="{{ route('profile') }}">Ver perfil</b-dropdown-item>
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

        <main class="py-4">
            <b-container>
                @if(Session::has('flash'))
                <b-alert variant="success" show dismissible>{{Session::get('flash')}}</b-alert>
                @endif
            </b-container>

            @yield('content')
        </main>
    </div>

    
    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
</body>
</html>
