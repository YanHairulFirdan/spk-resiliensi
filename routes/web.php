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


// 
Route::get('/', 'HomeController@index');
Route::get('/welcome', 'HomeController@welcome');
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
        Route::get('user/{user}/edit', 'studentController@edit');
        Route::get('teacher', 'teacherManagement@index');
        Route::get('teacher/{teacher}/edit', 'teacherManagement@edit');
        Route::get('teacher/{teacher}', 'teacherManagement@update');
        Route::delete('teacher/{teacher}', 'teacherManagement@destroy');
        Route::put('user/{user}', 'studentController@update');
        Route::put('teacher/{teacher}', 'teacherManagement@update');
        Route::get('answear/downloadexcel', 'AnswearController@export');
        Route::get('answear/scoresexcel', 'AnswearController@exportscore');
        Route::get('student', 'studentController@index')->name('admin.student');
        Route::delete('student/{user}', 'studentController@destroy');
        Route::get('student/download', 'studentController@download')->name('admin.student');
        Route::get('answear/test', 'AnswearController@test');
        Route::post('tip/import', 'TipController@uploadExcel');
        Route::post('link/import', 'LinkController@import');
        Route::resource('statement', 'statementController');
        Route::resource('link', 'LinkController');
        Route::resource('quisioner', 'QuisionerController');
        Route::resource('tip', 'TipController');
    });
});
// Route::get('/aspect', 'AspectController@index');
Route::get('/kuisioner', 'Quizcontroller@index')->name('user.quiz.index');
Route::post('/kuisioner', 'Quizcontroller@saveQuiz')->name('user.quiz.post');
// Route::get('/motivation', 'Quizcontroller@motivationForm')->name('user.motivation.index');
// Route::post('/motivation', 'Quizcontroller@savemotivationForm')->name('user.motivation.post');
Route::get('/hasil', 'Quizcontroller@result')->name('user.quiz.result');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
