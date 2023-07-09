<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\Tiket;
use Illuminate\Http\Request;



class DashboardController extends Controller
{

    public function index()
    {
        $tiket = new Tiket();
        $karyawan = new Karyawan();



        $data = [
            'title' => 'Helpdesk Ticketing System',
            'masuk' => $tiket->countTiket(),
            'selesai' => $tiket->countFinishTiket(),
            'open' => $tiket->countOpenTiket(),
            'user' => $karyawan->countKaryawan()
        ];;


        // $pdf = Pdf::loadView('pdf.invoice', $data);
        // return $pdf->download('invoice.pdf');

        return view('dashboard', $data);
    }
}
