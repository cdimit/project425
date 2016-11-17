<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Questions;

class QuestionController extends Controller
{
  public function crateView()
  {
      return view('dashboard.questions.create');
  }

  public function view()
  {
      return view('dashboard.questions.view');
  }

  public function create(Request $req)
  {
    Questions::create([
        'question' => $req['question'],
        'A' => $req['A'],
        'B' => $req['B'],
        'C' => $req['C'],
        'D' => $req['D'],
        'solution' => $req['solution'],
        'course_id' => $req['course_id'],
        'label' => $req['label'],
        'seconds' => $req['seconds'],
        'chapter' => $req['chapter']

    ]);

    return redirect()->back();
  }
}
#'question','A','B','C','D','solution','course_id','label','isPic','lock','seconds','chapter'
