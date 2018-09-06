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

Route::get('/calculator', function () {
    return view('calculator');
});

Route::post('enter', '\App\ReversePolishNotation@enter')->name('enter');
Route::post('operation', '\App\ReversePolishNotation@performCalculation')->name('operation');
