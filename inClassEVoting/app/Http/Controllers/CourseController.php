<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;

class CourseController extends Controller
{
  public function view()
  {
      return view('dashboard.courses.create');
  }
  public function create(Request $req)
  {
    Course::create([
      'name' => $req['name'],
      'code' => $req['code'],

    ]);

    return redirect()->back();
  }
}
