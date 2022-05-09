<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFichesDeroulementCours extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fiches_deroulement_cours', function (Blueprint $table) {
            $table->id();
            $table->string('surname');
            $table->string('name');
            $table->foreignId('studyYearsId')->constrained('academic_years'); 
            $table->foreignId('fieldsId')->constrained('fields');
            $table->foreignId('ueId')->constrained('ues');
            $table->date('dateDeroulement');
            $table->time('startTimeCours');
            $table->time('endTimeCours');
            $table->foreignId('semestreId')->constrained('academic_semesters');
            $table->enum('nature_ue',['decouverte','specialite','fondamentale','libre']);
            $table->text('observation');
            // $table->foreignId('generalId')->constrained('generals');
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
        Schema::dropIfExists('fiches_deroulement_cours');
    }
}
