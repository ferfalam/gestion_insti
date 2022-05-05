<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComplaintRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('complaint_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('userId')->constrained('users');
            $table->string('first_name');
            $table->string('last_name');
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
            $table->date('created_date');

            // $table->foreignId('academic_year_Id')->constrained('academic_years');
            // $table->foreignId('pedagogic_group_Id')->constrained('pedagogic_groups');
            // $table->foreignId('evaluation_typeId')->constrained('evaluation_types');
            // $table->foreignId('profile_id')->constrained('profiles');
            // $table->foreignId('ue_Id')->constrained('u_e_s');
            // $table->foreignId('field_Id')->constrained('fields');
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
        Schema::dropIfExists('complaint_requests');
    }
}
