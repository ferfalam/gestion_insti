<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ues', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('abbreviation');
            $table->integer('code');
            $table->integer('CT');
            $table->integer('TD');
            $table->integer('TP');
            $table->foreignId('generalId')->constrained('generals');
            $table->foreignId('typeUeId')->constrained('type_ues');
            $table->foreignId('natureUeId')->constrained('nature_ues');
            // $table->foreignId('academicSemesterId')->constrained('academic_semesters');
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
        Schema::dropIfExists('ues');
    }
}
