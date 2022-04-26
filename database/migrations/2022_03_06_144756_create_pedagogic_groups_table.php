<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePedagogicGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedagogic_groups', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('fieldId')->constrained('fields')->onDelete('restrict')->onUpdate('restrict');
            $table->foreignId('academicYearId')->constrained('academic_years')->onDelete('restrict')->onUpdate('restrict');
            $table->foreignId('studyYearId')->constrained('generals')->onDelete('restrict')->onUpdate('restrict');
            $table->text('description');
            $table->timestamps();
            // Insert onDelete
            // ->onDelete('restrict')->onUpdate('restrict');
            // onDelete('cascade')
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pedagogic_groups');
        // $table->dropForeign('posts_user_id_foreign');
    }
}
