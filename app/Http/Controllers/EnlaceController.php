<?php

namespace App\Http\Controllers;

use App\Models\Enlace;
use App\Models\Establecimiento;
use App\Models\Cliente;
use App\Models\Locale;
use App\Models\Odf;
use App\Models\Port;
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
    
    // Obtener el establecimiento seleccionado (ajusta esta lógica según tu aplicación)
    $selectedEstablecimientoId = request('establecimiento_id');
    $selectedEstablecimiento = !empty($selectedEstablecimientoId);

    // Obtener la lista de enlaces filtrada por el establecimiento seleccionado
    $enlaces = $selectedEstablecimiento
        ? Enlace::where('establecimiento_id', $selectedEstablecimientoId)->paginate()
        : Enlace::paginate();

    // Obtener la lista de establecimientos
    $establecimientos = Establecimiento::pluck('nombre_establecimiento', 'id');

    return view('enlace.index', compact('enlaces', 'establecimientos', 'selectedEstablecimiento'))
        ->with('i', (request()->input('page', 1) - 1) * $enlaces->perPage());
}

    
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // Obtener el ID del establecimiento del parámetro o formulario
        $establecimientoId = $request->input('establecimiento_id');
        $enlace = new Enlace();
        // Obtener el establecimiento correspondiente al ID actual
        $establecimiento = Establecimiento::find($establecimientoId);
    
        // Si no se proporciona un ID, puedes ajustar esto según tus necesidades
        $establecimientos = $establecimiento ? [$establecimientoId => $establecimiento->nombre_establecimiento] : [];
    
        $clientes = Cliente::pluck('nombre','id');
        // Filtrar los locales por el ID del establecimiento
        $locales = Locale::where('establecimiento_id', $establecimientoId)->pluck('numero_local', 'id');
        // Filtrar los ODFs por el ID del establecimiento
        $odfs = Odf::where('establecimiento_id', $establecimientoId)->pluck('nombre_odf', 'id');
        $ports = Port::pluck('numero_puerto','id');
        return view('enlace.create', compact('enlace','establecimientos','clientes','locales','odfs','ports'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Enlace::$rules);

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
        $establecimientos = Establecimiento::pluck('nombre_establecimiento','id');
        $clientes = Cliente::pluck('nombre','id');
        $locales = Locale::pluck('numero_local','id');
        $odfs = Odf::pluck('nombre_odf','id');
        $ports = Port::pluck('numero_puerto','id');

        return view('enlace.edit', compact('enlace','establecimientos','clientes','locales','odfs','ports'));
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
