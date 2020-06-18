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

// Redirect / to /homepage
Route::get('/', 'HomepageController@index')->name('homepage');

// Homepage Page Views
Route::resource('homepage', 'HomepageController');

// Resume Page Views
Route::resource('resume', 'ResumeController');

//About Me Page Views
Route::resource('aboutme', 'AboutMeController');

// Home Login Redirect
Route::get('home', function () {
    return redirect('/');
});

Auth::routes();