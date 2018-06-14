<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNumerosPartesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('numeros_partes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('gin'); //NUMERO
            $table->string('descripcion',150);
            $table->string('area',15);
            $table->integer('id_sucursal')->default(0);
            $table->integer('id_unidad_medida')->default(0);
            $table->tinyInteger('activo')->default(1);//para evitar delete
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
        Schema::dropIfExists('numeros_partes');
    }
}
