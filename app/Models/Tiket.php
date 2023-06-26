<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Tiket extends Model
{
    use HasFactory;

    public function detailTiket()
    {
        $tiket = DB::table('tikets')
            ->select('tikets.id', 'tikets.no_tiket', 'tikets.created_at', 'tikets.judul', 'prioritas.id AS prioritas', 'units.divisi', 'prioritas.tipe', 'statuses.status', 'statuses.warna')
            ->join('units', 'tikets.id_unit', 'units.id')
            ->join('prioritas', 'units.id_prioritas', 'prioritas.id')
            ->join('statuses', 'tikets.id_status', 'statuses.id')
            ->get();


        // SELECT t.id, t.no_tiket, t.created_at, t.judul, u.divisi, p.tipe, s.status
        // FROM tikets t
        // JOIN units u ON t.id_unit = u.id 
        // JOIN prioritas p ON u.id_prioritas = p.id
        // JOIN statuses s ON t.id_status = s.id ;
        return $tiket;
    }
}
