<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Establecimientoodf extends Model
{
    use HasFactory;

    protected $table = 'establecimientoodfs';

    public function odfoperador()
    {
        return $this->belongsTo(Odfoperadore::class, 'odfoperador_id');
    }

    public function establecimiento()
    {
        return $this->belongsTo(Establecimiento::class, 'establecimiento_id');
    }
}