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
                'divisi' => 'Farmasi',
                'kategori' => 'Penunjang Medis',
                'id_prioritas' => 2
            ],
            [
                'divisi' => 'Poliklinik',
                'kategori' => 'Medis',
                'id_prioritas' => 1
            ],
            [
                'divisi' => 'Rumah Tangga',
                'kategori' => 'Non Medis',
                'id_prioritas' => 3
            ]
        ];

        DB::table('units')->insert($data);
    }
}
