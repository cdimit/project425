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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::group(['middleware' => 'admin'], function(){

  Route::get('/dashboard', 'AdminController@home');
  Route::get('/dashboard/question','QuestionController@view');
  Route::post('/question/create','QuestionController@create');

  Route::get('/dashboard/course', 'CourseController@view');
  Route::post('/course/create', 'CourseController@create');

});
