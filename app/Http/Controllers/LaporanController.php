<?php

namespace App\Http\Controllers;

use App\Models\Status;
use App\Models\Tiket;
use App\Models\Unit;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        $tiket = new Tiket();

        $tgl_awal = $request->tgl_awal;
        $tgl_akhir = $request->tgl_akhir;

        $data = [
            'title' => 'Laporan Tiket',
            'laporans' => $tiket->laporan($tgl_awal, $tgl_akhir),
            'units' => Unit::all(),
            'statuses' => Status::all()
        ];

        return view('laporan.index', $data);
    }

    // public function laporan(Request $request)
    // {
    //     $tiket = new Tiket();

    //     $tgl_awal = $request->tgl_awal;
    //     $tgl_akhir = $request->tgl_akhir;


    //     // dd($status);

    //     $data = [
    //         'title' => 'Laporan Tiket',
    //         'laporans' => $tiket->laporan($tgl_awal, $tgl_akhir),
    //         'units' => Unit::all(),
    //         'statuses' => Status::all()
    //     ];

    //     return view('laporan.index', $data);
    // }
}
