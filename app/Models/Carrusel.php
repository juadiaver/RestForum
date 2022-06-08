<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Carrusel
 *
 * @property $id
 * @property $nombre
 * @property $imagen
 * @property $activa
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Carrusel extends Model
{
    
    static $rules = [
		'nombre' => 'required',
		'imagen' => 'required',
		'activa' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','imagen','activa'];



}
