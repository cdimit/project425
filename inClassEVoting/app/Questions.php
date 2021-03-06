<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use SoftDeletes;

class Questions extends Model
{


  protected $dates = ['deleted_at'];

  protected $table = "questions";

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'question','A','B','C','D','solution','course_id','label','isPic','lock','seconds','chapter', 'header_pic'
  ];

  public function answer1()
  {
    return $this->hasMany('App\Answer1');
  }

  public function answer2()
  {
    return $this->hasMany('App\Answer2');
  }

  public function course()
  {
    return $this->belongsTo('App\Course', 'course_id');
  }

  public function scopeUnlock($query)
  {
    return $query->where('lock', '0')->get();
  }
}
