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


Route::group(['middleware' => 'auth'], function(){

  //dashboard
  Route::get('/dashboard', 'AdminController@home');

  //Questions
  Route::get('/dashboard/question', 'QuestionController@view');
  Route::get('/dashboard/question/create','QuestionController@createView');
  Route::post('/question/create','QuestionController@create');

  //Courses
  Route::get('/dashboard/course', 'CourseController@view');
  Route::get('/dashboard/course/create', 'CourseController@createView');
  Route::post('/course/create', 'CourseController@create');

});
