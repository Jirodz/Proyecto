<?php

namespace App\Http\Controllers;

use App\Models\Desarrolladora;
use Illuminate\Http\Request;

/**
 * Class DesarrolladoraController
 * @package App\Http\Controllers
 */
class DesarrolladoraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $desarrolladoras = Desarrolladora::paginate();

        return view('desarrolladora.index', compact('desarrolladoras'))
            ->with('i', (request()->input('page', 1) - 1) * $desarrolladoras->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $desarrolladora = new Desarrolladora();
        return view('desarrolladora.create', compact('desarrolladora'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Desarrolladora::$rules);

        $desarrolladora = Desarrolladora::create($request->all());

        return redirect()->route('desarrolladoras.index')
            ->with('success', 'Desarrolladora created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $desarrolladora = Desarrolladora::find($id);

        return view('desarrolladora.show', compact('desarrolladora'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $desarrolladora = Desarrolladora::find($id);

        return view('desarrolladora.edit', compact('desarrolladora'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Desarrolladora $desarrolladora
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Desarrolladora $desarrolladora)
    {
        request()->validate(Desarrolladora::$rules);

        $desarrolladora->update($request->all());

        return redirect()->route('desarrolladoras.index')
            ->with('success', 'Desarrolladora updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        try{
            $desarrolladora = Desarrolladora::findOrFail($id);
            $desarrolladora->delete();

            return redirect()->route('desarrolladoras.index')
            ->with('success', 'Desarrolladora eliminada exitosamente');

        } catch(\Illuminate\Database\QueryException $e){

            return redirect()->route('desarrolladoras.index')
            ->with('success', 'La desarrolladora esta vinculada a uno o varios establecimientos');
        }
    }
}
