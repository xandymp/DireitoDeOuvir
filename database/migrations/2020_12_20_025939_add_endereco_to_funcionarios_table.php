<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEnderecoToFuncionariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('funcionarios', function (Blueprint $table) {
            $table->string('cep', 255)
                ->nullable()
                ->after('CPF');
            $table->string('endereco', 255)
                ->nullable()
                ->after('cep');
            $table->string('numero', 10)
                ->nullable()
                ->after('endereco');
            $table->string('complemento', 255)
                ->nullable()
                ->after('numero');
            $table->string('bairro', 255)
                ->nullable()
                ->after('complemento');
            $table->string('cidade', 255)
                ->nullable()
                ->after('complemento');
            $table->string('estado', 2)
                ->nullable()
                ->after('cidade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('funcionarios', function (Blueprint $table) {

        });
    }
}
