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
            return view('layouts-form.form3');
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


    public function validarCurpPadre(Request $request)
    {
        $curp1 = $request->curppadre1;
        $usuario = Auth::user();

        if($curp1 == $usuario->curp){
            session()->flash('error', 'La CURP es inválida.');
            return view('layouts-form.form3');
        }else {

            if($curp1)
            $xml1 = $this->consultarWebService($curp1);

            if ($xml1 ?? null) {

                    //Obtener estados
                $estados = Estado::pluck('NombreEstado', 'IdEstado');

                
                $idlog = Persona::where('curp', $curp1)
                ->select('idpersona')
                ->first();

                //Este if sirve para en caso de que no encuentre la CURP en la tabla de personas
                if($idlog){

                    $localidadPadre = Persona::where('idpersona', $idlog->idpersona)
                    ->select('locnac')
                    ->first();

                    $localidadPadre = $localidadPadre->locnac ?? null;

                    // $idLocalidad = $localidadPadre ? $localidadPadre->locnac : null;
                    $localidad = DB::table('Catlocalidades')
                        ->select('Catlocalidades.Localidad', 'CatMunicipios.NombreMunicipio', 'CatEstado.NombreEstado')
                        ->join('CatMunicipios', 'Catlocalidades.IdMunicipio', '=', 'CatMunicipios.IdMunicipio')
                        ->join('CatEstado', 'CatMunicipios.IdEstado', '=', 'CatEstado.IdEstado')
                        ->where('Catlocalidades.IdLocalidad', $localidadPadre)
                        ->first();
                
                    //En caso de que sea nulo
                    
                    $nombreLocalidad = $localidad->Localidad ?? null;
                    $nombreMunicipio = $localidad->NombreMunicipio ?? null;
                    $nombreEstado2 = $localidad->NombreEstado ?? null;

                    return view('layouts-form.form3', [
                        'xml' => $xml1,
                        'estados' => $estados,
                        'localidadPadre' => $localidadPadre,
                        'nombreLocalidad' => $nombreLocalidad,
                        'nombreMunicipio' => $nombreMunicipio,
                        'nombreEstado2' => $nombreEstado2]);

                } else {
                    $localidadPadre = '';

                    $localidadPadre = $localidadPadre ?? null;

                    // $idLocalidad = $localidadPadre ? $localidadPadre->locnac : null;
                    $localidad = DB::table('Catlocalidades')
                        ->select('Catlocalidades.Localidad', 'CatMunicipios.NombreMunicipio', 'CatEstado.NombreEstado')
                        ->join('CatMunicipios', 'Catlocalidades.IdMunicipio', '=', 'CatMunicipios.IdMunicipio')
                        ->join('CatEstado', 'CatMunicipios.IdEstado', '=', 'CatEstado.IdEstado')
                        ->where('Catlocalidades.IdLocalidad', $localidadPadre)
                        ->first();
                
                    //En caso de que sea nulo
                    
                    $nombreLocalidad = $localidad->Localidad ?? null;
                    $nombreMunicipio = $localidad->NombreMunicipio ?? null;
                    $nombreEstado2 = $localidad->NombreEstado ?? null;
                    return view('layouts-form.form3', [
                        'xml' => $xml1,
                        'estados' => $estados,
                        'localidadPadre' => $localidadPadre,
                        'nombreLocalidad' => $nombreLocalidad,
                        'nombreMunicipio' => $nombreMunicipio,
                        'nombreEstado2' => $nombreEstado2]);
                }
                  

            } else {
                $errorMessage = "Ingresa una CURP válida.";
                return view('layouts-form.form3', ['errorMessage' => $errorMessage]);
            }

        }
    }

    public function validarCurpMadre(Request $request)
    {
        $curp2 = $request->curpmadre1; // Cambia 'nombreDelCampo' al nombre correcto del campo
        $xml2 = $this->consultarWebService($curp2);

        if ($xml2) {
            return view('layouts-form.form3', ['xml' => $xml2]);
        } else {
            $errorMessage = "Ingresa un valor válido."; // Cambia el mensaje según tus necesidades
            return view('layouts-form.form3', ['errorMessage' => $errorMessage]);
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

