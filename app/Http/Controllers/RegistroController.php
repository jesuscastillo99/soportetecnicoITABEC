<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Mail\EnviarContraseñaGenerada;
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

    $password = Str::random(10);


    // Crea una nueva instancia del modelo Usuario
    $nuevoUsuario = new Usuario;
    $nuevoUsuario->curp = $request->curp;
    $nuevoUsuario->correo = $request->correo;
    $nuevoUsuario->contraseña = $password;// Hashea la contraseña antes de guardarla
    $nuevoUsuario->save();

    // Redirigir al usuario a una página de éxito o a donde desees
    return redirect()->route('exito'); // Cambia 'inicio' por la ruta deseada
}

}
