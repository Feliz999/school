<?php

use Illuminate\Support\Facades\Route;

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
    return view('auth.login');
});

Auth::routes();

Route::group(['middleware'=>'auth'],function(){
    Route::resource('typePeople','TypePeopleController');
    Route::resource('typeUser','TypeUserController');
    Route::resource('typeHomework','TypeHomeworkController');
    Route::resource('ciclo','CicloController');
    Route::resource('level','LevelController');
    Route::resource('matter','MatterController');
    Route::resource('section','SectionController');
    Route::resource('student','StudentController');
    Route::resource('teacher','TeacherController');
    Route::resource('people','PeopleController');
    Route::resource('homework','HomeworkController');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
