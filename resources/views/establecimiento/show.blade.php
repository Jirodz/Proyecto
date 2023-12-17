@extends('layouts.app')

@section('template_title')
    {{ $establecimiento->name ?? "{{ __('Show') Establecimiento" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Mostrar') }} Establecimiento</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('establecimientos.index') }}"> {{ __('Regresar') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Estado:</strong>
                            {{ $establecimiento->estado }}
                        </div>
                        <div class="form-group">
                            <strong>Nombre Establecimiento:</strong>
                            {{ $establecimiento->nombre_establecimiento }}
                        </div>
                        <div class="form-group">
                            <strong>Numero Telefono:</strong>
                            {{ $establecimiento->numero_telefono }}
                        </div>
                        <div class="form-group">
                            <strong>Encargado:</strong>
                            {{ $establecimiento->encargado }}
                        </div>
                        <div class="form-group">
                            <strong>Direccion:</strong>
                            {{ $establecimiento->direccion }}
                        </div>
                        <div class="form-group">
                            <strong>Desarrolladora Id:</strong>
                            {{ $establecimiento->desarrolladora_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
