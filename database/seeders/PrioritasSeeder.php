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
            'kode' => '1'
        ]);

        Prioritas::create([
            'tipe' => 'Medium',
            'kode' => '2'
        ]);


        Prioritas::create([
            'tipe' => 'Low',
            'kode' => '3'
        ]);
    }
}
