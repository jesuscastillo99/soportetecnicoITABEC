<?php

namespace App\Http\Controllers;
use App\Models\Estado;
use App\Models\Municipio;
use App\Models\Localidad;
use Illuminate\Http\Request;
use App\Models\Persona;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class Form1Controller extends Controller
{
    

    public function index()
    {
        // Obtener el usuario autenticado (persona)
        $usuario = Auth::user();

        // Obtener los datos de la persona desde la tabla "personas"
        $datosPersona = Persona::where('curp', $usuario->curp)
            ->select('curp', 'paterno', 'materno', 'nombre', 'sexo', 'fn') // Selecciona los campos que necesitas
            ->first(); // Obtén la primera coincidencia (puede haber solo una)

        //Enviando datos al select    
        $estados = Estado::pluck('NombreEstado', 'IdEstado');

        
        // Pasar los datos a la vista
        return view('layouts-form.form1', ['datosPersona' => $datosPersona, 'estados' => $estados]);
    }
    public function cargarMunicipios($estado)
    {
        // Consulta los municipios relacionados con el estado
        $municipios = Municipio::where('IdEstado', $estado)->get();

        // Devuelve los municipios en formato JSON
        return response()->json($municipios);
    }

    public function cargarLocalidades($municipio)
    {
        // Consulta las localidades relacionados con el municipio
        $localidades = Localidad::where('IdMunicipio', $municipio)->get();

        // Devuelve las localidades en formato JSON
        return response()->json($localidades);
    }

    public function mostrarLocalidad(Request $request)
    {
        $usuario = Auth::user();
        $idPersona = $usuario->id;
        $idLocalidad = DB::table('personas')
        ->where('id', $idPersona) // Reemplaza $personaId con el ID de la persona que deseas consultar
        ->value('idlocalidad');

        $localidad = DB::table('Catlocalidades')
            ->select('Catlocalidades.Localidad', 'CatMunicipios.NombreMunicipio', 'CatEstado.NombreEstado')
            ->join('CatMunicipios', 'Catlocalidades.IdMunicipio', '=', 'CatMunicipios.IdMunicipio')
            ->join('CatEstados', 'CatMunicipios.IdEstado', '=', 'CatEstados.IdEstado')
            ->where('Catlocalidades.IdLocalidad', $idLocalidad)
            ->first();

        if ($localidad) {
            $nombreLocalidad = $localidad->Localidad;
            $nombreMunicipio = $localidad->NombreMunicipio;
            $nombreEstado = $localidad->NombreEstado;

            // Pasar las variables a la vista
            return view('layouts-form.form1', [
                'nombreLocalidad' => $nombreLocalidad,
                'nombreMunicipio' => $nombreMunicipio,
                'nombreEstado' => $nombreEstado
            ]);
        } else {
            // Manejar el caso donde no se encontró la localidad.
            return view('layouts-form.form1')->with('error', 'La localidad no fue encontrada');
        }
    }
    
}
