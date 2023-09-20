<?php

namespace App\Http\Controllers;
use App\resources\views\auth\register;
use Illuminate\Http\Request;
use App\Models\Curp; // Asegúrate de importar el modelo 

class RegistroController extends Controller
{


public function showRegistroForm()
{
    return view('register'); // Reemplaza 'registro' con el nombre de tu vista de registro
}

public function registro(Request $request)
{
    // Validación de datos del formulario
    $request->validate([
        'curp' => 'required|unique:curps,curp',
        'correo' => 'required|email|unique:curps,correo',
    ]);

    // Crear una nueva instancia del modelo Usuario
    $nuevoUsuario = new Curp;
    $nuevoUsuario->curp = $request->curp;
    $nuevoUsuario->correo = $request->correo;
    $nuevoUsuario->save();

    // Redirigir al usuario a una página de éxito o a donde desees
    return redirect()->route('exito'); // Cambia 'inicio' por la ruta deseada
}

}
