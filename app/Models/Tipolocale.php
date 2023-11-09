<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Tipolocale
 *
 * @property $id
 * @property $tipo_de_local
 * @property $created_at
 * @property $updated_at
 *
 * @property Localtipo[] $localtipos
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Tipolocale extends Model
{
    
    static $rules = [
		'tipo_de_local' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['tipo_de_local'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function localtipos()
    {
        return $this->hasMany('App\Models\Localtipo', 'tipo_de_local_id', 'id');
    }
    

}
