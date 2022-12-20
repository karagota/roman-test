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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::any('/json-store', [App\Http\Controllers\JsonStoreController::class, 'storeJson'])->middleware('auth:sanctum');

Route::get('/admin',  [App\Http\Controllers\AdminController::class, 'index'])->name('admin');

Route::get('/admin/{jsData}/delete',   [App\Http\Controllers\AdminController::class, 'delete']);
Route::get('/admin/{jsData}/edit',   [App\Http\Controllers\AdminController::class, 'edit']);
Route::get('/admin/{jsData}/save',   [App\Http\Controllers\AdminController::class, 'save']);
