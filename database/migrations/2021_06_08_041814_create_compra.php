<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompra extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compras', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->timestamp('h_compra');
            $table->string('c_pago', 100);
            $table->float('calificacion');
            $table->boolean('compra_autorizada');
            $table->string('comentarios_conta', 150);
            $table->unsignedInteger('id_productos');
            $table->unsignedInteger('id_usuarios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('compra');
    }
}
