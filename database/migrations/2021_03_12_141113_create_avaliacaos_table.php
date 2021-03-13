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
            $table->integer('idade');
            $table->float('peso');
            $table->float('altura');
            $table->float('imc');
            $table->float('pesoIdeal');
            $table->float('torax');
            $table->float('cintura');
            $table->float('abdomem');
            $table->float('quadril');
            $table->float('coxa');
            $table->float('panturilha');
            $table->float('braco');
            $table->float('antebraco');
            $table->float('triceps');
            $table->float('subescapular');
            $table->float('peitoral');
            $table->float('axilar');
            $table->float('suprailiaca');
            $table->float('abdominal');
            $table->float('coxaMM');
            $table->float('somaMM');
            $table->float('icq');
            $table->float('gordura');
            $table->float('gorduraIdeal');
            $table->float('massaMagra');
            $table->float('pesoGordura');
            $table->float('excessoGordura');
            $table->string('modalidade');
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
