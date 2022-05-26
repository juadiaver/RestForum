<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Articulo
 *
 * @property $id
 * @property $nombre
 * @property $descripcion
 * @property $categoria_id
 * @property $imagen
 * @property $activo
 * @property $precio
 * @property $orden
 * @property $created_at
 * @property $updated_at
 *
 * @property Categoria $categoria
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Articulo extends Model
{
    
    static $rules = [
		'nombre' => 'required',
		'descripcion' => 'required',
		'categoria_id' => 'required',
		'activo' => 'required',
		'precio' => 'required',
		'orden' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','descripcion','categoria_id','imagen','activo','precio','orden'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function categoria()
    {
        return $this->hasOne('App\Models\Categoria', 'id', 'categoria_id');
    }

    public function mesas(){

        return $this->belongsToMany(Mesa::class , 'articulo_mesa')->withPivot('cantidad');
    }

    public function ventas(){

        return $this->belongsToMany(Venta::class , 'articulo_venta')->withPivot('cantidad');
    }
    

}
