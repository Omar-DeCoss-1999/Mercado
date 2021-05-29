<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('nombre', 20);
            $table->mediumText('descripcion');
            $table->float('precio');
            $table->string('imagen', 100);
            $table->tinyInteger('concesionado');
            $table->string('motivo', 100);
            $table->foreignId('id_categorias')->reference('id')->constrained('categorias')->onDelete('cascade');
            $table->foreignId('id_usuarios')->reference('id')->constrained('usuarios')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos');
    }
}
