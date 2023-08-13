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
    // public function index()
    // {
    //     $tiket = new Tiket();
    //     // dd($tiket->allTiket());

    //     $data = [
    //         'title' => 'Tiket list',
    //         'tikets' => $tiket->allTiket()
    //     ];

    //     return view('tiket.new.index', $data);
    // }

    public function baru()
    {

        $tiket = new Tiket();
        // dd($tiket->tiketBaru());

        $data = [
            'title' => 'Tiket list',
            'tikets' => $tiket->tiketBaru()
        ];

        return view('tiket.new.tiketBaru', $data);
    }

    public function proses()
    {
        $tiket = new Tiket();
        // dd($tiket->allTiket());

        $data = [
            'title' => 'Tiket list',
            'tikets' => $tiket->tiketProses()
        ];

        return view('tiket.new.tiketProses', $data);
    }

    public function selesai()
    {
        $tiket = new Tiket();
        // dd($tiket->allTiket());

        $data = [
            'title' => 'Tiket list',
            'tikets' => $tiket->tiketSelesai()
        ];

        return view('tiket.new.tiketSelesai', $data);
    }

    public function show($id)
    {

        $tiket = new Tiket();
        $progres = new Progres();

        $noTiket = $tiket->showTiket($id);

        // Filter jika petugas kosong
        $petugas = $tiket->showPetugas($id);
        $petugasNama = $petugas->nama ?? '-';

        // dd($progres->showProgres($noTiket->no_tiket));

        $data = [
            'title' => 'Detail Permintaan Tiket',
            'detail' => $tiket->showTiket($id),
            'petugas' => $petugasNama,
            'progreses' => $progres->showProgres($noTiket->no_tiket),
            'selesai' => $progres->tglSelesai($noTiket->no_tiket)
        ];

        return view('tiket.new.show', $data);
    }


    public function create()
    {
        $karyawan = new Karyawan();
        $data = [
            'title' => 'Formulir Create Ticket',
            'unit' => $karyawan->showUnitKaryawan(Auth::user()->id)
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
        // $tiket->lokasi = $request->lokasi;
        $tiket->pemohon = $pemohon->nama;
        $tiket->kerusakan = $request->kerusakan;
        $tiket->save();

        return redirect()->back()->with('toast_success', 'Berhasil membuat tiket');
    }

    public function edit($id)
    {
        $karyawan = new Karyawan();
        $data = [
            'title' => 'Formulir Edit Tiket',
            'tiket' => Tiket::find($id),
            'unit' => $karyawan->showUnitKaryawan(Auth::user()->id)
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

        // Filter jikatiket sudah di ekesekusi
        if ($tiket->selesai === 1 || $tiket->id_karyawan != null) {
            return redirect()->back()->with('toast_info', 'Permintaan Sudah di Proses');
        }

        $tiket->no_tiket = $request->no_tiket;
        $tiket->judul = $request->judul;
        $tiket->id_unit = $request->unit;
        $tiket->kerusakan = $request->kerusakan;
        $tiket->pemohon = $pemohon->nama;
        $tiket->save();

        return redirect()->route('tiket.baru')->with('toast_success', 'Berhasil Mengupdate Tiket');
    }

    public function destroy($id)
    {
        // Mencari data dulu
        $tiket = Tiket::find($id);
        // dd($tiket->id_karyawan);

        if ($tiket->selesai === 1 || $tiket->id_karyawan != null) {
            return redirect()->back()->with('toast_info', 'Sedang Dalam Proses, Data Tidak Bisa Dihapus');
        }

        // Delete di tabel progress
        $progres = new Progres;
        $progres->deleteProgres($tiket->no_tiket);
        // Detelet di tabel tikets
        $tiket->delete();
        return redirect()->back()->with('toast_success', 'Berhasil Hapus asasData Permanen');
    }

    public function editTugas($id)
    {
        $data = [
            'title' => 'Penangnan Komplain',
            'tiket' => Tiket::find($id),
            'karyawans' => Karyawan::all()
        ];

        return view('tiket.new.editPetugas', $data);
    }

    public function updateTugas(Request $request, $id)
    {
        $tiket = Tiket::find($id);

        $tiket->id_karyawan = $request->petugas;
        $tiket->prioritas = $request->prioritas;
        $tiket->save();

        return redirect()->route('tiket.baru')->with('toast_success', 'Berhasil update data');
    }
}
