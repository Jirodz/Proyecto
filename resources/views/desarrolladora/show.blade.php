@extends('layouts.app')

@section('template_title')
    {{ $desarrolladora->name ?? "{{ __('Show') Desarrolladora" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Mostrar') }} Desarrolladora</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('desarrolladoras.index') }}"> {{ __('Regresar') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre Desarrolladora:</strong>
                            {{ $desarrolladora->nombre_desarrolladora }}
                        </div>
                        <div class="form-group">
                            <strong>Numero Telefono:</strong>
                            {{ $desarrolladora->numero_telefono }}
                        </div>
                        <div class="form-group">
                            <strong>Encargado:</strong>
                            {{ $desarrolladora->encargado }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
