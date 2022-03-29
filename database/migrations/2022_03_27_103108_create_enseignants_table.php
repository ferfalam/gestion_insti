<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnseignantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enseignants', function (Blueprint $table) {
            $table->id();
            $table->string('nomEnseignant');
            $table->string('nomUe');
            $table->integer('credit');
            $table->integer('ct');
            $table->integer('td');
            $table->integer('tp');
            $table->string('gpe');
            $table->integer('mp');
            $table->integer('me');
            $table->integer('tpe');
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
        Schema::dropIfExists('enseignants');
    }
}
