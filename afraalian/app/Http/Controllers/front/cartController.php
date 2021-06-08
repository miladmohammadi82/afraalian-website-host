<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Addres;
use App\Models\City;
use App\Models\State;
use Illuminate\Http\Request;
use Darryldecode\Cart\Cart;

class cartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $title = "سبد خربد";
        $items = \Cart::getContent();

        return view('front.pages.cartPage', compact('items', 'title'));
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
        // dd($request);
        \Cart::add(array(
            'id' => $request->id, // inique row ID
            'name' => $request->name,
            'index_image' => $request->index_image,
            'price' => $request->price,
            'quantity' => $request->quantity,
        ));



        return redirect(route('cart.page'));


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Addres $address)
    {
        return view('front.pages.editAddressCheckout', compact('address'));
    }

    public function updateAddress(Request $request, $id){
        $address = Addres::findOrFail($id);

        $message = [
            'shopping_fullname.required'=>'فیلد نام و نام خوانوادگی نمیتواند خالی باشد',
            'shopping_address.required'=>'فیلد آدرس نمیتواند خالی باشد',
            'shopping_zipcode.required'=>'فیلد کد پستی نمیتواند خالی باشد',
            'shopping_zipcode.numeric'=>'کد پستی نا معتبر است',
            'shopping_phone.required'=>'فیلد شماره تماس نمیتواند خالی باشد',
            'shopping_phone.numeric'=>'این شماره تلفن نا معتبر است',
            'shopping_phone.min'=>'این شماره تلفن نا معتبر است',

        ];
        $request->validate([
            'shopping_fullname' => ['required'],
            'shopping_address' => ['required'],
            'shopping_zipcode' => ['required', 'numeric'],
            'shopping_phone' => ['required', 'numeric', 'min:11'],
        ], $message);

        $address->fullname = $request->input('shopping_fullname');
        $address->address = $request->input('shopping_address');
        $address->state = $request->input('shopping_state');
        $address->city = $request->input('shopping_city');
        $address->phone = $request->input('shopping_phone');
        $address->zipcode = $request->input('shopping_zipcode');
        $address->user_id = auth()->id();
        $address->update();


        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        \Cart::update($id, [
            'quantity' => [
                'relative' => false,
                'value' => $request->quantity,
            ]
        ]);

        return redirect(route('cart.page'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        \Cart::remove($id);

        return redirect('/cart');
    }

    public function checkout()
    {
        $user_id = auth()->id();



        $address = Addres::where('user_id', $user_id)->first();
        $states = State::all();
        // dd($address);
        // return $states;
        return view('front.pages.checkout', compact('address', 'states'));
    }

    public function getCity($id)
    {


        $cities = City::where('state_id', $id)->get();
        return $cities;
        return json_encode($cities);
    }
}
