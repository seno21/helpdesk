<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Tiket extends Model
{
    use HasFactory;

    public function allTiket()
    {
        $tiket = DB::table('tikets')
            ->select(
                'tikets.id',
                'tikets.no_tiket',
                'tikets.created_at',
                'tikets.pemohon',
                'statuses.status',
                'tikets.judul',
                'units.divisi',
                'prioritas.tipe',
                'tikets.lokasi',
                'tikets.kerusakan',
                'statuses.warna'
            )
            // ->select('*')
            ->join('units', 'tikets.id_unit', 'units.id')
            ->join('prioritas', 'units.id_prioritas', 'prioritas.id')
            ->join('statuses', 'tikets.id_status', 'statuses.id')
            ->orderByDesc('tikets.id')
            ->get();

        // SELECT t.id', t.no_tiket, t.created_at,
        // t.pemohon, t.id_karyawan as Petugas, s.status,
        // t.judul as 'Judul', u.divisi as "Unit", p.tipe as 'Prioritas', t.lokasi, t.kerusakan
        // FROM tikets t
        // JOIN units u ON t.id_unit = u.id 
        // JOIN prioritas p ON u.id_prioritas = p.id
        // JOIN statuses s ON t.id_status = s.id ;
        return $tiket;
    }

    public function allOrder()
    {
        $tiket = DB::table('tikets')
            ->select(
                'tikets.id',
                'tikets.aktif',
                'prioritas.id AS color',
                'tikets.no_tiket',
                'tikets.created_at',
                'tikets.pemohon',
                'statuses.status',
                'tikets.judul',
                'units.divisi',
                'prioritas.tipe',
                'tikets.lokasi',
                'tikets.kerusakan',
                'statuses.warna'
            )
            // ->select('*')
            ->join('units', 'tikets.id_unit', 'units.id')
            ->join('prioritas', 'units.id_prioritas', 'prioritas.id')
            ->join('statuses', 'tikets.id_status', 'statuses.id')
            // ->where('tikets.aktif', 0)
            ->orderBy('tikets.aktif')
            ->get();

        return $tiket;
    }


    public function showTiket($id)
    {
        $detail = DB::table('tikets')
            ->select(
                'tikets.id',
                'tikets.no_tiket',
                'tikets.created_at AS tanggal',
                'tikets.pemohon',
                'statuses.status',
                'statuses.warna',
                'tikets.judul',
                'units.divisi',
                'prioritas.id AS color',
                'prioritas.tipe',
                'tikets.lokasi',
                'tikets.kerusakan',
                'tikets.aktif'
            )
            ->join('units', 'tikets.id_unit', 'units.id')
            ->join('prioritas', 'units.id_prioritas', 'prioritas.id')
            ->join('statuses', 'tikets.id_status', 'statuses.id')
            ->where('tikets.id', $id)
            ->first();

        return $detail;
    }
}
