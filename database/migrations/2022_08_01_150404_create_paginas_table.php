<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreatePaginasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paginas', function (Blueprint $table) {
            $table->id();
            $table->string('tipo');
            $table->string('titulo')->nullable();
            $table->string('subtitulo')->nullable();
            $table->string('detalles')->nullable();
            $table->bigInteger('id_imagen')->nullable();
            $table->timestamps();
        });

        // Insert some stuff
        DB::table('paginas')->insert(
            array(
                'tipo' => 'Principal (Home)',
            ),
        );
        DB::table('paginas')->insert(
            array(
                'tipo' => 'Central (Home)',
            ),
        );
        DB::table('paginas')->insert(
            array(
                'tipo' => 'Nosotros (Inicio)',
            ),
        );
        DB::table('paginas')->insert(
            array(
                'tipo' => 'Servicios',
            ),
        );
        DB::table('paginas')->insert(
            array(
                'tipo' => 'Testimonios',
            ),
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('paginas');
    }
}
