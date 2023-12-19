<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("users")->insert([
            //Admin
            [
                "name"=> 'Admin',
                "username"=> 'admin',
                "email"=> 'admin@gmail.com',
                "password"=> Hash::make('111'),
                'role' => 'admin',
                'status' => 'active',
            ],
            //parent
            [
                "name"=> 'Parent',
                "username"=> 'parent',
                "email"=> 'parent@gmail.com',
                "password"=> Hash::make('111'),
                'role' => 'parent',
                'status' => 'active',
            ],
            //scout
            [
                "name"=> 'Scout',
                "username"=> 'scout',
                "email"=> 'scout@gmail.com',
                "password"=> Hash::make('111'),
                'role' => 'scout',
                'status' => 'active',
            ],
        ]);
    }
}
