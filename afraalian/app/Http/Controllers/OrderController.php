<?php

namespace App\Http\Controllers;

use App\Models\Addres;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'shopping_fullname' => ['required'],
            'shopping_address' => ['required'],
            'shopping_state' => ['required'],
            'shopping_city' => ['required'],
            'shopping_phone' => ['required'],
            'shopping_zipcode' => ['required'],
        ]);

        $order = new Order();

        $order->order_number = uniqid('OrderNumber-');

        $order->shopping_fullname = $request->input('shopping_fullname');
        $order->shopping_address = $request->input('shopping_address');
        $order->shopping_state = $request->input('shopping_state');
        $order->shopping_city = $request->input('shopping_city');
        $order->shopping_phone = $request->input('shopping_phone');
        $order->shopping_zipcode = $request->input('shopping_zipcode');


        if (!$request->has('billing_fullname')) {
            $order->billing_fullname = $request->input('shopping_fullname');
            $order->billing_address = $request->input('shopping_address');
            $order->billing_state = $request->input('shopping_state');
            $order->billing_city = $request->input('shopping_city');
            $order->billing_phone = $request->input('shopping_phone');
            $order->billing_zipcode = $request->input('shopping_zipcode');
        }else{
            $order->billing_fullname = $request->input('billing_fullname');
            $order->billing_address = $request->input('billing_address');
            $order->billing_state = $request->input('billing_state');
            $order->billing_city = $request->input('billing_city');
            $order->billing_phone = $request->input('billing_phone');
            $order->billing_zipcode = $request->input('billing_zipcode');
        }




        $order->grand_total = \Cart::getTotal();
        $order->item_count = \Cart::getContent()->count();

        $order->user_id = auth()->id();
        $items = \Cart::getContent();
        foreach ($items as $item);

        $order->productsName = $item->name;

        $order->save();

        // save order items

        $cartItems = \Cart::getContent();

        foreach ($cartItems as $item) {
            $order->items()->attach($item->id, ['price'=> $item->price, 'quantity'=> $item->quantity, 'name'=> $item->name, 'user_id'=> auth()->user()->id]);
        }


        $addressUser = Addres::where('User_id', auth()->id())->first();

        // return $addressUser;

        if(is_null($addressUser)){
            $address = new Addres();
            $address->fullname = $request->input('shopping_fullname');
            $address->address = $request->input('shopping_address');
            $address->state = $request->input('shopping_state');
            $address->city = $request->input('shopping_city');
            $address->phone = $request->input('shopping_phone');
            $address->zipcode = $request->input('shopping_zipcode');
            $address->user_id = auth()->id();
            $address->save();

            // empty Cart

            \Cart::clear();

            return redirect(route('zarinpal.payment'));
        }
        if (isset($addressUser)) {

            // empty Cart

            \Cart::clear();

            return redirect(route('zarinpal.payment'));
        }



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
