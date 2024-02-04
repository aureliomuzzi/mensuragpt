<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGabaritosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gabaritos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('questao_id');
            $table->string('resposta_correta',  1); //A, B ou C
            $table->timestamps();

            $table->foreign('questao_id')->references('id')->on('gestoes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gabaritos');
    }
}
