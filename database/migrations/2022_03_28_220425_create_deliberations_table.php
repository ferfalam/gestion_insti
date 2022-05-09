<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeliberationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deliberations', function (Blueprint $table) {
            $table->id();
            $table->date('start');
            $table->date('end');
            $table->foreignId('yearId')->constrained('academic_years');
            $table->string('semesters');
            $table->foreignId('fieldId')->constrained('fields');
            $table->foreignId('groupId')->constrained('pedagogic_groups');
            $table->foreignId('authorId')->constrained('users');
            $table->text('participants');
            $table->text('report');
            $table->text('revealTicket');
            $table->text('hideTicket');
            $table->text('uesIds');
            $table->text('infos');
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
        Schema::dropIfExists('deliberations');
    }
}
