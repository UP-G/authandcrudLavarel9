<?php

use App\Http\Controllers\UsersController;
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

Route::redirect('/', 'users');
Route::resource('users', UsersController::class);
Route::redirect('home', '/');

Auth::routes();

Route::get('/user', [App\Http\Controllers\HomeController::class, 'users'])->name('user');
