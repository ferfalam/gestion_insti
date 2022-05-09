<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlainteTemoinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plainte_temoins', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_plainte')->constrained('plaintes')->onDelete('cascade');
            $table->foreignId('id_temoin')->constrained('users')->onDelete('cascade');
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
        Schema::dropIfExists('plainte_temoins');
    }
}
