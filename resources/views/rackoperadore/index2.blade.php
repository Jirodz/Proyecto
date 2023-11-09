<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <span id="card_title">
                            {{ __('Rack de operador en establecimiento') }}
                        </span>
                        <div class="float-right">
                            <a href="{{ route('rackoperadores.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                    <th>NO</th>
                                    <th>Rack Operador</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($rackoperadores as $rackoperadore)
                                    @if ($rackoperadore->establecimiento_id == $establecimiento->id)
                                        <tr>
                                            <td>{{ $rackoperadore->id }}</td>
                                            <td>{{ $rackoperadore->rack_operador }}</td>
                                            <td class='d-flex gap-3'>
                                                @php
                                                    $vincularRoute = route('rackoperadores.vincular', ['rackoperadorId' => $rackoperadore->id, 'establecimientoId' => $establecimiento->id, 'vincular' => 'vincular']);
                                                    $desvincularRoute = route('rackoperadores.vincular', ['rackoperadorId' => $rackoperadore->id, 'establecimientoId' => $establecimiento->id, 'vincular' => 'desvincular']);
                                                    $vinculado = false;
                                                    $vinculo = $rackoperadore->establecimientoracks()->where('establecimiento_id', $establecimiento->id)->first();
                                                    if ($vinculo) {
                                                        $vinculado = true;
                                                    }
                                                @endphp

                                                @if ($vinculado)
                                                    <form action="{{ $desvincularRoute }}" method="POST">
                                                        @csrf
                                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i>Desvincular</button>
                                                    </form>
                                                @else
                                                    <form action="{{ $vincularRoute }}" method="POST">
                                                        @csrf
                                                        <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-fw fa-trash"></i>Vincular</button>
                                                    </form>
                                                @endif
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {!! $rackoperadores->links() !!}
        </div>
    </div>
</div>


