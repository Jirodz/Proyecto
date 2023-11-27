<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Rack
 *
 * @property $id
 * @property $nombre_rack
 * @property $tipo_rack
 * @property $establecimiento_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Establecimiento $establecimiento
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Rack extends Model
{
    
    static $rules = [
		'nombre_rack' => 'required',
		'tipo_rack' => 'required',
		'establecimiento_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre_rack','tipo_rack','establecimiento_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function establecimiento()
    {
        return $this->hasOne('App\Models\Establecimiento', 'id', 'establecimiento_id');
    }
    

}
