<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class userseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
               "name"=>"admin",
               "email"=>"admin@gmail.com",
               "password"=>Hash::make("3333"),
               "role"=>"admin",
               "status"=>"active"
            ],

            [
                "name"=>"student",
                "email"=>"student1@gmail.com",
                "password"=>Hash::make("3333"),
                "role"=>"user",
                "status"=>"active"
            ],

           
        ]);
    }
}
