<?php

namespace App\Http\Controllers;

use App\Models\Addres;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Addres $address)
    {
        $addresses = $address->where('user_id', auth()->id())->first();
        return view('profile.address.address', compact('addresses'));
    }

    public function showAddressesUserAdminPanel(Addres $address)
    {
        $title = "نمایش آدرس های کاربران";
        $addresses = $address->all();
        return view('back.pages.address.address', compact('addresses', 'title'));
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
        //
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
        return view('profile.address.edit-address', compact('address'));
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


        return redirect(route('address.admin.panel'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
