<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShortcutsRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shortcuts_requests', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('user_Id')->constrained('users');
            $table->foreignId('academic_year_Id')->constrained('academic_years');
            $table->foreignId('academic_semester_Id')->constrained('academic_semesters');
            $table->foreignId('field_Id')->constrained('fields');
            // $table->foreignId('evaluation_type_Id')->constrained('evaluation_types');
            $table->foreignId('pedagogic_group_Id')->constrained('pedagogic_groups');
            $table->foreignId('ue_Id')->constrained('ues');
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
        Schema::dropIfExists('shortcuts_requests');
    }
}
