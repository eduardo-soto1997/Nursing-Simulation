<?php
use App\User;
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
    Route::get('/login', 'Pagecontroller@login');
    Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
    //Route::get('/register', 'RegisterController@boot');

// Anything that should be covered by the login goes under this group...
Route::group(['middleware' => ['auth']], function () {
    Route::get('/','PagesController@home');

    Route::get('/TB_Simulation', 'PagesController@TB_Simulation');

    // Everything regarding Classes
    Route::get('/classes', 'ClassesController@show');
    Route::post('/classes', 'ClassesController@store');
    Route::get('/classes/edit/{post}', 'ClasssesController@edit');
    Route::put('/classes/{class}', 'ClasssesController@update');

    Route::get('/users', 'UserController@show');
    Route::post('/users', 'UserController@store');
//  Route::get('/users/create', 'UserController@create');
    Route::get('/users/edit/{post}', 'UserController@edit');
    Route::put('/users/{user}', 'UserController@update');

    Route::get('/patients', 'PatientController@index');
    Route::post('/patients', 'PatientController@store');
    Route::get('/patients/create', 'PatientController@create');
    Route::get('/patients/edit/{post}', 'PatientController@edit');
    Route::put('/patients/{patient}', 'PatientController@update');

    Route::get('/student_welcome', function(){
      return view('student_welcome');
    });

    Route::get('/TB_Simulation', function(){
      return view('TB_Simulation');
    });

    Route::resource('/students','StudentController');
    Route::resource('/users', 'UserController' );
    Route::resource('/patient','PatientController');
    Route::resource('medications','MedicationsController');
    Route::resource('questions','QuestionsController');
    Route::resource('possible_interventions','Possible_InterventionsController');
    Route::resource('disseases','DisseasesController');
    Route::resource('classes', 'ClassesController');
});

Auth::routes();

Route::get('/home','PagesController@home');

Auth::routes();

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
