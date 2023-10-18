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
        $datosDomicilio1 = Domicilio::where('idpersona', $usuario->idlog)
            ->where('tipo', 1) 
            ->select('idpersona', 'calle', 'calle2', 'calle3', 'numero', 'colonia', 'idlocalidad', 'telefono', 'celular', 'cp') // Selecciona los campos que necesitas
            ->first() ?? null; // Obtén la primera coincidencia (puede haber solo una)

        // Obtener los datos del primer domicilio desde la tabla "catdomicilio"
        $datosDomicilio2 = Domicilio::where('idpersona', $usuario->idlog)
            ->where('tipo', 2) 
            ->select('idpersona', 'calle', 'calle2', 'calle3', 'numero', 'colonia', 'idlocalidad', 'telefono', 'celular', 'cp') // Selecciona los campos que necesitas
            ->first() ?? null; // Obtén la primera coincidencia (puede haber solo una)

        // Obtener los datos del primer domicilio desde la tabla "catdomicilio"
        $datosDomicilio3 = Domicilio::where('idpersona', $usuario->idlog)
            ->where('tipo', 3) 
            ->select('idpersona', 'calle', 'calle2', 'calle3', 'numero', 'colonia', 'idlocalidad', 'telefono', 'celular', 'cp') // Selecciona los campos que necesitas
            ->first() ?? null; // Obtén la primera coincidencia (puede haber solo una)

       //Enviando datos al select    
        $estados = Estado::pluck('NombreEstado', 'IdEstado');

        //función para cargar estado,municipio y localidad del post1
        
        $idUser=$usuario->idlog;
        $domicilio = Domicilio::where('idpersona', $idUser)
        ->where('tipo', 1)
        ->first() ?? null;

        //En caso de que sea nulo
        
        $idLocalidad = $domicilio ? $domicilio->idlocalidad : null;
        $localidad = DB::table('Catlocalidades')
            ->select('Catlocalidades.Localidad', 'CatMunicipios.NombreMunicipio', 'CatEstado.NombreEstado')
            ->join('CatMunicipios', 'Catlocalidades.IdMunicipio', '=', 'CatMunicipios.IdMunicipio')
            ->join('CatEstado', 'CatMunicipios.IdEstado', '=', 'CatEstado.IdEstado')
            ->where('Catlocalidades.IdLocalidad', $idLocalidad)
            ->first();

        //En caso de que sea nulo
        
        $nombreLocalidad = $localidad->Localidad ?? null;
        $nombreMunicipio = $localidad->NombreMunicipio ?? null;
        $nombreEstado2 = $localidad->NombreEstado ?? null;

        //función para cargar estado,municipio y localidad del post2
        $domicilio2 = Domicilio::where('idpersona', $idUser)
        ->where('tipo', 2)
        ->first() ?? null;

        //En caso de que sea nulo
        
        $idLocalidad2 = $domicilio2 ? $domicilio2->idlocalidad : null;
        $localidad2 = DB::table('Catlocalidades')
            ->select('Catlocalidades.Localidad', 'CatMunicipios.NombreMunicipio', 'CatEstado.NombreEstado')
            ->join('CatMunicipios', 'Catlocalidades.IdMunicipio', '=', 'CatMunicipios.IdMunicipio')
            ->join('CatEstado', 'CatMunicipios.IdEstado', '=', 'CatEstado.IdEstado')
            ->where('Catlocalidades.IdLocalidad', $idLocalidad2)
            ->first();

        //En caso de que sea nulo
        
        $nombreLocalidad2 = $localidad2->Localidad ?? null;
        $nombreMunicipio2 = $localidad2->NombreMunicipio ?? null;
        $nombreEstado22 = $localidad2->NombreEstado ?? null;

        //función para cargar estado,municipio y localidad del post3
        $domicilio3 = Domicilio::where('idpersona', $idUser)
        ->where('tipo', 3)
        ->first() ?? null;

        //En caso de que sea nulo
        
        $idLocalidad3 = $domicilio3 ? $domicilio3->idlocalidad : null;
        $localidad3 = DB::table('Catlocalidades')
            ->select('Catlocalidades.Localidad', 'CatMunicipios.NombreMunicipio', 'CatEstado.NombreEstado')
            ->join('CatMunicipios', 'Catlocalidades.IdMunicipio', '=', 'CatMunicipios.IdMunicipio')
            ->join('CatEstado', 'CatMunicipios.IdEstado', '=', 'CatEstado.IdEstado')
            ->where('Catlocalidades.IdLocalidad', $idLocalidad3)
            ->first();

        //En caso de que sea nulo
        
        $nombreLocalidad3 = $localidad3->Localidad ?? null;
        $nombreMunicipio3 = $localidad3->NombreMunicipio ?? null;
        $nombreEstado23 = $localidad3->NombreEstado ?? null;
        
        // Pasar los datos a la vista
        return view('layouts-form.form2', 
            ['datosDomicilio1' => $datosDomicilio1, 
            'datosDomicilio2' => $datosDomicilio2,
            'datosDomicilio3' => $datosDomicilio3,
            'estados' => $estados, 
            'nombreLocalidad' => $nombreLocalidad,
            'nombreMunicipio' => $nombreMunicipio,
            'nombreEstado2' => $nombreEstado2,
            'nombreLocalidad2' => $nombreLocalidad2,
            'nombreMunicipio2' => $nombreMunicipio2,
            'nombreEstado22' => $nombreEstado22,
            'nombreLocalidad3' => $nombreLocalidad3,
            'nombreMunicipio3' => $nombreMunicipio3,
            'nombreEstado23' => $nombreEstado23]);
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
