@extends('layouts.app')

@section('template_title')
    {{ $tipo->name ?? "{{ __('Show') Tipo" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Mostrar') }} Tipo</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('tipos.index') }}"> {{ __('Regresar') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Tipo De Red:</strong>
                            {{ $tipo->tipo_de_red }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
