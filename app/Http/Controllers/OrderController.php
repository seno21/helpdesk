<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Order List'
        ];

        return view('tiket.order.index', $data);
    }
}
