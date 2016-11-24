<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use Auth;

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

    return redirect()->back()->with('status', 'Course was successfully created!');
  }

  public function editView($course_id){
    $course=Course::find($course_id);
    return view('dashboard.courses.edit')->with('course',$course);
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
