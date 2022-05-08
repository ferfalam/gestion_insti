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
            $table->date('study_years');
            $table->string('fields');
            $table->string('ue');
            $table->date('startCours');
            $table->date('endCours');
            $table->enum('semestreAffected', ['easy', 'hard']);
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
