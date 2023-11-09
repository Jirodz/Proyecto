<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Desarrolladora
 *
 * @property $id
 * @property $nombre_desarrolladora
 * @property $numero_telefono
 * @property $encargado
 * @property $created_at
 * @property $updated_at
 *
 * @property Establecimiento[] $establecimientos
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Desarrolladora extends Model
{
    
    static $rules = [
		'nombre_desarrolladora' => 'required',
		'numero_telefono' => 'required',
		'encargado' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre_desarrolladora','numero_telefono','encargado'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function establecimientos()
    {
        return $this->hasMany('App\Models\Establecimiento', 'desarrolladora_id', 'id');
    }
    

}
