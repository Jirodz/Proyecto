@extends('layouts.app')

@section('template_title')
    {{ $enlace->name ?? "{{ __('Mostrar') Enlace" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Mostrar') }} Enlace</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('enlaces.index') }}"> {{ __('Regresar') }}</a>
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
                            <strong>Tipo de local:</strong>
                            {{ $enlace->tipolocale->tipo_de_local }}
                        </div>
                        <div class="form-group">
                            <strong>Tipo de red:</strong>
                            {{ $enlace->tipo->tipo_de_red}}
                        </div>
                        <div class="form-group">
                            <strong>Cliente:</strong>
                            {{ $enlace->cliente->nombre}}
                        </div>
                        <div class="form-group">
                            <strong>Establecimiento:</strong>
                            {{ $enlace->establecimiento->nombre_establecimiento }}
                        </div>
                        <div class="form-group">
                            <strong>Local:</strong>
                            {{ $enlace->locale->numero_local }}
                        </div>
                        <div class="form-group">
                            <strong>ODF Red Optima:</strong>
                            {{ $enlace->odf->nombre_odf }}
                        </div>
                        <div class="form-group">
                            <strong>Puerto:</strong>
                            {{ $enlace->port->numero_puerto}}
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
