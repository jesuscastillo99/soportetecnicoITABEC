<?php

namespace App\Http\Controllers;
use App\Models\Persona;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DatosController extends Controller
{
    public function index()
    {
        // Obtener el usuario autenticado (persona)
        $usuario = Auth::user();

        // Obtener los datos de la persona desde la tabla "personas"
        $datosPersona = Persona::where('curp', $usuario->curp)
            ->select('curp', 'paterno', 'materno', 'nombre', 'sexo', 'fn') // Selecciona los campos que necesitas
            ->first(); // Obtén la primera coincidencia (puede haber solo una)

        // Pasar los datos a la vista
        return view('layouts-form.form1', ['datosPersona' => $datosPersona]);
    }
}
