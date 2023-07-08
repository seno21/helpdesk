<?php

namespace App\Http\Controllers;

use App\Models\Progres;
use App\Models\Tiket;
use Illuminate\Http\Request;

class LacakController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Lacak Tiket'
        ];

        return view('lacak.index', $data);
    }

    public function search(Request $request)
    {
        $tiket = new Tiket();
        $progres = new Progres();

        $keyword = $request->cari;
        $hasil = $tiket->searchTiket($keyword);
        // cek jika tidak ada nomor tiket
        if ($hasil === null) {
            return redirect()->back()->with('error', 'Nomor Tiket Tidak Ditemukan!');
        }

        $data = [
            'title' => 'Lacak Tiket',
            'hasil' => $hasil,
            'progreses' => $progres->showProgres($keyword)
        ];

        return view('lacak.hasil', $data);
    }
}
