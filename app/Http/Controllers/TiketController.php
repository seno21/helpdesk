<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\Tiket;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TiketController extends Controller
{
    public function index()
    {
        $tiket = new Tiket();
        $data = [
            'title' => 'Tiket list',
            'tikets' => $tiket->allTiket()
        ];

        return view('tiket.new.index', $data);
    }

    public function show($id)
    {
        $detail = new Tiket();
        $data = [
            'title' => 'Detail Permintaan Tiket',
            'detail' => $detail->showTiket($id)
        ];

        return view('tiket.new.show', $data);
    }


    public function create()
    {
        $data = [
            'title' => 'Formulir Create Ticket',
            'units' => Unit::all()
        ];

        return view('tiket.new.create', $data);
    }

    public function store(Request $request)
    {
        // dd($request->no_tiket);
        // dd(Auth::user()->id);
        $karyawan = new Karyawan();
        $tiket = new Tiket();

        $id = Auth::user()->id;
        $pemohon = $karyawan->pemohon($id);
        // dd($pemohon->nama);


        $tiket->no_tiket = $request->no_tiket;
        $tiket->judul = $request->judul;
        $tiket->id_unit = $request->unit;
        $tiket->lokasi = $request->lokasi;
        $tiket->kerusakan = $request->kerusakan;
        $tiket->pemohon = $pemohon->nama;
        $tiket->save();

        return redirect()->back()->with('toast_success', 'Berhasil membuat tiket');
    }
}
