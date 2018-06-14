<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventarios', function (Blueprint $table) {
          $table->increments('id');
          $table->string('gin', 20);
          $table->string('ubicacion', 20);
          $table->string('lote', 20);
          $table->integer('cantidad');
          $table->date('fecha_caducidad');
          $table->dateTime('fechaHora_entrada');//Si es cambio de area, se registra aqui
          $table->integer('id_usuario');
          $table->integer('id_sucursal');
          $table->integer('id_entrada')->default(0);//Si es cambio de area, se registra 0
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
        Schema::dropIfExists('inventarios');
    }
}
