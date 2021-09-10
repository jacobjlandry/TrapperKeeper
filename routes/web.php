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

// Eventually we'll have more here than just a schedule keeper so the homepage will change, but for now we need a place to land.
Route::get('/', 'App\Http\Controllers\ScheduleController@index')->name('schedule.index');
Route::get('/schedule/{schedule}', 'App\Http\Controllers\ScheduleController@show')->name('schedule.show');
