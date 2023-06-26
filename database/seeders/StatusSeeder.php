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
            'status' => 'Open',
            'keterangan' => 'Status default Helpdesk Ticketing',
            'warna' => '#46c35f'
        ]);
    }
}
