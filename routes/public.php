<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\VistasController;
use Illuminate\Support\Facades\Auth;

//Auth::routes();

//Rutas para el registro
Route::get('/registro', function() {
    return view('layouts.registro');
})->name('registro');

Route::post('registro', [RegistroController::class, 'registro']);

//Rutas para el login
Route::get('/login', function() {
    return view('layouts.login');
})->name('login');

Route::post('/login', [LoginController::class, 'login']);




















?>