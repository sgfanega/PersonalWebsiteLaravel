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

// StockPredictor Page Views
Route::get('/stockpredictor', 'StockPredictorController@index');
Route::post('/stockpredictor', 'StockPredictorController@addQueryStrings');

// Redirect / to /homepage
Route::get('/', 'HomepageController@index')->name('homepage');

// Homepage Page Views
Route::resource('homepage', 'HomepageController');

//Projects Page Views
Route::resource('projects', 'ProjectsController');

// Home Login Redirect
Route::get('home', function () {
    return redirect('/');
});

// Register Redirect
Route::get('register', function () {
    return redirect('/');
});

Auth::routes();