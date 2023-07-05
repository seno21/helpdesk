<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\Progres;
use App\Models\Status;
use App\Models\Tiket;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $tiket = new Tiket();
        $data = [
            'title' => 'Order List',
            'tikets' => $tiket->allOrder()
        ];

        return view('tiket.order.index', $data);
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
            'petugas' => 'required',
            'status' => 'required',
            'deskripsi' => 'required'
        ]);
        // dd($request->petugas);

        $tiket = Tiket::find($id);


        $tiket->id_status = $request->status;
        $tiket->save();

        $progres = new Progres();
        $progres->id_karyawan = $request->petugas;
        $progres->no_tiket = $tiket->no_tiket;
        $progres->tgl_proses = $request->tgl_proses;
        $progres->deskripsi = $request->deskripsi;
        $progres->save();

        return redirect()->back()->with('success', 'Tiket berhasil diproses');
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

        return view('tiket.order.show', $data);
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
}
