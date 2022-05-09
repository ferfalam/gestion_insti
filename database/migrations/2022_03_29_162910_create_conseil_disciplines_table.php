<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConseilDisciplinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conseil_disciplines', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_plainte')->constrained('plaintes')->onDelete('cascade');
            $table->date('date');
            $table->time('heure');
            $table->string('lieu');
            $table->integer('convocationsOK')->default(0);
            $table->integer('invitationsOK')->default(0);
            $table->integer('tenue')->default(0);
            $table->integer('rapport')->default(0);
            $table->foreignId('maitre')->nullable()->constrained('users')->onDelete(null);
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
        Schema::dropIfExists('conseil_disciplines');
    }
}
