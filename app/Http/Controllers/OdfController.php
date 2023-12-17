<?php

namespace App\Http\Controllers;

use App\Models\Odf;
use App\Models\Establecimiento;
use Illuminate\Http\Request;

/**
 * Class OdfController
 * @package App\Http\Controllers
 */
class OdfController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = Odf::with('establecimiento');
    
        // Filtrar por establecimiento
        if ($request->has('establecimiento_id') && $request->filled('establecimiento_id')) {
            $query->whereHas('establecimiento', function ($query) use ($request) {
                $query->where('id', $request->establecimiento_id);
            });
        }
    
        $odfs = $query->paginate();
    
        // Obtener la lista de establecimientos para el formulario de filtrado
        $establecimientos = Establecimiento::all();
    
        return view('odf.index', compact('odfs', 'establecimientos'))
            ->with('i', (request()->input('page', 1) - 1) * $odfs->perPage());
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $odf = new Odf();
        $establecimientos = Establecimiento::pluck('nombre_establecimiento','id');

        return view('odf.create', compact('odf','establecimientos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Odf::$rules);

        $odf = Odf::create($request->all());

        return redirect()->route('odfs.index')
            ->with('success', 'ODF creado exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $odf = Odf::find($id);

        return view('odf.show', compact('odf'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $odf = Odf::find($id);
        $establecimientos = Establecimiento::pluck('nombre_establecimiento','id');

        return view('odf.edit', compact('odf','establecimientos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Odf $odf
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Odf $odf)
    {
        request()->validate(Odf::$rules);

        $odf->update($request->all());

        return redirect()->route('odfs.index')
            ->with('success', 'ODF actualizado exitosamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        try{
            $odf = Odf::findOrFail($id);
            $odf->delete();

            return redirect()->route('odfs.index')
            ->with('success', 'ODF Eliminado exitosamente');
        }  catch(\Illuminate\Database\QueryException $e){

            return redirect()->route('odfs.index')
            ->with('success', 'El ODF esta vinculado a uno o varios registros');
        }
        
    }
}
