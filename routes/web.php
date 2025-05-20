<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;

Route::get('/', function () {
    return view('welcome');
});

Route::view('registrate', 'registrate')->name('registrate');
Route::view('login', 'login')->name('login');
Route::view('contenido', 'contenido.contenido')->name('contenido');

Route::post('registrate', [LoginController::class, 'register'])->name('registrate.register');
Route::post('login', [LoginController::class, 'login'])->name('login.login');
Route::get('logout', [LoginController::class, 'destroy'])->name('logout.destroy');
