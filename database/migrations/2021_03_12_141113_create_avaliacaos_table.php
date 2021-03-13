<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAvaliacaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('avaliacaos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('aluno_id');
            $table->foreign('aluno_id')->references('id')->on('alunos')->onUpdate('cascade')->onDelete('cascade');
            $table->string('idade');
            $table->double('peso',4,4);
            $table->string('altura');
            $table->string('imc');
            $table->string('pesoIdeal');
            $table->string('torax');
            $table->string('cintura');
            $table->string('abdomem');
            $table->string('quadril');
            $table->string('coxa');
            $table->string('panturilha');
            $table->string('braco');
            $table->string('antebraco');
            $table->string('triceps');
            $table->string('subescapular');
            $table->string('peitoral');
            $table->string('axilar');
            $table->string('suprailiaca');
            $table->string('abdominal');
            $table->string('coxaMM');
            $table->string('somaMM');
            $table->string('icq');
            $table->string('gordura');
            $table->string('gorduraIdeal');
            $table->string('massaMagra');
            $table->string('pesoGordura');
            $table->string('excessoGordura');
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
        Schema::dropIfExists('avaliacaos');
    }
}
