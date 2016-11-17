<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Questions;
use Auth;

class QuestionController extends Controller
{
  public function createView()
  {
      $courses = Auth::user()->courses;
      return view('dashboard.questions.create')->with('courses', $courses);
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

    return redirect()->back()->with('status', 'Question was successfully created!');;
  }
}
#'question','A','B','C','D','solution','course_id','label','isPic','lock','seconds','chapter'
