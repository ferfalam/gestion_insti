<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('missions', function (Blueprint $table) {
            $table->id();
            $table->string('nom_enseignant');
            $table->string('qualite');
            $table->string('adressse');
            $table->date('date_naissance');
            $table->string('lieu');
            $table->string('nationalite');
            $table->string('maticule');
            $table->string('grade');
            $table->string('ue');
            $table->string('pedagogicGroup');
            $table->string('academicYear');
            $table->string('missionHeure');
            $table->string('missionDuree');
            $table->date('startDate');
            $table->date('endDate');
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
        Schema::dropIfExists('missions');
    }
}
