@extends('layouts.app')

@section('template_title')
    {{ $enlace->name ?? "{{ __('Show') Enlace" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Enlace</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('enlaces.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Actividad:</strong>
                            {{ $enlace->actividad }}
                        </div>
                        <div class="form-group">
                            <strong>Negocio:</strong>
                            {{ $enlace->negocio }}
                        </div>
                        <div class="form-group">
                            <strong>Nombre Contacto:</strong>
                            {{ $enlace->nombre_contacto }}
                        </div>
                        <div class="form-group">
                            <strong>Telefono:</strong>
                            {{ $enlace->telefono }}
                        </div>
                        <div class="form-group">
                            <strong>Nivel:</strong>
                            {{ $enlace->nivel }}
                        </div>
                        <div class="form-group">
                            <strong>Cliente Id:</strong>
                            {{ $enlace->cliente->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Establecimiento Id:</strong>
                            {{ $enlace->establecimiento->nombre_establecimiento }}
                        </div>
                        <div class="form-group">
                            <strong>Local Id:</strong>
                            {{ $enlace->numero_local }}
                        </div>
                        <div class="form-group">
                            <strong>Odf Id:</strong>
                            {{ $enlace->odf->nombre_odf }}
                        </div>
                        <div class="form-group">
                            <strong>Port Id:</strong>
                            {{ $enlace->port->numero_puerto }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
