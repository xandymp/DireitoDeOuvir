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
            $table->bigInteger('empresa_id')
                ->unsigned();
            $table->string('nome', 255);
            $table->string('email', 255);
            $table->string('telefone', 15)
                ->nullable();
            $table->string('CPF', 11);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('empresa_id')
                ->references('id')
                ->on('empresas');
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
