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
    $sessuser = session('user');
    $sessesadmin = session('esadmin');
    return view('usercrudview.menugestiouser',['sessuser'=>$sessuser, 'sessesadmin'=>$sessesadmin]);
});

Route::get('menuadmin', function(){
    $sessuser = session('user');
    $sessesadmin = session('esadmin');
    return view('menuadm',['sessuser'=>$sessuser, 'sessesadmin'=>$sessesadmin]);
});
Route::get('logout', function(){
    session()->forget('user');
    session()->forget('esadmin');
    return view('welcome',['logout'=>"Has sortit de la sessio correctament "]);
});

Route::get('menu', function(){
    $sessuser = session('user');
    $sessesadmin = session('esadmin');
    return view('menu',['sessuser'=>$sessuser, 'sessesadmin'=>$sessesadmin]);
});

Route::resource('users', userctl::class);

//ong's 

Route::get('menugestioong', function(){
    $sessuser = session('user');
    $sessesadmin = session('esadmin');
    return view('ongcrudview.menugestioong',['sessuser'=>$sessuser, 'sessesadmin'=>$sessesadmin]);
});

Route::resource('ongs', ongctl::class);

//soci's
Route::get('menugestiosoci', function(){
    $sessuser = session('user');
    $sessesadmin = session('esadmin');
    return view('socicrudview.menugestiosoci',['sessuser'=>$sessuser, 'sessesadmin'=>$sessesadmin]);
});

Route::resource('socis', socictl::class);

//formades
Route::get('menugestioformade', function(){
    $sessuser = session('user');
    $sessesadmin = session('esadmin');
    return view('formadecrudview.menugestioformade',['sessuser'=>$sessuser, 'sessesadmin'=>$sessesadmin]);
});
Route::get('formadeedit/{id}/{id2}', 'formadectl@edit');
Route::post('formadeup/{id}/{id2}', 'formadectl@update');
Route::post('formadedel/{id}/{id2}', 'formadectl@destroy');

Route::resource('formades', formadectl::class)->except(['destroy','update','edit']);

//treballadors
Route::get('menugestiotreballador', function(){
    $sessuser = session('user');
    $sessesadmin = session('esadmin');
    return view('treballadorcrudview.menugestiotreballador',['sessuser'=>$sessuser, 'sessesadmin'=>$sessesadmin]);
});

Route::resource('treballadors', treballadorctl::class);

//professionals
Route::get('menugestioprofessional', function(){
    $sessuser = session('user');
    $sessesadmin = session('esadmin');
    return view('professionalcrudview.menugestioprofessional',['sessuser'=>$sessuser, 'sessesadmin'=>$sessesadmin]);
});

Route::resource('professionals', professionalctl::class);

//voluntaris
Route::get('menugestiovoluntari', function(){
    $sessuser = session('user');
    $sessesadmin = session('esadmin');
    return view('voluntaricrudview.menugestiovoluntari',['sessuser'=>$sessuser, 'sessesadmin'=>$sessesadmin]);
});

Route::resource('voluntaris', voluntarictl::class);