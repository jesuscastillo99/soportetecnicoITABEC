<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
namespace App\Http\Controllers;
use App\Models\Estado;
use App\Models\Municipio;
use App\Models\Localidad;
use App\Models\Escuela;
use App\Models\Carrera;
use App\Models\Expediente;
use Illuminate\Http\Request;
use App\Models\Persona;
use App\Models\Domicilio;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use GuzzleHttp\Client;
use SimpleXMLElement;
use Illuminate\Support\Carbon;


class Form4Controller extends Controller
{

    public function cargarMunicipios($estado)
    {
        // Consulta los municipios relacionados con el estado
        $municipios = Municipio::where('IdEstado', $estado)->get();

        // Devuelve los municipios en formato JSON
        return response()->json($municipios);
    }

    public function cargarEscuelas($municipio)
    {
        // Consulta las localidades relacionados con el municipio
        $escuelas = Escuela::where('IdMunicipio', $municipio)->get();

        // Devuelve las localidades en formato JSON
        return response()->json($escuelas);
    }

    public function cargarCarreras($escuela)
    {
        // Consulta las localidades relacionados con el escuela
        $carreras = Carrera::where('IdEscuela', $escuela)->get();

        // Devuelve las localidades en formato JSON
        return response()->json($carreras);
    }

    public function index()
    {   
        //ESTRUCTURA PRINCIPAL PARA IMPLEMENTAR UN PROCEDIMIENTO 
        $nombreProcedimiento1= 'ObtenerDatosF4';
        $usuario = Auth::user();
        $userId = $usuario->idlog;
        $arrayCurp = [$userId];
        $procedimiento = new ContadorParametros();
        $resultados= $procedimiento->proceSelect($nombreProcedimiento1, $arrayCurp);
        
        if (!empty($resultados)) {

            $consultaIdCarrera = $resultados[0]->idcarrera;
            $consultaSemestre =  $resultados[0]->semestre;
            $consultapAcademico =  $resultados[0]->pacademico; 
            $consultaNumControl =  $resultados[0]->numcontrol;
            $consultaPeriodo =  $resultados[0]->periodo;
            $consultaPromUltGrado =  $resultados[0]->promultgrado;
            $consultaImpInscripcion =  $resultados[0]->impinscripcion;
            $consultaImpInscripcionCol =  $resultados[0]->impcolemens; 
            $consultaNivel =  $resultados[0]->nivel;
            $consultaMesTermEst =  $resultados[0]->mestermest;
            $consultaAñoTermEst =  $resultados[0]->añotermest;
            $consultaNivelTitu = $resultados[0]->nivelacatitu;
            $consultaTipoTitu = $resultados[0]->tipotitu;       
        } else {
            // Si no se obtienen resultados, se declara null por cualquier cosa
            $consultaIdCarrera = null;
            $consultaSemestre = null;  
            $consultapAcademico = null; 
            $consultaNumControl = null;  
            $consultaPeriodo = null;   
            $consultaPromUltGrado = null;  
            $consultaImpInscripcion = null;  
            $consultaImpInscripcionCol = null;   
            $consultaNivel = null;  
            $consultaMesTermEst = null;  
            $consultaAñoTermEst = null; 
            $consultaNivelTitu = null;
            $consultaTipoTitu = null;      
            
        }  


        //PROCEDIMIENTO PARA OBTENER DATOS CARRERA
        $idCarrera = [$consultaIdCarrera];
        $nombreprocedimiento2= 'ObtenerCarreraF4';
        $procedimiento2 = new ContadorParametros();
        $carrera = $procedimiento2->proceSelect($nombreprocedimiento2, $idCarrera); 
        //dd($carrera);
        $nombreCarrera = $carrera[0]->NombreCarrera ?? null;
        $nombreEscuela = $carrera[0]->NombreEscuela ?? null;
        $nombreMunicipio = $carrera[0]->NombreMunicipio ?? null;
        $nombreEstado2 = $carrera[0]->NombreEstado ?? null;




        //Para traerme los estados
        $estados = Estado::pluck('NombreEstado', 'IdEstado');

            return view('layouts-form.form4', [
                'estados' => $estados,
                'consultaIdCarrera' => $consultaIdCarrera,
                'nombreCarrera' => $nombreCarrera,
                'nombreEscuela' => $nombreEscuela,
                'nombreMunicipio' => $nombreMunicipio,
                'nombreEstado2' => $nombreEstado2,
                'consultaSemestre' => $consultaSemestre,
                'consultapAcademico' => $consultapAcademico,
                'consultaNumControl' => $consultaNumControl,
                'consultaPeriodo' => $consultaPeriodo,
                'consultaPromUltGrado' => $consultaPromUltGrado,
                'consultaImpInscripcion' => $consultaImpInscripcion,
                'consultaImpInscripcionCol' => $consultaImpInscripcionCol,
                'consultaNivel' => $consultaNivel,
                'consultaMesTermEst' => $consultaMesTermEst,
                'consultaAñoTermEst' => $consultaAñoTermEst,
                'consultaNivelTitu' => $consultaNivelTitu,
                'consultaTipoTitu' => $consultaTipoTitu
            ]);
    }








}