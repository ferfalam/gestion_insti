<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConseilsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conseils', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger("user_id");
            $table->foreign("user_id")->references("id")->on("users");
            $table->string("objet");
            $table->string("theme");
            $table->string("signataire")->nullable();
            $table->longText("description");
            $table->string("date_tenu");
            $table->string("note_service")->nullable();
            $table->string("liste_participants")->nullable();
            $table->longText("rapport")->nullable();
            $table->string("date_rapport")->nullable();
            $table->string("fichier_rapport")->nullable();
            $table->string("liste_presence")->nullable();
            $table->string("statut")->nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('conseils');
    }
}
