<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use Auth;

class CourseController extends Controller
{
  public function view()
  {
      return view('dashboard.courses.create');
  }
  public function create(Request $req)
  {
    $user_id=Auth::user()->id;
    Course::create([
      'name' => $req['name'],
      'code' => $req['code'],
      'user_id' => $user_id

    ]);

    return redirect()->back();
  }
}
