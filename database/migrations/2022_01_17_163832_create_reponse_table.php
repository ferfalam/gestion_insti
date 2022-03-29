<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReponseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reponse', function (Blueprint $table) {
            $table->id('idr');
            $table->string('name_r');
            $table->string('genre_r');
            $table->string('entite');
            $table->string('status');
            $table->string('objet');
            $table->string('message');
            $table->string('attestation');
            $table->string('date_r');
            $table->string('heure_r');
            $table->string('email')->unique();
            $table->string('contact');
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
        Schema::dropIfExists('reponse');
    }
}
