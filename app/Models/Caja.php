<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Caja
 *
 * @property $id
 * @property $dineroInicial
 * @property $dineroFinal
 * @property $tarjeta
 * @property $dineroTarjeta
 * @property $efectivo
 * @property $dineroEfectivo
 * @property $abierta
 * @property $fechaApertura
 * @property $horaApertura
 * @property $fechaCierre
 * @property $horaCierre
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Caja extends Model
{
    
    static $rules = [
		'dineroInicial' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['dineroInicial','dineroFinal','tarjeta','dineroTarjeta','efectivo','dineroEfectivo','abierta','fechaApertura','horaApertura','fechaCierre','horaCierre'];



}
