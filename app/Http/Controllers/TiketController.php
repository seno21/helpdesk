<?php

namespace App\Http\Controllers;

use App\Models\Tiket;
use App\Models\Unit;
use Illuminate\Http\Request;

class TiketController extends Controller
{
    public function index()
    {
        $tiket = new Tiket();
        $data = [
            'title' => 'Tiket list',
            'tikets' => $tiket->detailTiket()
        ];

        return view('tiket.new.index', $data);
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
        $tiket = new Tiket();
        // dd($request->no_tiket);

        $tiket->no_tiket = $request->no_tiket;
        $tiket->judul = $request->judul;
        $tiket->id_unit = $request->unit;
        $tiket->lokasi = $request->lokasi;
        $tiket->kerusakan = $request->kerusakan;
        $tiket->save();

        return redirect()->back()->with('toast_success', 'Berhasil membuat tiket');
    }
}
