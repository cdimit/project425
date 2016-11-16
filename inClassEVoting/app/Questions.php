<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Questions extends Model
{

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'question','A','B','C','D','solution','course_id','label','isPic','lock','seconds','chapter'
  ];


}
