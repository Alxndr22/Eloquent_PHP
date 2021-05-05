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

Route::get('/', 'App\Http\Controllers\PageController@getMain');

Route::get('/tables', 'App\Http\Controllers\PageController@getTables');

Route::get('/wardrobes', 'App\Http\Controllers\PageController@getWardrobes');

Route::get('/warehouses', 'App\Http\Controllers\PageController@getWarehouses');

Route::get('search/{field}={sch}', 'App\Http\Controllers\PageController@getSearch');





