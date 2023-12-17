@extends('layouts.app')

@section('template_title')
    {{ $rackoperadore->name ?? "{{ __('Show') Rackoperadore" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Mostrar') }} Rackoperadore</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('rackoperadores.index') }}"> {{ __('Regresar') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Rack Operador:</strong>
                            {{ $rackoperadore->rack_operador }}
                        </div>
                        <div class="form-group">
                            <strong>Establecimiento Id:</strong>
                            {{ $rackoperadore->establecimiento_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
