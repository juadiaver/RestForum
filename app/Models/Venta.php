<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Venta
 *
 * @property $id
 * @property $mesa_id
 * @property $precio
 * @property $modo_pago
 * @property $ticket
 * @property $created_at
 * @property $updated_at
 *
 * @property Mesa $mesa
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Venta extends Model
{
    
    static $rules = [
		'mesa_id' => 'required',
		'precio' => 'required',
		'modo_pago' => 'required',
		'ticket' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['mesa_id','precio','modo_pago','ticket'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function mesa()
    {
        return $this->hasOne('App\Models\Mesa', 'id', 'mesa_id');
    }
    
    public function articulos(){

      return $this->belongsToMany(Articulo::class, 'articulo_venta')->withPivot('cantidad');;
  }

}
