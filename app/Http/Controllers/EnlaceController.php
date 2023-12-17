<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Enlace;
use App\Models\Establecimiento;
use App\Models\Tipo;
use App\Models\Tipolocale;
use App\Models\Locale;
use App\Models\Odf;
use App\Models\Operadore;
use App\Models\Port;
use App\Models\Visita;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
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
    
        // Nuevos campos de búsqueda por intervalo de tiempo
        if ($request->filled('fecha_inicio') && $request->filled('fecha_fin')) {
            $fechaInicio = $request->input('fecha_inicio');
            $fechaFin = $request->input('fecha_fin');
    
            $enlaces->where(function ($query) use ($selectedEstablecimiento, $fechaInicio, $fechaFin) {
                // Aplicar el filtro por establecimiento si se seleccionó uno
                if ($selectedEstablecimiento) {
                    $query->where('establecimiento_id', $selectedEstablecimiento);
                }
    
                // Aplicar el filtro por fecha
                $query->whereBetween('created_at', [$fechaInicio, $fechaFin])
                    ->orWhere(function ($query) use ($fechaInicio, $fechaFin) {
                        $query->where('created_at', '>=', $fechaInicio)
                            ->where('created_at', '<=', $fechaFin);
                    });
            });
        }
    
        // Condiciones de búsqueda adicionales
        if ($negocio = $request->input('negocio')) {
            $enlaces->where('negocio', 'LIKE', "%$negocio%");
        }
    
        if ($numeroLocal = $request->input('numero_local')) {
            $enlaces->whereHas('locale', function ($subQuery) use ($numeroLocal) {
                $subQuery->where('numero_local', 'LIKE', "%$numeroLocal%");
            });
        }
    
        // Ordenar por la columna updated_at de manera descendente
        $enlaces->orderBy('updated_at', 'desc');
    
        // Paginar los resultados
        $enlaces = $enlaces->paginate(10);
    
        // Pasar variables a la vista
        return view('enlace.index', compact('enlaces', 'establecimientos', 'selectedEstablecimiento'))
            ->with('i', ($request->input('page', 1) - 1) * $enlaces->perPage());
    }
    
    
    

    public function pdf(Request $request)
    {
        $establecimiento_id = $request->establecimiento_id;
        
        // Verificar si se proporcionó un establecimiento_id válido
        if ($establecimiento_id) {
            $enlaces = Enlace::where('establecimiento_id', $establecimiento_id)->paginate();
        } else {
            $enlaces = Enlace::paginate();
        }

        $pdf = Pdf::loadView('enlace.pdf', compact('enlaces'));
        return $pdf->download('conexiones.pdf');
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
        $operador = Operadore::pluck('operador','id');
        $cliente = Cliente::pluck('nombre','id');
        $establecimiento = Establecimiento::where('id', $establecimientoId)->pluck('nombre_establecimiento', 'id');
        $local = Locale::where('establecimiento_id', $establecimientoId)->pluck('numero_local', 'id');
        $odf = Odf::where('establecimiento_id', $establecimientoId)->pluck('nombre_odf', 'id');
        $puerto = Port::pluck('numero_puerto','id');

        
        
        return view('enlace.create', compact('enlace','tipolocal','tipodered','cliente','establecimiento','local','odf','puerto','operador'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // Continuar con el código existente para crear el nuevo enlace
        $data = $request->all();
    
        // Agrega el valor para 'odf_operador' aquí, por ejemplo:
        $data['odf_operador'] = $request->input('odf_operador');
        $data['puerto_operador'] = $request->input('puerto_operador');
    
        $enlace = Enlace::create($data);
    
        // Obtén el establecimiento_id del formulario o de la sesión, dependiendo de tu lógica.
        $establecimientoId = $request->input('establecimiento_id');
    
        // Crear registro de visita con el número de puerto en la observación
        $observacion = "Conexión ID: {$enlace->id} para: {$enlace->negocio}, contacto:{$enlace->nombre_contacto}, operador: {$enlace->operadore->operador}, 
        ODF: {$enlace->odf->nombre_odf}, puerto: {$enlace->port->numero_puerto}, Local: {$enlace->locale->numero_local}
        , tecnico de operador: {$enlace->responsable_operador}";
    
        Visita::create([
            'tipo_visita' => 'Conexión creada',
            'observacion' => $observacion,
            'user_id' => auth()->id(),
            'modelo_afectado' => 'Enlace',
            'id_afectado' => $enlace->id,
            'establecimiento_id' => $establecimientoId,
        ]);
    
        // Después de guardar, redirige al usuario a la página del establecimiento filtrado
        return Redirect::route('enlaces.index', ['establecimiento_id' => $establecimientoId])
            ->with('success', 'Se ha creado una conexión correctamente.');
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
        $operador = Operadore::pluck('operador','id');
        $puerto = Port::pluck('numero_puerto', 'id');
    
        // Obtén el establecimiento asociado al enlace
        $establecimientoId = $enlace->establecimiento_id;
    
        // Obtén los locales asociados al establecimiento del enlace
        $local = Locale::where('establecimiento_id', $establecimientoId)->pluck('numero_local', 'id');
        $odf = Odf::where('establecimiento_id', $establecimientoId)->pluck('nombre_odf', 'id');
        $establecimiento = Establecimiento::where('id', $establecimientoId)->pluck('nombre_establecimiento', 'id');
    
        return view('enlace.edit', compact('enlace', 'tipolocal', 'tipodered', 'cliente', 'establecimiento', 'local', 'odf', 'puerto','operador'));
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
        // Continuar con el código existente para actualizar el enlace
        $enlace->update($request->all());
    
        $establecimientoId = $request->input('establecimiento_id');
    
        // Después de actualizar, redirige al usuario a la página del establecimiento filtrado
        return Redirect::route('enlaces.index', ['establecimiento_id' => $establecimientoId])
            ->with('success', 'Se ha actualizado el registro correctamente.');
    }
    

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        // Obtén el enlace antes de borrarlo
        $enlace = Enlace::find($id);
    
        // Verifica si el enlace existe
        if (!$enlace) {
            return redirect()->route('enlaces.index')->with('error', 'El enlace no existe.');
        }
    
        // Obtén el establecimiento_id antes de borrar el enlace
        $establecimientoId = $enlace->establecimiento_id;
    
        // Verifica si se pudo obtener el establecimiento_id
        if (!$establecimientoId) {
            return redirect()->route('enlaces.index')->with('error', 'No se pudo obtener el establecimiento_id.');
        }
    
        // Borra el enlace
        $enlace->delete();
    
        // Crea un registro en la tabla 'visitas' para la eliminación del enlace
        Visita::create([
            'tipo_visita' => 'Conexión eliminada',
            'observacion' => "Conexión ID: {$enlace->id} para: {$enlace->negocio}, contacto:{$enlace->nombre_contacto}, 
            operador: {$enlace->operadore->operador}, 
            ODF: {$enlace->odf->nombre_odf}, puerto: {$enlace->port->numero_puerto}, Local: {$enlace->locale->numero_local},
            tecnico de operador: {$enlace->responsable_operador}",
            'user_id' => auth()->id(),
            'modelo_afectado' => 'Enlace',
            'id_afectado' => $id,
            'establecimiento_id' => $establecimientoId,
        ]);
    
        // Redirige al usuario de vuelta al establecimiento
        return redirect()->route('enlaces.index', ['establecimiento_id' => $establecimientoId])
            ->with('success', 'Se ha eliminado el registro correctamente');
    }
    
}
