<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', fn() => view('test'))->name('url.test');
Route::resource('users', 'UserController');
Route::resource('students', 'StudentController');
Route::resource('todos', 'TodoController')->middleware('auth');

Auth::routes();






Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
