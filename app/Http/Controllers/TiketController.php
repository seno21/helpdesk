<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\Progres;
use App\Models\Tiket;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TiketController extends Controller
{
    public function index()
    {
        $tiket = new Tiket();
        // dd($tiket->allTiket());

        $data = [
            'title' => 'Tiket list',
            'tikets' => $tiket->allTiket()
        ];

        return view('tiket.new.index', $data);
    }

    public function baru()
    {
        $tiket = new Tiket();
        // dd($tiket->allTiket());

        $data = [
            'title' => 'Tiket list',
            'tikets' => $tiket->tiketBaru()
        ];

        return view('tiket.new.index', $data);
    }

    public function proses()
    {
        $tiket = new Tiket();
        // dd($tiket->allTiket());

        $data = [
            'title' => 'Tiket list',
            'tikets' => $tiket->tiketProses()
        ];

        return view('tiket.new.index', $data);
    }

    public function selesai()
    {
        $tiket = new Tiket();
        // dd($tiket->allTiket());

        $data = [
            'title' => 'Tiket list',
            'tikets' => $tiket->tiketSelesai()
        ];

        return view('tiket.new.index', $data);
    }

    public function show($id)
    {

        $detail = new Tiket();
        $progres = new Progres();

        $tiket = $detail->showTiket($id);
        // dd($progres->petugas($tiket->no_tiket));
        $data = [
            'title' => 'Detail Permintaan Tiket',
            'detail' => $detail->showTiket($id),
            'progreses' => $progres->showProgres($tiket->no_tiket),
            'petugas' => $progres->petugas($tiket->no_tiket)
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
        $tiket->tanggal = $request->tgl_buat;
        $tiket->id_user = Auth::user()->id;
        $tiket->no_tiket = $request->no_tiket;
        $tiket->judul = $request->judul;
        $tiket->id_unit = $request->unit;
        $tiket->lokasi = $request->lokasi;
        $tiket->pemohon = $pemohon->nama;
        $tiket->kerusakan = $request->kerusakan;
        $tiket->save();

        return redirect()->back()->with('toast_success', 'Berhasil membuat tiket');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Formulir Edit Tiket',
            'tiket' => Tiket::find($id),
            'units' => Unit::all()
        ];

        return view('tiket.new.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $karyawan = new Karyawan();
        // $tiket = new Tiket();

        $user_id = Auth::user()->id;
        $pemohon = $karyawan->pemohon($user_id);

        $tiket = Tiket::find($id);

        $tiket->no_tiket = $request->no_tiket;
        $tiket->judul = $request->judul;
        $tiket->id_unit = $request->unit;
        $tiket->lokasi = $request->lokasi;
        $tiket->kerusakan = $request->kerusakan;
        $tiket->pemohon = $pemohon->nama;
        $tiket->save();

        return redirect()->route('tiket.new.index')->with('toast_success', 'Berhasil Mengupdate Tiket');
    }

    public function destroy($id)
    {
        // Mencari data dulu
        $tiket = Tiket::find($id);

        if ($tiket->selesai != 1) {
            // Delete di tabel progress
            $progres = new Progres;
            $progres->deleteProgres($tiket->no_tiket);
            // Detelet di tabel tikets
            $tiket->delete();
            return redirect()->back()->with('toast_success', 'Berhasil Hapus Data Permanen');
        } else {
            return redirect()->back()->with('toast_error', 'Permintaan Telah selesai, Data Tidak Bisa Dihapus');
        }
    }
}
