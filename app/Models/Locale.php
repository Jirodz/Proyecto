<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Locale
 *
 * @property $id
 * @property $numero_local
 * @property $establecimiento_id
 * @property $odf_id
 * @property $port_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Enlace[] $enlaces
 * @property Establecimiento $establecimiento
 * @property Odf $odf
 * @property Port $port
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Locale extends Model
{
    
    static $rules = [
		'numero_local' => 'required',
		'establecimiento_id' => 'required',
		'odf_id' => 'required',
		'port_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['numero_local','establecimiento_id','odf_id','port_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function enlaces()
    {
        return $this->hasMany('App\Models\Enlace', 'local_id', 'id');
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
