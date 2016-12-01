<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Questions;
use App\Course;

class AdminController extends Controller
{
  public function home()
  {
      $user = Auth::user();

      return view('dashboard.home')->with('user', $user);
  }

  public function unlockQuestion($question_id)
  {
    $question = Questions::findOrFail($question_id);

    $question->lock = '0';
    $question->save();

    return redirect('/admin/question/'.$question->id.'/answer1');
  }

  public function lockQuestion($question_id)
  {
    $question = Questions::findOrFail($question_id);

    $question->lock = '1';
    $question->save();

    return redirect('/dashboard/'.$question->course_id.'/question')->with('status', 'Question was successfully locked!');
  }
  public function deleteQuestion($question_id)
  {
    $question = Questions::findOrFail($question_id);

    $question->delete();

    return redirect('/dashboard/'.$question->course_id.'/question')->with('status', 'Question was successfully deleted!');;
  }
  public function deleteCourse($course_id)
  {
    $course = Course::findOrFail($course_id);

    $course->delete();

    return redirect('/dashboard')->with('status', 'Course was successfully deleted!');;
  }





































  public function answer1View($id)
  {
      $question=Questions::findOrFail($id);

      if ($question->lock){
        return redirect('/');
      }
      return view('voteadmin.answer1')->with('question', $question);

  }

  public function result1View($id)
  {
    $question=Questions::findOrFail($id);
    if ($question->lock){
      return redirect('/');
    }


    return view('voteadmin.result1')->with('question',$question);
  }


      public function answer2View($id)
      {
          $question=Questions::findOrFail($id);

          if ($question->lock){
            return redirect('/');
          }
          return view('voteadmin.answer2')->with('question', $question);

      }

      public function result2View($id)
      {
        $question=Questions::findOrFail($id);
        if ($question->lock){
          return redirect('/');
        }

        $question->lock= 1;
        $question->save();

        return view('voteadmin.result2')->with('question',$question);
      }

      public function chartResults1($question_id)
      {
        $a = Answer1::where('question_id', $question_id)->where('answer', 1)->get()->count();
        $b = Answer1::where('question_id', $question_id)->where('answer', 2)->get()->count();
        $c = Answer1::where('question_id', $question_id)->where('answer', 3)->get()->count();
        $d = Answer1::where('question_id', $question_id)->where('answer', 4)->get()->count();

        echo $a.' '.$b.' '.$c.' '.$d;
      }

      public function chartResults2($question_id)
      {
        $a = Answer2::where('question_id', $question_id)->where('answer', 1)->get()->count();
        $b = Answer2::where('question_id', $question_id)->where('answer', 2)->get()->count();
        $c = Answer2::where('question_id', $question_id)->where('answer', 3)->get()->count();
        $d = Answer2::where('question_id', $question_id)->where('answer', 4)->get()->count();

        echo $a.' '.$b.' '.$c.' '.$d;
      }

}
