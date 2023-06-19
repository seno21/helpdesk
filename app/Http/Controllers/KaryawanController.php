<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Data Karyawan',
            'karyawans' => Karyawan::all()
        ];

        return view('master.karyawan.index', $data);
    }

    public function show($id)
    {
        $data = [
            'title' => 'Detail Info Karyawan',
            'show' => Karyawan::find($id)
        ];


        return view('master.karyawan.show', $data);
    }

    public function create()
    {
        $data = [
            'title' => "Form Edit Data Karyawan"
        ];

        return view('master.karyawan.create', $data);
    }

    public function store(Request $request)
    {
        // Validasi
        $request->validate([
            'nama' => 'required',
            'nik'  => 'required|numeric',
            'tlp' => 'required|numeric'
        ]);

        // Inisiasi
        $karyawan = new Karyawan();

        $karyawan->nama = $request->nama;
        $karyawan->nik = $request->nik;
        $karyawan->tgl_lahir = $request->tgl;
        $karyawan->kelamin = $request->kelamin;
        $karyawan->telepon = '+62-' . $request->tlp;
        $karyawan->alamat = $request->alamat;
        $karyawan->save();

        return redirect()->back()->with('toast_success', 'Data berhasil disimpan');
    }

    public function edit($id)
    {
        $karyawan = Karyawan::find($id);
        $data = [
            'title' => "Formulir Edit Data Karyawan",
            'karyawan' => $karyawan
        ];

        return view('master.karyawan.edit', $data);
    }

    public function update(Request $request, $id)
    {
        // Validasi
        $request->validate([
            'nama' => 'required',
            'nik'  => 'required|numeric',
            'tlp' => 'required|numeric'
        ]);

        // Inisiasi
        $karyawan = Karyawan::find($id);

        $karyawan->nama = $request->nama;
        $karyawan->nik = $request->nik;
        $karyawan->tgl_lahir = $request->tgl;
        $karyawan->kelamin = $request->kelamin;
        $karyawan->telepon = '+62-' . $request->tlp;
        $karyawan->alamat = $request->alamat;
        $karyawan->save();

        return redirect()->route('master.karyawan.index')->with('toast_success', 'Data berhasil update');
    }

    public function destroy($id)
    {
        $karyawan = Karyawan::find($id);
        $karyawan->delete();

        /*
            Logiknya, nanti ketika button hpus di tekan, 
            maka akan running sweetalert2 di main.blade.php,
            setelah Klik yes pada sweetalert2 maka lanjut eksekusi return di bawah dengan 
            sweetalert realrashid.
        */

        return redirect()->back()->with('toast_success', 'Data terhapus');
    }
}
