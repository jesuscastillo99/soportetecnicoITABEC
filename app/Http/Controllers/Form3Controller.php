<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
namespace App\Http\Controllers;
use App\Models\Estado;
use App\Models\Municipio;
use App\Models\Localidad;
use App\Models\Expediente;
use Illuminate\Http\Request;
use App\Models\Persona;
use App\Models\Domicilio;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use GuzzleHttp\Client;
use SimpleXMLElement;
use Illuminate\Support\Carbon;


class Form3Controller extends Controller
{
    public function index()
    {      
        $nombreProcedimiento1= 'ObtenerPadre';
        $usuario = Auth::user();
        $userId = $usuario->idlog;
        $arrayCurp = [$userId];
        $procedimiento = new ContadorParametros();
        $resultados= $procedimiento->proceSelect($nombreProcedimiento1, $arrayCurp);

        if (!empty($resultados)) {
            $consultaPadre = true;
           
            //$consultaTrabaja = $resultados[0]->trabaja;
            
          
        } else {
            // Si no se obtienen resultados, se declara null por cualquier cosa
            $consultaPadre = false;
            
        }
        //dd($consultaPadre);
            return view('layouts-form.form3', [
                'consultaPadre' => $consultaPadre]);
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

    public function obtenerCurpInput(Request $request){

    }
    public function validarCurpPadre(Request $request)
    {
        $curp1 = $request->curppadre1;
        $usuario = Auth::user();
        //Validación para que la curp del papá no sea la misma que la del usuario
        if($curp1 == $usuario->curp){
            session()->flash('error', 'La CURP es la misma que el usuario.');
            return view('layouts-form.form3');
        }else {
            session()->forget('error');
            if($curp1)
            //Validación para saber si existe esa persona en el sistema de CURPS del gobierno
            $xml1 = $this->consultarWebService($curp1);

            if ($xml1 ?? null) {
                //Obtener estados para cargarlos
                $estados = Estado::pluck('NombreEstado', 'IdEstado');
                //Obtener a la persona a través de su curp con el procedimiento almacenado
                $nombreProcedimiento1= 'ObtenerDatosPersona';
                $arrayCurp = [$curp1];
                $procedimiento = new ContadorParametros();
                $resultados= $procedimiento->proceSelect($nombreProcedimiento1, $arrayCurp);
                
                // Verificar si se obtuvieron resultados para almacenar el id y la localidad de la personna (papá)
                if (!empty($resultados)) {
                    $consultaIdPadre = $resultados[0]->idpersona;
                    $consultaLocNacPadre = $resultados[0]->locnac;
                    $consultaTrabaja = $resultados[0]->trabaja;
                    $consultaUltEstudios = $resultados[0]->ult_grad_estudios;
                  
                } else {
                    // Si no se obtienen resultados, se declara null por cualquiercosa
                    $consultaIdPadre = null;
                    $consultaLocNacPadre = null;
                    $consultaTrabaja = null;
                    $consultaUltEstudios = null;
                }
                
             
                //Si la consulta arroja que ya tiene un papá registrado
                if($consultaIdPadre){
                    //Se ejecuta el procedimiento para cargar el lugar de nacimiento del papá
                    $idLocalidad = [$consultaLocNacPadre];
                    $nombreprocedimiento3= 'ObtenerLugarNacimiento';
                    $procedimiento3 = new ContadorParametros();
                    $localidad = $procedimiento3->proceSelect($nombreprocedimiento3, $idLocalidad);    

                    //En caso de que sea nulo
                    $nombreLocalidad = $localidad[0]->Localidad ?? null;
                    $nombreMunicipio = $localidad[0]->NombreMunicipio ?? null;
                    $nombreEstado2 = $localidad[0]->NombreEstado ?? null;
                    //dd($consultaTrabaja);
                    $curpEsValida= true;
                    return view('layouts-form.form3', [
                        'xml1' => $xml1,
                        'estados' => $estados,
                        'localidadPadre' => $consultaLocNacPadre,
                        'nombreLocalidad' => $nombreLocalidad,
                        'nombreMunicipio' => $nombreMunicipio,
                        'nombreEstado2' => $nombreEstado2,
                        'consultaTrabaja' => $consultaTrabaja,
                        'consultaUltEstudios' => $consultaUltEstudios,
                        'curpEsValida' => $curpEsValida 
                    ]);

                } else {

                    //Si el usuario no tienen un papá registrado
                    $consultaLocNacPadre = '';

                    $consultaLocNacPadre = $consultaLocNacPadre ?? null;
                    $nombreprocedimiento3= 'ObtenerLugarNacimiento';
                    $idLocalidad = [$consultaLocNacPadre];
                    $procedimiento4 = new ContadorParametros();
                    $localidad = $procedimiento4->proceSelect($nombreprocedimiento3, $idLocalidad);

                    $nombreLocalidad = $localidad[0]->Localidad ?? null;
                    $nombreMunicipio = $localidad[0]->NombreMunicipio ?? null;
                    $nombreEstado2 = $localidad[0]->NombreEstado ?? null;
                    $curpEsValida = true;
                    return view('layouts-form.form3', [
                        'xml1' => $xml1,
                        'estados' => $estados,
                        'localidadPadre' => $consultaLocNacPadre,
                        'nombreLocalidad' => $nombreLocalidad,
                        'nombreMunicipio' => $nombreMunicipio,
                        'nombreEstado2' => $nombreEstado2,
                        'consultaTrabaja' => $consultaTrabaja,
                        'consultaUltEstudios' => $consultaUltEstudios,
                        'curpEsValida' => $curpEsValida // Agregar la variable aquí
                    ]);
                }
                  

            } else {
                $errorMessage = "Tu curp no se encuentra en el sistema.";
                return view('layouts-form.form3', ['errorMessage' => $errorMessage]);
            }

        }
    }

    public function validarCurpMadre(Request $request)
    {
        $curp1 = $request->curpmadre1;
        $usuario = Auth::user();
        //Validación para que la curp del papá no sea la misma que la del usuario
        if($curp1 == $usuario->curp){
            session()->flash('error', 'La CURP es la misma que el usuario.');
            return view('layouts-form.form3');
        }else {
            session()->forget('error');
            if($curp1)
            //Validación para saber si existe esa persona en el sistema de CURPS del gobierno
            $xml2 = $this->consultarWebService($curp1);

            if ($xml2 ?? null) {
                //Obtener estados para cargarlos
                $estados2 = Estado::pluck('NombreEstado', 'IdEstado');
                //Obtener a la persona a través de su curp con el procedimiento almacenado
                $nombreProcedimiento1= 'ObtenerDatosPersona';
                $arrayCurp = [$curp1];
                $procedimiento = new ContadorParametros();
                $resultados= $procedimiento->proceSelect($nombreProcedimiento1, $arrayCurp);
                
                // Verificar si se obtuvieron resultados para almacenar el id y la localidad de la personna (papá)
                if (!empty($resultados)) {
                    $consultaIdMadre = $resultados[0]->idpersona;
                    $consultaLocNacMadre = $resultados[0]->locnac;
                    $consultaTrabaja2 = $resultados[0]->trabaja;
                    $consultaUltEstudios2 = $resultados[0]->ult_grad_estudios;
                  
                } else {
                    // Si no se obtienen resultados, se declara null por cualquiercosa
                    $consultaIdMadre = null;
                    $consultaLocNacMadre = null;
                    $consultaTrabaja2 = null;
                    $consultaUltEstudios2 = null;
                    
                }
                
             
                //Si la consulta arroja que ya tiene un papá registrado
                if($consultaIdMadre){
                    //Se ejecuta el procedimiento para cargar el lugar de nacimiento del papá
                    $idLocalidad = [$consultaLocNacMadre];
                    $nombreprocedimiento3= 'ObtenerLugarNacimiento';
                    $procedimiento3 = new ContadorParametros();
                    $localidad = $procedimiento3->proceSelect($nombreprocedimiento3, $idLocalidad);    

                    //En caso de que sea nulo
                    $nombreLocalidad2 = $localidad[0]->Localidad ?? null;
                    $nombreMunicipio2 = $localidad[0]->NombreMunicipio ?? null;
                    $nombreEstado22 = $localidad[0]->NombreEstado ?? null;
                    $curpEsValida2 = true; // o false, según la lógica de tu aplicación
                    return view('layouts-form.form3', [
                        'xml2' => $xml2,
                        'estados2' => $estados2,
                        'localidadMadre' => $consultaLocNacMadre,
                        'nombreLocalidad2' => $nombreLocalidad2,
                        'nombreMunicipio2' => $nombreMunicipio2,
                        'nombreEstado22' => $nombreEstado22,
                        'consultaTrabaja2' => $consultaTrabaja2,
                        'consultaUltEstudios2' => $consultaUltEstudios2,
                        'curpEsValida2' => $curpEsValida2, // Agregar la variable aquí
                    ]);

                } else {

                    //Si el usuario no tienen un papá registrado
                    $consultaLocNacMadre = '';

                    $consultaLocNacMadre = $consultaLocNacMadre ?? null;
                    $nombreprocedimiento3= 'ObtenerLugarNacimiento';
                    $idLocalidad = [$consultaLocNacMadre];
                    $procedimiento4 = new ContadorParametros();
                    $localidad = $procedimiento4->proceSelect($nombreprocedimiento3, $idLocalidad);

                    $nombreLocalidad2 = $localidad[0]->Localidad ?? null;
                    $nombreMunicipio2 = $localidad[0]->NombreMunicipio ?? null;
                    $nombreEstado22 = $localidad[0]->NombreEstado ?? null;
                    //dd($estados2);
                    $curpEsValida2 = true;
                    echo '<script>alert("Datos del padre encontrados");</script>';
                    return view('layouts-form.form3', [
                        'xml2' => $xml2,
                        'estados2' => $estados2,
                        'localidadMadre' => $consultaLocNacMadre,
                        'nombreLocalidad2' => $nombreLocalidad2,
                        'nombreMunicipio2' => $nombreMunicipio2,
                        'nombreEstado22' => $nombreEstado22,
                        'consultaTrabaja2' => $consultaTrabaja2,
                        'consultaUltEstudios2' => $consultaUltEstudios2,
                        'curpEsValida2' => $curpEsValida2, // Agregar la variable aquí
                    ]);
                }
                  

            } else {
                $errorMessage = "Tu curp no se encuentra en el sistema.";
                return view('layouts-form.form3', ['errorMessage' => $errorMessage]);
            }

        }
    }

    private function consultarWebService($valor)
    {
        $client = new Client();
        $response = $client->get("http://sistemasiceet.tamaulipas.gob.mx/wscurp/wscurp.php?CURP=$valor");

        if ($response->getStatusCode() == 200) {
            $xmlResponse = $response->getBody()->getContents();
            $xml = new SimpleXMLElement($xmlResponse);

            if (empty($xmlResponse) || empty($xml->curp)) {
                return null;
            }

            return $xml;
        }

        return null;
    }

   

   
}

