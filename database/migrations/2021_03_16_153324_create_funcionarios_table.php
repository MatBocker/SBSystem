<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFuncionariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('funcionarios', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->double('salario',10,2);
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
            $table->string('modalidade');
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
        Schema::dropIfExists('funcionarios');
    }
}
