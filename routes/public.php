<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ActivationController;
use App\Http\Controllers\DatosController;
use App\Http\Controllers\BitacoraController;
use App\Http\Controllers\Form0Controller;
use App\Http\Controllers\Form1Controller;
use App\Http\Controllers\Form2Controller;
use App\Http\Controllers\Form3Controller;
use App\Http\Controllers\Form4Controller;
use App\Http\Controllers\Form5Controller;
use App\Http\Controllers\Form6Controller;
use App\Http\Controllers\Form7Controller;
use App\Http\Controllers\Form8Controller;
use App\Http\Controllers\Form9Controller;
use App\Http\Controllers\Form10Controller;
use App\Http\Controllers\Form11Controller;
use App\Http\Controllers\FormsController;
use App\Http\Controllers\UbicacionController;
use App\Http\Controllers\VistasController;
use Illuminate\Support\Facades\Auth;
//Rutas inicio
Route::get('/inicio', function() {
    return view('layouts.inicio');
})->name('inicio')->middleware('auth');

//Rutas para el login
Route::get('/login', function() {
    return view('layouts.login');
})->name('login')->middleware('guest');

Route::post('/login', [LoginController::class, 'login']);

//Rutas logout
Route::get('/logout', function() {
    return view('layouts.login');
})->name('logout');

Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/error', function() {
    return view('layouts.error');
})->name('error');


//Rutas para el registro
Route::get('/registro', function() {
    return view('layouts.registro');
})->name('registro');

Route::post('/registro', [RegistroController::class, 'registro']);

//Ruta exito
Route::get('/exito', function() {
    return view('layouts.exito');
})->name('exito');

//Ruta para validación de correo
Route::get('/activate/{token}', [ActivationController::class, 'activate'])->name('activate');

//Ruta de acerca de
Route::get('/acercade', function() {
    return view('layouts.acercade');
})->name('acercade');

//Ruta de noticias
Route::get('/noticias', function() {
    return view('layouts.noticias');
})->name('noticias');

//Ruta para crear noticias
Route::get('/noticias-admin', function() {
    return view('layouts.noticiasadmin');
})->name('noticiasadmin');

//Ruta para bitacoras
Route::get('/bitacoras', [BitacoraController::class, 'index'])->name('bitacoras');
Route::get('/bitacoras/create', [BitacoraController::class, 'create'])->name('bitacoras.create');
Route::post('/bitacoras/create/c', [BitacoraController::class, 'store'])->name('bitacoras.store');

//Rutas para equipos
Route::get('/equipos', [BitacoraController::class, 'index2'])->name('equipos');
Route::get('/equipos/create', [BitacoraController::class, 'create2'])->name('equipos.create');
Route::post('/equipos/create/c', [BitacoraController::class, 'store2'])->name('equipos.store');
?>