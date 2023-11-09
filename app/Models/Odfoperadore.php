<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Odfoperadore
 *
 * @property $id
 * @property $odf_operador
 * @property $establecimiento_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Establecimientoodf[] $establecimientoodfs
 * @property Establecimiento $establecimiento
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Odfoperadore extends Model
{
    
    static $rules = [
		'odf_operador' => 'required',
		'establecimiento_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['odf_operador','establecimiento_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function establecimientoodfs()
    {
        return $this->hasMany('App\Models\Establecimientoodf', 'odfoperador_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function establecimiento()
    {
        return $this->hasOne('App\Models\Establecimiento', 'id', 'establecimiento_id');
    }
    

}
