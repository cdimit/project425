<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use Auth;
use App\Answer1;
use App\Answer2;


class CourseController extends Controller
{
  public function createView()
  {
      return view('dashboard.courses.create');
  }


  public function view()
  {
      return view('dashboard.courses.view');
  }

  public function create(Request $req)
  {
    $user_id=Auth::user()->id;
    Course::create([
      'name' => $req['name'],
      'code' => $req['code'],
      'user_id' => $user_id

    ]);

    return redirect('/dashboard')->with('status', 'Course was successfully created!');
  }

  public function editView($course_id){
    $course=Course::findOrFail($course_id);
    return view('dashboard.courses.edit')->with('course',$course);
  }

  public function edit($course_id, Request $req)
  {
    $course=Course::findOrFail($course_id);

    $course->name = $req['name'];
    $course->code = $req['code'];
    $course->save();
    return redirect('/dashboard')->with('status', 'Course was successfully edited!');

  }




  public function viewStats($course_id)
  {
    $course=Course::findOrFail($course_id);
    $answer1=Answer1::all();
    $answer2=Answer2::all();
    return view('dashboard.courses.viewStats')->with('course',$course)->with('answer1',$answer1)->with('answer2',$answer2);

  }
}
