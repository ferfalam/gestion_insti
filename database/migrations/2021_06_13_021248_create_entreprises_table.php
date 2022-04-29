<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntreprisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entreprises', function (Blueprint $table) {
            $table->id();
            $table->string('designation');
            $table->string('email')->unique();
            $table->string('adresse');
            $table->integer('capacite')->nullable();
            $table->json('domaines');
            $table->boolean('partenariat')->nullable();
            $table->date('partenariat_date')->nullable();
            $table->string('d_contact');
            $table->string('s_contact')->nullable();
            $table->string('a_contact')->nullable();
            $table->integer('user_id')->nullable();
            $table->string('logoname')->nullable();
            $table->date('startdate')->nullable();
            $table->date('enddate')->nullable();
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
        Schema::dropIfExists('entreprises');
    }
}
