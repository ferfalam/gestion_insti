<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('userId')->constrained('users');
            $table->string('com_fullname')->min(2);
            $table->string('com_givenName')->min(3);
            $table->string('com_gender');
            $table->date('com_birthdate');
            $table->string('com_birthPlace');
            $table->string('com_diploma');
            $table->string('com_registrationNumber'); //matricule
            $table->integer('com_phoneNumber'); //à voir
            $table->string('com_address');
            $table->string('com_parentFullname');
            $table->string('com_parentGivenName');
            $table->integer('com_parentPhoneNumber'); //à voir
            $table->foreignId('app_fieldId')->constrained('fields');
            //$table->string('app_pedagogicGroupId'); #problématique 
            $table->foreignId('app_typeId')->constrained('generals');
            $table->string('ens_principalSpeciality')->nullable(); 
            $table->string('ens_aditionalSpeciality')->nullable();
            $table->string('ens_RIB')->nullable();
            $table->foreignId('ens_typeId')->constrained('generals');
            $table->string('pers_grade')->nullable();
            $table->foreignId('pers_typeId')->constrained('generals');
            $table->string('pers_index')->nullable();
            $table->string('pers_ifu')->nullable(); //fichier ou numero
            $table->date('pers_startWorkDate')->nullable();
            $table->date('pers_endWorkDate')->nullable();
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
        Schema::dropIfExists('profiles');
    }
}
