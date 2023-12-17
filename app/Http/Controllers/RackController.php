<?php

namespace App\Http\Controllers;

use App\Models\Rack;
use Illuminate\Http\Request;

/**
 * Class RackController
 * @package App\Http\Controllers
 */
class RackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $racks = Rack::paginate();

        return view('rack.index', compact('racks'))
            ->with('i', (request()->input('page', 1) - 1) * $racks->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rack = new Rack();
        return view('rack.create', compact('rack'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Rack::$rules);

        $rack = Rack::create($request->all());

        return redirect()->route('racks.index')
            ->with('success', 'Rack creado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rack = Rack::find($id);

        return view('rack.show', compact('rack'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rack = Rack::find($id);

        return view('rack.edit', compact('rack'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Rack $rack
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rack $rack)
    {
        request()->validate(Rack::$rules);

        $rack->update($request->all());

        return redirect()->route('racks.index')
            ->with('success', 'Rack actualizado exitosamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {

        try{
            $rack = Rack::findOrFail($id);
            $rack->delete();

            
        return redirect()->route('racks.index')
        ->with('success', 'Rack elimiando exitosamente');

        } catch(\Illuminate\Database\QueryException $e){
            
        return redirect()->route('racks.index')
        ->with('success', 'El rack esta vinculado a uno o varios registros');

        }
        

    }
}
