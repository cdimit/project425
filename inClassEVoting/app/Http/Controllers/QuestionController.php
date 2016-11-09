<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Questions;

class QuestionController extends Controller
{
  public function view()
  {
      return view('dashboard.questions');
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
        'admin_id'=>1,
    ]);

    return redirect()->back();
  }
}
#'question','A','B','C','D','solution','course_id','label','isPic','admin_id','lock'
