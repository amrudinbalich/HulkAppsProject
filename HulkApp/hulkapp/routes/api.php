<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MovieController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// ----------- Authentication --------- //

Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login',[AuthController::class,'tryLogin']);
});


// ----------- User API Map ----------- //

Route::group([
    // setting prefix api 
    // so it would be domain.com/api/register
    'prefix' => '/user'
], function () {
    Route::post('/registerUser', [UserController::class, 'createUser']);
    Route::get('/getAllUsers', [UserController::class, 'getAllUsers']);
    Route::get('/getUser/{user}', [UserController::class, 'getUser']);
    Route::post('/updateUser/{name}', [UserController::class, 'updateUser']); 
    Route::delete('/deleteUser/{name}', [UserController::class, 'deleteUser']); 
});


// ----------- Movie Api map ----------- //

Route::group([
    // setting prefix api 
    // so it would be domain.com/api/movie/endURI
    'prefix' => '/movie'
], function () {
    Route::post('/registerMovie', [MovieController::class, 'registerMovie']);
    Route::post('/followMovie/{id}', [MovieController::class, 'followMovie']); 
    Route::post('/updateMovie/{id}', [MovieController::class, 'updateMovie']);
    Route::get('/getAllMovies', [MovieController::class, 'getAllMovies']);
    Route::get('/getMovie/{id}', [MovieController::class, 'getMovie']);
    Route::delete('/deleteMovie/{id}', [MovieController::class, 'deleteMovie']);
});
