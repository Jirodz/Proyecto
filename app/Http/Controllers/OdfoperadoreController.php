<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Odfoperadore;
use App\Models\Establecimiento;
use Illuminate\Http\Request;

class OdfoperadoreController extends Controller
{
    public function index(Request $request)
    {
        $query = Odfoperadore::query();
        
        // Verifica si se proporciona un valor para el campo "centro_comercial"
        if ($request->has('centro_comercial')) {
            $centroComercial = $request->input('centro_comercial');
            $query->whereHas('establecimiento', function ($query) use ($centroComercial) {
                $query->where('nombre_establecimiento', 'like', '%' . $centroComercial . '%');
            });
        }

        $odfoperadores = $query->paginate();

        return view('odfoperadore.index', compact('odfoperadores'))
            ->with('i', ($request->input('page', 1) - 1) * $odfoperadores->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $odfoperadore = new Odfoperadore();
        $establecimientos = Establecimiento::pluck('nombre_establecimiento','id');
        return view('odfoperadore.create', compact('odfoperadore','establecimientos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Odfoperadore::$rules);

        $odfoperadore = Odfoperadore::create($request->all());

        return redirect()->route('odfoperadores.index')
            ->with('success', 'ODF de operador creado exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $odfoperadore = Odfoperadore::find($id);

        return view('odfoperadore.show', compact('odfoperadore'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $odfoperadore = Odfoperadore::find($id);
        $establecimientos = Establecimiento::pluck('nombre_establecimiento','id');

        return view('odfoperadore.edit', compact('odfoperadore','establecimientos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Odfoperadore $odfoperadore
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Odfoperadore $odfoperadore)
    {
        request()->validate(Odfoperadore::$rules);

        $odfoperadore->update($request->all());

        return redirect()->route('odfoperadores.index')
            ->with('success', 'ODF de operador actualizado exitosamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        try{
            $odfoperadore = Odfoperadore::findOrFail($id);
            $odfoperadore->delete();

            return redirect()->route('odfoperadores.index')
            ->with('success', 'ODF de operador eliminado exitosamente');

        } catch(\Illuminate\Database\QueryException $e){
            return redirect()->route('odfoperadores.index')
            ->with('success', 'El ODF de operador esta vinculado a un establecimiento');

        }

    }
}
