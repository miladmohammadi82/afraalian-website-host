<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class adminController extends Controller
{
    public function index()
    {
        $title = "پنل ادمین";
        return view('back.index', compact('title'));
    }

    public function dashboardPage()
    {
        $title = "داشبورد";
        return view('back.pages.dashboard', compact('title'));
    }



}
