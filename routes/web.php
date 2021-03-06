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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('/admin')->group(function(){
    Route::get('/index','AdminController@index');
    Route::get('/main','AdminController@main');
    Route::get('/left','AdminController@left');
    Route::get('/head','AdminController@head');
});

Route::prefix('/banner')->group(function(){
    Route::get('/add','BannerController@add');
    Route::any('/do_add','BannerController@do_add');
    Route::any('/list','BannerController@list');
    Route::any('/del','BannerController@del');
    Route::any('/upd/{id}','BannerController@upd');
    Route::any('/do_upd','BannerController@do_upd');
});

Route::prefix('/category')->group(function(){
    Route::get('/add','CategoryController@add');
    Route::any('/create','CategoryController@create');
    Route::any('/index','CategoryController@index');
    Route::any('/delete','CategoryController@delete');
    Route::any('/edit/{id}','CategoryController@edit');
    Route::any('/update','CategoryController@update');
    Route::any('/jidian','CategoryController@jidian');
});

