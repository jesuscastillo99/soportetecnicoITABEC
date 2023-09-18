<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\VistasController;
use Illuminate\Support\Facades\Auth;

//Auth::routes();

Route::get('/login', function() {
    return view('layouts.login');
})->name('login');

Route::post('/login', [LoginController::class, 'login']);




















?>