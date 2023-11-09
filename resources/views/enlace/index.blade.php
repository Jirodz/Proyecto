@extends('layouts.app')

@section('template_title')
    Enlaces
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">

                        <!-- Agregar el formulario de filtrado -->
                        <form action="{{ route('enlaces.index') }}" method="GET">
                            <div class="form-group">
                                <label for="establecimiento_id">Seleccionar Establecimiento:</label>
                                <select name="establecimiento_id" id="establecimiento_id" class="form-control">
                                    <option value="">Seleccione un establecimiento</option>
                                    @foreach($establecimientos as $id => $nombre)
                                        <option value="{{ $id }}" @if($selectedEstablecimiento && $id == request('establecimiento_id')) selected @endif>{{ $nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Filtrar</button>
                        </form>

                        @if ($selectedEstablecimiento)
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title">
                                {{ __('Enlace') }}
                            </span>
                            <a href="{{ route('enlaces.create', ['establecimiento_id' => $selectedEstablecimiento]) }}" class="btn btn-primary btn-sm float-right" data-placement="left">
                                {{ __('Create New') }}
                            </a>
                            
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
                                            <th>Actividad</th>
                                            <th>Negocio</th>
                                            <th>Nombre Contacto</th>
                                            <th>Telefono</th>
                                            <th>Nivel</th>
                                            <th>Cliente</th>
                                            <th>Establecimiento</th>
                                            <th>Local</th>
                                            <th>ODF</th>
                                            <th>Puerto</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($enlaces as $enlace)
                                            <tr>
                                                <td>{{ ++$i }}</td>
                                                <td>{{ $enlace->actividad }}</td>
                                                <td>{{ $enlace->negocio }}</td>
                                                <td>{{ $enlace->nombre_contacto }}</td>
                                                <td>{{ $enlace->telefono }}</td>
                                                <td>{{ $enlace->nivel }}</td>
                                                <td>
                                                    {{ $enlace->cliente->nombre }}
                                                    <a href="{{ route('clientes.show', $enlace->cliente->id) }}" class="btn btn-sm btn-info"><i class="fa fa-fw fa-eye"></i> Ver</a>
                                                </td>
                                                <td>{{ $enlace->establecimiento->nombre_establecimiento }}</td>
                                                <td>{{ $enlace->locale->numero_local }}</td>
                                                <td>{{ $enlace->odf->nombre_odf }}</td>
                                                <td>{{ $enlace->port->numero_puerto }}</td>
                                                <td>
                                                    <form action="{{ route('enlaces.destroy',$enlace->id) }}" method="POST">
                                                        <a class="btn btn-sm btn-primary " href="{{ route('enlaces.show',$enlace->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                        <a class="btn btn-sm btn-success" href="{{ route('enlaces.edit',$enlace->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            @if ($enlaces->lastPage() > 1)
                            <ul class="pagination justify-content-center">
                        
                                <!-- Botón Anterior -->
                                <li class="page-item {{ ($enlaces->currentPage() == 1) ? ' disabled' : '' }}">
                                    <a class="page-link" href="{{ $enlaces->appends(['establecimiento_id' => $selectedEstablecimientoId])->url(1) }}" aria-label="Anterior">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>
                        
                                <!-- Números de Página -->
                                @for ($i = 1; $i <= $enlaces->lastPage(); $i++)
                                    <li class="page-item {{ ($enlaces->currentPage() == $i) ? ' active' : '' }}">
                                        <a class="page-link" href="{{ $enlaces->appends(['establecimiento_id' => $selectedEstablecimientoId])->url($i) }}">{{ $i }}</a>
                                    </li>
                                @endfor
                        
                                <!-- Botón Siguiente -->
                                <li class="page-item {{ ($enlaces->currentPage() == $enlaces->lastPage()) ? ' disabled' : '' }}">
                                    <a class="page-link" href="{{ $enlaces->appends(['establecimiento_id' => $selectedEstablecimientoId])->url($enlaces->currentPage() + 1) }}" aria-label="Siguiente">
                                        <span aria-hidden="true">&raquo;</span>
                                    </a>
                                </li>
                            </ul>
                        @endif
                        @else
                            <p>Selecciona un establecimiento para ver los enlaces.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

