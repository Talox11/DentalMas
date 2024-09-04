<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromocionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promociones', function (Blueprint $table) {
            $table->id();
            $table->string('tipo');
            $table->string('codigo');
            $table->string('terminos');
            $table->double('inv_inicial');
            $table->double('descuento_cupon');
            $table->boolean('chk_vigencia');
            $table->boolean('chk_agotar_exist');
            $table->date('inicio');
            $table->date('fin');
            $table->boolean('estatus');
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
        Schema::dropIfExists('promociones');
    }
}
