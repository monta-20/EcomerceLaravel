<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
             [
                'name' => 'Admin',
                "email" => "admin@admin.com",
                "role" => "admin",
                "password" => Hash::make("123456789") //Hash FOR HASSING MDP
             ]
        ]);
    }
}
