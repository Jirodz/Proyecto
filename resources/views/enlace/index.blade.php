@extends('layouts.app')

@section('template_title')
    Enlace
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Enlace') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('enlaces.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
										<th>Tipo Id</th>
										<th>Cliente Id</th>
										<th>Establecimiento Id</th>
										<th>Local Id</th>
										<th>Odf Id</th>
										<th>Port Id</th>
										<th>Responsable Operador</th>
										<th>Dpi Responsable</th>
										<th>Telefono Responsable</th>
										<th>Fecha</th>

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
											<td>{{ $enlace->tipo_id }}</td>
											<td>{{ $enlace->cliente_id }}</td>
											<td>{{ $enlace->establecimiento_id }}</td>
											<td>{{ $enlace->local_id }}</td>
											<td>{{ $enlace->odf_id }}</td>
											<td>{{ $enlace->port_id }}</td>
											<td>{{ $enlace->responsable_operador }}</td>
											<td>{{ $enlace->dpi_responsable }}</td>
											<td>{{ $enlace->telefono_responsable }}</td>
											<td>{{ $enlace->fecha }}</td>

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
                    </div>
                </div>
                {!! $enlaces->links() !!}
            </div>
        </div>
    </div>
@endsection
