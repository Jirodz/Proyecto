<?php

namespace App\Http\Controllers;

use App\Models\Tipolocale;
use Illuminate\Http\Request;

/**
 * Class TipolocaleController
 * @package App\Http\Controllers
 */
class TipolocaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipolocales = Tipolocale::paginate();

        return view('tipolocale.index', compact('tipolocales'))
            ->with('i', (request()->input('page', 1) - 1) * $tipolocales->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipolocale = new Tipolocale();
        return view('tipolocale.create', compact('tipolocale'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Tipolocale::$rules);

        $tipolocale = Tipolocale::create($request->all());

        return redirect()->route('tipolocales.index')
            ->with('success', 'Tipolocale created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tipolocale = Tipolocale::find($id);

        return view('tipolocale.show', compact('tipolocale'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tipolocale = Tipolocale::find($id);

        return view('tipolocale.edit', compact('tipolocale'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Tipolocale $tipolocale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tipolocale $tipolocale)
    {
        request()->validate(Tipolocale::$rules);

        $tipolocale->update($request->all());

        return redirect()->route('tipolocales.index')
            ->with('success', 'Tipolocale updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $tipolocale = Tipolocale::find($id)->delete();

        return redirect()->route('tipolocales.index')
            ->with('success', 'Tipolocale deleted successfully');
    }
}
