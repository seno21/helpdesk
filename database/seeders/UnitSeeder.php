<?php

namespace Database\Seeders;

use App\Models\Unit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'divisi' => 'IT',
                'kategori' => 'Non Medis',
            ],
            [
                'divisi' => 'Farmasi',
                'kategori' => 'Penunjang Medis',
            ],
            [
                'divisi' => 'Poliklinik',
                'kategori' => 'Medis',
            ],
            [
                'divisi' => 'Rumah Tangga',
                'kategori' => 'Non Medis',
            ]
        ];

        DB::table('units')->insert($data);
    }
}
