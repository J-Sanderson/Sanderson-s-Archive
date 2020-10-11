<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ImageController;

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

Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');
Route::post('/users/{id}', [UserController::class, 'update'])->name('users.update');
Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');

Route::get('/latest', [ImageController::class, 'index'])->name('images.index');
Route::get('/images/upload', [ImageController::class, 'create'])->name('images.create')->middleware('auth');
Route::post('/images/upload', [ImageController::class, 'store'])->name('images.store')->middleware('auth');
Route::get('/images/edit/{id}', [ImageController::class, 'edit'])->name('images.edit')->middleware('auth');
Route::put('/images/edit/{id}', [ImageController::class, 'update'])->name('images.update')->middleware('auth');
Route::delete('/images/{id}', [ImageController::class, 'destroy'])->name('images.destroy')->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
