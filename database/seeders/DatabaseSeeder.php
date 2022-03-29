<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Status;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

         $status=Status::create(['name'=>'Bloquer','notation'=>1,'description'=>"Description diu status créer"]);
         $user=User::create(['pseudo'=>"chola Patrick",'email'=>"chola@gmail.com",'password'=>Hash::make('12345678'),'statusId'=>1]);


    }
}
