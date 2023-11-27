<?php

namespace App\Http\Controllers;

use App\Models\Enlace;
use Illuminate\Http\Request;

/**
 * Class EnlaceController
 * @package App\Http\Controllers
 */
class EnlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $enlaces = Enlace::paginate();

        return view('enlace.index', compact('enlaces'))
            ->with('i', (request()->input('page', 1) - 1) * $enlaces->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $enlace = new Enlace();
        return view('enlace.create', compact('enlace'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            // Excluir el campo 'fecha' de las reglas de validación
    $rulesWithoutFecha = array_diff_key(Enlace::$rules, ['fecha' => '']);

    $this->validate($request, $rulesWithoutFecha);

        $enlace = Enlace::create($request->all());

        return redirect()->route('enlaces.index')
            ->with('success', 'Enlace created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $enlace = Enlace::find($id);

        return view('enlace.show', compact('enlace'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $enlace = Enlace::find($id);

        return view('enlace.edit', compact('enlace'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Enlace $enlace
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Enlace $enlace)
    {
        request()->validate(Enlace::$rules);

        $enlace->update($request->all());

        return redirect()->route('enlaces.index')
            ->with('success', 'Enlace updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $enlace = Enlace::find($id)->delete();

        return redirect()->route('enlaces.index')
            ->with('success', 'Enlace deleted successfully');
    }
}
