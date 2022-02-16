<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Auto
 *
 * @property $id
 * @property $modelo
 * @property $foto
 * @property $marcaId
 * @property $created_at
 * @property $updated_at
 *
 * @property Marca $marca
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Auto extends Model
{
    
    static $rules = [
		'modelo' => 'required',
		'foto' => 'required',
		'marcaId' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['modelo','foto','marcaId'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function marca()
    {
        return $this->hasOne('App\Models\Marca', 'id', 'marcaId');
    }
    

}
