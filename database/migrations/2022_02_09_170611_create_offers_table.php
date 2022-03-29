<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->integer("entreprise_id");
            $table->string("domaine");
            $table->string("niv_etude");
            $table->string("gratification");
            $table->string("localisation");
            $table->date("start_date");
            $table->date("end_date");
            $table->string("profils");
            $table->string("mission");
            $table->string("image");
            $table->string("attestation");
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
        Schema::dropIfExists('offers');
    }
}
