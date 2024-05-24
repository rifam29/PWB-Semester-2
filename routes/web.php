<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CastController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [UserController::class, 'index'])->name('user.login'); // GET route for login form
Route::post('/login', [UserController::class, 'login'])->name('user.login.post'); // POST route for login submission
Route::get('/logout', [UserController::class, 'logout'])->name('user.logout');

Route::controller(CastController::class)->group(function () {
    Route::get('/cast', 'index')->name('cast.index');
    Route::get('/cast/create', 'create')->name('cast.create');
    Route::post('/cast', 'store')->name('cast.store');
    Route::get('/cast/{cast}/edit', 'edit')->name('cast.edit');
    Route::get('/cast/{cast}', 'show')->name('cast.show');
    Route::put('/cast/{cast}', 'update')->name('cast.update');
    Route::delete('/cast/{cast}', 'delete')->name('cast.delete');
});

Route::resource('cast', CastController::class);