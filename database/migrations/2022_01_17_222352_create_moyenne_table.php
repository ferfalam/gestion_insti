<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoyenneTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('moyenne', function (Blueprint $table) {
            $table->id('id');
            $table->string('name');
            $table->string('genre');
            $table->string('filiere');
            $table->string('n_matricule')->unique();
            $table->float('moy_annee1');
            $table->float('moy_annee2');
            $table->float('moy_annee3');
            $table->float('moy_generale');
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
        Schema::dropIfExists('moyenne');
    }
}
