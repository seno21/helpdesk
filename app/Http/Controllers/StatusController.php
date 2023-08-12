<?php

namespace App\Http\Controllers;

use App\Models\Status;
use App\Models\Unit;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Master Data Status',
            'statuses' => Status::all()
        ];

        return view('master.status.index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Formulir Create Status'
        ];

        return view('master.status.create', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'warna' => 'required',
            'status' => 'required',
            'ket' => 'required'
        ]);

        $status = new Status();

        $status->warna = $request->warna;
        $status->status = $request->status;
        $status->keterangan = $request->ket;
        $status->save();

        return redirect()->back()->with('toast_success', 'Data berhasil disimpan');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Formulir Edit Status',
            'status' => Status::find($id)
        ];

        return view('master.status.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required',
            'ket' => 'required'
        ]);

        $status = Status::find($id);
        $status->warna = $request->warna;
        $status->status = $request->status;
        $status->keterangan = $request->ket;
        $status->save();

        return redirect()->route('master.status.index')->with('toast_success', 'Data berhasil di update');
    }

    public function destroy($id)
    {
        $status = Status::find($id);
        if ($status->id === 1 || $status->id === 2 || $status->id === 3) {
            return redirect()->back()->with('error', 'Status default! Tidak bisa di hapus');
        }

        //selain itu boleh di hapus
        $status->delete();

        return redirect()->back()->with('toast_success', 'Data di hapus permanent');
    }
}
