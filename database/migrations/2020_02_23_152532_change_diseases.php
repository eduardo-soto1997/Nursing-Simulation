<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeDiseases extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('disseases', function (Blueprint $table) {
        $table->unsignedBigInteger('intervention_id');
        $table->foreign('intervention_id')->references('id')->on('possible_interventions');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('disseases', function (Blueprint $table) {
        $table->dropColumn('intervention_id');
      });
    }
}
