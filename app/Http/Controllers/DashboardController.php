<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function index()
    {
        $data = [
            'title' => 'Helpdesk Ticketing System'
        ];

        return view('dashboard', $data);
    }
}
