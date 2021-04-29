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
//Back-end Routes
Route::get('admin','backEnd\cpCtrl@index');

//members Routes
Route::get('admin/users','backEnd\usersCtrl@index');
Route::get('admin/users/edit/{id}','backEnd\usersCtrl@edit');



//catigoties Routes
Route::get('admin/catigories','backEnd\catCtrl@index');
Route::get('admin/catigories/add','backEnd\catCtrl@add');
Route::post('admin/catigories/add','backEnd\catCtrl@store');
Route::get('admin/catigories/edit/{id}','backEnd\catCtrl@edit');
Route::post('admin/catigories/edit/{id}','backEnd\catCtrl@update');
Route::post('admin/catigories/destroy/{id}','backEnd\catCtrl@destroy');

//articals Routes
Route::get('admin/articals','backEnd\artCtrl@index');
Route::get('admin/articals/add','backEnd\artCtrl@add');
Route::post('admin/articals/add','backEnd\artCtrl@store');
Route::get('admin/articals/edit/{id}','backEnd\artCtrl@edit');
Route::post('admin/articals/edit/{id}','backEnd\artCtrl@update');
Route::post('admin/articals/destroy/{id}','backEnd\artCtrl@destroy');