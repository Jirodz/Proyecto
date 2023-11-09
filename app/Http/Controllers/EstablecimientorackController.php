<?php

namespace App\Http\Controllers;

use App\Models\Rackoperadore;
use Illuminate\Http\Request;
use App\Models\Establecimiento;
use Illuminate\Support\Facades\DB;
use App\Models\Establecimientorack;



class EstablecimientorackController extends Controller

{
    public function index($establecimiento_id, $rackoperador_id){
        $establecimientos = Establecimiento::all();
        $rackoperador = Rackoperadore::all();
        $Establecimientorack = DB::select(`select * from Establecimientorack where establecimiento_id = $establecimiento_id and rackoperador_id = $rackoperador_id`);        
        return view('establecimiento.index', compact('rackoperador','establecimientos','Establecimientorack'));
    }

    public function vincular($rackoperadorId, $establecimientoId, $vinculacion)
    {

        if ($vinculacion=='vincular'){

                    // Crear un nuevo registro en la tabla intermedia
        $establecimientorackoperador = new Establecimientorack();
        $establecimientorackoperador->rackoperador_id = $rackoperadorId;
        $establecimientorackoperador->establecimiento_id = $establecimientoId;
        $establecimientorackoperador->save();
    
        // Redireccionar o realizar otras acciones según sea necesario
        return redirect()->back()->with('success', 'rack de operador vinculado exitosamente');
        

            
        }else{

            $query = "DELETE FROM Establecimientoracks WHERE establecimiento_id = :establecimientoId AND rackoperador_id = :rackoperadorId";
            DB::select($query, ['establecimientoId' => $establecimientoId, 'rackoperadorId' => $rackoperadorId]);


            return redirect()->back()
                ->with('success', 'Rack de operador desvinculado exitosamente');
        }

    }

}
