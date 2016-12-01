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

    return redirect('/dashboard')->with('status', 'Question was successfully created!');
  }

  public function editView($question_id){
    $question=Questions::findOrFail($question_id);
    $courses = Course::all();
    return view('dashboard.questions.edit')->with('question',$question)->withCourses($courses);
  }

  public function edit($question_id, Request $req)
  {
    $que=Questions::findOrFail($question_id);
    $que->question = $req['question'];
    $que->A = $req['A'];
    $que->B = $req['B'];
    $que->C = $req['C'];
    $que->D = $req['D'];
    $que->solution = $req['solution'];
    $que->course_id = $req['course_id'];
    $que->label = $req['label'];
    $que->seconds = $req['seconds'];
    $que->chapter = $req['chapter'];
    $que->save();

    return redirect("/dashboard/$que->course_id/question")->with('status', 'Question was successfully edited!');

  }

}
#'question','A','B','C','D','solution','course_id','label','isPic','lock','seconds','chapter'
