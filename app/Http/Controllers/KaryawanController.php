<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\Role;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KaryawanController extends Controller
{
    public function index()
    {
        $data = [
            'user' => Auth::user()->name,
            'title' => 'Data Karyawan',
            'karyawans' => Karyawan::all()
        ];

        return view('master.karyawan.index', $data);
    }

    public function show($id)
    {
        $karyawan = new Karyawan();
        $data = [
            'title' => 'Detail Info Karyawan',
            'show' => $karyawan->showAll($id),
        ];


        return view('master.karyawan.show', $data);
    }

    public function create()
    {
        $data = [
            'title' => "Form Edit Data Karyawan",
            'roles' => Role::all(),
            'units' => Unit::all(),
        ];

        return view('master.karyawan.create', $data);
    }

    public function store(Request $request)
    {
        // dd(Auth::user()->id);
        // dd(Auth::user()->name);

        // Validasi
        $request->validate([
            'username' => 'required|unique:App\Models\User,name|regex:/^\S*$/',
            'nama' => 'required',
            'email' => 'required',
            'unit' => 'required',
            'lokasi' => 'required',
            'password' => 'min:6|required|required_with:konfir_password|same:konfir_password',
            'konfir_password' => 'min:6',
            'nik'  => 'required|numeric',
            'tlp' => 'numeric'
        ]);

        //Insert ke tabel user
        $user = new User();
        $user->name = $request->username;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->id_role = $request->role;
        $user->save();

        // Inisiasi
        $karyawan = new Karyawan();

        $karyawan->nama = $request->nama;
        $karyawan->nik = $request->nik;
        $karyawan->tgl_lahir = $request->tgl;
        $karyawan->kelamin = $request->kelamin;
        $karyawan->telepon = '+62-' . $request->tlp;
        $karyawan->alamat = $request->alamat;
        $karyawan->id_user = $user->id; //Mengambil id dari tabel user yg sudah di input
        $karyawan->id_unit = $request->unit;
        $karyawan->lokasi = $request->lokasi;
        $karyawan->save();

        return redirect()->back()->with('toast_success', 'Data berhasil disimpan');
    }

    public function edit($id)
    {
        $karyawan = Karyawan::find($id);
        $user = User::find($karyawan->id_user);
        // dd($karyawan);
        $data = [
            'title' => "Formulir Edit Data Karyawan",
            'karyawan' => $karyawan,
            'user' => $user,
            'roles' => Role::all(),
            'units' => Unit::all()
        ];

        return view('master.karyawan.edit', $data);
    }


    public function update(Request $request, $id)
    {
        // dd($request->password);
        // Validasi
        $request->validate([
            'username' => 'required|regex:/^\S*$/',
            'nama' => 'required',
            'email' => 'required',
            'nik'  => 'required|numeric',
            'tlp' => 'required|numeric'
        ]);

        // cek password untuk validasi
        if ($request->password != null) {
            $request->validate([
                'password' => 'min:6|required|required_with:konfir_password|same:konfir_password',
                'konfir_password' => 'min:6'
            ]);
        }

        $karyawan = Karyawan::find($id);
        $user =  User::find($karyawan->id_user);

        $user->name = $request->username;
        $user->email = $request->email;
        $user->id_role = $request->role;
        $user->save();

        $karyawan->nama = $request->nama;
        $karyawan->nik = $request->nik;
        $karyawan->tgl_lahir = $request->tgl;
        $karyawan->kelamin = $request->kelamin;
        $karyawan->telepon = '+62-' . $request->tlp;
        $karyawan->alamat = $request->alamat;
        $karyawan->save();

        return redirect()->route('master.karyawan.index')->with('toast_success', 'Data berhasil update');
    }

    public function reset(Request $request, $id)
    {
        return redirect()->route('master.karyawan.index');
    }

    public function destroy($id)
    {
        $karyawan = Karyawan::find($id);
        // dd($karyawan->id_user);
        $karyawan->delete();

        /*
            Logiknya, nanti ketika button hpus di tekan, 
            maka akan running sweetalert2 di main.blade.php,
            setelah Klik yes pada sweetalert2 maka lanjut eksekusi return di bawah dengan 
            sweetalert realrashid.
        */
        $user = User::find($karyawan->id_user);
        $user->delete();

        return redirect()->back()->with('toast_success', 'Data terhapus');
    }
}
