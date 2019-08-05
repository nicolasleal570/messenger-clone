@extends('layouts.app')

@section('content')
<b-container>
    <b-row align-h="center">
        <b-col cols="8">

            <b-card header="Registrate en la app" header-tag="header" title="Entra ahora!" class="my-4">

                @if ($errors->any())
                    <b-alert show variant="danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </b-alert>
                @endif

                {{--    FORMULARIO --}}
                <b-form method="POST" action="{{ route('register') }}">
                    @csrf

                    {{-- NAME INPUT --}}
                    <b-form-group label="Nombre:" label-for="name"
                        description="Este nombre será visible por otros usuarios.">
                        <b-form-input id="name" type="text" name="name" value="{{ old('name') }}" autofocus required
                            placeholder="Alexandra Castillo"></b-form-input>
                    </b-form-group>

                    {{-- EMAIL INPUT --}}
                    <b-form-group label="Correo Electrónico:" label-for="email"
                        description="Tu correo siempre permanecerá en privado con nosotros.">
                        <b-form-input id="email" type="email" name="email" value="{{ old('email') }}" required
                            placeholder="example@email.com"></b-form-input>
                    </b-form-group>

                    {{-- PASSWORD INPUT --}}
                    <b-form-group label="Contraseña:" label-for="password">
                        <b-form-input id="password" type="password" name="password" required></b-form-input>
                    </b-form-group>

                    {{-- PASSWORD CONFIRM INPUT --}}
                    <b-form-group label="Confirmar Contraseña:" label-for="password-confirm">
                        <b-form-input id="password-confirm" type="password" name="password_confirmation" required></b-form-input>
                    </b-form-group>

                    {{-- ENTRAR A LA APP --}}
                    <b-form-group>
                        <b-button type="submit" variant="primary">
                            {{ __('Confirmar Registro') }}
                        </b-button>

                        <b-button variant="link" href="{{ route('login') }}">
                            {{ __('Ya tienes cuenta? Inicia Sesión') }}
                        </b-button>

                    </b-form-group>

                </b-form>
            </b-card>

        </b-col>
    </b-row>
</b-container>

@endsection