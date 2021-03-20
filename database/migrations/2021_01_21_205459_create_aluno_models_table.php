<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlunoModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alunos', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->integer('rg');
            $table->integer('cpf');
            $table->string('sexo');
            $table->string('telefone');
            $table->date('nascimento');
            $table->string('email');
            $table->text('obs');
            $table->string('estado');
            $table->string('cidade');
            $table->integer('cep');
            $table->string('endereco');
            $table->string('complemento');
            $table->boolean('segunda')->default(false);
            $table->boolean('terca')->default(false);
            $table->boolean('quarta')->default(false);
            $table->boolean('quinta')->default(false);
            $table->boolean('sexta')->default(false);
            $table->boolean('sabado')->default(false);
            $table->boolean('domingo')->default(false);
            $table->unsignedBigInteger('treino_id');
            $table->unsignedBigInteger('plano_id');
            $table->foreign('treino_id')->references('id')->on('treinos')->onUpdate('cascade');
            $table->foreign('plano_id')->references('id')->on('planos')->onUpdate('cascade');
            $table->softDeletes();
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
        Schema::dropIfExists('alunos');
        
    }
}
