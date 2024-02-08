<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlternativasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alternativas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('questao_id');
            $table->string('alternativa_A');
            $table->string('alternativa_B');
            $table->string('alternativa_C');
            $table->string('alternativa_D');
            $table->string('alternativa_E');
            $table->timestamps();

            $table->foreign('questao_id')->references('id')->on('questoes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alternativas');
    }
}
