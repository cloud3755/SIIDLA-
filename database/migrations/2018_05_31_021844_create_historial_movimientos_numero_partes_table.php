<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistorialMovimientosNumeroPartesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historial_movimientos_numero_partes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('gin');//Numero
            $table->integer('id_usuario');
            $table->string('area_anterior');
            $table->string('nueva_area');
            $table->date('fecha_movimiento');
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
        Schema::dropIfExists('historial_movimientos_numero_partes');
    }
}
