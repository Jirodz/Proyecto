<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Tipo
 *
 * @property $id
 * @property $tipo_de_red
 * @property $created_at
 * @property $updated_at
 *
 * @property Establecimientotipo[] $establecimientotipos
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Tipo extends Model
{
    
    static $rules = [
		'tipo_de_red' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['tipo_de_red'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function establecimientotipos()
    {
        return $this->hasMany('App\Models\Establecimientotipo', 'tipo_id', 'id');
    }
    

}
