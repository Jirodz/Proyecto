<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Establecimientorack extends Model
{
    use HasFactory;

    protected $table = 'establecimientoracks';

    public function rackoperador()
    {
        return $this->belongsTo(Rackoperadore::class, 'rackoperador_id');
    }

    public function establecimiento()
    {
        return $this->belongsTo(Establecimiento::class, 'establecimiento_id');
    }
}
