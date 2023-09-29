<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ActivationController;
use App\Http\Controllers\VistasController;
use Illuminate\Support\Facades\Auth;

//Auth::routes();

//Rutas para el registro
Route::get('/registro', function() {
    return view('layouts.registro');
})->name('registro');

Route::post('/registro', [RegistroController::class, 'registro']);

//Rutas para el login
Route::get('/login', function() {
    return view('layouts.login');
})->name('login')->middleware('guest');

Route::post('/login', [LoginController::class, 'login']);

//Ruta exito
Route::get('/exito', function() {
    return view('layouts.exito');
})->name('exito');

//Rutas inicio
Route::get('/inicio', function() {
    return view('layouts.inicio');
})->name('inicio')->middleware('auth');
//Rutas logout
Route::get('/logout', function() {
    return view('layouts.login');
})->name('logout');

Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/error', function() {
    return view('layouts.error');
})->name('error');

//Ruta solicitar crédito
Route::get('/solicitar', function() {
    return view('layouts.solicitarcredito');
})->name('solicitar');

//Ruta de noticias
Route::get('/noticias', function() {
    return view('layouts.noticias');
})->name('noticias');

//Rutas formulario
Route::get('/form2', function() {
    return view('layouts-form.form2');
})->name('form2');

Route::get('/form4', function() {
    return view('layouts-form.form4');
})->name('form4');

//Ruta para validación de correo
Route::get('/activate/{token}', [ActivationController::class, 'activate'])->name('activate');

// Route::get('/activation', function() {
//     return view('layouts.activation');
// })->name('activation');









?>