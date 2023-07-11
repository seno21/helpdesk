<?php

namespace App\Http\Controllers;

use App\Models\Status;
use App\Models\Unit;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function laporan()
    {
        $data = [
            'title' => 'Laporan Tiket',
            'statuses' => Status::all(),
            'units' => Unit::all()
        ];

        return view('laporan.index', $data);
    }
}
