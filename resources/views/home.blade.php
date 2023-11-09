@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ __('¡Hola, ') . Auth::user()->name }}
                </div>
                
                <div class="card-body">
                    @php
                        $hour = now()->hour;
                        $greeting = '';
                        $message = '';
                        $jumbotronClass = '';
                
                        if ($hour >= 5 && $hour < 12) {
                            $greeting = __('¡Buenos días!');
                            $message = __('¿Cómo te encuentras esta mañana?');
                            $jumbotronClass = 'bg-warning'; // Amarillo para la mañana
                        } elseif ($hour >= 12 && $hour < 18) {
                            $greeting = __('¡Buenas tardes!');
                            $message = __('¿Cómo ha sido tu día hasta ahora?');
                            $jumbotronClass = 'bg-dark text-light'; // Celeste para la tarde
                        } else {
                            $greeting = __('¡Buenas noches!');
                            $message = __('Espero que hayas tenido un buen día.');
                            $jumbotronClass = 'bg-dark text-light'; // Oscuro para la noche
                        }
                    @endphp
                
                    <style>
                        @keyframes changeColor {
                            0% { color: #FF5733; }
                            50% { color: #33FF57; }
                            100% { color: #5733FF; }
                        }
                
                        @keyframes moveText {
                            0% { transform: translateX(0); }
                            50% { transform: translateX(50px); }
                            100% { transform: translateX(0); }
                        }
                
                        .animated-text {
                            animation: changeColor 5s infinite, moveText 5s infinite; /* Ambas animaciones se ejecutan simultáneamente */
                        }
                    </style>
                
                    <div class="jumbotron jumbotron-fluid text-center {{ $jumbotronClass }}" style="padding: 100px; margin-bottom: 20px;">
                        <div class="container">
                            <h1 class="display-4 animated-text">{{ $greeting }}</h1>
                            <p class="lead animated-text">{{ $message }}</p>
                        </div>
                    </div>
                 </div>
                
                
            </div>
        </div>
    </div>
</div>
@endsection
