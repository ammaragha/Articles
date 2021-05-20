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




// **************************************************************
//Back-end Routes
Route::get('/','backEnd\cpCtrl@index');

//members Routes
Route::get('users','backEnd\usersCtrl@index');
Route::post('users/destroy/{id}','backEnd\usersCtrl@destroy');
Route::get('users/edit/{id}','backEnd\usersCtrl@edit');
Route::post('users/edit/{id}','backEnd\usersCtrl@update');



//catigoties Routes
Route::get('catigories','backEnd\catCtrl@index');
Route::get('catigories/add','backEnd\catCtrl@add');
Route::post('catigories/add','backEnd\catCtrl@store');
Route::get('catigories/edit/{id}','backEnd\catCtrl@edit');
Route::post('catigories/edit/{id}','backEnd\catCtrl@update');
Route::post('catigories/destroy/{id}','backEnd\catCtrl@destroy');

//articals Routes
Route::get('articals','backEnd\artCtrl@index');
Route::get('articals/add','backEnd\artCtrl@add');
Route::post('articals/add','backEnd\artCtrl@store');
Route::get('articals/edit/{id}','backEnd\artCtrl@edit');
Route::post('articals/edit/{id}','backEnd\artCtrl@update');
Route::post('articals/destroy/{id}','backEnd\artCtrl@destroy');

//Slider Routes
Route::get('slider','backEnd\sliderCtrl@index');
Route::get('slider/add','backEnd\sliderCtrl@add');
Route::post('slider/add','backEnd\sliderCtrl@store');
Route::get('slider/edit/{id}','backEnd\sliderCtrl@edit');
Route::post('slider/edit/{id}','backEnd\sliderCtrl@update');
Route::post('slider/destroy/{id}','backEnd\sliderCtrl@destroy');

// Messages Routes
Route::get('messages','backEnd\mesgCtrl@index');
Route::get('messages/show/{id}','backEnd\mesgCtrl@show');
Route::post('messages/destroy/{id}','backEnd\mesgCtrl@destroy');



// Sittings Route
Route::get('sittings','backEnd\sittCtrl@index');
Route::post('sittings','backEnd\sittCtrl@update');