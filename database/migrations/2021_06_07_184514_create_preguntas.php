<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreguntas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('preguntas', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->mediumText('pregunta');
            $table->timestamp('hora_p');
            $table->timestamp('p_autorizada');
            $table->mediumText('respuesta');
            $table->timestamp('r_autorizada');
            $table->unsignedInteger('id_productos');
            $table->unsignedInteger('id_usuarios');
/*          $table->foreignId('id_productos')->reference('id')->constrained('productos')->onDelete('cascade');
            $table->foreignId('id_usuarios')->reference('id')->constrained('usuarios')->onDelete('cascade'); */
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('preguntas');
    }
}
