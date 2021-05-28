<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('nombre', 30);
            $table->string('a_paterno', 20);
            $table->string('a_materno', 20);
            $table->string('correo', 45)->unique();
            $table->string('imagen', 100);
            $table->enum('rol', ['Supervisor', 'Encargado', 'Contador', 'Cliente']);
            $table->tinyInteger('activo');
            $table->string('password', 100);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
}
