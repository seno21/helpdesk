<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Psy\Command\WhereamiCommand;

class Tiket extends Model
{
    use HasFactory;

    public function allTiket()
    {
        $query = DB::table('tikets')
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
                'tikets.kerusakan',
                'statuses.warna',
                'tikets.selesai'
            )
            // ->select('*')
            ->join('units', 'tikets.id_unit', 'units.id')
            ->join('prioritas', 'tikets.id_prioritas', 'prioritas.id')
            ->join('statuses', 'tikets.id_status', 'statuses.id')
            ->join('users', 'tikets.id_user', 'users.id');

        if (Auth::user()->id != 1) {
            $query->where('tikets.id_user', Auth::user()->id);
        }

        return $query->orderByDesc('tikets.id')->get();
    }

    public function tiketBaru()
    {
        $query = DB::table('tikets')
            ->select(
                'tikets.id',
                'tikets.id_user',
                'tikets.no_tiket',
                'tikets.created_at',
                'tikets.pemohon',
                'statuses.status',
                'statuses.id as id_status',
                'tikets.judul',
                'units.divisi',
                'tikets.prioritas',
                'tikets.kerusakan',
                'statuses.warna',
                'tikets.selesai'
            )
            // ->select('*')
            ->join('units', 'tikets.id_unit', 'units.id')
            ->join('statuses', 'tikets.id_status', 'statuses.id')
            ->join('users', 'tikets.id_user', 'users.id')
            ->where('statuses.id', 1);
        if (Auth::user()->id != 1) {
            $query->where('tikets.id_user', Auth::user()->id);
        }

        return $query->get();
    }

    public function tiketProses()
    {
        $query = DB::table('tikets')
            ->select(
                'tikets.id',
                'tikets.id_user',
                'tikets.no_tiket',
                'tikets.created_at',
                'tikets.pemohon',
                'statuses.status',
                'statuses.id as id_status',
                'tikets.judul',
                'units.divisi',
                'tikets.kerusakan',
                'statuses.warna',
                'tikets.selesai'
            )
            // ->select('*')
            ->join('units', 'tikets.id_unit', 'units.id')
            ->join('statuses', 'tikets.id_status', 'statuses.id')
            ->join('users', 'tikets.id_user', 'users.id')
            ->whereNotIn('statuses.id', [1, 3]);
        if (Auth::user()->id != 1) {
            $query->where('tikets.id_user', Auth::user()->id);
        }

        return $query->orderByDesc('tikets.id')->get();
    }

    public function tiketSelesai()
    {
        $query = DB::table('tikets')
            ->select(
                'tikets.id',
                'tikets.id_user',
                'tikets.no_tiket',
                'tikets.created_at',
                'tikets.pemohon',
                'statuses.status',
                'statuses.id as id_status',
                'tikets.judul',
                'units.divisi',
                'tikets.kerusakan',
                'statuses.warna',
                'tikets.selesai'
            )
            // ->select('*')
            ->join('units', 'tikets.id_unit', 'units.id')
            ->join('statuses', 'tikets.id_status', 'statuses.id')
            ->join('users', 'tikets.id_user', 'users.id')
            ->where('statuses.id', 3);
        if (Auth::user()->id != 1) {
            $query->where('tikets.id_user', Auth::user()->id);
        }

        return $query->orderByDesc('tikets.id')->get();
    }





    public function allOrder($id)
    {
        $tiket = DB::table('tikets')
            ->select(
                'tikets.id as idTiket',
                'tikets.selesai',
                'tikets.prioritas',
                'tikets.no_tiket',
                'tikets.created_at',
                'tikets.pemohon',
                'tikets.kerusakan',
                'tikets.judul',
                'statuses.status',
                'statuses.warna',
                'units.divisi',
                'users.id'
            )
            // ->select('*')
            ->join('units', 'tikets.id_unit', 'units.id')
            ->join('statuses', 'tikets.id_status', 'statuses.id')
            ->join('karyawans', 'tikets.id_karyawan', 'karyawans.id')
            ->join('users', 'karyawans.id_user', 'users.id')
            ->where('tikets.id_karyawan', $id)
            ->orderBy('tikets.selesai')
            ->get();

        return $tiket;
    }


    public function showTiket($id)
    {
        $detail = DB::table('tikets')
            ->select(
                'tikets.id as idTiket',
                'tikets.no_tiket',
                'tikets.created_at AS tanggal',
                'tikets.pemohon',
                'statuses.status',
                'statuses.warna',
                'tikets.judul',
                'units.divisi',
                'tikets.kerusakan',
                'tikets.selesai',
                'tikets.prioritas',
                'karyawans.lokasi'
            )
            ->join('units', 'tikets.id_unit', 'units.id')
            ->join('statuses', 'tikets.id_status', 'statuses.id')
            ->join('users', 'tikets.id_user', 'users.id')
            ->join('karyawans', 'users.id', 'karyawans.id_user')
            ->where('tikets.id', $id)
            ->first();

        return $detail;
    }

    public function showPetugas($id)
    {
        $detail = DB::table('tikets')
            ->select(
                'tikets.id',
                'karyawans.nama'
            )
            ->join('karyawans', 'tikets.id_karyawan', 'karyawans.id')
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
                'tikets.kerusakan',
                'tikets.selesai',
                'karyawans.nama',
            )
            ->join('units', 'tikets.id_unit', 'units.id')
            ->join('statuses', 'tikets.id_status', 'statuses.id')
            ->join('karyawans', 'tikets.id_karyawan', 'karyawans.id')
            // ->where('tikets.no_tiket', 'like', "%" . $no_tiket . "%")
            ->where('tikets.no_tiket', $no_tiket)
            ->first();

        return $detail;
    }

    public function countTiket()
    {
        $hitung = DB::table('tikets')
            // ->where('selesai', 0)
            ->whereNotIn('id_status', [1, 3])
            ->count();

        return $hitung;
    }

    public function countTiketSelesai()
    {
        $hitung = DB::table('tikets')
            ->where('id_status', 3)
            ->count();

        return $hitung;
    }

    public function countTiketbaru()
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
                'tikets.id_user',
                'tikets.no_tiket',
                'tikets.tanggal',
                'tikets.pemohon',
                'tikets.prioritas',
                'statuses.status',
                'statuses.warna',
                'tikets.judul',
                'units.divisi',
                'tikets.kerusakan',
                'tikets.selesai',
                'karyawans.nama AS petugas',
            )
            ->join('units', 'tikets.id_unit', 'units.id')
            ->join('statuses', 'tikets.id_status', 'statuses.id')
            ->join('users', 'tikets.id_user', 'users.id')
            ->join('karyawans', 'users.id', 'karyawans.id_user')
            ->where('tikets.id_user', Auth::user()->id)
            ->whereBetween('tikets.tanggal', [$tgl_awal, $tgl_akhir]);

        return $query->get();
    }
}
