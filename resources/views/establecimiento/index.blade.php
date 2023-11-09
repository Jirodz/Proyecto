@extends('layouts.app')

@section('template_title')
    Establecimiento
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title">
                                {{ __('Establecimiento') }}
                            </span>
                            <div class="float-right">
                                <a href="{{ route('establecimientos.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        <th>Estado</th>
                                        <th>Nombre Establecimiento</th>
                                        <th>Numero Telefono</th>
                                        <th>Encargado</th>
                                        <th>Direccion</th>
                                        <th>Desarrolladora</th>
                                        <th>Operadores</th>
                                        <th>Tipo de red</th>
                                        <th>Rack Operador</th>
                                        <th>ODF Operador</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($establecimientos as $establecimiento)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $establecimiento->estado }}</td>
                                            <td>{{ $establecimiento->nombre_establecimiento }}</td>
                                            <td>{{ $establecimiento->numero_telefono }}</td>
                                            <td>{{ $establecimiento->encargado }}</td>
                                            <td>{{ $establecimiento->direccion }}</td>
                                            <td>{{ $establecimiento->desarrolladora->nombre_desarrolladora}}</td>
                                            <td>
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal1{{ $establecimiento->id }}">
                                                    Ver
                                                </button>

                                                <div class="modal fade" id="exampleModal1{{ $establecimiento->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Operadores</h1>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                @include('operadore.index2',['operadore'=>$operadores, 'Establecimientooperador'=>$establecimiento->operadores])

                                                            </div>
                                                            <div class="modal-footer">
                                                                
                                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal5{{ $establecimiento->id }}">
                                                                    Agregar
                                                                </button>
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>

                                            <td>
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal2{{ $establecimiento->id }}">
                                                    Ver
                                                </button>

                                                <div class="modal fade" id="exampleModal2{{ $establecimiento->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Tipos de red</h1>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                @include('tipo.index2',['tipo'=>$tipos])

                                                            </div>
                                                            <div class="modal-footer">
                                                                
                                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal6{{ $establecimiento->id }}">
                                                                    Agregar
                                                                </button>
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>

                                            <td>
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal3{{ $establecimiento->id }}">
                                                    Ver
                                                </button>

                                               <div class="modal fade" id="exampleModal3{{ $establecimiento->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Rack de Operador</h1>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                @include('rackoperadore.index2',['rackoperadore'=>$rackoperadores])

                                                            </div>
                                                            <div class="modal-footer">
                                                                
                                                                
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> 
                                            </td>

                                            <td>
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal4{{ $establecimiento->id }}">
                                                    Ver
                                                </button>

                                                <div class="modal fade" id="exampleModal4{{ $establecimiento->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="exampleModalLabel">ODF de Operador</h1>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                @include('odfoperadore.index2',['odfoperadore'=>$odfoperadores])

                                                            </div>
                                                            <div class="modal-footer">
                                                                
                                                               
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>

                                            <td>
                                                <style>
                                                    .btn-custom {
                                                        width: 80px; /* Cambia el valor para ajustar el ancho deseado */
                                                    }
                                                </style>
                                                
                                                <form action="{{ route('establecimientos.destroy', $establecimiento->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary btn-custom" href="{{ route('establecimientos.show', $establecimiento->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success btn-custom" href="{{ route('establecimientos.edit', $establecimiento->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm btn-custom"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                </form>
                                                
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $establecimientos->links() !!}
            </div>
        </div>
    </div>

    <!-- Modals 5, 6, 7, 8 -->
    @foreach ($establecimientos as $establecimiento)
        <!-- Modal 5 -->
        <div class="modal fade" id="exampleModal5{{ $establecimiento->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar operador</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @include('operadore.index2',['operadore'=>$operadores, 'Establecimientooperador'=>$establecimiento->operadores])
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal1{{ $establecimiento->id }}">Regresar</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal 6 -->
        <div class="modal fade" id="exampleModal6{{ $establecimiento->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar tipo de red</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @include('tipo.index2',['tipo'=>$tipos])
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal2{{ $establecimiento->id }}">Regresar</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

@endsection


