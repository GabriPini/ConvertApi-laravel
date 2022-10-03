<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileController;
use Illuminate\Support\Facades\Auth;
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


Route::get('/', 'HomeController@index')->name('home');
/**
* File Upload Routes
*/
Route::get('/', 'FilesController@index')->name('files.index');
Route::get('/add', 'FilesController@create')->name('files.create');
Route::post('/add', 'FilesController@store')->name('files.store');
Route::delete('/{id}', 'FilesController@destroy')->name('files.destroy');



Auth::routes();


