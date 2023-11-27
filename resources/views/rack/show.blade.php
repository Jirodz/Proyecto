@extends('layouts.app')

@section('template_title')
    {{ $rack->name ?? "{{ __('Show') Rack" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Rack</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('racks.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre Rack:</strong>
                            {{ $rack->nombre_rack }}
                        </div>
                        <div class="form-group">
                            <strong>Tipo Rack:</strong>
                            {{ $rack->tipo_rack }}
                        </div>
                        <div class="form-group">
                            <strong>Establecimiento Id:</strong>
                            {{ $rack->establecimiento_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
