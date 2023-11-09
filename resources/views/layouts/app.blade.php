<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Red Optima</title>
    <link rel="icon" href="{{ asset('public/images/favicon.png') }}" type="image/png">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <style>
        /* Estilos para el Sidebar */
        #sidebar {
            width: 250px;
            background-color: #333;
            color: white;
            padding: 20px;
            display: flex;
            flex-direction: column;
            max-height: 100vh;
            overflow-y: auto;
        }

        #sidebar h3 {
            text-align: center;
            margin-bottom: 20px;
        }

        #sidebar .btn-dark {
            background-color: #666;
            color: white;
            margin-bottom: 20px;
            text-align: left;
        }

        #sidebar .btn-dark:hover {
            background-color: #666;
        }



        #sidebar a {
            color: white;
        }

        #sidebar a:hover {
            color: #fff;
        }
    </style>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body style="margin: 0; display: flex; height: 100vh; overflow: hidden; background-color: #ffffff;">
    <!-- Sidebar -->
    @guest
    @else
        <div id="sidebar">
            <h3 style="text-align: center; margin-bottom: 20px;">Red Optima</h3>

            <!-- Sección "Conexiones" -->
            <div style="margin-bottom: 5px; text-align: left;">
                <button class="btn btn-dark container-fluid" type="button" data-bs-toggle="collapse" data-bs-target="#conexionesMenu" aria-expanded="false" aria-controls="conexionesMenu">
                    <i class="fas fa-plug"></i> Conexiones
                </button>
                <div class="collapse" id="conexionesMenu">
                    <div style="background-color: #1b1a1a; padding: 10px; border-radius: 5px; text-align: left;">
                        <a href="{{ route('enlaces.index') }}" style="margin-bottom: 20px; color: white;" class="btn btn-dark d-block">
                            <i class="fas fa-plug"></i> {{ __('Enlaces') }}
                        </a>
                    </div>
                </div>
            </div>

            <!-- Sección "Mantenimiento" -->
            <div style="margin-bottom: 5px;">
                <button class="btn btn-dark container-fluid" type="button" data-bs-toggle="collapse" data-bs-target="#mantenimientoMenu" aria-expanded="false" aria-controls="mantenimientoMenu">
                    <i class="fas fa-wrench"></i> Mantenimiento
                </button>
                <div class="collapse" id="mantenimientoMenu">
                    <div style="background-color: #1b1a1a; padding: 10px; border-radius: 5px;">
                        <a href="{{ route('rackoperadores.index') }}" style="margin-bottom: 20px; color: white;" class="btn btn-dark d-block">
                            <i class="fas fa-server"></i> {{ __('Rack Operadores') }}
                        </a>
                        <a href="{{ route('odfoperadores.index') }}" style="margin-bottom: 20px; color: white;" class="btn btn-dark d-block">
                            <i class="fas fa-cogs"></i> {{ __('ODF Operadores') }}
                        </a>
                        <a href="{{ route('odfs.index') }}" style="margin-bottom: 20px; color: white;" class="btn btn-dark d-block">
                            <i class="fas fa-network-wired"></i> {{ __('ODF de Red Optima') }}
                        </a>
                        <a href="{{ route('establecimientos.index') }}" style="margin-bottom: 20px; color: white;" class="btn btn-dark d-block">
                            <i class="fas fa-building"></i> {{ __('Establecimientos') }}
                        </a>
                        <a href="{{ route('locales.index') }}" style="margin-bottom: 20px; color: white;" class="btn btn-dark d-block">
                            <i class="fas fa-building"></i> {{ __('Locales') }}
                        </a>
                    </div>
                </div>
            </div>

            <!-- Sección "Sistema" -->
            <div style="margin-bottom: 5px;">
                <button class="btn btn-dark container-fluid" type="button" data-bs-toggle="collapse" data-bs-target="#sistemaMenu" aria-expanded="false" aria-controls="sistemaMenu">
                    <i class="fas fa-cogs"></i> Sistema
                </button>
                <div class="collapse" id="sistemaMenu">
                    <div style="background-color: #1b1a1a; padding: 10px; border-radius: 5px;">
                        <a href="{{ route('tipos.index') }}" style="margin-bottom: 20px; color: white;" class="btn btn-dark d-block">
                            <i class="fas fa-sitemap"></i> {{ __('Tipos de red') }}
                        </a>
                        <a href="{{ route('tipolocales.index') }}" style="margin-bottom: 20px; color: white;" class="btn btn-dark d-block">
                            <i class="fas fa-building"></i> {{ __('Tipos de local') }}
                        </a>
                        <a href="{{ route('operadores.index') }}" style="margin-bottom: 20px; color: white;" class="btn btn-dark d-block">
                            <i class="fas fa-users"></i> {{ __('Operadores') }}
                        </a>
                        <a href="{{ route('desarrolladoras.index') }}" style="margin-bottom: 20px; color: white;" class="btn btn-dark d-block">
                            <i class="fas fa-cogs"></i> {{ __('Desarrolladoras') }}
                        </a>
                        <a href="{{ route('clientes.index') }}" style="margin-bottom: 20px; color: white;" class="btn btn-dark d-block">
                            <i class="fas fa-users"></i> {{ __('Clientes') }}
                        </a>
                    </div>
                </div>
            </div>

            <div style="flex-grow: 1;"></div>
        </div>
    @endguest


    <!-- Main Content -->
    <div id="main-content" style="flex: 1; display: flex; flex-direction: column;">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    Inicio
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
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
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <main class="py-4" style="flex-grow: 1; overflow: auto;">
            @yield('content')
        </main>
    </div>
</body>
</html>
