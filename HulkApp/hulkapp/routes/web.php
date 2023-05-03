<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


// login
Route::get('/',function () {
    return view('login');
});


// register 

Route::get('/register',function () {
    return view('register/register');
});


// main page
Route::get('/main',function () {
    return view('main');
});

// user Details
Route::get('/userdetails',function () {
    return view('userdetails');
});

// user Details
Route::get('/deleted',function () {
    return view('deleted');
});

// Secret Admin Panel
Route::get('/secret/admin',function () {
    return view('/secret/admin');
});
