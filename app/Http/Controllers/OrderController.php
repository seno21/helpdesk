<?php

namespace App\Http\Controllers;

use App\Models\Tiket;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $tiket = new Tiket();
        $data = [
            'title' => 'Order List',
            'tikets' => $tiket->allOrder()
        ];

        return view('tiket.order.index', $data);
    }
}
