<?php

namespace App\Http\Controllers;

use App\Models\Progres;
use App\Models\Tiket;
use Illuminate\Http\Request;

class LacakController extends Controller
{
    // public function index()
    // {
    //     $data = [
    //         'title' => 'Lacak Tiket'
    //     ];

    //     return view('lacak.index', $data);
    // }

    public function search(Request $request)
    {
        $tiket = new Tiket();
        $progres = new Progres();

        $keyword = $request->cari;
        $hasil = $tiket->searchTiket($keyword);
        // dd($hasil);
        // // Cek jika tiket tidak ada
        // if ($request->cari != $hasil->no_tiket) {
        //     return redirect()->back()->with('error', 'Data Tidak Ditemukan');
        // }

        $data = [
            'title' => 'Lacak Tiket',
            'hasil' => $hasil,
            'progreses' => $progres->showProgres($keyword)
        ];

        return view('lacak.index', $data);
    }
}
