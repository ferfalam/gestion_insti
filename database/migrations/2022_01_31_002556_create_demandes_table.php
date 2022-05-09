<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDemandesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('demandes', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('name_d');
            $table->string('recipient');
            $table->string('entite');
            $table->string('status');
            $table->string('objet');
            $table->text('message');
            $table->string('attestation');
            $table->string('email');
            $table->string('contact');
            $table->string('status_demande');
            $table->string('name_admin')->nullable();
            $table->string('email_admin')->nullable();
            $table->string('contact_admin')->nullable();
            $table->text('reponse')->nullable();
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
        Schema::dropIfExists('demandes');
    }
}
