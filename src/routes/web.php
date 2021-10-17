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
    return view('welcome');
});
Route::get('/register', function () {
    return view('register');
});
Route::post('/register', 'App\Http\Controllers\AuthController@register')->name('register');
Route::get('/login', 'App\Http\Controllers\AuthController@index')->name('relogin');
Route::post('/login', 'App\Http\Controllers\AuthController@login')->name('login');
Route::get('/logout', 'App\Http\Controllers\AuthController@logout')->name('logout');

Route::middleware(['user'])->group(function () {
    Route::get('home', 'App\Http\Controllers\AuthController@home')->name('home');
    Route::namespace('App\Http\Controllers\Api')->group(function () {
        Route::get('students','StudentController@index')->name('students.index');
        Route::delete('students/{student}','StudentController@destroy')->name('students.destroy');
        Route::put('students/{student}','StudentController@update')->name('students.update');
        Route::post('students','StudentController@store')->name('students.store');
        Route::get('classs','ClasssController@index')->name('classs.index');
        Route::delete('classs/{classs}','ClasssController@destroy')->name('classs.destroy');
        Route::put('classs/{classs}','ClasssController@update')->name('classs.update');
        Route::post('classs','ClasssController@store')->name('classs.store');
        Route::get('countStudent/{classs}', 'ClasssController@countStudentInClass');
        Route::get('studentInClass/{classs}', 'ClasssController@studentInClass')->name('classs.student');
        Route::get('studentAllClass', 'ClasssController@allStudentAllClass');
        Route::get('addstudents', 'StudentController@create')->name('students.create');
        Route::get('students/{student}', 'StudentController@edit')->name('students.edit');
        Route::get('addclass', 'ClasssController@create')->name('classs.create');
        Route::get('classs/{classs}', 'ClasssController@edit')->name('classs.edit');
    });
});





