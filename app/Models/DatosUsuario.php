<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DatosUsuario
 *
 * @property $id
 * @property $nombre
 * @property $apellidos
 * @property $user_id
 * @property $direccion
 * @property $edad
 * @property $created_at
 * @property $updated_at
 *
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class DatosUsuario extends Model
{
    
    static $rules = [
		'nombre' => 'required',
		'apellidos' => 'required',
		'direccion' => 'required',
		'edad' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','apellidos','user_id','direccion','edad'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
    

}
