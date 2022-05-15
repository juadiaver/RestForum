<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticuloMesaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articulo_mesa', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('articulo_id');
            $table->foreign('articulo_id')->references('id')->on('articulos')->onDelete('cascade');
            $table->unsignedBigInteger('mesa_id');
            $table->foreign('mesa_id')->references('id')->on('mesas')->onDelete('cascade');
            $table->integer('cantidad');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articulo_mesa');
    }
}
