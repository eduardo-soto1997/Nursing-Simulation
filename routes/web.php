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

    Route::get('/questions/{id}' , 'QuestionsController@show');
    Route::get('/questions/create/{id}', 'QuestionsController@create');
    Route::post('/questions', 'QuestionsController@store');
    Route::get('/questions/edit/{post}', 'QuestionsController@edit');
    Route::put('/questions/{question}', 'QuestionsController@update');

    Route::get('/medications/{id}', 'MedicationsController@show');
    Route::get('/medications/create/{id}', 'MedicationsController@create');
    Route::post('/medications', 'MedicationsController@store');
    Route::get('/medications/edit/{post}', 'MedicationsController@edit');
    Route::put('/medications/{medication}', 'MedicationsController@update');


    Route::get('/possible_interventions', 'Possible_InterventionsController@show');
    Route::post('/possible_interventions', 'Possible_InterventionsController@store');
    Route::get('/possible_interventions/edit/{post}', 'Possible_InterventionsController@edit');
    Route::put('/possible_interventions/{possible_intervention}', 'Possible_InterventionsController@update');

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

    Route::get('/diseases', 'DisseasesController@index');
    Route::post('/diseases', 'DisseasesController@store');
    Route::get('/diseases/create', 'DisseasesController@create');
    Route::get('/diseases/edit/{post}', 'DisseasesController@edit');
    Route::put('/diseases/{disease}', 'DisseasesController@update');

    Route::get('/student_welcome', function(){
      return view('student_welcome');
    });

    Route::get('/TB_Simulation', function(){
      return view('TB_Simulation');
    });

    Route::resource('/students','StudentController');
    Route::resource('/users', 'UserController' );
    Route::resource('/patient','PatientController');
    Route::resource('/dissease', 'DisseasesController');
    Route::resource('questions','QuestionsController');
    Route::resource('medications','MedicationsController');
    Route::resource('possible_interventions','Possible_InterventionsController');
    Route::resource('disseases','DisseasesController');
    Route::resource('classes', 'ClassesController');
});

Auth::routes();

Route::get('/home','PagesController@home');

Auth::routes();

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/simulation', 'SimulationController@index')->name('simulation.index');
Route::post('/simulation/intervention', 'SimulationController@intervention')->name('intervention.index');
Route::post('/simulation/score', 'SimulationController@score')->name('score.index');
Route::get('/simulation/{id}/show','SimulationController@show')->name('simulation.patientInformation');
