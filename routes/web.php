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

//Auth Routes
Route::get('login','authCtrl@login');
Route::get('signup','authCtrl@signup');
Route::get('logout','authCtrl@logout');


Route::post('login','authCtrl@doLogin')->name('doLogin');
Route::post('signup','authCtrl@doSignup')->name('doSignup');



// *********************************************************
// Front-end Routes
Route::get('/', 'frontEnd\appCtrl@index');
Route::get('catigories', 'frontEnd\appCtrl@cat');
Route::get('styles', 'frontEnd\appCtrl@styles');
Route::get('about', 'frontEnd\appCtrl@about');
Route::get('contact', 'frontEnd\appCtrl@contact');



// **************************************************************
