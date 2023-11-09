<?php

namespace App\Http\Controllers;

use App\Models\Tipo;
use Illuminate\Http\Request;
use App\Models\Establecimiento;
use Illuminate\Support\Facades\DB;
use App\Models\Establecimientotipo;



class EstablecimientotipoController extends Controller

{
    public function index($establecimiento_id, $tipo_id){
        $establecimientos = Establecimiento::all();
        $tipo = Tipo::all();
        $Establecimientotipo = DB::select(`select * from Establecimientotipo where establecimiento_id = $establecimiento_id and tipo_id = $tipo_id`);        
        return view('establecimiento.index', compact('tipo','establecimientos','Establecimientotipo'));
    }

    public function vincular($tipoId, $establecimientoId, $vinculacion)
    {

        if ($vinculacion=='vincular'){

                    // Crear un nuevo registro en la tabla intermedia
        $establecimientoTipo = new Establecimientotipo();
        $establecimientoTipo->tipo_id = $tipoId;
        $establecimientoTipo->establecimiento_id = $establecimientoId;
        $establecimientoTipo->save();
    
        // Redireccionar o realizar otras acciones según sea necesario
        return redirect()->back()->with('success', 'tipo de red vinculado exitosamente');
        

            
        }else{

            $query = "DELETE FROM Establecimientotipos WHERE establecimiento_id = :establecimientoId AND tipo_id = :tipoId";
            DB::select($query, ['establecimientoId' => $establecimientoId, 'tipoId' => $tipoId]);


            return redirect()->back()
                ->with('success', 'Tipo de red desvinculado exitosamente');
        }

    }

}
