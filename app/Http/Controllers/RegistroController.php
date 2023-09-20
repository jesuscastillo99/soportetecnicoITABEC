<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Usuario; // Asegúrate de importar el modelo 

class RegistroController extends Controller
{




public function registro(Request $request)
{
    // Validación de datos del formulario
    $request->validate([
        'curp' => 'required|unique:usuarios,curp',
        'correo' => 'required|email|unique:usuarios,correo',
    ]);

    // Crear una nueva instancia del modelo Usuario
    $nuevoUsuario = new Usuario;
    $nuevoUsuario->curp = $request->curp;
    $nuevoUsuario->correo = $request->correo;
    $nuevoUsuario->save();

    // Redirigir al usuario a una página de éxito o a donde desees
    return redirect()->route('exito'); // Cambia 'inicio' por la ruta deseada
}

}
