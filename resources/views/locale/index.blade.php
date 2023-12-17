@extends('layouts.app')

@section('template_title')
    Locales
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">

                <form action="{{ route('locales.index') }}" method="GET" style="margin-bottom: 20px;">
                    <div class="form-group">
                        <label for="establecimiento_id">Selecciona un establecimiento:</label>
                        <select name="establecimiento_id" id="establecimiento_id" class="form-control">
                            <option value="">Seleccione un establecimiento</option>
                            @foreach ($establecimientos as $establecimiento)
                                <option value="{{ $establecimiento->id }}" {{ $selectedEstablecimientoId == $establecimiento->id ? 'selected' : '' }}>
                                    {{ $establecimiento->nombre_establecimiento }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Filtrar</button>
                </form>
                

                <div class="row">
                    <div class="col-md-4" style="margin: 10px 0;">
                        <form method="GET" action="{{ route('locales.index') }}">
                            <input type="hidden" name="establecimiento_id" value="{{ $selectedEstablecimientoId }}">
                            <label for="numero_local">Número Local:</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="numero_local" value="{{ request('numero_local') }}">
                            </div>
                        </div>
                        <div class="col-md-4" style="margin: 10px 0;">
                            <label for="odf">ODF:</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="odf" value="{{ request('odf') }}">
                            </div>
                        </div>
                        <div class="col-md-4" style="margin: 10px 0;">
                            <label for="puerto">Puerto:</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="puerto" value="{{ request('puerto') }}">
                            </div>
                        </div>
                        <div class="col-md-12" style="margin-top: 10px; margin-bottom: 20px;">
                            <button type="submit" class="btn btn-primary" style="margin-right: 10px;">Buscar</button>
                            <a href="{{ route('locales.index', ['establecimiento_id' => $selectedEstablecimientoId]) }}" class="btn btn-secondary">Limpiar Todo</a>
                        </div>
                    </form>
                </div>
                

                @if ($selectedEstablecimientoId && count($locales) > 0)
                    <div class="card">
                        <div class="card-header">
                            <div style="display: flex; justify-content: space-between; align-items: center;">

                                <span id="card_title">
                                    {{ __('Locales') }}
                                </span>

                                <div class="float-right">
                                    <a href="{{ route('locales.create', ['establecimiento_id' => $selectedEstablecimientoId]) }}" class="btn btn-primary btn-sm float-right" data-placement="left">
                                        {{ __('Crear nuevo') }}
                                    </a>
                                    <!-- Button trigger modal (ODF) -->
                                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#localesModal">
                                        Consultar puertos
                                    </button>
                                </div>
                            </div>
                        </div>

                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <thead class="thead">
                                        <tr>
                                            <th>No</th>
                                            <th>Numero Local</th>
                                            <th>Establecimiento</th>
                                            <th>Odf</th>
                                            <th>Puerto</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($locales as $locale)
                                            <tr>
                                                <td>{{ ++$i }}</td>
                                                <td>{{ $locale->numero_local }}</td>
                                                <td>{{ $locale->establecimiento->nombre_establecimiento }}</td>
                                                <td>{{ $locale->odf->nombre_odf }}</td>
                                                <td>{{ $locale->port->numero_puerto }}</td>
                                                <td>
                                                    <form action="{{ route('locales.destroy',$locale->id) }}" method="POST">
                                                        <a class="btn btn-sm btn-primary " href="{{ route('locales.show',$locale->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Mostrar') }}</a>
                                                        <a class="btn btn-sm btn-success" href="{{ route('locales.edit',$locale->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Borrar') }}</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                    <!-- Modal para mostrar los locales vinculados al ODF seleccionado -->
                    <div class="modal fade" id="localesModal" tabindex="-1" aria-labelledby="localesModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="localesModalLabel">Consulta de Puertos</h5>

                                    <!-- Botones adicionales para controlar el carrusel (ahora de color gris oscuro) -->
                                    <button class="btn btn-secondary" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="btn btn-secondary" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div id="carouselExample" class="carousel slide" data-bs-ride="false">
                                        <div class="carousel-inner">
                                            @foreach ($odfs as $index => $odf)
                                            <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                                <h5>{{ $odf->nombre_odf }}</h5>
                                                <div class="row">
                                                    @foreach ($availablePorts[$odf->id] as $port)
                                                    <div class="col-md-2">
                                                        @if (in_array($port->id, $usedPorts[$odf->id]))
                                                        <button type="button" class="btn btn-danger btn-block mb-2" style="min-width: 50px; min-height: 30px;">
                                                            {{ $port->numero_puerto }}
                                                        </button>
                                                        @else
                                                        <button type="button" class="btn btn-success btn-block mb-2" style="min-width: 50px; min-height: 30px;">
                                                            {{ $port->numero_puerto }}
                                                        </button>
                                                        @endif
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                </div>
                            </div>
                        </div>
                    </div>



                        @if ($locales->lastPage() > 1)
                        <ul class="pagination justify-content-center">
                    
                            <!-- Botón Anterior -->
                            <li class="page-item {{ ($locales->currentPage() == 1) ? ' disabled' : '' }}">
                                <a class="page-link" href="{{ $locales->appends(['establecimiento_id' => $selectedEstablecimientoId])->url(1) }}" aria-label="Anterior">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                    
                            <!-- Números de Página -->
                            @for ($i = 1; $i <= $locales->lastPage(); $i++)
                                <li class="page-item {{ ($locales->currentPage() == $i) ? ' active' : '' }}">
                                    <a class="page-link" href="{{ $locales->appends(['establecimiento_id' => $selectedEstablecimientoId])->url($i) }}">{{ $i }}</a>
                                </li>
                            @endfor
                    
                            <!-- Botón Siguiente -->
                            <li class="page-item {{ ($locales->currentPage() == $locales->lastPage()) ? ' disabled' : '' }}">
                                <a class="page-link" href="{{ $locales->appends(['establecimiento_id' => $selectedEstablecimientoId])->url($locales->currentPage() + 1) }}" aria-label="Siguiente">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        </ul>
                    @endif
                    
                    
                    
                @elseif ($selectedEstablecimientoId && count($locales) == 0)
                    <p>No hay locales para el establecimiento seleccionado.</p>

                    <div class="float-right">
                        <a href="{{ route('locales.create', ['establecimiento_id' => $selectedEstablecimientoId]) }}" class="btn btn-primary btn-sm float-right" data-placement="left">
                            {{ __('Crear nuevo') }}
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
