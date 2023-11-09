
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
                                        <th>Establecimiento</th>   
                                    </tr>
                                </thead>
                                <tbody>
{{--                                     @foreach ($establecimiento->operadore as $registro)
                                        <tr>
                            <td>{{ $registro->operador}}</td>
                                            <td>
                                                <form action="{{ route('establecimientos.destroy',$establecimiento->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('establecimientos.show',$establecimiento->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('establecimientos.edit',$establecimiento->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach --}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $establecimientos->links() !!}
            </div>
        </div>
    </div>

