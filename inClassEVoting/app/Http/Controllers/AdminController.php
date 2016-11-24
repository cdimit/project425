<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Questions;

class AdminController extends Controller
{
  public function home()
  {
      $user = Auth::user();

      return view('dashboard.home')->with('user', $user);
  }

  public function unlockQuestion($question_id)
  {
    $question = Questions::find($question_id);

    $question->lock = '0';
    $question->save();

    return redirect('/question/'.$question->id.'/answer1');
  }
}
