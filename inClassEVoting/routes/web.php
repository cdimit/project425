<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Auth::routes();

Route::get('/', 'HomeController@index');

//home/question
Route::get('/question/{id}/answer1', 'HomeController@answer1View');
Route::get('/question/{id}/result1', 'HomeController@result1View');
Route::get('/question/{id}/answer2', 'HomeController@answer2View');
Route::get('/question/{id}/result2', 'HomeController@result2View');

Route::get('/chart_results1/{question_id}', 'HomeController@chartResults1');
Route::get('/chart_results2/{question_id}', 'HomeController@chartResults2');

Route::group(['middleware' => 'auth'], function(){

  //admin/question
  Route::get('/admin/question/{id}/answer1', 'AdminController@answer1View');
  Route::get('/admin/question/{id}/result1', 'AdminController@result1View');
  Route::get('/admin/question/{id}/answer2', 'AdminController@answer2View');
  Route::get('/admin/question/{id}/result2', 'AdminController@result2View');

  Route::get('/admin/chart_results1/{question_id}', 'AdminController@chartResults1');
  Route::get('/admin/chart_results2/{question_id}', 'AdminController@chartResults2');



  //dashboard
  Route::get('/dashboard', 'AdminController@home');

  //Questions
  Route::get('/dashboard/{course_id}/question', 'QuestionController@view');
  Route::get('/dashboard/question/create','QuestionController@createView');
  Route::post('/question/create','QuestionController@create');

  //Question/edit
  Route::get('/dashboard/question/{question_id}/edit', 'QuestionController@editView');
  Route::post('/dashboard/question/{question_id}/edit', 'QuestionController@edit');

  //Courses
  Route::get('/dashboard/course', 'CourseController@view');
  Route::get('/dashboard/course/create', 'CourseController@createView');
  Route::post('/course/create', 'CourseController@create');

  //Courses/edit
  Route::get('/dashboard/{course_id}/edit', 'CourseController@editView');
  Route::post('/dashboard/{course_id}/editt', 'CourseController@edit');

  //Unlock
  Route::get('unlock/{question_id}', 'AdminController@unlockQuestion');

  //Lock
  Route::get('lock/{question_id}', 'AdminController@lockQuestion');

  //Delete Question
  Route::get('delete/question/{question_id}', 'AdminController@deleteQuestion');
  Route::get('delete/course/{course_id}','AdminController@deleteCourse');



  //stats
  Route::get('dashboard/{courses_id}/stats','CourseController@viewStats');

});
