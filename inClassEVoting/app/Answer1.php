<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer1 extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'question_id','answer'
  ];
}
