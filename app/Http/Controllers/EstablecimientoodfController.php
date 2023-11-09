<?php

namespace App\Http\Controllers;

use App\Models\Odfoperadore;
use Illuminate\Http\Request;
use App\Models\Establecimiento;
use App\Models\Establecimientoodf;
use Illuminate\Support\Facades\DB;

class EstablecimientoodfController extends Controller
{
    public function index($establecimiento_id, $odfoperador_id){
        $establecimientos = Establecimiento::all();
        $rackoperador = Odfoperadore::all();
        $Establecimientoodf = DB::select(`select * from Establecimientoodf where establecimiento_id = $establecimiento_id and odfoperador_id = $odfoperador_id`);        
        return view('establecimiento.index', compact('odfoperador','establecimientos','Establecimientoodf'));
    }

    public function vincular($odfoperadorId, $establecimientoId, $vinculacion)
    {

        if ($vinculacion=='vincular'){

                    // Crear un nuevo registro en la tabla intermedia
        $establecimientoodfoperador = new Establecimientoodf();
        $establecimientoodfoperador->odfoperador_id = $odfoperadorId;
        $establecimientoodfoperador->establecimiento_id = $establecimientoId;
        $establecimientoodfoperador->save();
    
        // Redireccionar o realizar otras acciones según sea necesario
        return redirect()->back()->with('success', 'rack de operador vinculado exitosamente');
        

            
        }else{

            $query = "DELETE FROM Establecimientoodfs WHERE establecimiento_id = :establecimientoId AND odfoperador_id = :odfoperadorId";
            DB::select($query, ['establecimientoId' => $establecimientoId, 'odfoperadorId' => $odfoperadorId]);


            return redirect()->back()
                ->with('success', 'Rack de operador desvinculado exitosamente');
        }

    }

}
