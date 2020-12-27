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



Route::get('/', function () {
    return view('welcome');
});
Route::get('/admin-test', function () {
    return view('admin.index');
});
Route::prefix('/admin')->group(function () {
    Route::resource('aspect', 'AspectController');
    Route::resource('statement', 'statementController');
    Route::resource('quisioner', 'QuisionerController');
});
// Route::get('/aspect', 'AspectController@index');
Route::get('/kuisioner', 'QuizController@index');
Route::post('/kuisioner', 'QuizController@saveQuiz');
Route::get('/motivation', 'QuizController@motivationForm');
Route::post('/motivation', 'QuizController@savemotivationForm');
Route::get('/hasil', 'QuizController@result');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
