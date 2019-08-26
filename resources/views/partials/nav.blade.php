<b-navbar toggleable="sm" type="dark" variant="primary">
    <b-navbar-toggle target="nav-text-collapse"></b-navbar-toggle>
    
    <b-navbar-brand href="{{ route('chat') }}">
        {{ config('app.name', "Messenger App") }}
    </b-navbar-brand>
    
    <b-collapse id="nav-text-collapse" is-nav>
            <b-navbar-nav class="ml-auto">   
                @guest
                <b-nav-item href="{{ route('login') }}">Entrar</b-nav-item>
                <b-nav-item href="{{ route('register') }}">Registrarse</b-nav-item>
                @else
                <b-nav-item href="{{ route('chat') }}">Home</b-nav-item>
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