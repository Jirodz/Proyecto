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
                            <strong>Tipo Id:</strong>
                            {{ $enlace->tipo_id }}
                        </div>
                        <div class="form-group">
                            <strong>Cliente Id:</strong>
                            {{ $enlace->cliente_id }}
                        </div>
                        <div class="form-group">
                            <strong>Establecimiento Id:</strong>
                            {{ $enlace->establecimiento_id }}
                        </div>
                        <div class="form-group">
                            <strong>Local Id:</strong>
                            {{ $enlace->local_id }}
                        </div>
                        <div class="form-group">
                            <strong>Odf Id:</strong>
                            {{ $enlace->odf_id }}
                        </div>
                        <div class="form-group">
                            <strong>Port Id:</strong>
                            {{ $enlace->port_id }}
                        </div>
                        <div class="form-group">
                            <strong>Responsable Operador:</strong>
                            {{ $enlace->responsable_operador }}
                        </div>
                        <div class="form-group">
                            <strong>Dpi Responsable:</strong>
                            {{ $enlace->dpi_responsable }}
                        </div>
                        <div class="form-group">
                            <strong>Telefono Responsable:</strong>
                            {{ $enlace->telefono_responsable }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha:</strong>
                            {{ $enlace->fecha }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
