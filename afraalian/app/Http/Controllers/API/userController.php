<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "مدیریت کاربران";
        $users = User::orderBy('id', 'DESC')->get();
        return view('back.pages.users', compact('title', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function newUser(User $user)
    {
        $title = "افزودن کاربر جدید";
        return view('back.pages.new-user', compact('title', 'user'));
    }

    public function store(Request $request)
    {
        $message = [
            'name.required'=>'فیلد نام نمیتواند خالی باشد.',
            'email.required'=>'فیلد ایمیل نمیتواند خالی باشد.',
            'email.email'=>'ایمیل وارد شده نامعتبر است.',
            'email.unique'=>'ایمیل وارد قبلا در سایت وجود دارد.',
            'phone.required'=>'فیلد شماره تلفن نمیتواند خالی باشد.',
            'phone.numeric'=>'این شماره تلفن نا معتبر است',
            'phone.digits'=>'این شماره تلفن نا معتبر است',
            'password.max'=>'پسورد باید بالای 8 زقم باشد',
        ];

        $validatedData = $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:users'],
            'phone' => ['required', 'digits:11', 'numeric'],
            'password' => ['required', 'min:8'],
        ], $message);

        $create_user =  User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'role' => $request->role,
            'password' => Hash::make($request->password)
        ]);

        session()->flash('success', 'کاربر با موفقیت ساخته شد.');
        return redirect(route('showUsers.admin.panel'));

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

    public function edit(User $user)
    {
        $title = "ویرایش اطلاعات کاربر";
        return view('back.pages.editUser', compact('user', 'title'));
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
        $message = [
            'name.required'=>'فیلد نام نمیتواند خالی باشد.',
            'email.required'=>'فیلد ایمیل نمیتواند خالی باشد.',
            'email.email'=>'ایمیل وارد شده نامعتبر است.',
            'email.unique'=>'ایمیل وارد قبلا در سایت وجود دارد.',
            'phone.required'=>'فیلد شماره تلفن نمیتواند خالی باشد.',
            'phone.numeric'=>'این شماره تلفن نا معتبر است',
            'phone.digits'=>'این شماره تلفن نا معتبر است',
            'password.max'=>'پسورد باید بالای 8 زقم باشد',
        ];
        $user = User::findOrFail($id);



        $validatedData = $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:users,email,'.$user->id],
            'phone' => ['required', 'digits:11', 'numeric'],
            'password' => ['sometimes','max:8'],
        ], $message);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->role = $request->role;
        $user->password = Hash::make($request->password);

        $user->update();


        session()->flash('success', 'تقییرات با موفقیت انجام شد.');
        return redirect(route('showUsers.admin.panel', $user->id));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        session()->flash('success', 'کاربر با موفقیت حذف شد.');
        return redirect(route('showUsers.admin.panel', $user->id));
    }
}
