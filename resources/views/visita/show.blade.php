@extends('layouts.app')

@section('template_title')
    {{ $visita->name ?? "{{ __('Show') Visita" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Visita</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('visitas.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Tipo Visita:</strong>
                            {{ $visita->tipo_visita }}
                        </div>
                        <div class="form-group">
                            <strong>Observacion:</strong>
                            {{ $visita->observacion }}
                        </div>
                        <div class="form-group">
                            <strong>User Id:</strong>
                            {{ $visita->user_id }}
                        </div>
                        <div class="form-group">
                            <strong>Establecimiento Id:</strong>
                            {{ $visita->establecimiento_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
