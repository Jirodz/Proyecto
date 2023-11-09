<?php

namespace App\Http\Controllers;

use App\Models\Operadore;
use Illuminate\Http\Request;
use App\Models\Establecimiento;
use Illuminate\Support\Facades\DB;
use App\Models\Establecimientooperador;

class EstablecimientooperadorController extends Controller
{
    public function index($establecimiento_id, $operador_id){
        $establecimientos = Establecimiento::all();
        $operadore = Operadore::all();
        $operadore = Establecimientooperador::select(`select * from Establecimientooperador where establecimiento_id = $establecimiento_id and operador_id = $operador_id`);
        return view('establecimiento.index2', compact('operadore','establecimientos'));
    }

    public function __invoke($operadorId, $establecimientoId, $vinculacion)
    {

        if ($vinculacion=='vincular'){

                    // Crear un nuevo registro en la tabla intermedia
        $establecimientoOperador = new Establecimientooperador();
        $establecimientoOperador->operador_id = $operadorId;
        $establecimientoOperador->establecimiento_id = $establecimientoId;
        $establecimientoOperador->save();
    
        // Redireccionar o realizar otras acciones según sea necesario
        return redirect()->back()->with('success', 'Operador vinculado exitosamente');
        

            
        }else{

            $query = "DELETE FROM Establecimientooperador WHERE establecimiento_id = :establecimientoId AND operador_id = :operadorId";
            DB::select($query, ['establecimientoId' => $establecimientoId, 'operadorId' => $operadorId]);


            return redirect()->back()
                ->with('success', 'Operador desvinculado exitosamente');
        }

    }

    
}
