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

Route::get('/', 'HomeController@index')->name('scores.index');
Route::any('/scores/add', 'HomeController@create')->name('scores.create');
Route::get('/scores/destroy/{$id}', 'HomeController@destroy')->name('scores.destroy');
Route::get('/scores/edit', 'HomeController@edit')->name('scores.edit');

Route::any('/members', 'MembersController@index')->name('members.index');
Route::any('/members/add', 'MembersController@create')->name('members.create');
Route::any('/members/update/{id}', 'MembersController@edit')->name('members.edit');
