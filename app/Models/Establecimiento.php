<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Establecimiento
 *
 * @property $id
 * @property $estado
 * @property $nombre_establecimiento
 * @property $numero_telefono
 * @property $encargado
 * @property $direccion
 * @property $desarrolladora_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Desarrolladora $desarrolladora
 * @property Enlaceestablecimiento[] $enlaceestablecimientos
 * @property Establecimientoodf[] $establecimientoodfs
 * @property Establecimientooperador[] $establecimientooperadors
 * @property Establecimientorack[] $establecimientoracks
 * @property Establecimientotipo[] $establecimientotipos
 * @property Locale[] $locales
 * @property Odf[] $odfs
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Establecimiento extends Model
{
    
    static $rules = [
		'estado' => 'required',
		'nombre_establecimiento' => 'required',
		'numero_telefono' => 'required',
		'encargado' => 'required',
		'direccion' => 'required',
		'desarrolladora_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['estado','nombre_establecimiento','numero_telefono','encargado','direccion','desarrolladora_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function desarrolladora()
    {
        return $this->hasOne('App\Models\Desarrolladora', 'id', 'desarrolladora_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function enlaceestablecimientos()
    {
        return $this->hasMany('App\Models\Enlaceestablecimiento', 'establecimiento_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function establecimientoodfs()
    {
        return $this->hasMany('App\Models\Establecimientoodf', 'establecimiento_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function establecimientooperadores()
    {
        return $this->hasMany('App\Models\Establecimientooperador', 'establecimiento_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function establecimientoracks()
    {
        return $this->hasMany('App\Models\Establecimientorack', 'establecimiento_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function establecimientotipos()
    {
        return $this->hasMany('App\Models\Establecimientotipo', 'establecimiento_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function locales()
    {
        return $this->hasMany('App\Models\Locale', 'establecimiento_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function odfs()
    {
        return $this->hasMany('App\Models\Odf', 'establecimiento_id', 'id');
    }
    
    public function operadores()
    {
        return $this->hasMany(Establecimientooperador::class,'establecimiento_id','id');
    }

    public function tipos()
    {
        return $this->hasMany(Establecimientotipo::class,'establecimiento_id','id');
    }

    public function rackoperadores()
    {
        return $this->hasMany(Establecimientorack::class,'establecimiento_id','id');
    }


}
