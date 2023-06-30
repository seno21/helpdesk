<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Karyawan extends Model
{
    use HasFactory;

    public function showAll($id)
    {
        return DB::table('karyawans')
            ->select('*')
            ->join('users', 'karyawans.id_user', 'users.id')
            ->where('karyawans.id', $id)
            ->first();
    }

    public function pemohon($id)
    {
        return DB::table('karyawans')
            ->select('karyawans.nama')
            ->join('users', 'karyawans.id_user', 'users.id')
            ->where('karyawans.id', $id)
            ->first();
    }
}
