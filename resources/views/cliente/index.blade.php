@extends('layouts.app')

@section('template_title')
    Cliente
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <form action="{{ route('clientes.index') }}" method="GET" class="form-inline float-right">
                    <input class="form-control" type="text" name="search" placeholder="Buscar por nombre" aria-label="Search" value="{{ $search }}">
                    <button class="btn btn-primary" type="submit">Buscar</button>
                    <button class="btn btn-secondary" type="button" onclick="clearSearch()">Limpiar</button>
                </form>
                <div class="card">

                    <div class="card-header">

                        

                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Cliente') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('clientes.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Crear nuevo') }}
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
                                        
										<th>Nombre</th>
										<th>Razon Social</th>
										<th>Encargado</th>
										<th>Numero Telefono</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($clientes as $cliente)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $cliente->nombre }}</td>
											<td>{{ $cliente->razon_social }}</td>
											<td>{{ $cliente->encargado }}</td>
											<td>{{ $cliente->numero_telefono }}</td>

                                            <td>
                                                <form action="{{ route('clientes.destroy',$cliente->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('clientes.show',$cliente->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Mostrar') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('clientes.edit',$cliente->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Borrar') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    
                                    <script>
                                        function clearSearch() {
                                            // Obtener la URL base (ruta de clientes)
                                            var baseUrl = '{{ url("clientes") }}';
                                    
                                            // Redirigir a la URL base
                                            window.location.href = baseUrl;
                                        }
                                    </script>
                        </script>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                @include('pagination', ['paginator' => $clientes])
            </div>
        </div>
    </div>
    
@endsection
