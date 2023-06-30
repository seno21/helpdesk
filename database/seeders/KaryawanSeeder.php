<?php

namespace Database\Seeders;

use App\Models\Karyawan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KaryawanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Karyawan::create([
            'nama' => 'Fega Suseno',
            'nik' => '201709080',
            'tgl_lahir' => '2023-06-23',
            'kelamin' => 'L',
            'telepon' => '+62-89661499225',
            'alamat' => 'Desa. Kasugengan Lor, Kec. Depok Kab. Cirebon',
            'id_user' => 1
        ]);
    }
}
