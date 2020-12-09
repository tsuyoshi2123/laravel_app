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

Route::get('/', function () {
    return view('welcome');
});

Route::post('testform', function () {
    return view('lv2form');
});

Route::resource('todo', 'TodoController');//
Route::resource('gizumo', 'Lev_1Controller');//
Route::resource('gizumo_lv2', 'Lv2Controller');//
Route::resource('gizumo_lv4', 'Lv2Controller');//

Auth::routes();



Route::get('/home', 'HomeController@index')->name('home');