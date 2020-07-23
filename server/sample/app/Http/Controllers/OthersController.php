<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OthersController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function mypage()
    {
        return view('mypage');
    }
}
