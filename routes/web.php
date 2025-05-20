<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;

Route::get('/', function () {
    return view('welcome');
});

// Gracias a middleware('guest'), si ya hay una sesión iniciada no te va a dejar acceder a las vistas de name()
Route::view('registrate', 'registrate')->middleware('guest')->name('registrate');
Route::view('login', 'login')->middleware('guest')->name('login');
// Gracias al middleware('auth'), si el usuario tiene una sección activa va a poder acceder al contenido
Route::view('contenido', 'contenido.contenido')->middleware('auth')->name('contenido');

Route::post('registrate', [LoginController::class, 'register'])->name('registrate.register');
Route::post('login', [LoginController::class, 'login'])->name('login.login');
Route::get('logout', [LoginController::class, 'destroy'])->name('logout.destroy');
