<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CastController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [UserController::class, 'index'])->name('user.login'); // GET route for login form
Route::post('/login', [UserController::class, 'login'])->name('user.login.post'); // POST route for login submission
Route::get('/logout', [UserController::class, 'logout'])->name('user.logout');

// Define routes for CastController manually or use Route::resource but not both.
Route::controller(CastController::class)->group(function () {
    Route::get('/cast', 'index')->name('cast.index');
    Route::get('/cast/create', 'create')->name('cast.create');
    Route::post('/cast', 'store')->name('cast.store');
    Route::get('/cast/{cast}/edit', 'edit')->name('cast.edit');
    Route::get('/cast/{cast}', 'show')->name('cast.show');
    Route::put('/cast/{cast}', 'update')->name('cast.update');
    Route::delete('/cast/{cast}', 'delete')->name('cast.delete');
});

// Alternatively, use Route::resource for a full set of RESTful routes.
Route::resource('cast', CastController::class);

// Define routes for AuthController if it has different functionalities from CastController
Route::controller(AuthController::class)->group(function () {
    Route::get('/auth', 'index')->name('auth.index');
    Route::get('/auth/create', 'create')->name('auth.create');
    Route::post('/auth', 'store')->name('auth.store');
    Route::get('/auth/{auth}/edit', 'edit')->name('auth.edit');
    Route::get('/auth/{auth}', 'show')->name('auth.show');
    Route::put('/auth/{auth}', 'update')->name('auth.update');
    Route::delete('/auth/{auth}', 'delete')->name('auth.delete');
});

// Alternatively, use Route::resource for a full set of RESTful routes.
Route::resource('auth', AuthController::class);