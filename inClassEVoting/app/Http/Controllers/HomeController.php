<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Questions;
use App\Answer1;
use App\Answer2;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions=Questions::unlock();
        return view('home')->with('questions',$questions);
    }

    public function answer1View($id)
    {
        $question=Questions::findOrFail($id);

        if ($question->lock){
          return redirect('/');
        }
        return view('vote.answer1')->with('question', $question);

    }

    public function result1View($id)
    {
      $question=Questions::findOrFail($id);
      if ($question->lock){
        return redirect('/');
      }
      $answer= $_GET["answer1"];

      if ($answer!=1 && $answer!=2 && $answer!=3 && $answer!=4  ) {
        return redirect('/');
      }
      Answer1::create([
        'question_id'=>$id,
        'answer'=>$answer,

      ]);
      switch ($answer) {
        case 1:
          $answerstr = $question->A;
          break;

        case 2:
          $answerstr = $question->B;
          break;

        case 3:
          $answerstr = $question->C;
          break;

        case 4:
          $answerstr = $question->D;
          break;

      }

      return view('vote.result1')->with('question',$question)->with('answerstr',$answerstr);
    }


        public function answer2View($id)
        {
            $question=Questions::findOrFail($id);

            if ($question->lock){
              return redirect('/');
            }
            return view('vote.answer2')->with('question', $question);

        }

        public function result2View($id)
        {
          $question=Questions::findOrFail($id);
          if ($question->lock){
            return redirect('/');
          }
          $answer= $_GET["answer2"];

          if ($answer!=1 && $answer!=2 && $answer!=3 && $answer!=4  ) {
            return redirect('/');
          }
          Answer2::create([
            'question_id'=>$id,
            'answer'=>$answer,

          ]);
          switch ($answer) {
            case 1:
              $answerstr = $question->A;
              break;

            case 2:
              $answerstr = $question->B;
              break;

            case 3:
              $answerstr = $question->C;
              break;

            case 4:
              $answerstr = $question->D;
              break;

          }

          return view('vote.result2')->with('question',$question)->with('answerstr',$answerstr);
        }

        public function chartResults1($question_id)
        {
          $a = Answer1::where('question_id', $question_id)->where('answer', 1)->get()->count();
          $b = Answer1::where('question_id', $question_id)->where('answer', 2)->get()->count();
          $c = Answer1::where('question_id', $question_id)->where('answer', 3)->get()->count();
          $d = Answer1::where('question_id', $question_id)->where('answer', 4)->get()->count();

          echo $a.' '.$b.' '.$c.' '.$d;
        }

}
