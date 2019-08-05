@extends('layouts.app')

@section('content')
<b-container>
    <b-row align-h="center">
        <b-col cols="8">

                <b-card header="Inicia Sesión"
                        header-tag="header"
                        title="Entra ahora!"
                        class="my-4"
                >
                    {{-- ALERT --}}
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
                    <b-form method="POST" action="{{ route('login') }}">
                            @csrf

                            {{-- EMAIL INPUT --}}
                            <b-form-group
                                label="Correo Electrónico:"
                                label-for="email"
                            >
                                <b-form-input id="email"
                                    type="email"
                                    name="email"
                                    value="{{ old('email') }}"
                                    autofocus
                                    required
                                    placeholder="example@email.com"
                                ></b-form-input>
                            </b-form-group>
    
                            {{-- PASSWORD INPUT --}}
                            <b-form-group
                                label="Contraseña:"
                                label-for="password"
                            >
                                <b-form-input id="password"
                                    type="password"
                                    name="password"
                                    required
                                ></b-form-input>
                            </b-form-group>
    
                            {{-- RECORDAR SESIÓN --}}
                            <b-form-group>
                                <b-form-checkbox
                                    name="remember" checked="{{ old('remember') ? 'true' : '' }}"
                                >
                                  Recordar sesión
                                </b-form-checkbox>
                            </b-form-group>

                            {{-- ENTRAR A LA APP --}}
                            <b-form-group>
                                    <b-button type="submit" variant="primary">
                                        {{ __('Entrar ahora') }}
                                    </b-button>
        
                                    @if (Route::has('password.request'))
                                        <b-button variant="link" href="{{ route('password.request') }}">
                                            {{ __('Olvidaste la contraseña?') }}
                                        </b-button>
                                    @endif
                            </b-form-group>

                        </b-form>
                </b-card>

        </b-col>
    </b-row>
</b-container>
@endsection
