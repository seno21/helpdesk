<?php

namespace Database\Seeders;

use App\Models\Karyawan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KaryawanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'nama' => 'Rizki Andri Anto',
                'nik' => '201709089',
                'tgl_lahir' => '1999-10-21',
                'kelamin' => 'L',
                'telepon' => '+62-89661499225',
                'alamat' => 'Pengampon Watan Jamblang',
                'lokasi' => 'Unit IT',
                'id_user' => 1,
                'id_unit' => 1
            ],
            [
                'nama' => 'Fega Suseno',
                'nik' => '201709080',
                'tgl_lahir' => '2000-06-23',
                'kelamin' => 'L',
                'telepon' => '+62-89661499225',
                'alamat' => 'Desa. Kasugengan Lor, Kec. Depok Kab. Cirebon',
                'lokasi' => 'Unit IT',
                'id_user' => 2,
                'id_unit' => 1
            ],
            [
                'nama' => 'Uzumaki Naruto',
                'nik' => '201709081',
                'tgl_lahir' => '2000-06-23',
                'kelamin' => 'L',
                'telepon' => '+62-89661499552',
                'alamat' => 'Desa. Konohagakure, Negeri Api',
                'lokasi' => 'Farmasi Rawat Jalan',
                'id_user' => 3,
                'id_unit' => 2
            ],

            [
                'nama' => 'Tachibana Hinata',
                'nik' => '201709102',
                'tgl_lahir' => '1999-06-07',
                'kelamin' => 'P',
                'telepon' => '+62-89123321112',
                'alamat' => 'Kota Toarosi, Tokyo Jepang',
                'lokasi' => 'Nurstation Lantai 1',
                'id_user' => 4,
                'id_unit' => 3
            ]
        ];
        DB::table('karyawans')->insert($data);
    }
}
