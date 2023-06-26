<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Prioritas;

class PrioritasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Prioritas::create([
            'tipe' => 'High',
            'warna' => '#FF4747'
        ]);

        Prioritas::create([
            'tipe' => 'Medium',
            'warna' => '#FFC100'
        ]);


        Prioritas::create([
            'tipe' => 'Low',
            'warna' => '#57B657'
        ]);
    }
}
