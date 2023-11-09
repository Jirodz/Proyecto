<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Enlace
 *
 * @property $id
 * @property $actividad
 * @property $negocio
 * @property $nombre_contacto
 * @property $telefono
 * @property $nivel
 * @property $cliente_id
 * @property $establecimiento_id
 * @property $local_id
 * @property $odf_id
 * @property $port_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Cliente $cliente
 * @property Enlaceestablecimiento[] $enlaceestablecimientos
 * @property Establecimiento $establecimiento
 * @property Locale $locale
 * @property Log[] $logs
 * @property Odf $odf
 * @property Port $port
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Enlace extends Model
{
    
    static $rules = [
		'actividad' => 'required',
		'negocio' => 'required',
		'nombre_contacto' => 'required',
		'telefono' => 'required',
		'nivel' => 'required',
		'cliente_id' => 'required',
		'establecimiento_id' => 'required',
		'local_id' => 'required',
		'odf_id' => 'required',
		'port_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['actividad','negocio','nombre_contacto','telefono','nivel','cliente_id','establecimiento_id','local_id','odf_id','port_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function cliente()
    {
        return $this->hasOne('App\Models\Cliente', 'id', 'cliente_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function enlaceestablecimientos()
    {
        return $this->hasMany('App\Models\Enlaceestablecimiento', 'enlace_id', 'id');
    }
    
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
    public function locale()
    {
        return $this->hasOne('App\Models\Locale', 'id', 'local_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function logs()
    {
        return $this->hasMany('App\Models\Log', 'enlace_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function odf()
    {
        return $this->hasOne('App\Models\Odf', 'id', 'odf_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function port()
    {
        return $this->hasOne('App\Models\Port', 'id', 'port_id');
    }
    

}
