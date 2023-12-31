<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Cliente
 *
 * @property $id
 * @property $nombre
 * @property $razon_social
 * @property $encargado
 * @property $numero_telefono
 * @property $created_at
 * @property $updated_at
 *
 * @property Enlace[] $enlaces
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Cliente extends Model
{
    
    static $rules = [
		'nombre' => 'required',
		'razon_social' => 'required',
		'numero_telefono' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','razon_social','encargado','numero_telefono'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function enlaces()
    {
        return $this->hasMany('App\Models\Enlace', 'cliente_id', 'id');
    }
    

}
