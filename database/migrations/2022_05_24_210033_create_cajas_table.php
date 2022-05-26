<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCajasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cajas', function (Blueprint $table) {
            $table->id();
            $table->double('dineroInicial',8,2);
            $table->double('dineroFinal',8,2);
            $table->double('tarjeta',8,2);
            $table->double('dineroTarjeta',8,2);
            $table->double('efectivo',8,2);
            $table->double('dineroEfectivo',8,2);
            $table->String('abierta');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cajas');
    }
}
