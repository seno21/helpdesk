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
            ->select('karyawans.nama',)
            ->join('users', 'karyawans.id_user', 'users.id')
            ->where('karyawans.id', $id)
            ->first();
    }

    public function profileKaryawan($id)
    {
        return DB::table('karyawans')
            ->select(
                'karyawans.id',
                'karyawans.nama',
                'karyawans.nik',
                'karyawans.tgl_lahir',
                'karyawans.kelamin',
                'karyawans.telepon',
                'karyawans.alamat',
                'karyawans.id_user'
            )
            ->join('users', 'karyawans.id_user', 'users.id')
            ->where('users.id', $id)
            ->first();
    }

    public function countKaryawan()
    {
        return DB::table('karyawans')
            ->join('users', 'karyawans.id_user', 'users.id')
            ->where('id_role', '!=', '1')
            ->count();
    }
}
