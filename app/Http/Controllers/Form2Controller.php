<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;
use App\Models\Estado;
use App\Models\Municipio;
use App\Models\Localidad;
use Illuminate\Http\Request;
use App\Models\Persona;
use App\Models\Domicilio;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class Form2Controller extends Controller
{
    public function index()
    {
        $usuario = Auth::user();

        // Obtener los datos del primer domicilio desde la tabla "catdomicilio"
        $datosDomicilio1 = Domicilio::where('idpersona', $usuario->idpersona)
            ->where('tipo', 1) 
            ->select('idpersona', 'calle', 'calle2', 'calle3', 'numero', 'colonia', 'idlocalidad', 'telefono', 'celular') // Selecciona los campos que necesitas
            ->first(); // Obtén la primera coincidencia (puede haber solo una)

        // Obtener los datos del primer domicilio desde la tabla "catdomicilio"
        $datosDomicilio2 = Domicilio::where('idpersona', $usuario->idpersona)
            ->where('tipo', 2) 
            ->select('idpersona', 'calle', 'calle2', 'calle3', 'numero', 'colonia', 'idlocalidad', 'telefono', 'celular') // Selecciona los campos que necesitas
            ->first(); // Obtén la primera coincidencia (puede haber solo una)

       //Enviando datos al select    
        $estados = Estado::pluck('NombreEstado', 'IdEstado');

        
        // Pasar los datos a la vista
        return view('layouts-form.form2', ['estados' => $estados]);
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
}
