@extends('layouts.app')

@section('template_title')
    {{ $odfoperadore->name ?? "{{ __('Show') Odfoperadore" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Odfoperadore</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('odfoperadores.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Odf Operador:</strong>
                            {{ $odfoperadore->odf_operador }}
                        </div>
                        <div class="form-group">
                            <strong>Establecimiento Id:</strong>
                            {{ $odfoperadore->establecimiento_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
