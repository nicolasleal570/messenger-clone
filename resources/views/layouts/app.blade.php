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

        @include('partials.nav')

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
