<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Category;
use App\Drill;
use App\User;
use App\Score;

class OthersController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $drills = Drill::all();


//        dd(view('index', compact(['categories', 'drills'])));
        return view('index', compact(['categories', 'drills']));
    }

    public function mypage()
    {
        $user_id = Auth::id();
        $my_drills = Drill::with('category')->where('user_id', $user_id)->get();
        $my_scores = Score::with('drill:id,title')->where('user_id', $user_id)->get();

        return view('mypage', compact(['my_drills', 'my_scores']));
    }
}
