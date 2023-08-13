<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Progres extends Model
{
    use HasFactory;

    public function deleteProgres($no_tiket)
    {
        return DB::table('progres')
            ->join('tikets', 'progres.no_tiket', 'tikets.no_tiket')
            ->where('progres.no_tiket', $no_tiket)
            ->delete();
    }

    public function showProgres($no_tiket)
    {
        return DB::table('progres')
            ->select(
                'progres.no_tiket',
                'progres.tgl_proses',
                'progres.deskripsi',
                'progres.last'
            )
            ->where('progres.no_tiket', $no_tiket)
            ->get();
    }

    public function tglSelesai($no_tiket)
    {
        return DB::table('progres')
            ->select('progres.no_tiket', 'progres.tgl_proses', 'progres.last')
            ->where('progres.no_tiket', $no_tiket)
            ->where('progres.last', 1)
            ->latest('progres.id')
            ->first();
    }
}
