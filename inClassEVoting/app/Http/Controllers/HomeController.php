<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Questions;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions=Questions::unlock();
        return view('home')->with('questions',$questions);
    }


}
