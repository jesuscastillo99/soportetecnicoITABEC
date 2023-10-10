<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estado;
use App\Models\Municipio;
use App\Models\Localidad;
use App\Models\Persona;
class FormsController extends Controller
{
        //DESDE ESTE CONTROLADOR SE VAN A VALIDAR DATOS DE INPUTS Y GUARDAR INFORMACION
        public function form1Registro(Request $request)
        {
            // Validación de los campos
        $request->validate([
            'sexo' => 'required|in:H,M',
            'estado' => 'required',
            'municipio' => 'required',
            'localidad' => 'required',
            'estado_civil' => 'required|in:0,1',
        ]);

        // Aquí guarda los datos en la base de datos
        // Asumiendo que tienes un modelo "Persona" para guardar estos datos
        $curp = $request->input('curp');
        $persona = Persona::where('curp', $curp)->first();
        $persona->sexo = $request->input('sexo');
        $persona->idlocalidad = $request->input('localidad'); // Asumiendo que "idLocalidad" es el campo en tu tabla para la localidad
        $persona->estadoCivil = $request->input('estado_civil');
        $persona->save();

        // Redirige o realiza otras acciones después de guardar los datos

        return redirect()->route('form2-formulario');
    }

    
    public function form2Registro(Request $request)
    {
        // Valida y guarda los datos del paso 2

        return redirect()->route('formulario.paso3');
    }
}
