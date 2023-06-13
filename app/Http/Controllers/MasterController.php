<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class MasterController extends Controller
{
    public function index()
    {
        $data = [
            'karyawans' => Karyawan::all()
        ];

        return view('master.karyawan.index', $data);
    }

    public function create()
    {
        return view('master.karyawan.create');
    }

    public function store(Request $request)
    {
        $karyawan = new Karyawan();
        $karyawan->nama = $request->nama;
        $karyawan->save();

        return redirect()->back()->with('berhasil', 'Berhasil nambah data karyawan');
    }

    public function destroy($id)
    {
        $karyawan = Karyawan::find($id);
        $karyawan->delete();

        return redirect()->back()->with('berhasil', 'Berhasil hapus data karyawan');
    }

    public function edit($id)
    {
        $karyawan = Karyawan::find($id);
        $data = [
            'karyawan' => $karyawan
        ];
        return view('master.karyawan.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $karyawan = Karyawan::find($id);
        $karyawan->nama = $request->nama;
        $karyawan->save();

        return redirect()->back()->with('berhasil', 'Berhasil update data karyawan');
    }
}
