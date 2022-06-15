<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Promocione
 *
 * @property $id
 * @property $codigo
 * @property $nombre
 * @property $descuento
 * @property $activo
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Promocione extends Model
{
    
    static $rules = [
		'codigo' => ['required','unique:promociones'],
		'nombre' => ['required','unique:promociones'],
		'descuento' => 'required',
		'activo' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['codigo','nombre','descuento','activo'];



}
