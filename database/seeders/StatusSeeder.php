<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Status::create([
            'status' => 'Baru',
            'keterangan' => 'Status default Helpdesk Ticketing',
            'warna' => '#4B49AC'
        ]);

        Status::create([
            'status' => 'Proses',
            'keterangan' => 'Status default Helpdesk Ticketing',
            'warna' => '#46c35f'
        ]);

        Status::create([
            'status' => 'Selesai',
            'keterangan' => 'Status default Helpdesk Ticketing',
            'warna' => '#FF4747'
        ]);
    }
}
