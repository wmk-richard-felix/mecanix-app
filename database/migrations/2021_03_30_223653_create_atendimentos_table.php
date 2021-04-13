<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAtendimentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atendimentos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('codigo_usuario');
            $table->unsignedBigInteger('codigo_oficina');
            $table->dateTime('data_sugerida');
            $table->dateTime('data_confirmada');
            $table->dateTime('data_realizada');
            $table->char('diagnostico_oficina', 200);
            $table->char('diagnostico_mecanix', 200);
            $table->double('valor_orcamento', 8, 2);
            $table->char('categoria_atendimento');
            $table->char('status');
            $table->text('relato');

            $table->foreign('codigo_usuario')->references('id')->on('users');
            $table->foreign('codigo_oficina')->references('id')->on('oficinas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('atendimentos');
    }
}
