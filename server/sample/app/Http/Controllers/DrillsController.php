<?php

namespace App\Http\Controllers;

use App\Category;
use App\Drill;
use App\Http\Requests\DrillStore;
use App\Problem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DrillsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();

        return view('register', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DrillStore $request)
    {
        $user_id = Auth::id();
        $title = $request->input('title');
        $category_id = $request->input('category_id');
        $difficulty = $request->input('difficulty');

        $drill = Drill::create([
            'user_id' => $user_id,
            'category_id' => $category_id,
            'title' => $title,
            'difficulty' => $difficulty
        ]);
        $drill_id = $drill->id; //LastInsertIdと同義
        $question1 = $request->input('question1');
        $question2 = $request->input('question2');
        $question3 = $request->input('question3');
        $question4 = $request->input('question4');
        $question5 = $request->input('question5');

        if(!empty($request->input('question6'))) {
            $question6 = $request->input('question6');
        } else {
            $question6 = '';
        }
        if(!empty($request->input('question7'))) {
            $question7 = $request->input('question7');
        } else {
            $question7 = '';
        }
        if(!empty($request->input('question8'))) {
            $question8 = $request->input('question8');
        } else {
            $question8 = '';
        }
        if(!empty($request->input('question9'))) {
            $question9 = $request->input('question9');
        } else {
            $question9 = '';
        }
        if(!empty($request->input('question10'))) {
            $question10 = $request->input('question10');
        } else {
            $question10 = '';
        }

        Problem::create([
            'drill_id' => $drill_id,
            'question' => $question1,
            'order' => 1
        ]);
        Problem::create([
            'drill_id' => $drill_id,
            'question' => $question2,
            'order' => 2
        ]);
        Problem::create([
            'drill_id' => $drill_id,
            'question' => $question3,
            'order' => 3
        ]);
        Problem::create([
            'drill_id' => $drill_id,
            'question' => $question4,
            'order' => 4
        ]);
        Problem::create([
            'drill_id' => $drill_id,
            'question' => $question5,
            'order' => 5
        ]);
        Problem::create([
            'drill_id' => $drill_id,
            'question' => $question6,
            'order' => 6
        ]);
        Problem::create([
            'drill_id' => $drill_id,
            'question' => $question7,
            'order' => 7
        ]);
        Problem::create([
            'drill_id' => $drill_id,
            'question' => $question8,
            'order' => 8
        ]);
        Problem::create([
            'drill_id' => $drill_id,
            'question' => $question9,
            'order' => 9
        ]);
        Problem::create([
            'drill_id' => $drill_id,
            'question' => $question10,
            'order' => 10
        ]);

        return redirect('/')->with('flash_message', 'Registered.');
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
    public function edit($id)
    {
        //
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
        //
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
