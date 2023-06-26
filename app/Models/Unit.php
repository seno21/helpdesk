<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Unit extends Model
{
    use HasFactory;

    public function allUnit()
    {
        $unit = DB::table('units')
            ->join('prioritas', 'units.id_prioritas', 'prioritas.id')
            ->select('units.id', 'units.divisi', 'units.kategori', 'prioritas.id AS prioID', 'prioritas.tipe', 'prioritas.warna')
            ->get();

        return $unit;
    }

    public function findUnit($id)
    {
        $unit = DB::table('units')
            ->join('prioritas', 'units.id_prioritas', 'prioritas.id')
            ->select('units.id', 'units.divisi', 'units.kategori', 'prioritas.id AS prioID', 'prioritas.tipe', 'prioritas.warna')
            ->where('units.id', $id)
            ->first();

        return $unit;
    }


    public function deleteUnit($id)
    {
        $unit = DB::table('units')
            ->join('prioritas', 'units.id_prioritas', 'prioritas.id')
            ->where('units.id', $id)
            ->delete();

        return $unit;
    }
}
