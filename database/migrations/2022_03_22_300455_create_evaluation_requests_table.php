<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvaluationRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluation_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('userId')->constrained('users');
            $table->string('motif');
            $table->string('description_motif');
            $table->string('document_path');
            $table->string('field');
            $table->string('pegagogic_group');
            $table->string('ue');
            $table->string('academic_year_start');
            $table->string('academic_year_end');
            $table->string('academic_semester');
            $table->string('evaluation_type');
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
        Schema::dropIfExists('evaluation_requests');
    }
}
