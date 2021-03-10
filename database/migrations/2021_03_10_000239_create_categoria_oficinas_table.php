<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriaOficinasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categoria_oficinas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('codigo_oficina');
            $table->unsignedBigInteger('codigo_categoria');

            $table->foreign('codigo_oficina')->references('id')->on('oficinas');
            $table->foreign('codigo_categoria')->references('id')->on('categorias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categoria_oficinas');
    }
}
