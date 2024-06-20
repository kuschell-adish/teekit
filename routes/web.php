<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('authentication.login');
});

Route::get('/verify', function () {
    return view('authentication.verify');
});


//email notif
Route::get('/mail/send', [CustomerController::class, 'index']);


//post data to database
Route::post('/customer/register', [CustomerController::class, 'register']); 

//post data to database
Route::post('/user/register', [UserController::class, 'register']); 

//login as superuser
Route::post('/process', [UserController::class, 'process']); 


Route::get('/customer/forms', [CustomerController::class, 'forms']); 

Route::get('/user/forms', [UserController::class, 'forms']); 

