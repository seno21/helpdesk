<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\Tiket;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function index()
    {
        $tiket = new Tiket();
        $karyawan = new Karyawan();



        $data = [
            'title' => 'Helpdesk Ticketing System',
            'total' => $tiket->countTiket(),
            'baru' => $tiket->countTiketbaru(),
            'selesai' => $tiket->countTiketSelesai(),
            'user' => $karyawan->countKaryawan()
        ];;


        // $pdf = PDF::loadView('dashboard', $data);
        // return $pdf->download('dashboard.pdf');

        return view('dashboard', $data);
    }
}
