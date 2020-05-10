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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/lab', 'LabController@index')->name('lab.index');

Route::get('/lab/create', 'LabController@create')->name('lab.create');

Route::post('/lab', 'LabController@store')->name('lab.store');

Route::get('/lab/{lab}', 'LabController@show')->name('lab.show');

Route::get('/lab/{lab}/edit', 'LabController@edit')->name('lab.edit');

Route::patch('/lab/{lab}', 'LabController@update')->name('lab.update');

Route::delete('/lab/{lab}', 'LabController@destroy')->name('lab.destroy');
