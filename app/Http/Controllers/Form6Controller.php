<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estado;
use App\Models\Municipio;
use App\Models\Localidad;
use App\Models\Expediente;
use App\Models\Persona;
use App\Models\Domicilio;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use GuzzleHttp\Client;
use SimpleXMLElement;
use Illuminate\Support\Carbon;
class Form6Controller extends Controller
{
    
    public function index(){
         //Procedimiento para obtener los datos del aval
         $nombreProcedimiento= 'ObtenerF6J';
         $usuario = Auth::user();
         $userId = $usuario->idlog;
         $array1= [$userId];
         $claseproce = new ContadorParametros();
         $resultados = $claseproce->proceSelect($nombreProcedimiento, $array1);
         
        
         //$consultaIdR1 = $resultados[0]->idpersona ?? null;
         $consultaIdAval = $resultados[0]->idpersona ?? null;
         $avcurp= $resultados[0]->curp ?? null;
         $avfechanac = $resultados[0]->fechanac ?? null;
         $avsexo = $resultados[0]->sexo ?? null;
         if ($avsexo !== null) {
             if ($avsexo == 1) {
                 $avsexo = 'Masculino';
             } else if ($avsexo == 0) {
                 $avsexo = 'Femenino';
             }
         }
         $avpaterno = $resultados[0]->paterno ?? null;
         $avmaterno = $resultados[0]->materno ?? null;
         $avnombre = $resultados[0]->nombre ?? null;
         $avidlocalidad = $resultados[0]->idlocalidadv ?? null;
         $avcalle= $resultados[0]->callev ?? null;
         $avnum = $resultados[0]->numerov ?? null;
         $avcolonia = $resultados[0]->coloniav ?? null;
         $avcalle2 = $resultados[0]->calle2v ?? null;
         $avcp = $resultados[0]->cpv ?? null;
         $avtelefono = $resultados[0]->telefonov ?? null;
         $avcalle3 = $resultados[0]->calle3v ?? null;
         $avcelular = $resultados[0]->celularv ?? null;
         $avrelacred = $resultados[0]->relacred ?? null;
         $avcasap = $resultados[0]->casap ?? null;
         $avtrabaja = $resultados[0]->trabaja ?? null;
         $avnombreorg = $resultados[0]->nombreorg ?? null;
         $avpuesto = $resultados[0]->puesto ?? null;
         $avsueldo = $resultados[0]->sueldo ?? null;
         $avcallet = $resultados[0]->callet ?? null;
         $avnumerot = $resultados[0]->numerot ?? null;
         $avcoloniat = $resultados[0]->coloniat ?? null;
         $avcalle2t = $resultados[0]->calle2t ?? null;
         $avcpt = $resultados[0]->cpt ?? null;
         $avcalle3t = $resultados[0]->calle3t ?? null;
         
         
         //Obtener estados para cargarlos
         $estados = Estado::pluck('NombreEstado', 'IdEstado');
 
         //Se ejecuta el procedimiento para cargar el lugar de nacimiento del r1
         $idLocalidadNacR1 = [$avidlocalidad];
         $nombreprocedimiento2= 'ObtenerLugarNacimiento';
         $procedimiento2 = new ContadorParametros();
         $localidadNac = $procedimiento2->proceSelect($nombreprocedimiento2, $idLocalidadNacR1); 
         
         $nombreLocalidadAval = $localidadNac[0]->Localidad ?? null;
         $nombreMunicipioAval = $localidadNac[0]->NombreMunicipio ?? null;
         $nombreEstadoAval = $localidadNac[0]->NombreEstado ?? null;
 

         //condicion para mostrar acordeon
         if($consultaIdAval==null){
            $consultaIdAval=0;
        } 
        return view('layouts-form.form6', [
            'consultaIdAval' => $consultaIdAval,
            'avcurp' => $avcurp,
            'avfechanac' => $avfechanac,
            'avsexo' => $avsexo,
            'avpaterno' => $avpaterno,
            'avmaterno' => $avmaterno,
            'avnombre' => $avnombre,
            'avidlocalidad' => $avidlocalidad,
            'estados' => $estados,
            'nombreLocalidadAval' => $nombreLocalidadAval,
            'nombreMunicipioAval' => $nombreMunicipioAval,
            'nombreEstadoAval' => $nombreEstadoAval,
            'avcalle' => $avcalle,
            'avnum' => $avnum,
            'avcolonia' => $avcolonia,
            'avcalle2' => $avcalle2,
            'avcp' => $avcp,
            'avtelefono' => $avtelefono,
            'avcalle3' => $avcalle3,
            'avcelular' => $avcelular,
            'avrelacred' => $avrelacred,
            'avcasap' => $avcasap,
            'avtrabaja' => $avtrabaja,
            'avnombreorg' => $avnombreorg,
            'avpuesto' => $avpuesto,
            'avsueldo' => $avsueldo,
            'avcallet' => $avcallet,
            'avnumerot' => $avnumerot,
            'avcoloniat' => $avcoloniat,
            'avcalle2t' => $avcalle2t,
            'avcpt' => $avcpt,
            'avcalle3t' => $avcalle3t,
         ]);
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

    public function form6ValidarAval(Request $request)
    {
        $curp1 = $request->curpaval1;
        $usuario = Auth::user();
        //Validación para que la curp del papá no sea la misma que la del usuario
        if($curp1 == $usuario->curp){
            session()->flash('error', 'La CURP es la misma que el usuario.');
            return view('layouts-form.form6');
        }else {
            session()->forget('error');
            if($curp1)
            //Validación para saber si existe esa persona en el sistema de CURPS del gobierno
            $xml1 = $this->consultarWebService($curp1);
            
            if ($xml1 ?? null) {
                $userId= $usuario->idlog;
                //Obtener estados para cargarlos
                $estados = Estado::pluck('NombreEstado', 'IdEstado');
                //Obtener a la persona a través de su curp con el procedimiento almacenado
                $nombreProcedimiento1= 'ObtenerF6J';
                $arrayCurp = [$userId];
                $procedimiento = new ContadorParametros();
                $resultados = $procedimiento->proceSelect($nombreProcedimiento1, $arrayCurp);
                
                // Verificar si se obtuvieron resultados para almacenar el id y la localidad de la personna (papá)
                $consultaavcurp= $resultados[0]->curp ?? null;
                $consultaavfechanac = $resultados[0]->fechanac ?? null;
                $consultaavsexo = $resultados[0]->sexo ?? null;
                if ($consultaavsexo !== null) {
                    if ($consultaavsexo == 1) {
                        $consultaavsexo = 'Masculino';
                    } else if ($consultaavsexo == 0) {
                        $consultaavsexo = 'Femenino';
                    }
                }
                $consultaavpaterno = $resultados[0]->paterno ?? null;
                $consultaavmaterno = $resultados[0]->materno ?? null;
                $consultaavnombre = $resultados[0]->nombre ?? null;
                $consultaavidlocalidad = $resultados[0]->idlocalidadv ?? null;
                $consultaavcalle= $resultados[0]->callev ?? null;
                $consultaavnum = $resultados[0]->numerov ?? null;
                $consultaavcolonia = $resultados[0]->coloniconsultaav ?? null;
                $consultaavcalle2 = $resultados[0]->calle2v ?? null;
                $consultaavcp = $resultados[0]->cpv ?? null;
                $consultaavtelefono = $resultados[0]->telefonov ?? null;
                $consultaavcalle3 = $resultados[0]->calle3v ?? null;
                $consultaavcelular = $resultados[0]->celularv ?? null;
                $consultaavrelacred = $resultados[0]->relacred ?? null;
                $consultaavcasap = $resultados[0]->casap ?? null;
                $consultaavtrabaja = $resultados[0]->trabaja ?? null;
                $consultaavnombreorg = $resultados[0]->nombreorg ?? null;
                $consultaavpuesto = $resultados[0]->puesto ?? null;
                $consultaavsueldo = $resultados[0]->sueldo ?? null;
                $consultaavcallet = $resultados[0]->callet ?? null;
                $consultaavnumerot = $resultados[0]->numerot ?? null;
                $consultaavcoloniat = $resultados[0]->coloniat ?? null;
                $consultaavcalle2t = $resultados[0]->calle2t ?? null;
                $consultaavcpt = $resultados[0]->cpt ?? null;
                $consultaavcalle3t = $resultados[0]->calle3t ?? null;

                
                //Variables para condicionar el acordeon
                $consultaIdAval = 1;  
                $consulta2IdAval = 0;
              
             
                //Si la validacion arroja que es valida la curp para registrar a su padre
            
                //Se ejecuta el procedimiento para cargar el lugar de nacimiento del papá
  
                $idLocalidadNacR1 = [$consultaavidlocalidad];
                $nombreprocedimiento2= 'ObtenerLugarNacimiento';
                $procedimiento2 = new ContadorParametros();
                $localidadNac = $procedimiento2->proceSelect($nombreprocedimiento2, $idLocalidadNacR1); 
                
                $consultanombreLocalidadAval = $localidadNac[0]->Localidad ?? null;
                $consultanombreMunicipioAval = $localidadNac[0]->NombreMunicipio ?? null;
                $consultanombreEstadoAval = $localidadNac[0]->NombreEstado ?? null;
                
                $nombreEstadoAval=null;

                   
                    return view('layouts-form.form6', [
                        'xml1' => $xml1,
                        'consultaavcurp' => $consultaavcurp,
                        'consultaavfechanac' => $consultaavfechanac,
                        'consultaavsexo' => $consultaavsexo,
                        'consultaavpaterno' => $consultaavpaterno,
                        'consultaavmaterno' => $consultaavmaterno,
                        'consultaavnombre' => $consultaavnombre,
                        'consultaavidlocalidad' => $consultaavidlocalidad,
                        'estados' => $estados,
                        'consultanombreLocalidadAval' => $consultanombreLocalidadAval,
                        'consultanombreMunicipioAval' => $consultanombreMunicipioAval,
                        'consultanombreEstadoAval' => $consultanombreEstadoAval,
                        'consultaavcalle' => $consultaavcalle,
                        'consultaavnum' => $consultaavnum,
                        'consultaavcolonia' => $consultaavcolonia,
                        'consultaavcalle2' => $consultaavcalle2,
                        'consultaavcp' => $consultaavcp,
                        'consultaavtelefono' => $consultaavtelefono,
                        'consultaavcalle3' => $consultaavcalle3,
                        'consultaavcelular' => $consultaavcelular,
                        'consultaavrelacred' => $consultaavrelacred,
                        'consultaavcasap' => $consultaavcasap,
                        'consultaavtrabaja' => $consultaavtrabaja,
                        'consultaavnombreorg' => $consultaavnombreorg,
                        'consultaavpuesto' => $consultaavpuesto,
                        'consultaavsueldo' => $consultaavsueldo,
                        'consultaavcallet' => $consultaavcallet,
                        'consultaavnumerot' => $consultaavnumerot,
                        'consultaavcoloniat' => $consultaavcoloniat,
                        'consultaavcalle2t' => $consultaavcalle2t,
                        'consultaavcpt' => $consultaavcpt,
                        'consultaavcalle3t' => $consultaavcalle3t,
                        'nombreEstadoAval' => $nombreEstadoAval,
                        'consultaIdAval' => $consultaIdAval,
                        'consulta2IdAval' => $consulta2IdAval
                    ]);

                
                  

            } else {
                $errorMessage = "Tu curp no se encuentra en el sistema.";
                return view('layouts-form.form6', ['errorMessage' => $errorMessage]);
            }

        }
    }
}
