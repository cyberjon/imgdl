<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

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

Route::post('show', 'ImageController@show');
Route::get('upload', 'ImageController@upload');
Route::post('upload', 'ImageController@storeUpload');
Route::get('download', 'ImageController@download');
Route::post('download', 'ImageController@storeDownload');
Route::get('/', 'ImageController@index')->name('index');
