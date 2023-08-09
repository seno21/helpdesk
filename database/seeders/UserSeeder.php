<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'rizki',
            'email' => 'rizki@mail.com',
            'password' => bcrypt('qwerty21'),
            'id_role' => 1
        ]);

        User::create([
            'name' => 'fega',
            'email' => 'fega@mail.com',
            'password' => bcrypt('qwerty21'),
            'id_role' => 2
        ]);

        User::create([
            'name' => 'naruto',
            'email' => 'naruto@mail.com',
            'password' => bcrypt('qwerty21'),
            'id_role' => 3
        ]);

        User::create([
            'name' => 'hinata',
            'email' => 'hinata@mail.com',
            'password' => bcrypt('qwerty21'),
            'id_role' => 3
        ]);
    }
}
