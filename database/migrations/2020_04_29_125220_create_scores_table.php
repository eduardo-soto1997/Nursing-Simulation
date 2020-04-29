<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scores', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('score', 3);
            $table->string('questions', 255);
            $table->unsignedBigInteger('user');
            $table->foreign('user')->references('id')->on('users');
            $table->unsignedBigInteger('patient');
            $table->foreign('patient')->references('id')->on('patients');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('scores');
    }
}
