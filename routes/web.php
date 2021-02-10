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

// use Illuminate\Routing\Route;

// use Symfony\Component\Routing\Route;

// $route  = new Route();

// use Illuminate\Routing\Route;


Route::prefix('/teacher')->group(function () {
    Route::get('login', 'TeacherController@login')->name('teacher.login');
    Route::get('register', 'TeacherController@register');
    Route::post('login', 'TeacherController@postLogin');
    Route::post('register', 'TeacherController@postRegister')->name('teacher.register');

    Route::middleware('auth:teacher')->group(function () {
        Route::get('/', 'TeacherController@index');
        Route::get('/logout', 'TeacherController@postLogout');
        Route::get('download', 'TeacherController@download');
    });
});
Route::get('/', 'HomeController@welcome');
Route::get('/admin-test', function () {
    return view('admin.index');
});

Route::prefix('/admin')->group(function () {
    Route::middleware(['auth', 'admin'])->group(function () {
        Route::resource('aspect', 'AspectController');
        Route::post('statement/import', 'statementController@import');
        Route::post('question/import', 'QuisionerController@import');
        Route::get('answear/', 'AnswearController@index');
        Route::get('answear/score', 'AnswearController@score');
        Route::get('answear/downloadexcel', 'AnswearController@export');
        Route::get('answear/scoresexcel', 'AnswearController@exportscore');
        Route::get('answear/test', 'AnswearController@test');
        Route::post('tip/import', 'TipController@uploadExcel');
        Route::post('link/import', 'LinkController@import');
        Route::resource('statement', 'statementController');
        Route::resource('link', 'LinkController');
        Route::resource('quisioner', 'QuisionerController');
        Route::resource('tip', 'TipController');
        Route::get('student', 'studentController@index')->name('admin.student');
        Route::get('student/download', 'studentController@download')->name('admin.student');
    });
});
// Route::get('/aspect', 'AspectController@index');
Route::get('/kuisioner', 'QuizController@index');
Route::post('/kuisioner', 'QuizController@saveQuiz');
Route::get('/motivation', 'QuizController@motivationForm');
Route::post('/motivation', 'QuizController@savemotivationForm');
Route::get('/hasil', 'QuizController@result');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
