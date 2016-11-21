<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Questions;
use App\Answer1;
use App\Answer2;

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

    public function answer1View($id)
    {
        $question=Questions::findOrFail($id);

        if ($question->lock){
          return redirect('/');
        }
        return view('vote.answer1')->with('question', $question);

    }

    public function result1View($id)
    {
      $answer= $_GET["answer1"];

      if ($answer!=1 && $answer!=2 && $answer!=3 && $answer!=4  ) {
        return redirect('/');
      }
      return Answer1::create([
        'question_id'=>$id,
        'answer'=>$answer,

      ]);


    }

}
