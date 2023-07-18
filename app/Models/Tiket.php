<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Tiket extends Model
{
    use HasFactory;

    public function allTiket()
    {
        $allTiketByUser = DB::table('tikets')
            ->select(
                'tikets.id',
                'tikets.id_user',
                'tikets.no_tiket',
                'tikets.created_at',
                'tikets.pemohon',
                'statuses.status',
                'tikets.judul',
                'units.divisi',
                'prioritas.tipe',
                'tikets.lokasi',
                'tikets.kerusakan',
                'statuses.warna',
                'tikets.selesai'
            )
            // ->select('*')
            ->join('units', 'tikets.id_unit', 'units.id')
            ->join('prioritas', 'units.id_prioritas', 'prioritas.id')
            ->join('statuses', 'tikets.id_status', 'statuses.id')
            ->join('users', 'tikets.id_user', 'users.id')
            ->where('tikets.id_user', Auth::user()->id)
            ->orderByDesc('tikets.id')
            ->get();

        $allTiketAdmin = DB::table('tikets')
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
                'statuses.warna',
                'tikets.selesai'
            )
            // ->select('*')
            ->join('units', 'tikets.id_unit', 'units.id')
            ->join('prioritas', 'units.id_prioritas', 'prioritas.id')
            ->join('statuses', 'tikets.id_status', 'statuses.id')
            ->join('users', 'tikets.id_user', 'users.id')
            ->orderByDesc('tikets.id')
            ->get();


        if (Auth::user()->id != 1) {
            return $allTiketByUser;
        } else {
            return $allTiketAdmin;
        }

        // SELECT t.id', t.no_tiket, t.created_at,
        // t.pemohon, t.id_karyawan as Petugas, s.status,
        // t.judul as 'Judul', u.divisi as "Unit", p.tipe as 'Prioritas', t.lokasi, t.kerusakan
        // FROM tikets t
        // JOIN units u ON t.id_unit = u.id 
        // JOIN prioritas p ON u.id_prioritas = p.id
        // JOIN statuses s ON t.id_status = s.id ;
        // return $tiket;
    }

    public function allOrder()
    {
        $tiket = DB::table('tikets')
            ->select(
                'tikets.id',
                'tikets.selesai',
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
            // ->where('tikets.selesai', 0)
            ->orderBy('tikets.selesai')
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
                'tikets.selesai'
            )
            ->join('units', 'tikets.id_unit', 'units.id')
            ->join('prioritas', 'units.id_prioritas', 'prioritas.id')
            ->join('statuses', 'tikets.id_status', 'statuses.id')
            ->where('tikets.id', $id)
            ->first();

        return $detail;
    }


    public function searchTiket($no_tiket)
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
                'tikets.selesai'
            )
            ->join('units', 'tikets.id_unit', 'units.id')
            ->join('prioritas', 'units.id_prioritas', 'prioritas.id')
            ->join('statuses', 'tikets.id_status', 'statuses.id')
            // ->where('tikets.no_tiket', 'like', "%" . $no_tiket . "%")
            ->where('tikets.no_tiket', $no_tiket)
            ->first();

        return $detail;
    }

    public function countTiket()
    {
        $hitung = DB::table('tikets')
            // ->where('selesai', 0)
            ->count();

        return $hitung;
    }

    public function countFinishTiket()
    {
        $hitung = DB::table('tikets')
            ->where('selesai', 1)
            ->count();

        return $hitung;
    }

    public function countOpenTiket()
    {
        $hitung = DB::table('tikets')
            ->where('id_status', 1)
            ->count();

        return $hitung;
    }


    public function laporan($tgl_awal, $tgl_akhir)
    {

        $query = DB::table('tikets')
            ->select(
                'tikets.id',
                'tikets.no_tiket',
                'tikets.tanggal',
                'tikets.pemohon',
                'statuses.status',
                'statuses.warna',
                'tikets.judul',
                'units.divisi',
                'prioritas.id AS color',
                'prioritas.tipe',
                'tikets.lokasi',
                'tikets.kerusakan',
                'tikets.selesai',
                'karyawans.nama AS petugas',
            )
            ->join('units', 'tikets.id_unit', 'units.id')
            ->join('prioritas', 'units.id_prioritas', 'prioritas.id')
            ->join('statuses', 'tikets.id_status', 'statuses.id')
            ->join('users', 'tikets.id_user', 'users.id')
            ->join('karyawans', 'users.id', 'karyawans.id_user')
            ->whereBetween('tikets.tanggal', [$tgl_awal, $tgl_akhir]);



        return $query->get();
    }
}
