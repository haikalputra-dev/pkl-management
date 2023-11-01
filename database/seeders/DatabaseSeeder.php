<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
<<<<<<< HEAD
        $this->call(UsersTableSeeder::class);
        \App\Models\User::factory(5)->create();
=======
        // \App\Models\User::factory(10)->create();
>>>>>>> 66034a7ed665f48dbf765c368ec1449e1afd4618

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
