<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Rackoperadore
 *
 * @property $id
 * @property $rack_operador
 * @property $establecimiento_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Establecimientorack[] $establecimientoracks
 * @property Establecimiento $establecimiento
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Rackoperadore extends Model
{
    
    static $rules = [
		'rack_operador' => 'required',
		'establecimiento_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['rack_operador','establecimiento_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function establecimientoracks()
    {
        return $this->hasMany('App\Models\Establecimientorack', 'rackoperador_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function establecimiento()
    {
        return $this->hasOne('App\Models\Establecimiento', 'id', 'establecimiento_id');
    }
    

}
