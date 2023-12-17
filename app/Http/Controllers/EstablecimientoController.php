<?php

namespace App\Http\Controllers;

use App\Models\Tipo;
use App\Models\Operadore;
use App\Models\Odfoperadore;
use Illuminate\Http\Request;
use App\Models\Rackoperadore;
use App\Models\Establecimiento;
use App\Models\Desarrolladora;
use Illuminate\Database\QueryException;

/**
 * Class EstablecimientoController
 * @package App\Http\Controllers
 */


class EstablecimientoController extends Controller
{

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    
    {
        $establecimientos = Establecimiento::with('operadores')->paginate();
        $operadores = Operadore::paginate();
        $tipos = Tipo::paginate();
        $rackoperadores = Rackoperadore::paginate();
        $odfoperadores = Odfoperadore::paginate();

        return view('establecimiento.index', compact('establecimientos','operadores','tipos','rackoperadores','odfoperadores'))
            ->with('i', (request()->input('page', 1) - 1) * $establecimientos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $establecimiento = new Establecimiento();
        $desarrolladoras = Desarrolladora::pluck('nombre_desarrolladora','id');
        return view('establecimiento.create', compact('establecimiento','desarrolladoras'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Establecimiento::$rules);

        $establecimiento = Establecimiento::create($request->all());

        return redirect()->route('establecimientos.index')
            ->with('success', 'Establecimiento created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $establecimiento = Establecimiento::find($id);

        return view('establecimiento.show', compact('establecimiento'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $establecimiento = Establecimiento::find($id);
        $desarrolladoras = Desarrolladora::pluck('nombre_desarrolladora','id');

        return view('establecimiento.edit', compact('establecimiento','desarrolladoras'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Establecimiento $establecimiento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Establecimiento $establecimiento)
    {
        request()->validate(Establecimiento::$rules);

        $establecimiento->update($request->all());

        return redirect()->route('establecimientos.index')
            ->with('success', 'Establecimiento updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        try{
            $establecimiento = Establecimiento::findOrFail($id);
            $establecimiento->delete();

            return redirect()->route('establecimientos.index')
            ->with('success', 'Establecimiento eliminado exitosamente');
        } catch(\Illuminate\Database\QueryException $e){

        return redirect()->route('establecimientos.index')
            ->with('success', 'El establecimiento esta vinculado a uno o varios registros');
        }
    }
}
