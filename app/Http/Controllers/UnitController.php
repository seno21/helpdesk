<?php

namespace App\Http\Controllers;

use App\Models\Prioritas;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UnitController extends Controller
{
    public function index()
    {


        $data = [
            'title' => 'Master Unit',
            'units' => unit::all()
        ];

        return view('master.unit.index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Master Data Unit'
        ];

        return view('master.unit.create', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'divisi' => 'required',
            'kategori' => 'required',
        ]);

        $unit = new Unit();
        $unit->divisi = $request->divisi;
        $unit->kategori = $request->kategori;
        $unit->save();

        return redirect()->back()->with('toast_success', 'Berhasil menambah data');
    }
    public function edit($id)
    {
        $data = [
            'title' => 'Formulir Edit Data',
            'unit' => unit::find($id)
        ];

        return view('master.unit.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'divisi' => 'required',
            'kategori' => 'required',
        ]);

        $unit = Unit::find($id);
        // $unit->findUnit($id);

        $unit->divisi = $request->divisi;
        $unit->kategori = $request->kategori;
        // $unit->id_prioritas = $request->prioritas;
        $unit->save();

        return redirect()->route('master.unit.index')->with('toast_success', 'Berhasil update data');
    }


    public function destroy($id)
    {
        $unit = Unit::find($id);
        $unit->delete();

        return redirect()->back()->with('toast_success', 'Data unit berhasil dihapus');
    }
}
