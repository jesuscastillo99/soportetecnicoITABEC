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
use Illuminate\Support\Facades\Redirect;
class Form8Controller extends Controller
{
    public function index(){
        //Procedimiento para obtener los datos del R1
        $nombreProcedimiento= 'ObtenerR1R2F8';
        $usuario = Auth::user();
        $curpId = $usuario->curp;
            $arrayIdCurp = [$curpId];
            $proceUser = 'ObtenerUserId';
            $obtenerId = new ContadorParametros();
            $resultId = $obtenerId->proceSelect($proceUser, $arrayIdCurp);
            $userId = $resultId[0]->idsolicitante ?? null;
        $array1= [$userId, 4];
        $claseproce = new ContadorParametros();
        $resultados = $claseproce->proceSelect($nombreProcedimiento, $array1);
        $consultaIdR1 = $resultados[0]->idpersona ?? null;
        $r1curp= $resultados[0]->curp ?? null;
        $r1paterno = $resultados[0]->paterno ?? null;
        $r1materno = $resultados[0]->materno ?? null;
        $r1nombre = $resultados[0]->nombre ?? null;
        $r1fechanac = $resultados[0]->fechanac ?? null;
        $r1sexo = $resultados[0]->sexo ?? null;
        if ($r1sexo !== null) {
            if ($r1sexo == 1) {
                $r1sexo = 'Masculino';
            } else if ($r1sexo == 0) {
                $r1sexo = 'Femenino';
            }
        }
        $r1locnac = $resultados[0]->locnac ?? null;
        $r1calledom = $resultados[0]->calle ?? null;
        $r1num = $resultados[0]->numero ?? null;
        $r1colonia = $resultados[0]->colonia ?? null;
        $r1calle2 = $resultados[0]->calle2 ?? null;
        $r1calle3 = $resultados[0]->calle3 ?? null;
        $r1cp = $resultados[0]->cp ?? null;
        $r1idlocalidad = $resultados[0]->idlocalidad ?? null;
        $r1telefono = $resultados[0]->telefono ?? null;
        $r1celular = $resultados[0]->celular ?? null;
        
        
        //Obtener estados para cargarlos
        $estados = Estado::pluck('NombreEstado', 'IdEstado');

        //Se ejecuta el procedimiento para cargar el lugar de nacimiento del r1
        $idLocalidadNacR1 = [$r1locnac];
        $nombreprocedimiento2= 'ObtenerLugarNacimiento';
        $procedimiento2 = new ContadorParametros();
        $localidadNac = $procedimiento2->proceSelect($nombreprocedimiento2, $idLocalidadNacR1); 
        
        $nombreLocalidadNacR1 = $localidadNac[0]->Localidad ?? null;
        $nombreMunicipioNacR1 = $localidadNac[0]->NombreMunicipio ?? null;
        $nombreEstadoNacR1 = $localidadNac[0]->NombreEstado ?? null;
       // dd($nombreEstadoNacR1);
        //Se ejecuta el procedimiento para cargar el lugar del domicilio de r1
        $idLocalidadR1 = [$r1idlocalidad];
        $localidadR1 = $procedimiento2->proceSelect($nombreprocedimiento2, $idLocalidadR1); 
        
        $nombreLocalidadR1 = $localidadR1[0]->Localidad ?? null;
        $nombreMunicipioR1 = $localidadR1[0]->NombreMunicipio ?? null;
        $nombreEstadoR1 = $localidadR1[0]->NombreEstado ?? null;

        /*CODIGO SOBRE LA REFERENCIA NUMERO 2 */
        $array2= [$userId, 5];
        $claseproce2 = new ContadorParametros();
        $resultados2 = $claseproce2->proceSelect($nombreProcedimiento, $array2);
        $r2curp= $resultados2[0]->curp ?? null;
        $r2paterno = $resultados2[0]->paterno ?? null;
        $r2materno = $resultados2[0]->materno ?? null;
        $r2nombre = $resultados2[0]->nombre ?? null;
        $r2fechanac = $resultados2[0]->fechanac ?? null;
        $r2sexo = $resultados2[0]->sexo ?? null;
        if ($r2sexo !== null) {
            if ($r2sexo == 1) {
                $r2sexo = 'Masculino';
            } else if ($r2sexo == 0) {
                $r2sexo = 'Femenino';
            }
        }
        $r2locnac = $resultados2[0]->locnac ?? null;
        $r2calledom = $resultados2[0]->calle ?? null;
        $r2num = $resultados2[0]->numero ?? null;
        $r2colonia = $resultados2[0]->colonia ?? null;
        $r2calle2 = $resultados2[0]->calle2 ?? null;
        $r2calle3 = $resultados2[0]->calle3 ?? null;
        $r2cp = $resultados2[0]->cp ?? null;
        $r2idlocalidad = $resultados2[0]->idlocalidad ?? null;
        $r2telefono = $resultados2[0]->telefono ?? null;
        $r2celular = $resultados2[0]->celular ?? null;
        $consultaIdR2 = $resultados2[0]->idpersona ?? null;
        //Se ejecuta el procedimiento para cargar el lugar de nacimiento del r2
        $idLocalidadNacR2 = [$r2locnac];
        //COMENTARIO PARA RECORDARTE QUE PUEDE HABER UN ERROR
        $localidadNac2 = $procedimiento2->proceSelect($nombreprocedimiento2, $idLocalidadNacR2); 
        
        $nombreLocalidadNacR2 = $localidadNac2[0]->Localidad ?? null;
        $nombreMunicipioNacR2 = $localidadNac2[0]->NombreMunicipio ?? null;
        $nombreEstadoNacR2 = $localidadNac2[0]->NombreEstado ?? null;

        //Se ejecuta el procedimiento para cargar el lugar del r2
        $idLocalidadR2 = [$r2idlocalidad];
        //COMENTARIO PARA RECORDARTE QUE PUEDE HABER UN ERROR
        $localidadR2 = $procedimiento2->proceSelect($nombreprocedimiento2, $idLocalidadR2); 
        
        $nombreLocalidadR2 = $localidadR2[0]->Localidad ?? null;
        $nombreMunicipioR2 = $localidadR2[0]->NombreMunicipio ?? null;
        $nombreEstadoR2 = $localidadR2[0]->NombreEstado ?? null;

        //condiciones para mostrar acordeon
        if($consultaIdR1==null){
            $consultaIdR1=0;
        } 
        if ($consultaIdR2==null){
            $consultaIdR2=0;
        }

        
        return view('layouts-form.form8', [
            'estados' => $estados,
            'r1curp' => $r1curp,
            'r1paterno' => $r1paterno,
            'r1materno' => $r1materno,
            'r1nombre' => $r1nombre,
            'r1fechanac' => $r1fechanac,
            'r1sexo' => $r1sexo,
            'r1calledom' => $r1calledom,
            'r1num' => $r1num,
            'r1colonia' => $r1colonia,
            'r1calle2' => $r1calle2,
            'r1calle3' => $r1calle3,
            'r1cp' => $r1cp,
            'r1telefono' => $r1telefono,
            'r1celular' => $r1celular,
            'idLocalidadR1' => $r1idlocalidad,
            'idLocalidadNacR1' => $r1locnac,
            'nombreLocalidadNacR1' => $nombreLocalidadNacR1,
            'nombreMunicipioNacR1' => $nombreMunicipioNacR1,
            'nombreEstadoNacR1' => $nombreEstadoNacR1,
            'nombreLocalidadR1' => $nombreLocalidadR1,
            'nombreMunicipioR1' => $nombreMunicipioR1,
            'nombreEstadoR1' => $nombreEstadoR1,
            'consultaIdR1' => $consultaIdR1,
            //Variables R2
            'r2curp' => $r2curp,
            'r2paterno' => $r2paterno,
            'r2materno' => $r2materno,
            'r2nombre' => $r2nombre,
            'r2fechanac' => $r2fechanac,
            'r2sexo' => $r2sexo,
            'r2calledom' => $r2calledom,
            'r2num' => $r2num,
            'r2colonia' => $r2colonia,
            'r2calle2' => $r2calle2,
            'r2calle3' => $r2calle3,
            'r2cp' => $r2cp,
            'r2telefono' => $r2telefono,
            'r2celular' => $r2celular,
            'idLocalidadR2' => $r2idlocalidad,
            'idLocalidadNacR2' => $r2locnac,
            'nombreLocalidadNacR2' => $nombreLocalidadNacR2,
            'nombreMunicipioNacR2' => $nombreMunicipioNacR2,
            'nombreEstadoNacR2' => $nombreEstadoNacR2,
            'nombreLocalidadR2' => $nombreLocalidadR2,
            'nombreMunicipioR2' => $nombreMunicipioR2,
            'nombreEstadoR2' => $nombreEstadoR2,
            'consultaIdR2' => $consultaIdR2,
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

    public function form8ValidarR1(Request $request)
    {
        $curp1 = $request->curpvr1;
        $usuario = Auth::user();
        $curpId = $usuario->curp;
            $arrayIdCurp = [$curpId];
            $proceUser = 'ObtenerUserId';
            $obtenerId = new ContadorParametros();
            $resultId = $obtenerId->proceSelect($proceUser, $arrayIdCurp);
            $userId = $resultId[0]->idsolicitante ?? null;
        //Validación para que la curp del papá no sea la misma que la del usuario
        if($curp1 == $usuario->curp){
            session()->flash('error', 'La CURP es la misma que el usuario.');
            return view('layouts-form.form8');
        }else {
            session()->forget('error');
            if($curp1)
            //Validación para saber si existe esa persona en el sistema de CURPS del gobierno
            $xml1 = $this->consultarWebService($curp1);
    
            if ($xml1 ?? null) {
               
                //Obtener estados para cargarlos
                $estados = Estado::pluck('NombreEstado', 'IdEstado');
                //Obtener a la persona a través de su curp con el procedimiento almacenado
                $nombreProcedimiento1= 'ObtenerR1R2F8';
                $arrayCurp = [$userId, 4];
                $procedimiento = new ContadorParametros();
                $resultados = $procedimiento->proceSelect($nombreProcedimiento1, $arrayCurp);
                //dd($resultados);
                // Verificar si se obtuvieron resultados para almacenar el id y la localidad de la personna (papá)
            
                
                $consultaLocNacR1 = $resultados[0]->locnac ?? null;
                $consultaIdLocalidadR1 = $resultados[0]->idlocalidad ?? null;
                $consultaCalleR1 = $resultados[0]->calle ?? null;
                $consultaNumeroR1 = $resultados[0]->numero ?? null;
                $consultaColoniaR1 = $resultados[0]->colonia ?? null;
                $consultaCalle2R1 = $resultados[0]->calle2 ?? null;
                $consultaCalle3R1 = $resultados[0]->calle3 ?? null;
                $consultaCpR1 = $resultados[0]->cp ?? null;
                $consultaTelefonoR1 = $resultados[0]->telefono ?? null;
                $consultaCelularR1 = $resultados[0]->celular ?? null;
                //Variables para condicionar el acordeon
                $consultaIdR1 = 1;
                $consultaIdR2 = 1;    
                $consulta2IdR1 = 0;
                $consulta2IdR2 = 1;

                

             
                //Si la validacion arroja que es valida la curp para registrar a su padre
                
                    //Se ejecuta el procedimiento para cargar el lugar de nacimiento del papá
                    $idLocalidadNacR1 = [$consultaLocNacR1];
                    $nombreprocedimiento3= 'ObtenerLugarNacimiento';
                    $procedimiento3 = new ContadorParametros();
                    $localidadNacR1 = $procedimiento3->proceSelect($nombreprocedimiento3, $idLocalidadNacR1);    

                    //En caso de que sea nulo
                    $nombreLocalidadNacR1 = $localidadNacR1[0]->Localidad ?? null;
                    $nombreMunicipioNacR1 = $localidadNacR1[0]->NombreMunicipio ?? null;
                    $nombreEstadoNacR1 = $localidadNacR1[0]->NombreEstado ?? null;
                    
                    //Se ejecuta el procedimiento de obtener lugar de R1
                    $idLocalidadR1 = [$consultaIdLocalidadR1];
                    $localidadR1 = $procedimiento3->proceSelect($nombreprocedimiento3, $idLocalidadR1);    

                    //En caso de que sea nulo
                    $nombreLocalidadR1 = $localidadR1[0]->Localidad ?? null;
                    $nombreMunicipioR1 = $localidadR1[0]->NombreMunicipio ?? null;
                    $nombreEstadoR1 = $localidadR1[0]->NombreEstado ?? null;
                    $nombreEstadoR2=NULL;
                    $nombreEstadoNacR2=NULL;
                    alert()
                    ->success('CURP ENCONTRADA')
                    ->showConfirmButton('Aceptar', '#ab0033');
                    return view('layouts-form.form8', [
                        'xml1' => $xml1,
                        'estados' => $estados,
                        'idLocalidadR1' => $consultaIdLocalidadR1,
                        'idLocalidadNacR1' => $consultaLocNacR1,
                        'nombreLocalidadNacR1' => $nombreLocalidadNacR1,
                        'nombreMunicipioNacR1' => $nombreMunicipioNacR1,
                        'nombreEstadoNacR1' => $nombreEstadoNacR1,
                        'nombreLocalidadR1' => $nombreLocalidadR1,
                        'nombreMunicipioR1' => $nombreMunicipioR1,
                        'nombreEstadoR1' => $nombreEstadoR1,
                        'consultaCalleR1' => $consultaCalleR1,
                        'consultaCalle2R1' => $consultaCalle2R1,
                        'consultaCalle3R1' => $consultaCalle3R1,
                        'consultaNumeroR1' => $consultaNumeroR1,
                        'consultaColoniaR1' => $consultaColoniaR1,
                        'consultaCpR1' => $consultaCpR1,
                        'consultaTelefonoR1' => $consultaTelefonoR1,
                        'consultaCelularR1' => $consultaCelularR1,
                        'consulta2IdR1' =>  $consulta2IdR1,
                        'consulta2IdR2' =>  $consulta2IdR2,
                        'consultaIdR1' => $consultaIdR1,
                        'consultaIdR2' => $consultaIdR2,
                        'nombreEstadoR2' => $nombreEstadoR2,
                        'nombreEstadoNacR2' => $nombreEstadoNacR2,
                    ]);

                
                  

            } else {
                alert()
                ->error('CURP NO ENCONTRADA')
                ->showConfirmButton('Aceptar', '#ab0033');
                return Redirect::route('form8-formulario');
                $errorMessage = "Tu curp no se encuentra en el sistema.";
                return view('layouts-form.form3', ['errorMessage' => $errorMessage]);
            }

        }
    }

    public function form8ValidarR2(Request $request)
    {
        $curp2 = $request->curpvr2;
        $usuario = Auth::user();
        $curpId = $usuario->curp;
            $arrayIdCurp = [$curpId];
            $proceUser = 'ObtenerUserId';
            $obtenerId = new ContadorParametros();
            $resultId = $obtenerId->proceSelect($proceUser, $arrayIdCurp);
            $userId = $resultId[0]->idsolicitante ?? null;
        //Validación para que la curp del papá no sea la misma que la del usuario
        if($curp2 == $usuario->curp){
            session()->flash('error', 'La CURP es la misma que el usuario.');
            return view('layouts-form.form8');
        }else {
            session()->forget('error');
            if($curp2)
            //Validación para saber si existe esa persona en el sistema de CURPS del gobierno
            $xml2 = $this->consultarWebService($curp2);
    
            if ($xml2 ?? null) {
                //$userId= $usuario->idlog;
                //Obtener estados para cargarlos
                $estados = Estado::pluck('NombreEstado', 'IdEstado');
                //Obtener a la persona a través de su curp con el procedimiento almacenado
                $nombreProcedimiento1= 'ObtenerR1R2F8';
                $arrayCurp = [$userId, 5];
                $procedimiento = new ContadorParametros();
                $resultados = $procedimiento->proceSelect($nombreProcedimiento1, $arrayCurp);
                //dd($resultados);
                // Verificar si se obtuvieron resultados para almacenar el id y la localidad de la personna (papá)
            
                
                $consultaLocNacR2 = $resultados[0]->locnac ?? null;
                $consultaIdLocalidadR2 = $resultados[0]->idlocalidad ?? null;
                $consultaCalleR2 = $resultados[0]->calle ?? null;
                $consultaNumeroR2 = $resultados[0]->numero ?? null;
                $consultaColoniaR2 = $resultados[0]->colonia ?? null;
                $consultaCalle2R2 = $resultados[0]->calle2 ?? null;
                $consultaCalle3R2 = $resultados[0]->calle3 ?? null;
                $consultaCpR2 = $resultados[0]->cp ?? null;
                $consultaTelefonoR2 = $resultados[0]->telefono ?? null;
                $consultaCelularR2 = $resultados[0]->celular ?? null;
                $consultaIdR1 = 1;
                $consultaIdR2 = 1;    
                $consulta2IdR1 = 1;
                $consulta2IdR2 = 0;
            
                $existeCurpR1 = $resultados[0]->idpersona ?? null;
                //$existeCurpR2 = $this->obtenerIdR2();

             
                //Si la validacion arroja que es valida la curp para registrar a su padre
                
                    //Se ejecuta el procedimiento para cargar el lugar de nacimiento del papá
                    $idLocalidadNacR2 = [$consultaLocNacR2];
                    $nombreprocedimiento3= 'ObtenerLugarNacimiento';
                    $procedimiento3 = new ContadorParametros();
                    $localidadNacR2 = $procedimiento3->proceSelect($nombreprocedimiento3, $idLocalidadNacR2);    

                    //En caso de que sea nulo
                    $nombreLocalidadNacR2 = $localidadNacR2[0]->Localidad ?? null;
                    $nombreMunicipioNacR2 = $localidadNacR2[0]->NombreMunicipio ?? null;
                    $nombreEstadoNacR2 = $localidadNacR2[0]->NombreEstado ?? null;
                    
                    //Se ejecuta el procedimiento de obtener lugar de R2
                    $idLocalidadR2 = [$consultaIdLocalidadR2];
                    $localidadR2 = $procedimiento3->proceSelect($nombreprocedimiento3, $idLocalidadR2);    

                    //En caso de que sea nulo
                    $nombreLocalidadR2 = $localidadR2[0]->Localidad ?? null;
                    $nombreMunicipioR2 = $localidadR2[0]->NombreMunicipio ?? null;
                    $nombreEstadoR2 = $localidadR2[0]->NombreEstado ?? null;
                    $nombreEstadoR1= NULL;
                    $nombreEstadoNacR1= NULL;
                    alert()
                    ->success('CURP ENCONTRADA')
                    ->showConfirmButton('Aceptar', '#ab0033');
                    return view('layouts-form.form8', [
                        'xml2' => $xml2,
                        'estados' => $estados,
                        'idLocalidadR2' => $consultaIdLocalidadR2,
                        'idLocalidadNacR2' => $consultaLocNacR2,
                        'nombreLocalidadNacR2' => $nombreLocalidadNacR2,
                        'nombreMunicipioNacR2' => $nombreMunicipioNacR2,
                        'nombreEstadoNacR2' => $nombreEstadoNacR2,
                        'nombreLocalidadR2' => $nombreLocalidadR2,
                        'nombreMunicipioR2' => $nombreMunicipioR2,
                        'nombreEstadoR2' => $nombreEstadoR2,
                        'consultaCalleR2' => $consultaCalleR2,
                        'consultaCalle2R2' => $consultaCalle2R2,
                        'consultaCalle3R2' => $consultaCalle3R2,
                        'consultaNumeroR2' => $consultaNumeroR2,
                        'consultaColoniaR2' => $consultaColoniaR2,
                        'consultaCpR2' => $consultaCpR2,
                        'consultaTelefonoR2' => $consultaTelefonoR2,
                        'consultaCelularR2' => $consultaCelularR2,
                        'consulta2IdR1' =>  $consulta2IdR1,
                        'consulta2IdR2' =>  $consulta2IdR2,
                        'consultaIdR1' => $consultaIdR1,
                        'consultaIdR2' => $consultaIdR2,
                        'nombreEstadoR1' => $nombreEstadoR1,
                        'nombreEstadoNacR1' => $nombreEstadoNacR1,
                    ]);

                
                  

            } else {
                alert()
                ->error('CURP NO ENCONTRADA')
                ->showConfirmButton('Aceptar', '#ab0033');
                return Redirect::route('form8-formulario');
                $errorMessage = "Tu curp no se encuentra en el sistema.";
                return view('layouts-form.form3', ['errorMessage' => $errorMessage]);
            }

        }
    }

    
}
