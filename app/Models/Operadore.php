<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Operadore
 *
 * @property $id
 * @property $operador
 * @property $created_at
 * @property $updated_at
 *
 * @property Establecimiento[] $establecimientos
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Operadore extends Model
{
    
    static $rules = [
		'operador' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['operador'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
/*     public function establecimientos()
    {
        return $this->hasMany('App\Models\Establecimiento', 'operador_id', 'id');
    } */

    public function establecimientos()
    {
        return $this->belongsToMany(Establecimiento::class, 'establecimientooperador');
    }
    

}
