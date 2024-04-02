<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ConferencesController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login.form');
Route::post('login', [LoginController::class, 'login'])->name('login');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::resource('/home', ConferencesController::class)->except(['conferencesTable']);

Route::get('conferences/table', [ConferencesController::class, 'conferencesTable']);

Route::get('/auth-status', function () {
    return response()->json(['authenticated' => Auth::check()]);
});

Route::get('/home/{id}/delete', [ConferencesController::class, 'destroy']);