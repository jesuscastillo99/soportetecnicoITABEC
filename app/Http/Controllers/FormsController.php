<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormsController extends Controller
{
    public function form1Registro(Request $request)
    {
        $request->validate([
            'curp' => 'required',
            'fecha_nac' => 'required',
            'apellido_pa' => 'required',
            'apellido_ma' => 'required',
            'nombre' => 'required',
            'sexo' => 'required',
            'correo_elec' => 'required|email',
            'estado' => 'required',
            'municipio' => 'required',
            'localidad' => 'required',
            'estado_civil' => 'required',
            'trabajas_p' => 'required',
        ]);

        return redirect()->route('form2');
    }

    
    public function form2Registro(Request $request)
    {
        // Valida y guarda los datos del paso 2

        return redirect()->route('formulario.paso3');
    }
}
