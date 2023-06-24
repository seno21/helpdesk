<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TiketController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Tiket list'
        ];

        return view('tiket.new.index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Formulir Membuat Ticket'
        ];
    }
}
