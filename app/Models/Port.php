<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Port
 *
 * @property $id
 * @property $numero_puerto
 * @property $created_at
 * @property $updated_at
 *
 * @property Locale[] $locales
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Port extends Model
{
    
    static $rules = [
		'numero_puerto' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['numero_puerto'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function locales()
    {
        return $this->hasMany('App\Models\Locale', 'port_id', 'id');
    }
    

}
