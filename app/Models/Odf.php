<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Odf
 *
 * @property $id
 * @property $nombre_odf
 * @property $tipo_odf
 * @property $establecimiento_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Enlace[] $enlaces
 * @property Establecimiento $establecimiento
 * @property Locale[] $locales
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Odf extends Model
{
    
    static $rules = [
		'nombre_odf' => 'required',
		'tipo_odf' => 'required',
		'establecimiento_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre_odf','tipo_odf','establecimiento_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function enlaces()
    {
        return $this->hasMany('App\Models\Enlace', 'odf_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function establecimiento()
    {
        return $this->hasOne('App\Models\Establecimiento', 'id', 'establecimiento_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function locales()
    {
        return $this->hasMany('App\Models\Locale', 'odf_id', 'id');
    }
    

}
