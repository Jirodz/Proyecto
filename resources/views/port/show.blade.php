@extends('layouts.app')

@section('template_title')
    {{ $port->name ?? "{{ __('Show') Port" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Port</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('ports.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Numero Puerto:</strong>
                            {{ $port->numero_puerto }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
