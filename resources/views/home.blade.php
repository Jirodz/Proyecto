@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ __('¡Hola, ') . Auth::user()->name }}
                </div>
                <div class="card-body">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="2000">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                            <!-- Agrega más indicadores según el número de imágenes -->
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="{{ asset('image1.png') }}" class="d-block w-100" alt="Imagen 1">
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('image2.png') }}" class="d-block w-100" alt="Imagen 2">
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('image3.png') }}" class="d-block w-100" alt="Imagen 3">
                            </div>
                            <!-- Agrega más items según el número de imágenes -->
                        </div>
                    </div>

                    <!-- Agrega estos scripts antes de tu script actual -->
                    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
                    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

                    <script>
                        $('#carouselExampleIndicators').carousel({
                            interval: 5500
                        });

                        // Elimina el historial del navegador cuando se cambia de imagen en el carrusel
                        $('#carouselExampleIndicators').on('slide.bs.carousel', function () {
                            window.location.hash = '';
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection



