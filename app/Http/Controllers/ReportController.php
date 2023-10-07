<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Report Diagram',
            'kategoris' => Kategori::all()
        ];

        return view('report.index', $data);
    }
}
