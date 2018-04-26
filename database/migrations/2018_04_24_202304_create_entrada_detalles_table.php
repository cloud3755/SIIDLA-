<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntradaDetallesTable extends Migration
{
    
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entrada_detalles', function (Blueprint $table) {
            //$table->increments('id');
            $table->integer('id_entrada');
            $table->string('gin');
            $table->string('lote');
            $table->string('ubicacion');
            $table->integer('cantidad');
            $table->date('fecha_caducidad');
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entrada_detalles');
    }
}
