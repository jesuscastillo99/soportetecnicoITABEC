<?php


// use Illuminate\Http\Request;
// use Illuminate\Support\Str;
// use App\Mail\EnviarContraseñaGenerada;
// use App\Models\Usuario; // Asegúrate de importar el modelo 

namespace App\Http\Controllers;
use App\Models\Usuario; // Asegúrate de importar el modelo Usuario adecuadamente
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Mail\ActivationMail;


class RegistroController extends Controller
{




// public function registro(Request $request)
// {
    
//     // Validación de datos del formulario
//     $request->validate([
//         'curp' => 'required|unique:usuarios,curp',
//         'correo' => 'required|email|unique:usuarios,correo',
//     ]);

//     $password = Str::random(10);


//     // Crea una nueva instancia del modelo Usuario
//     $nuevoUsuario = new Usuario;
//     $nuevoUsuario->curp = $request->curp;
//     $nuevoUsuario->correo = $request->correo;
//     $nuevoUsuario->contraseña = $password;// Hashea la contraseña antes de guardarla
//     $nuevoUsuario->save();

//     // Redirigir al usuario a una página de éxito o a donde desees
//     return redirect()->route('exito'); // Cambia 'inicio' por la ruta deseada
// }

public function registro(Request $request)
{
    // Validación de datos del formulario
    $request->validate([
        'curp' => 'required|unique:usuarioslog,curp',
        'correo' => 'required|email|unique:usuarioslog,correo',
    ]);

    $activationToken = Str::random(40);
    // Crea una nueva instancia del modelo Usuario
    $nuevoUsuario = new Usuario;
    $nuevoUsuario->curp = $request->curp;
    $nuevoUsuario->correo = $request->correo;
    $nuevoUsuario->activo = 0; // Establece 'activo' en 0 (inactivo) por defecto
    $nuevoUsuario->act_token = $activationToken; // Genera un token de activación

    $nuevoUsuario->save();

    
    // Envía el correo de activación
    Mail::to($nuevoUsuario->correo)->send(new ActivationMail($nuevoUsuario, $activationToken));

    // Redirige al usuario a una página de éxito o a donde desees
    return redirect()->route('exito'); // Cambia 'exito' por la ruta deseada
}

}
