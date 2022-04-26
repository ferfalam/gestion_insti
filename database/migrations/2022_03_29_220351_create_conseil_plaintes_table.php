<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConseilPlaintesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conseil_plaintes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_plainte')->constrained('plaintes')->ondelete('cascade');
            $table->foreignId('id_conseil')->constrained('conseildisciplines')->ondelete('cascade');
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
        Schema::dropIfExists('conseil_plaintes');
    }
}
