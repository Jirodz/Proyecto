<?php

namespace App\Http\Controllers;

use App\Models\Rackoperadore;
use App\Models\Establecimiento;
use Illuminate\Http\Request;

/**
 * Class RackoperadoreController
 * @package App\Http\Controllers
 */
class RackoperadoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Obtenemos todos los racks de operadores
        $query = Rackoperadore::query();

        // Filtrar por nombre de centro comercial si se proporciona en la búsqueda
        if ($request->has('centro_comercial')) {
            $query->whereHas('establecimiento', function ($subquery) use ($request) {
                $subquery->where('nombre_establecimiento', 'like', '%' . $request->input('centro_comercial') . '%');
            });
        }

        // Paginar los resultados
        $rackoperadores = $query->paginate(10);

        return view('rackoperadore.index', compact('rackoperadores'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rackoperadore = new Rackoperadore();
        $establecimientos = Establecimiento::pluck('nombre_establecimiento','id');
        return view('rackoperadore.create', compact('rackoperadore','establecimientos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Rackoperadore::$rules);

        $rackoperadore = Rackoperadore::create($request->all());

        return redirect()->route('rackoperadores.index')
            ->with('success', 'Rack de operador creado exitmsamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rackoperadore = Rackoperadore::find($id);

        return view('rackoperadore.show', compact('rackoperadore'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rackoperadore = Rackoperadore::find($id);
        $establecimientos = Establecimiento::pluck('nombre_establecimiento','id');

        return view('rackoperadore.edit', compact('rackoperadore','establecimientos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Rackoperadore $rackoperadore
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rackoperadore $rackoperadore)
    {
        request()->validate(Rackoperadore::$rules);

        $rackoperadore->update($request->all());

        return redirect()->route('rackoperadores.index')
            ->with('success', 'Rack de operador actualizado exitosamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        try{
            $rackoperadore = Rackoperadore::findOrFail($id);
            $rackoperadore->delete();

            return redirect()->route('rackoperadores.index')
            ->with('success', 'Rack de operador eliminado exitosamente');

        } catch(\Illuminate\Database\QueryException $e){
            return redirect()->route('rackoperadores.index')
            ->with('success', 'Rack de operador vinculado a uno o varios registros');

        }
        


    }
}
