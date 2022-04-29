<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvitationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invitations', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger("conseil_id")->nullable();
            $table->foreign("conseil_id")->references("id")->on("conseils")->cascadeOnDelete();
            $table->unsignedBigInteger("participant_id")->nullable();
            $table->foreign("participant_id")->references("id")->on("users");
            $table->string("fichier")->nullable();
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
        Schema::dropIfExists('invitations');
    }
}
