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
//users
Route::post('acceslogin','userctl@login');
Route::post('changepassword','userctl@changepassword');


Route::get('viewchangepassword', function(){
    return view('changepassword');
});


Route::get('menugestiouser', function(){
    return view('usercrudview.menugestiouser');
});

Route::get('menuadmin', function(){
    return view('menuadm');
});
Route::resource('users', userctl::class);

//ong's 

Route::get('menugestioong', function(){
    return view('ongcrudview.menugestioong');
});

Route::resource('ongs', ongctl::class);

//soci's
Route::get('menugestiosoci', function(){
    return view('socicrudview.menugestiosoci');
});

Route::resource('socis', socictl::class);

//formades
Route::get('menugestioformade', function(){
    return view('formadecrudview.menugestioformade');
});
Route::get('formadeedit/{id}/{id2}', 'formadectl@edit');
Route::post('formadeup/{id}/{id2}', 'formadectl@update');
Route::post('formadedel/{id}/{id2}', 'formadectl@destroy');

Route::resource('formades', formadectl::class)->except(['destroy','update','edit']);