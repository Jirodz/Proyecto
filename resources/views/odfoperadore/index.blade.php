@extends('layouts.app')

@section('template_title')
    Odfoperadore
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">

                
                        <!-- Agrega un formulario de búsqueda -->
                        <form method="GET" action="{{ route('odfoperadores.index') }}">
                            @csrf
                            <div class="form-group">
                                <label for="centro_comercial">Buscar por Centro Comercial:</label>
                                <input type="text" class="form-control" id="centro_comercial" name="centro_comercial" value="{{ request('centro_comercial') }}" placeholder="Ingrese el nombre del Centro Comercial">
                            </div>
                            <button type="submit" class="btn btn-primary">Buscar</button>
                        </form>
                        <!-- Fin del formulario de búsqueda -->


                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title">
                                {{ __('ODFs de operadores') }}
                            </span>
                            <div class="float-right">
                                <a href="{{ route('odfoperadores.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        <th>Odf Operador</th>
                                        <th>Establecimiento</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($odfoperadores as $odfoperadore)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $odfoperadore->odf_operador }}</td>
                                            <td>{{ $odfoperadore->establecimiento->nombre_establecimiento }}</td>
                                            <td>
                                                <form action="{{ route('odfoperadores.destroy', $odfoperadore->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary" href="{{ route('odfoperadores.show', $odfoperadore->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Mostrar') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('odfoperadores.edit', $odfoperadore->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
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
                {!! $odfoperadores->links() !!}
            </div>
        </div>
    </div>
@endsection

