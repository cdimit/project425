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



  Route::get('/dashboard', 'AdminController@home');
  Route::get('/dashboard/question/create','QuestionController@createView');
  Route::post('/question/create','QuestionController@create');

  Route::get('/dashboard/course/create', 'CourseController@createView');
  Route::post('/course/create', 'CourseController@create');
