<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Enlace;
use App\Models\Establecimiento;
use App\Models\Tipo;
use App\Models\Tipolocale;
use App\Models\Locale;
use App\Models\Odf;
use App\Models\Port;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

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
    public function index(Request $request)
    {
        // Obtener todos los establecimientos para la lista desplegable
        $establecimientos = Establecimiento::pluck('nombre_establecimiento', 'id');

        // Obtener el establecimiento seleccionado (si existe)
        $selectedEstablecimiento = $request->input('establecimiento_id');

        // Obtener los enlaces filtrados por establecimiento si se seleccionó uno
        $enlaces = Enlace::when($selectedEstablecimiento, function ($query) use ($selectedEstablecimiento) {
            return $query->where('establecimiento_id', $selectedEstablecimiento);
        });

        // Aquí puedes agregar las condiciones adicionales según los parámetros de búsqueda
        if ($negocio = $request->input('negocio')) {
            $enlaces->where('negocio', 'LIKE', "%$negocio%");
        }
    
        if ($numeroLocal = $request->input('numero_local')) {
            $enlaces->whereHas('locale', function ($subQuery) use ($numeroLocal) {
                $subQuery->where('numero_local', 'LIKE', "%$numeroLocal%");
            });
        }

        // ... Agregar más condiciones según sea necesario

        // Paginar los resultados
        $enlaces = $enlaces->paginate(10);

        // Pasar variables a la vista
        return view('enlace.index', compact('enlaces', 'establecimientos', 'selectedEstablecimiento'))
            ->with('i', ($request->input('page', 1) - 1) * $enlaces->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $establecimientoId = $request->input('establecimiento_id');
        $enlace = new Enlace();
        $tipolocal = Tipolocale::pluck('tipo_de_local','id');
        $tipodered = Tipo::pluck('tipo_de_red','id');
        $cliente = Cliente::pluck('nombre','id');
        $establecimiento = Establecimiento::where('id', $establecimientoId)->pluck('nombre_establecimiento', 'id');
        $local = Locale::where('establecimiento_id', $establecimientoId)->pluck('numero_local', 'id');
        $odf = Odf::where('establecimiento_id', $establecimientoId)->pluck('nombre_odf', 'id');
        $puerto = Port::pluck('numero_puerto','id');

        
        
        return view('enlace.create', compact('enlace','tipolocal','tipodered','cliente','establecimiento','local','odf','puerto'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rulesWithoutFecha = array_diff_key(Enlace::$rules, ['fecha' => '']);

        $this->validate($request, $rulesWithoutFecha);

        $enlace = Enlace::create($request->all());

        // Obtén el establecimiento_id del formulario o de la sesión, dependiendo de tu lógica.
        $establecimientoId = $request->input('establecimiento_id');

     // Después de guardar, redirige al usuario a la página del establecimiento filtrado
        return Redirect::route('enlaces.index', ['establecimiento_id' => $establecimientoId])
         ->with('success', 'La actividad se ha efectuado correctamente.');
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
        $tipolocal = Tipolocale::pluck('tipo_de_local', 'id');
        $tipodered = Tipo::pluck('tipo_de_red', 'id');
        $cliente = Cliente::pluck('nombre', 'id');
        

        $puerto = Port::pluck('numero_puerto', 'id');
    
        // Obtén el establecimiento asociado al enlace
        $establecimientoId = $enlace->establecimiento_id;
    
        // Obtén los locales asociados al establecimiento del enlace
        $local = Locale::where('establecimiento_id', $establecimientoId)->pluck('numero_local', 'id');
        $odf = Odf::where('establecimiento_id', $establecimientoId)->pluck('nombre_odf', 'id');
        $establecimiento = Establecimiento::where('id', $establecimientoId)->pluck('nombre_establecimiento', 'id');
    
        return view('enlace.edit', compact('enlace', 'tipolocal', 'tipodered', 'cliente', 'establecimiento', 'local', 'odf', 'puerto'));
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

        $establecimientoId = $request->input('establecimiento_id');

     // Después de guardar, redirige al usuario a la página del establecimiento filtrado
        return Redirect::route('enlaces.index', ['establecimiento_id' => $establecimientoId])
         ->with('success', 'La actividad se ha efectuado correctamente.');
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
