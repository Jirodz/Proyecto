<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Visita
 *
 * @property $id
 * @property $tipo_visita
 * @property $observacion
 * @property $user_id
 * @property $establecimiento_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Establecimiento $establecimiento
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Visita extends Model
{
    
    static $rules = [
		'tipo_visita' => 'required',
		'observacion' => 'required',
		'user_id' => 'required',
		'establecimiento_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['tipo_visita','observacion','user_id','establecimiento_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function establecimiento()
    {
        return $this->hasOne('App\Models\Establecimiento', 'id', 'establecimiento_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
    

}
