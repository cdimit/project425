<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $table = "course";

  protected $fillable = [
      'name', 'code','user_id'
  ];

  public function questions()
  {
    return $this->hasMany('App\Questions');
  }

  public function user()
  {
    return $this->belongsTo('App\User', 'user_id');
  }
}
