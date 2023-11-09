
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Operadores en establecimiento') }}
                            </span>


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
                                        <th>ID</th>
                                        
										<th>Operador</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($operadores as $operadore)
                                        <tr>
                                            <td>{{ $operadore->id }}</td>
                                            
											<td>{{ $operadore->operador }}</td>

                                            <td class='d-flex gap-3'>

                                                @php
                                                $vinculado = false;
                                                $vincularRoute = route('operadores.vincular', ['operadorId' => $operadore->id, 'establecimientoId' => $establecimiento->id, 'vincular' => 'vincular']);
                                                $desvincularRoute = route('operadores.vincular', ['operadorId' => $operadore->id, 'establecimientoId' => $establecimiento->id, 'vincular' => 'desvincular']);
                                            @endphp
                                            @foreach ($Establecimientooperador as $vinculo)
                                                @if ($vinculo->operador_id == $operadore->id)
                                                    @php
                                                        $vinculado = true;
                                                        break;
                                                    @endphp
                                                @endif
                                            @endforeach
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
                {!! $operadores->links() !!}
            </div>
        </div>
    </div>

