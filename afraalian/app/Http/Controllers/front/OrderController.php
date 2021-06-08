<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('items')->where('user_id', auth()->user()->id)->get();
        // return $orders;
        return view('profile.orders.orders', compact('orders'));
    }
}
