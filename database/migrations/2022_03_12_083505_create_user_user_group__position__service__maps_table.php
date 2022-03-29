<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserUserGroupPositionServiceMapsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_user_group__position__service__maps', function (Blueprint $table) {
            $table->id();
            $table->foreignId('userId')->constrained('users');
            $table->foreignId('userGroupId')->constrained('user_groups');
            $table->foreignId('serviceId')->constrained('services');
            $table->foreignId('positionId')->constrained('positions');
        //     'userId'
        // '',
        // '',
        // ','
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_user_group__position__service__maps');
    }
}
