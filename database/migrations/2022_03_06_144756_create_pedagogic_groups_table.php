<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedagogicGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedagogic_groups', function (Blueprint $table) {
            $table->id();
            $table->string('name');
<<<<<<< HEAD
            $table->foreignId('fieldId')->constrained('fields');
            $table->foreignId('academicYearId')->constrained('academic_years');
            $table->foreignId('studyYearId')->constrained('generals');
            $table->text('description');
=======
            $table->foreignId('field_Id')->constrained('fields');
            $table->foreignId('academicYear_Id')->constrained('academic_years');
            // $table->foreignId('studyYear_Id')->constrained('generals');
>>>>>>> 6500c890c48e1d7500934395f0c36009de78f630
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pedagogic_groups');
    }
}
