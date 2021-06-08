<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\contact;
use Illuminate\Http\Request;

class ContactController extends Controller

{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "تماس با ما";
        return view('front.pages.contactPage',compact('title'));
    }

    public function getInfoInAdminPanel()
    {
        $title = 'پیام های ارسال شده';
        $contactMessages = contact::orderBy('id', 'DESC')->get();
        return view('back.pages.contact-message', compact('contactMessages', 'title'));
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
        $message = [
            'name.required'=>'فیلد نام و نام خانوادگی نمیتواند خالی باشد',
            'email.required'=>'فیلد ایمیل نمیتواند خالی باشد',
            'email.email'=>'این ایمیل نامعتبر است',
            'phone.required'=>'فیلد شماره تماس نمیتواند خالی باشد',
            'phone.min'=>'این شماره تماس نامعتبر است',
            'phone.numeric'=>'این شماره تماس نامعتبر است',
            'body.required'=>'فیلد متن پیام نمیتواند خالی باشد',
        ];

        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email'],
            'phone' => ['numeric', 'required', 'min:11'],
            'body' => ['required'],
        ], $message);

        contact::create($request->all());


        session()->flash('success', 'پیام شما ارسال شد در اولین فرست باهاتون تماس میگیریم');
        return redirect(route('contact.page'));

    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(contact $contact)
    {
        //
    }
}
