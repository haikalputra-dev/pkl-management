<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            // admin
            [
                'name' => 'Admin',
                'username' => 'admin',
                'email' => 'admin@gamil.com',
                'password' => Hash::make(123),
                'role' => 'admin',
                'status' => 'aktif',

            ],

            //mentor
            [
                'name' => 'Mentor',
                'username' => 'mentor',
                'email' => 'mentor@gamil.com',
                'password' => Hash::make(123),
                'role' => 'mentor',
                'status' => 'aktif',

            ],

            //user
            [
                'name' => 'User',
                'username' => 'user',
                'email' => 'user@ggamil.com',
                'password' => Hash::make(123),
                'role' => 'user',
                'status' => 'aktif',

            ],



        ]);
    }
}
