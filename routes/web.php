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

Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'show'])
    ->name('login');
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'handle'])
    ->name('login');
Route::post('/logout', [App\Http\Controllers\Auth\LogoutController::class, 'handle'])
    ->name('logout');

Route::redirect('/', '/contacts', 301);
Route::resource('contacts', App\Http\Controllers\ContactController::class);
