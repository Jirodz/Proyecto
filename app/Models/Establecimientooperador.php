<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Establecimientooperador extends Model
{
    protected $table = 'establecimientooperador';

    public function operador()
    {
        return $this->belongsTo(Operador::class, 'operador_id');
    }

    public function establecimiento()
    {
        return $this->belongsTo(Establecimiento::class, 'establecimiento_id');
    }
}
