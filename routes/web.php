<?php

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



//Users 
Route::get('/getregister', [App\Http\Controllers\UserController::class, 'createregister']);
Route::post('/register', [App\Http\Controllers\UserController::class, 'storeregister']);
Route::get('/getlogin', [App\Http\Controllers\UserController::class, 'createlogin']);
Route::post('/login', [App\Http\Controllers\UserController::class, 'storelogin']);
Route::get('/viewusers', [App\Http\Controllers\UserController::class, 'view']);
Route::post('/updaterole/{id}', [App\Http\Controllers\UserController::class, 'updateRole']);
Route::get('/editusers/{id}', [App\Http\Controllers\UserController::class, 'edit']);
Route::post('/updateusers/{id}', [App\Http\Controllers\UserController::class, 'update']);
Route::get('/deleteusers/{id}', [App\Http\Controllers\UserController::class, 'delete']);


//Widgets
Route::get('/createwidgets', [App\Http\Controllers\WidgetsController::class, 'creatWidgets']);

