<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Red Optima</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <style>
        /* Tu estilo existente ... */

        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            background-color: #1a202c; /* Fondo oscuro */
            color: #cbd5e0; /* Texto claro */
        }

        .welcome-container {
            text-align: center;
            border: 2px solid #ef4444; /* Contorno rojo */
            border-radius: 0.5rem; /* Bordes redondeados */
            padding: 2rem; /* Espaciado interno */
        }

        .welcome-title {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            font-weight: 600;
        }

        .welcome-buttons {
            display: flex;
            gap: 1rem;
            margin-top: 1rem;
            justify-content: center;
        }

        .welcome-buttons a {
            padding: 1rem 2rem;
            border-radius: 0.375rem;
            text-decoration: none;
            font-weight: 600;
            text-transform: uppercase;
            transition: background-color 0.3s ease;
            background-color: #2d3748; /* Botones oscuros */
            color: #e2e8f0; /* Texto claro */
        }

        .welcome-buttons a:hover {
            background-color: #4a5568; /* Botones más oscuros al pasar el ratón */
        }

        .ml-4 {
            margin-top: 1rem;
        }
    </style>
</head>
<body class="antialiased">
    <div class="welcome-container selection:bg-red-500 selection:text-white">
        @if (Route::has('login'))
            <div class="p-6">
                @auth
                    <a href="{{ url('/home') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Home</a>
                @else
                    <div class="welcome-title">
                        ¡Bienvenido a Red Optima!
                    </div>
                    
                    <div class="welcome-buttons">
                        <a href="{{ route('login') }}" class="hover:bg-gray-700">Iniciar sesión</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="hover:bg-gray-700">Registrarse</a>
                        @endif
                    </div>
                @endauth
            </div>
        @endif

    </div>
</body>
</html>





