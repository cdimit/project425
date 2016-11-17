<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer2 extends Model
{

  protected $table = "answer2";

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'question_id','answer'
  ];

  public function question()
  {
    return $this->belongsTo('App\Questions', 'question_id');
  }
}
