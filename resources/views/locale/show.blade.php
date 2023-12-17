@extends('layouts.app')

@section('template_title')
    {{ $locale->name ?? __("Show Locale") }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Local</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('locales.index', ['establecimiento_id' => $locale->establecimiento_id]) }}">
                                {{ __('Regresar') }}
                            </a>
                            <a class="btn btn-success" href="{{ route('locales.edit', $locale->id) }}">
                                {{ __('Editar') }}
                            </a>
                            <!-- Agregar el botón de eliminar -->
                            <form action="{{ route('locales.destroy', $locale->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Esta seguro de que desea eliminar este local?')">
                                    {{ __('Borrar') }}
                                </button>
                            </form>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="form-group">
                            <strong>Numero Local:</strong>
                            {{ $locale->numero_local }}
                        </div>
                        <div class="form-group">
                            <strong>Establecimiento:</strong>
                            {{ $locale->establecimiento->nombre_establecimiento}}
                        </div>
                        <div class="form-group">
                            <strong>ODF:</strong>
                            {{ $locale->odf->nombre_odf }}
                        </div>
                        <div class="form-group">
                            <strong>Puerto:</strong>
                            {{ $locale->port->numero_puerto }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection