@extends('layouts.app')

@section('template_title')
    {{ $cliente->name ?? "{{ __('Show') Cliente" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Mostrar') }} Cliente</span>
                        </div>

                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $cliente->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Razon Social:</strong>
                            {{ $cliente->razon_social }}
                        </div>
                        <div class="form-group">
                            <strong>Encargado:</strong>
                            {{ $cliente->encargado }}
                        </div>
                        <div class="form-group">
                            <strong>Numero Telefono:</strong>
                            {{ $cliente->numero_telefono }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
