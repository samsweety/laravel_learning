<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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

Route::get('/user','userController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/upload','userController@uploadAvatar');

Route::get('/todo','TodoController@index')->name('todo.index');

Route::get('/todo/create','TodoController@create');

Route::get('/todo/{todo}/edit','TodoController@edit');

Route::patch('/todo/{todo}/update','TodoController@update')->name('todo.update');

Route::post('/todo/create','TodoController@store');

Route::put('/todo/{todo}/complete','TodoController@complete')->name('todo.complete');