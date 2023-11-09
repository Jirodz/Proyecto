@extends('layouts.app')

@section('template_title')
    Desarrolladora
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Desarrolladora') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('desarrolladoras.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>Nombre Desarrolladora</th>
										<th>Numero Telefono</th>
										<th>Encargado</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($desarrolladoras as $desarrolladora)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $desarrolladora->nombre_desarrolladora }}</td>
											<td>{{ $desarrolladora->numero_telefono }}</td>
											<td>{{ $desarrolladora->encargado }}</td>

                                            <td>
                                                <form action="{{ route('desarrolladoras.destroy',$desarrolladora->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('desarrolladoras.show',$desarrolladora->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('desarrolladoras.edit',$desarrolladora->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {!! $desarrolladoras->links() !!}
            </div>
        </div>
    </div>
@endsection
