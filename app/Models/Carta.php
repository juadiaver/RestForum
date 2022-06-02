<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Carta
 *
 * @property $id
 * @property $nombre
 * @property $contenido
 * @property $activa
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Carta extends Model
{
    
    static $rules = [
		'nombre' => 'required',
		'contenido' => 'required',
		'activa' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','contenido','activa'];



}
