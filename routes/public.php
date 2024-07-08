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


//Rutas formulario 0
Route::get('/form0', [Form0Controller::class, 'index'])->name('form0')->middleware('auth');

Route::middleware('finalizado')->group(function () {
//Rutas formulario 1

Route::get('/form1-formulario', [Form1Controller::class, 'index'])->name('form1-formulario')->middleware('auth');
Route::get('/form1-formulario/E/{estado}', [Form1Controller::class, 'cargarMunicipios'])->middleware('auth');
Route::get('/form1-formulario/M/{municipio}', [Form1Controller::class, 'cargarLocalidades'])->middleware('auth');
Route::post('/form1-formulario', [FormsController::class, 'form1Registro'])->name('form1-post')->middleware('auth');



//Rutas formulario 2
Route::get('/form2-formulario', [Form2Controller::class, 'index'])->name('form2-formulario')->middleware('auth');
Route::get('/form2-formulario/E/{estado}', [Form2Controller::class, 'cargarMunicipios'])->middleware('auth');
Route::get('/form2-formulario/M/{municipio}', [Form2Controller::class, 'cargarLocalidades'])->middleware('auth');
Route::post('/form2-formularior', [FormsController::class, 'form2Registro1'])->name('form2-post')->middleware('auth');
Route::post('/form2-formularior2', [FormsController::class, 'form2Registro2'])->name('form2-post2')->middleware('auth');
Route::post('/form2-formularior3', [FormsController::class, 'form2Registro3'])->name('form2-post3')->middleware('auth');

//Rutas formulario 3 form padre
Route::get('/form3-formulario', [Form3Controller::class, 'index'])->name('form3-formulario')->middleware('auth');
Route::get('/form3-formulario/E/{estado}', [Form3Controller::class, 'cargarMunicipios'])->middleware('auth');
Route::get('/form3-formulario/M/{municipio}', [Form3Controller::class, 'cargarLocalidades'])->middleware('auth');

Route::post('/form3-formulariov1', [Form3Controller::class, 'validarCurpPadre'])->name('form3-post1')->middleware('auth');
Route::post('/form3-formularior1', [FormsController::class, 'form3Registro1'])->name('form3-post2')->middleware('auth');
Route::delete('/form3-formularioe1', [FormsController::class, 'form3Registro1Eliminar'])->name('form3-post5')->middleware('auth');

Route::post('/form3-formulariov2', [Form3Controller::class, 'validarCurpMadre'])->name('form3-post3')->middleware('auth');
Route::post('/form3-formularior2', [FormsController::class, 'form3Registro2'])->name('form3-post4')->middleware('auth');
Route::delete('/form3-formularioe2', [FormsController::class, 'form3Registro2Eliminar'])->name('form3-postEM')->middleware('auth');

Route::post('/form3-formularior3', [FormsController::class, 'form3Registro3'])->name('form3-fam')->middleware('auth');

// Route::post('/form3-formulariov3', [Form3Controller::class, 'validarCurpCon'])->name('form3-post7')->middleware('auth');
// Route::post('/form3-formularior4', [FormsController::class, 'form3Registro4'])->name('form3-post8')->middleware('auth');
// Route::delete('/form3-formularioe3', [FormsController::class, 'form3Registro4Eliminar'])->name('form3-post9')->middleware('auth');
//Rutas formulario 4
Route::get('/form4-formulario', [Form4Controller::class, 'index'])->name('form4-formulario')->middleware('auth');
Route::get('/form4-formulario/E/{estado}', [Form4Controller::class, 'cargarMunicipios'])->middleware('auth');
Route::get('/form4-formulario/M/{municipio}', [Form4Controller::class, 'cargarEscuelas'])->middleware('auth');
Route::get('/form4-formulario/C/{escuela}', [Form4Controller::class, 'cargarCarreras'])->middleware('auth');
Route::post('/form4-formularior', [FormsController::class, 'form4Registro1'])->name('form4-post')->middleware('auth');
//Rutas formulario 5
Route::get('/form5-formulario', [Form5Controller::class, 'index'])->name('form5-formulario')->middleware('auth');
Route::post('/form5-formularior', [FormsController::class, 'form5RegistroTabla'])->name('form5-post')->middleware('auth');
Route::get('delete/{idtd}', [Form5Controller::class, 'delete_post'])->name('form5-delete')->middleware('auth');
Route::get('/form5-formulario/E/{estado}', [Form5Controller::class, 'cargarMunicipios'])->middleware('auth');

//Rutas formulario 6
Route::get('/form6-formulario', [Form6Controller::class, 'index'])->name('form6-formulario')->middleware('auth');
Route::get('/form6-formulario/E/{estado}', [Form6Controller::class, 'cargarMunicipios'])->middleware('auth');
Route::get('/form6-formulario/M/{municipio}', [Form6Controller::class, 'cargarLocalidades'])->middleware('auth');
Route::post('/form6-formulariov1', [Form6Controller::class, 'form6ValidarAval'])->name('form6-post1')->middleware('auth');
Route::post('/form6-formularior1', [FormsController::class, 'form6Registro1'])->name('form6-post2')->middleware('auth');
Route::delete('/form6-formularioE', [FormsController::class, 'form6Eliminar'])->name('form6-post3')->middleware('auth');

//Rutas formulario 7
Route::get('/form7-formulario', [Form7Controller::class, 'index'])->name('form7-formulario')->middleware('auth');
Route::post('/form7-formularior', [FormsController::class, 'form7Registro1'])->name('form7-post')->middleware('auth');
Route::post('/form7-formularior2', [FormsController::class, 'form7Registro2'])->name('form7-post2')->middleware('auth');
Route::post('/form7-formularior3', [FormsController::class, 'form7RegistroTabla'])->name('form7-post3')->middleware('auth');
Route::get('delete2/{id}', [Form7Controller::class, 'delete_post2'])->name('form7-delete')->middleware('auth');



//Rutas formulario 8
Route::get('/form8-formulario', [Form8Controller::class, 'index'])->name('form8-formulario')->middleware('auth');
Route::get('/form8-formulario/E/{estado}', [Form8Controller::class, 'cargarMunicipios'])->middleware('auth');
Route::get('/form8-formulario/M/{municipio}', [Form8Controller::class, 'cargarLocalidades'])->middleware('auth');
Route::post('/form8-formulariov1', [Form8Controller::class, 'form8ValidarR1'])->name('form8-post1')->middleware('auth');
Route::post('/form8-formularior1', [FormsController::class, 'form8Registro1'])->name('form8-post2')->middleware('auth');
Route::post('/form8-formulariov2', [Form8Controller::class, 'form8ValidarR2'])->name('form8-post3')->middleware('auth');
Route::post('/form8-formularior2', [FormsController::class, 'form8Registro2'])->name('form8-post4')->middleware('auth');
Route::delete('/form8-formularioe1', [FormsController::class, 'form8R1Eliminar'])->name('form8-post5')->middleware('auth');
Route::delete('/form8-formularioe2', [FormsController::class, 'form8R2Eliminar'])->name('form8-post6')->middleware('auth');
//Rutas formulario 9
Route::get('/form9-formulario', [Form9Controller::class, 'index'])->name('form9-formulario')->middleware('auth');
Route::get('/form9-formulario/E/{estado}', [Form9Controller::class, 'cargarMunicipios'])->middleware('auth');
Route::get('/form9-formulario/M/{municipio}', [Form9Controller::class, 'cargarLocalidades'])->middleware('auth');
Route::post('/form9-formularior', [FormsController::class, 'form9Registro1'])->name('form9-post')->middleware('auth');
Route::post('/form9-formularior2', [FormsController::class, 'form9Registro2'])->name('form9-post2')->middleware('auth');
Route::post('/form9-formularior3', [FormsController::class, 'form9Registro3'])->name('form9-post3')->middleware('auth');
//Rutas formulario 10
Route::get('/form10-formulario', [Form10Controller::class, 'index'])->name('form10-formulario')->middleware('auth');

Route::post('/form10-formularior', [FormsController::class, 'form10Registro1'])->name('form10-post')->middleware('auth');

//Rutas formulario 11
Route::get('/form11-formulario', [Form11Controller::class, 'index'])->name('form11-formulario')->middleware('auth');

Route::post('/form11-formulariov', [Form11Controller::class, 'form11Validacion'])->name('form11-validation')->middleware('auth');

});
//Rutas form 12
Route::get('/form12', function() {
    return view('layouts-form.form12');
})->name('form12');

?>