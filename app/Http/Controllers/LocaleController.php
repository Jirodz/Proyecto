<?php

namespace App\Http\Controllers;

use App\Models\Locale;
use App\Models\Odf;
use App\Models\Port;
use App\Models\Establecimiento;
use App\Models\Tipolocale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;



class LocaleController extends Controller
{
    public function index(Request $request)
    {
        $establecimientos = Establecimiento::all();
        $puertos = Port::all();
        $selectedEstablecimientoId = $request->input('establecimiento_id');
        
        $locales = Locale::when($selectedEstablecimientoId, function ($query) use ($selectedEstablecimientoId) {
            return $query->where('establecimiento_id', $selectedEstablecimientoId);
        });
    
        // Aquí puedes agregar las condiciones adicionales según los parámetros de búsqueda
        if ($numeroLocal = $request->input('numero_local')) {
            $locales->where('numero_local', 'LIKE', "%$numeroLocal%");
        }
    
        if ($odf = $request->input('odf')) {
            $locales->whereHas('odf', function ($subQuery) use ($odf) {
                $subQuery->where('nombre_odf', 'LIKE', "%$odf%");
            });
        }
    
        if ($puerto = $request->input('puerto')) {
            $locales->whereHas('port', function ($subQuery) use ($puerto) {
                $subQuery->where('numero_puerto', 'LIKE', "%$puerto%");
            });
        }
    
        $locales = $locales->paginate(10);
        
        $odfs = [];
        $availablePorts = [];
        $usedPorts = [];
        
        if ($selectedEstablecimientoId) {
            $odfs = Odf::where('establecimiento_id', $selectedEstablecimientoId)->get();
    
            foreach ($odfs as $odf) {
                $usedPorts[$odf->id] = Locale::where('odf_id', $odf->id)->pluck('port_id')->toArray();
                $availablePorts[$odf->id] = Port::all();
            }
        }
        
        return view('locale.index', compact('locales', 'establecimientos', 'selectedEstablecimientoId', 'puertos', 'odfs', 'availablePorts', 'usedPorts'))
            ->with('i', (request()->input('page', 1) - 1) * $locales->perPage());
    }
    
    

    public function create(Request $request)
    {
        $locale = new Locale();
        $puertosDisponibles = range(1, 48);
    
        // Obtener el ID del establecimiento del parámetro o formulario
        $establecimientoId = $request->input('establecimiento_id');
    
        // Filtrar los ODFs por el ID del establecimiento
        $odfs = Odf::where('establecimiento_id', $establecimientoId)->pluck('nombre_odf', 'id');
    
        // Obtener el establecimiento correspondiente al ID actual
        $establecimiento = Establecimiento::find($establecimientoId);
    
        // Si no se proporciona un ID, puedes ajustar esto según tus necesidades
        $establecimientos = $establecimiento ? [$establecimientoId => $establecimiento->nombre_establecimiento] : [];
    
        $ports = Port::pluck('numero_puerto', 'id');
        
        return view('locale.create', compact('locale', 'odfs', 'ports', 'establecimientos', 'puertosDisponibles', 'establecimientoId'));
    }
    
    
    public function store(Request $request)
    {
        $request->validate([
            'numero_local' => 'required|string|max:50',
            'establecimiento_id' => 'required|exists:establecimientos,id',
            'odf_id' => 'required|exists:odfs,id',
            'port_id' => [
                'required',
                'integer',
                'min:1',
                'max:48',
                'unique:locales,port_id,NULL,id,odf_id,' . $request->input('odf_id'),
            ],
        ]);

        $locale = Locale::create($request->all());

        $establecimientoId = $request->input('establecimiento_id');

        // Después de guardar, redirige al usuario a la página del establecimiento filtrado
        return Redirect::route('locales.index', ['establecimiento_id' => $establecimientoId])
            ->with('success', 'La actividad se ha efectuado correctamente.');


    }

    public function show($id)
    {
        $locale = Locale::find($id);

        return view('locale.show', compact('locale'));
    }

    public function edit($id)
    {
        $locale = Locale::find($id);
        $puertosDisponibles = range(1, 48);
        $odfs = Odf::pluck('nombre_odf', 'id');
        $ports = Port::pluck('numero_puerto', 'id');
        $establecimientos = Establecimiento::pluck('nombre_establecimiento', 'id');
        return view('locale.edit', compact('locale', 'odfs', 'ports', 'establecimientos', 'puertosDisponibles',));
    }

    public function update(Request $request, Locale $locale)
    {
        $request->validate([
            'numero_local' => 'required|string|max:50',
            'establecimiento_id' => 'required|exists:establecimientos,id',
            'odf_id' => 'required|exists:odfs,id',
            'port_id' => [
                'required',
                'integer',
                'min:1',
                'max:48',
                'unique:locales,port_id,' . $locale->id . ',id,odf_id,' . $request->input('odf_id'),
            ],
        ]);

        $locale->update($request->all());

        $establecimientoId = $request->input('establecimiento_id');

        // Después de guardar, redirige al usuario a la página del establecimiento filtrado
        return Redirect::route('locales.index', ['establecimiento_id' => $establecimientoId])
            ->with('success', 'La actividad se ha efectuado correctamente.');
    }

    public function destroy($id)
    {
        $locale = Locale::find($id)->delete();

        return redirect()->route('locales.index')
            ->with('success', 'Locale deleted successfully');
    }
    
}


