<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AdminController extends Controller
{
  public function home()
  {
      $user = Auth::user();

      return view('dashboard.home')->with('user', $user);
  }
}
