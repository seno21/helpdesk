<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'nama' => 'Printer',
            ],
            [
                'nama' => 'Jaringan',
            ],
            [
                'nama' => 'Komputer',
            ],
            [
                'nama' => 'Hardware',
            ],
            [
                'nama' => 'Aplikasi',
            ]
        ];

        DB::table('kategoris')->insert($data);
    }
}
