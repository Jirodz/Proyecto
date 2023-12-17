<?php

namespace App\Http\Controllers;

use App\Models\Visita;
use App\Models\Establecimiento;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Barryvdh\DomPDF\Facade\Pdf;

/**
 * Class VisitaController
 * @package App\Http\Controllers
 */
class VisitaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->validate([
            'establecimiento_id' => 'nullable|exists:establecimientos,id',
            'fecha_inicio' => 'nullable|date',
            'fecha_fin' => ['nullable', 'date', Rule::requiredIf($request->has('fecha_inicio'))],
        ]);
    
        $query = Visita::with(['user', 'establecimiento']);
    
        // Filtrar por establecimiento si se proporciona
        if ($request->has('establecimiento_id')) {
            $query->where('establecimiento_id', $request->input('establecimiento_id'));
        }
    
        // Filtrar por fecha si se proporciona
        if ($request->has('fecha_inicio')) {
            $query->where('created_at', '>=', $request->input('fecha_inicio') . ' 00:00:00');
        }
    
        if ($request->has('fecha_fin')) {
            $query->whereDate('created_at', '<=', $request->input('fecha_fin'));
        }
    
        $visitas = $query->orderBy('created_at', 'desc')->paginate();
    
        // Obtener la lista de establecimientos para el filtro
        $establecimientos = Establecimiento::pluck('nombre_establecimiento', 'id');
    
        return view('visita.index', compact('visitas', 'establecimientos'))
            ->with('i', (request()->input('page', 1) - 1) * $visitas->perPage());
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $visita = new Visita();
        return view('visita.create', compact('visita'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Visita::$rules);

        $visita = Visita::create($request->all());

        return redirect()->route('visitas.index')
            ->with('success', 'Visita created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $visita = Visita::find($id);

        return view('visita.show', compact('visita'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $visita = Visita::find($id);

        return view('visita.edit', compact('visita'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Visita $visita
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Visita $visita)
    {
        request()->validate(Visita::$rules);

        $visita->update($request->all());

        return redirect()->route('visitas.index')
            ->with('success', 'Visita updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $visita = Visita::find($id)->delete();

        return redirect()->route('visitas.index')
            ->with('success', 'Visita deleted successfully');
    }
}
