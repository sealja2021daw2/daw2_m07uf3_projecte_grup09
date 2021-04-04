<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userctl;


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

Route::post('acceslogin','userctl@login');
Route::post('changepassword','userctl@changepassword');


Route::get('viewchangepassword', function(){
    return view('changepassword');
});

