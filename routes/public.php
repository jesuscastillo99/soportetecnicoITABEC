<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ActivationController;
use App\Http\Controllers\DatosController;
use App\Http\Controllers\Form1Controller;
use App\Http\Controllers\Form2Controller;
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

//Ruta de noticias
Route::get('/noticias', function() {
    return view('layouts.noticias');
})->name('noticias');


//Rutas formulario 0
Route::get('/form0', function() {
    return view('layouts-form.form0');
})->name('form0')->middleware('auth');

//Rutas formulario 1

Route::get('/form1-formulario', [Form1Controller::class, 'index'])->name('form1-formulario')->middleware('auth');
Route::get('/form1-formulario/E/{estado}', [Form1Controller::class, 'cargarMunicipios'])->middleware('auth');
Route::get('/form1-formulario/M/{municipio}', [Form1Controller::class, 'cargarLocalidades'])->middleware('auth');
//Route::get('/form1-formulario/cargar', [Form1Controller::class, 'mostrarLocalidad'])->middleware('auth');
Route::post('/form1-formulario', [FormsController::class, 'form1Registro'])->name('form1-post')->middleware('auth');



//Rutas formulario 2
Route::get('/form2-formulario', [Form2Controller::class, 'index'])->name('form2-formulario')->middleware('auth');
Route::get('/form2-formulario/E/{estado}', [Form2Controller::class, 'cargarMunicipios'])->middleware('auth');
Route::get('/form2-formulario/M/{municipio}', [Form2Controller::class, 'cargarLocalidades'])->middleware('auth');
Route::post('/form2Registro', [FormsController::class, 'form2Registro'])->name('form2-post')->middleware('auth');



//Rutas formulario 4
Route::get('/form4', function() {
    return view('layouts-form.form4');
})->name('form4');













?>