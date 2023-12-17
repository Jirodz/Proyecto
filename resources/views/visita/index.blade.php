@extends('layouts.app')

@section('template_title')
    Visita
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title">
                                {{ __('Visita') }}
                            </span>

                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <!-- Mostrar errores -->
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <!-- Agregar el formulario de filtrado -->
                        <form action="{{ route('visitas.index') }}" method="GET" class="form-inline">
                            <div class="form-group mr-2">
                                <label for="establecimiento_id" class="mr-2">Establecimiento:</label>
                                <select name="establecimiento_id" id="establecimiento_id" class="form-control">
                                    <option value="">Seleccione un establecimiento</option>
                                    @foreach($establecimientos as $id => $nombre)
                                        <option value="{{ $id }}">{{ $nombre }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group mr-2">
                                <label for="fecha_inicio" class="mr-2">Fecha de Inicio:</label>
                                <input type="date" class="form-control" name="fecha_inicio" value="{{ request('fecha_inicio') }}">
                            </div>

                            <div class="form-group mr-2">
                                <label for="fecha_fin" class="mr-2">Fecha de Fin:</label>
                                <input type="date" class="form-control" name="fecha_fin" value="{{ request('fecha_fin', now()->toDateString()) }}">
                            </div>

                            <button type="submit" class="btn btn-primary">Filtrar</button>
                        </form>

                        @if ($visitas->count() > 0)
                        <div class="table-responsive mt-3">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        <th>Tipo Visita</th>
                                        <th>Observacion</th>
                                        <th>Usuario</th>
                                        <th>Establecimiento</th>
                                        <th>Fecha</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($visitas as $visita)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $visita->tipo_visita }}</td>
                                            <td>{{ $visita->observacion }}</td>
                                            <td>{{ $visita->user->name }}</td>
                                            <td>{{ $visita->establecimiento->nombre_establecimiento }}</td>
                                            <td>{{ $visita->created_at }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @include('pagination', ['paginator' => $visitas])
                    @else
                        <p>No hay visitas disponibles para el establecimiento y rango de fechas seleccionados.</p>
                    @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
