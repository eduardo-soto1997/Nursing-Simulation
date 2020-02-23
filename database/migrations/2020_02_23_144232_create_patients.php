<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatients extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('name', 255);
            $table->string('mrn', 255);
            $table->string('admitting_diagnosis', 255);
            $table->string('code_status', 255);
            $table->string('primary_language', 255);
            $table->string('social', 255);
            $table->string('advanced_directives_on_file', 255);
            $table->string('occupation', 255);
            $table->string('cultural_considerations', 255);
            $table->string('religious_practices', 255);
            $table->string('sensory_communication_needs', 255);
            $table->string('medical_history', 255);
            $table->string('surgical_history', 255);
            $table->date('date');
            $table->date('dob');
            $table->integer('age');
            $table->date('admission_date');
            $table->string('allergies', 255);
            $table->boolean('interpreter_required');
            $table->string('so_nok_poa', 255);
;        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patients');
    }
}
