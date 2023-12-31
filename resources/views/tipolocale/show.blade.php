@extends('layouts.app')

@section('template_title')
    {{ $tipolocale->name ?? "{{ __('Show') Tipolocale" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Mostrar') }} Tipolocale</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('tipolocales.index') }}"> {{ __('Regresar') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Tipo De Local:</strong>
                            {{ $tipolocale->tipo_de_local }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
