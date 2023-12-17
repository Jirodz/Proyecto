@extends('layouts.app')

@section('template_title')
    Rack
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Rack') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('racks.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>Nombre Rack</th>
										<th>Tipo Rack</th>
										<th>Establecimiento Id</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($racks as $rack)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $rack->nombre_rack }}</td>
											<td>{{ $rack->tipo_rack }}</td>
											<td>{{ $rack->establecimiento_id }}</td>

                                            <td>
                                                <form action="{{ route('racks.destroy',$rack->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('racks.show',$rack->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Mostrar') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('racks.edit',$rack->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
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
                @include('pagination', ['paginator' => $racks])
                {{-- {!! $racks->links() !!} --}}
            </div>
        </div>
    </div>
@endsection
