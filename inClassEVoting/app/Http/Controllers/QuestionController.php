<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Questions;
use App\Course;
use Auth;

class QuestionController extends Controller
{
  public function createView()
  {
      $courses = Auth::user()->courses;
      return view('dashboard.questions.create')->with('courses', $courses);
  }

  public function view($course_id)
  {
      $questions = Questions::where('course_id', $course_id)->get();

      return view('dashboard.questions.view')->with('questions', $questions);
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

  public function editView($question_id){
    $question=Questions::find($question_id);
    $courses = Course::all();
    return view('dashboard.questions.edit')->with('question',$question)->withCourses($courses);
  }

  public function edit($course_id, Request $req)
  {
    $course=Course::find($course_id);

    $course->name = $req['name'];
    $course->code = $req['code'];
    $course->save();
    return redirect('/dashboard')->with('status', 'Course was successfully edited!');

  }

}
#'question','A','B','C','D','solution','course_id','label','isPic','lock','seconds','chapter'
