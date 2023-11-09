@extends('layouts.app')

@section('template_title')
    {{ $odf->name ?? "{{ __('Show') Odf" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Odf</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('odfs.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre Odf:</strong>
                            {{ $odf->nombre_odf }}
                        </div>
                        <div class="form-group">
                            <strong>Tipo Odf:</strong>
                            {{ $odf->tipo_odf }}
                        </div>
                        <div class="form-group">
                            <strong>Establecimiento Id:</strong>
                            {{ $odf->establecimiento_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
