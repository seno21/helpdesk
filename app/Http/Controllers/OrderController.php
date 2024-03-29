<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\Progres;
use App\Models\Status;
use App\Models\Tiket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\FuncCall;

class OrderController extends Controller
{
    public function index()
    {
        $tiket = new Tiket();
        // dd(Auth::user()->id);
        // dd($tiket->allOrder(Auth::user()->id));
        $data = [
            'title' => 'Order List',
            'tikets' => $tiket->allOrder(Auth::user()->id)
        ];

        return view('tiket.order.index', $data);
    }

    public function show($id)
    {
        $detail = new Tiket();
        $progres = new Progres();

        // dd($detail->showTiket($id));
        $tiket = $detail->showTiket($id);
        // dd($progres->petugas($tiket->no_tiket));

        // Filter jika petugas kosong
        $petugas = $detail->showPetugas($id);
        $petugasNama = $petugas->nama ?? '-';

        $data = [
            'title' => 'Detail Permintaan Tiket',
            'detail' => $detail->showTiket($id),
            'progreses' => $progres->showProgres($tiket->no_tiket),
            'petugas' => $petugasNama
        ];

        return view('tiket.order.show', $data);
    }


    public function edit($id)
    {
        $data = [
            'title' => 'Penanganan Komplain',
            'tiket' => Tiket::find($id),
            'statuses' => Status::all(),
            'karyawans' => Karyawan::all()
        ];

        return view('tiket.order.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tgl_proses' => 'required',
            // 'petugas' => 'required',
            'status' => 'required',
            'deskripsi' => 'required'
        ]);

        $tiket = Tiket::find($id);

        if ($tiket->selesai != 1) {
            $tiket->id_status = $request->status;
            $tiket->save();

            $progres = new Progres();
            // $progres->id_karyawan = $request->petugas;
            $progres->no_tiket = $tiket->no_tiket;
            $progres->tgl_proses = $request->tgl_proses;
            $progres->deskripsi = $request->deskripsi;
            $progres->save();

            return redirect()->route('tiket.order.index')->with('success', 'Tiket berhasil diproses');
        }

        return redirect()->route('tiket.order.index')->with('toast_error', 'Data Telah Selesai, Tidak Bisa Diproses');
    }


    public function finish($id)
    {

        $data = [
            'title' => 'Penanganan Komplain',
            'tiket' => Tiket::find($id),
            'statuses' => Status::all(),
            'karyawans' => Karyawan::all()
        ];

        return view('tiket.order.finish', $data);
    }

    public function end(Request $request, $id)
    {
        $request->validate([
            'tgl_proses' => 'required',
            // 'petugas' => 'required',
            'status' => 'required',
            'deskripsi' => 'required'
        ]);

        // dd($request->last);
        $tiket = Tiket::find($id);


        if ($tiket->selesai != 1) {
            $tiket->id_status = $request->status;
            $tiket->Selesai = $request->selesai;
            $tiket->save();

            $progres = new Progres();
            // $progres->id_karyawan = $request->petugas;
            $progres->no_tiket = $tiket->no_tiket;
            $progres->tgl_proses = $request->tgl_proses;
            $progres->deskripsi = $request->deskripsi;
            $progres->last = $request->last;
            $progres->save();

            return redirect()->route('tiket.order.index')->with('success', 'Tiket Ditandai Selesai');
        }

        return redirect()->route('tiket.order.index')->with('toast_error', 'Data Telah Selesai, Tidak Bisa Diproses');
    }
}
