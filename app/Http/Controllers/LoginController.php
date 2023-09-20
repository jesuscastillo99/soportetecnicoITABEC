<?php

namespace App\Http\Controllers;
use App\resources\views\auth\login;
use Illuminate\Http\Request;
use App\Models\Curp;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Routing\Redirector;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    // Método para procesar el inicio de sesión
    public function login(Request $request)
    {
        // Validación de los campos 'curp' y 'correo'
        $request->validate([
            'curp' => 'required',
            'correo' => 'required|email',
        ]);

        // Obtener el usuario por 'curp' y 'correo'
        $usuario = Curp::where('curp', $request->curp)
            ->where('correo', $request->correo)
            ->first();

        if ($usuario) {
            // Autenticar al usuario manualmente
            Auth::login($usuario);

            // Autenticación exitosa
            return redirect()->intended('inicio'); // Redirige al usuario a la página deseada
        }else {
            // Autenticación fallida, redirige a una vista específica
            return redirect('error'); // Cambia 'vista_de_error' por el nombre de la vista a la que deseas redirigir en caso de error
        }

        // Autenticación fallida
        return back()->withErrors(['message' => 'Las credenciales ingresadas son incorrectas.']);
    }

    // Método para cerrar sesión
    public function logout(Request $request)
    {
        Auth::logout(); // Cierra la sesión del usuario
        $request->session()->invalidate(); // Invalida la sesión
        $request->session()->regenerateToken(); // Regenera el token CSRF

        return redirect('login'); // Redirige al usuario a la página deseada después de cerrar sesión
    }
    
}