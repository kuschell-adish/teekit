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
    return view('authentication.signup');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/login/view', function () {
    return view('authentication.login');
});

//email notif
Route::get('/mail/send', [CustomerController::class, 'index']);

//verification with email address view 
Route::get('/verification', [CustomerController::class, 'verification']);

//resend email 
Route::get('/mail/resend', [CustomerController::class, 'resend']);

//get customer or user forms 
Route::get('/forms', [CustomerController::class, 'forms']);

//post data to database
Route::post('/customer/register', [CustomerController::class, 'register']); 

//post data to database
Route::post('/user/register', [UserController::class, 'register']); 


