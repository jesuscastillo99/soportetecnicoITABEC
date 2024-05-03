<?php

namespace App\Http\Controllers;
use App\Models\Estado;
use App\Models\Municipio;
use App\Models\Localidad;
use Illuminate\Http\Request;
use App\Models\Persona;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\ContadorParametros;
class Form1Controller extends Controller
{
    

    // Llamar al procedimiento almacenado con un conjunto de parámetros
  

    
    public function index(){
        $usuario = Auth::user();
        $nombreProcedimiento1= 'ObtenerDatosPersona';
        $arrayCurp = [$usuario->curp];
        $contadorParametros = new ContadorParametros();
        $datosPersona = $contadorParametros->proceSelect($nombreProcedimiento1, $arrayCurp);

        // Verificar si se obtuvieron resultados
        if (!empty($datosPersona)) {
            // Obtener el primer resultado
            $datosPersona = $datosPersona[0];
        } else {
            // Si no se obtienen resultados, puedes manejarlo de acuerdo a tus necesidades
            $datosPersona = null;
        }

        $estados = Estado::pluck('NombreEstado', 'IdEstado');
        
        //función para cargar estado,municipio y localidad
        
        $curpUser=$usuario->curp;
        $persona = Persona::where('curp', $curpUser)->first();
        $idLocalidad = [$persona->locnac];
        $nombreProcedimiento2= 'ObtenerLugarNacimiento';
        $localidad = $contadorParametros->proceSelect($nombreProcedimiento2, $idLocalidad);
        
            $nombreLocalidad = $localidad[0]->Localidad ?? null;
            $nombreMunicipio = $localidad[0]->NombreMunicipio ?? null;
            $nombreEstado2 = $localidad[0]->NombreEstado ?? null;

       
        return view('layouts-form.form1', ['datosPersona' => $datosPersona, 
        'estados' => $estados, 
        'nombreLocalidad' => $nombreLocalidad,
        'nombreMunicipio' => $nombreMunicipio,
        'nombreEstado2' => $nombreEstado2]);
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
        $curpId = $usuario->curp;
        $arrayIdCurp = [$curpId];
        $proceUser = 'ObtenerUserId';
        $obtenerId = new ContadorParametros();
        $resultId = $obtenerId->proceSelect($proceUser, $arrayIdCurp);
        $idPersona = $resultId[0]->idpersona ?? null;
        $idLocalidad = DB::table('catpersonas')
        ->where('idpersona', $idPersona) 
        ->value('locnac');

        $localidad = DB::table('Catlocalidades')
            ->select('Catlocalidades.Localidad', 'CatMunicipios.NombreMunicipio', 'CatEstado.NombreEstado')
            ->join('CatMunicipios', 'Catlocalidades.IdMunicipio', '=', 'CatMunicipios.IdMunicipio')
            ->join('CatEstado', 'CatMunicipios.IdEstado', '=', 'CatEstado.IdEstado')
            ->where('Catlocalidades.IdLocalidad', $idLocalidad)
            ->first();

        if ($localidad) {
            $nombreLocalidad = $localidad->Localidad;
            $nombreMunicipio = $localidad->NombreMunicipio;
            $nombreEstado2 = $localidad->NombreEstado;

            // Pasar las variables a la vista
            return view('layouts-form.form1', [
                'nombreLocalidad' => $nombreLocalidad,
                'nombreMunicipio' => $nombreMunicipio,
                'nombreEstado2' => $nombreEstado2
            ]);
        } else {
            // Manejar el caso donde no se encontró la localidad.
            return view('layouts-form.form1')->with('error', 'La localidad no fue encontrada');
        }
    }

    
    
}
