<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAvaliacoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('avaliacoes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('codigo_oficina');
            $table->unsignedBigInteger('codigo_usuario');
            $table->unsignedBigInteger('codigo_atendimento');
            $table->integer('estrelas');
            $table->string('comentario');

            $table->foreign('codigo_oficina')->references('id')->on('oficinas');
            $table->foreign('codigo_usuario')->references('id')->on('users');
            $table->foreign('codigo_atendimento')->references('id')->on('atendimentos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('avaliacoes');
    }
}
