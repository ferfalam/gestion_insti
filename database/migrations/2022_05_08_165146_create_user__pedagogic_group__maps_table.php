<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserPedagogicGroupMapsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user__pedagogic_group__maps', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_Id')->constrained('users');
            $table->foreignId('pedagogic_group_Id')->nullable()->constrained('pedagogic_groups');
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
        Schema::dropIfExists('user__pedagogic_group__maps');
    }
}
