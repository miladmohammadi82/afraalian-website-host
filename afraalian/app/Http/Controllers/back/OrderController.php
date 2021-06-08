<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Models\FrontModels\Product;
use App\Models\FrontModels\User as FrontModelsUser;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index(FrontModelsUser $product)
    {
        $title = "سفارشات";
        $orders = Order::orderBy('id', 'DESC')->with('items')->get();
        return view('back.pages.orders', compact('orders', 'title'));
    }

    public function show(Order $order)
    {
        $title = "نمایش محصولات سفارش داده شده";


        $order_item = $order->with('items')->get();

        return view('back.pages.showOrders', compact('order_item', 'title'));
    }

    public function editShippingStatus(Order $order)
    {
        if ($order->Shipping_status == 0) {
            $order->Shipping_status = 1;
        }else{
            $order->Shipping_status = 0;
        }

        $order->update();

        session()->flash('success', 'وضعیت با موفقیت تغییر کرد.');
        return redirect(route('orders.show.admin.panel'));
    }
}
