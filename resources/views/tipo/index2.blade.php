<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <span id="card_title">
                            {{ __('Tipo') }}
                        </span>
                        <div class="float-right">
                            <a href="{{ route('tipos.create') }}" class="btn btn-primary btn-sm float-right" data-placement="left">
                                {{ __('Add New') }}
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
                                    <th>Tipo De Red</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tipos as $tipo)
                                    <tr>
                                        <td>{{ $tipo->id }}</td>
                                        <td>{{ $tipo->tipo_de_red }}</td>
                                        <td class='d-flex gap-3'>
                                            @php
                                                $vincularRoute = route('tipos.vincular', ['tipoId' => $tipo->id, 'establecimientoId' => $establecimiento->id, 'vincular' => 'vincular']);
                                                $desvincularRoute = route('tipos.vincular', ['tipoId' => $tipo->id, 'establecimientoId' => $establecimiento->id, 'vincular' => 'desvincular']);
                                                $vinculado = false;
                                                $vinculo = $tipo->establecimientotipos()->where('establecimiento_id', $establecimiento->id)->first();
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
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {!! $tipos->links() !!}
        </div>
    </div>
</div>

