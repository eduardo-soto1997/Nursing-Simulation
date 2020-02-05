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

    Route::get('/login', '@Pagecontroller@login');
    Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

// Anything that should be covered by the login goes under this group...
Route::group(['middleware' => ['auth']], function () {
    Route::get('/','PagesController@home');

    Route::get('/patients','PagesController@patients');

    Route::get('/classes','PagesController@classes');

    Route::get('/student', 'PagesController@students');

    Route::get('/student_welcome', 'PagesController@student_welcome');

    Route::get('/TB_Simulation', 'PagesController@TB_Simulation');

    Route::get('/classes', function () {
      return view('classes');
    });

    Route::get('/patients', function () {
      return view('patients');
    });

    Route::get('/students', function(){
      return view('manage_student');
    });

    Route::get('/student_welcome', function(){
      return view('student_welcome');
    });

    Route::get('/TB_Simulation', function(){
      return view('TB_Simulation');
    });

    Route::resource('/students','StudentController');
});

Auth::routes();

Route::get('/home','PagesController@home');

Auth::routes();
