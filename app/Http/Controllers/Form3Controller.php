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
use Illuminate\Support\Facades\Redirect;



class Form3Controller extends Controller
{
    public function index()
    {      
        $nombreProcedimiento1= 'ObtenerPadre';
        $usuario = Auth::user();
        $curpId = $usuario->curp;
        $arrayIdCurp = [$curpId];
        $proceUser = 'ObtenerUserId';
        $obtenerId = new ContadorParametros();
        $resultId = $obtenerId->proceSelect($proceUser, $arrayIdCurp);
        $userId = $resultId[0]->idsolicitante ?? null;

        $arrayCurp = [$userId];
        
        //PROCEDIMIENTO PARA OBTENER PERSONA VIVECON
        $proceObtenerPersona = 'ObtenerDatosPersona';
        $procedimientoPerso = new ContadorParametros();
        $viveconPerso = $procedimientoPerso->proceSelect($proceObtenerPersona,  $arrayIdCurp);
        $vivecon = $viveconPerso[0]->vivecon ?? null;
       
        //Si vive con ambos padres, se iguala a cero el null
        if($vivecon==null){
            $vivecon=12;
        }
        //Si vive con la mamá solamente entonces se manda un 10 como variable para ocultar los campos del padre
        if($vivecon==1){
            $vivecon=10;
        }

        //Si vive con el papá solamente se manda un 11 como variable
        if($vivecon==2){
            $vivecon=11;
        }

        //dd($vivecon);
        

         
        //PROCEDIMIENTO PARA OBTENER PADRE
        $procedimiento = new ContadorParametros();
        $resultados= $procedimiento->proceSelect($nombreProcedimiento1, $arrayCurp);
        
        if (!empty($resultados)) {
            $consultaPadre = true;
            $consultaIdPadre = $resultados[0]->idpersona;
            $existeCurpPadre = $resultados[0]->idpersona;
            $consultaPadreCurp = $resultados[0]->curp;
            $consultaPFechaNac = $resultados[0]->fechanac;
            $consultaPSexo = $resultados[0]->sexo;
            if($consultaPSexo==1){
                $consultaPSexo = 'Masculino';
            } else {
                $consultaPSexo = 'Femenino';
            }
            $consultaPPaterno = $resultados[0]->paterno;
            $consultaPMaterno = $resultados[0]->materno;
            $consultaPNombre = $resultados[0]->nombre;
            $consultaPLocalidad = $resultados[0]->locnac;
            $consultaPTrabaja = $resultados[0]->trabaja;
            $consultaPEstudios = $resultados[0]->ult_grad_estudios;
            
            //$consultaTrabaja = $resultados[0]->trabaja;
            
          
        } else {
            // Si no se obtienen resultados, se declara null por cualquier cosa
            $consultaPadre = 0;
            $consultaPadreCurp = null;
            $consultaPFechaNac = null;
            $consultaPSexo = null; 
            $consultaPPaterno = null; 
            $consultaPMaterno = null;
            $consultaPNombre = null; 
            $consultaPLocalidad = null; 
            $consultaPTrabaja = null; 
            $consultaPEstudios = null;
            $existeCurpPadre =null;
            $consultaIdPadre = null;
        }

        if( $consultaIdPadre==null){
            $existeCurpPadre=0;
            $consultaIdPadre=0;
        }
        //Obtener estados para cargarlos
        $estados = Estado::pluck('NombreEstado', 'IdEstado');

        //Se ejecuta el procedimiento para cargar el lugar de nacimiento del papá
        $idLocalidad = [$consultaPLocalidad];
        $nombreprocedimiento2= 'ObtenerLugarNacimiento';
        $procedimiento2 = new ContadorParametros();
        $localidad = $procedimiento2->proceSelect($nombreprocedimiento2, $idLocalidad); 
        //dd($localidad);
        //En caso de que sea nulo
        $nombreLocalidad = $localidad[0]->Localidad ?? null;
        $nombreMunicipio = $localidad[0]->NombreMunicipio ?? null;
        $nombreEstado2 = $localidad[0]->NombreEstado ?? null;

        //TODO SOBRE EL FORMULARIO DE LA MADRE
        $nombreProcedimiento2= 'ObtenerMadreF3';
        $arrayCurp2 = [$userId];
        $procedimientoM = new ContadorParametros();
        $resultadosM= $procedimientoM->proceSelect($nombreProcedimiento2, $arrayCurp2);
        
        if (!empty($resultadosM)) {
            $consultaMadre = true;
            $consultaIdMadre = $resultadosM[0]->idpersona;
            $existeCurpMadre = $resultadosM[0]->idpersona;
            $consultaMadreCurp = $resultadosM[0]->curp;
            $consultaMFechaNac = $resultadosM[0]->fechanac;
            $consultaMSexo = $resultadosM[0]->sexo;
            if($consultaMSexo==1){
                $consultaMSexo = 'Masculino';
            } else {
                $consultaMSexo = 'Femenino';
            }
            $consultaMPaterno = $resultadosM[0]->paterno;
            $consultaMMaterno = $resultadosM[0]->materno;
            $consultaMNombre = $resultadosM[0]->nombre;
            $consultaMLocalidad = $resultadosM[0]->locnac;
            $consultaMTrabaja = $resultadosM[0]->trabaja;
            $consultaMEstudios = $resultadosM[0]->ult_grad_estudios;
            
            //$consultaTrabaja = $resultados[0]->trabaja;
            
          
        } else {
            // Si no se obtienen resultados, se declara null por cualquier cosa
            $consultaMadre = 0;
            $consultaMadreCurp = null;
            $consultaMFechaNac = null;
            $consultaMSexo = null; 
            $consultaMPaterno = null; 
            $consultaMMaterno = null;
            $consultaMNombre = null; 
            $consultaMLocalidad = null; 
            $consultaMTrabaja = null; 
            $consultaMEstudios = null;
            $existeCurpMadre =null;
            $consultaIdMadre = null;
        }

        if($consultaIdMadre==null){
            $existeCurpMadre=0;
            $consultaIdMadre=0;
        }
        //Obtener estados para cargarlos
        $estados2 = Estado::pluck('NombreEstado', 'IdEstado');

        //Se ejecuta el procedimiento para cargar el lugar de nacimiento del papá
        $idLocalidad2 = [$consultaMLocalidad];
        $nombreprocedimiento2M= 'ObtenerLugarNacimiento';
        $procedimiento2M = new ContadorParametros();
        $localidad2 = $procedimiento2M->proceSelect($nombreprocedimiento2M, $idLocalidad2); 

        //En caso de que sea nulo
        $nombreLocalidad2 = $localidad2[0]->Localidad ?? null;
        $nombreMunicipio2 = $localidad2[0]->NombreMunicipio ?? null;
        $nombreEstado22 = $localidad2[0]->NombreEstado ?? null;


        //CODIGO SOBRE EL CONYUGE
        // $datosConyuge=$this->obtenerDatosConyuge();
        // $consultaIdConyuge=$datosConyuge->idpersona ?? null;
        // $existeCurpConyuge=$datosConyuge->idpersona ?? null;
        // $curpcon=$datosConyuge->curp ?? null;
        // $paternocon=$datosConyuge->paterno ?? null;
        // $maternocon=$datosConyuge->materno ?? null;
        // $nombrecon=$datosConyuge->nombre ?? null;
        // $sexocon=$datosConyuge->sexo ?? null;
        // if ($sexocon !== null) {
        //     if ($sexocon == 1) {
        //         $sexocon = 'Masculino';
        //     } else if ($sexocon == 0) {
        //         $sexocon = 'Femenino';
        //     }
        // }
        // $fechanac=$datosConyuge->fechanac ?? null;
        // $idLocalidadCon= $datosConyuge->locnac ?? null;
        // $trabajacon=$datosConyuge->trabaja ?? null;
        // $ultgradcon=$datosConyuge->ult_grad_estudios ?? null;

        // if( $consultaIdConyuge==null){
        //     $existeCurpConyuge=0;
        //     $consultaIdConyuge=0;
        // }

        // //Se ejecuta el procedimiento para cargar el lugar de nacimiento del conyuge
        // $idLocalidad3 = [$idLocalidadCon];
        // $nombreprocedimientoLCon= 'ObtenerLugarNacimiento';
        // $procedimientoLCon = new ContadorParametros();
        // $localidad3 = $procedimientoLCon->proceSelect($nombreprocedimientoLCon, $idLocalidad3); 

        // //En caso de que sea nulo
        // $nombreLocalidad3 = $localidad3[0]->Localidad ?? null;
        // $nombreMunicipio3 = $localidad3[0]->NombreMunicipio ?? null;
        // $nombreEstado3 = $localidad3[0]->NombreEstado ?? null;
        

        //CODIGO SOBRE EL REGISTRO 3 DEL FORM 3
        $datosF3R3= $this->obtenerDatosF3R3();
        //dd($datosF3R3);
            return view('layouts-form.form3', [
                'consultaPadre' => $consultaPadre,
                'consultaPadreCurp' => $consultaPadreCurp,
                'consultaPFechaNac' => $consultaPFechaNac,
                'consultaPSexo' => $consultaPSexo,
                'consultaPPaterno' => $consultaPPaterno,
                'consultaPMaterno' => $consultaPMaterno,
                'consultaPNombre' => $consultaPNombre,
                'localidadPadre' => $consultaPLocalidad,
                'consultaPTrabaja' => $consultaPTrabaja,
                'consultaPEstudios' => $consultaPEstudios,
                'estados' => $estados,
                'nombreLocalidad' => $nombreLocalidad,
                'nombreMunicipio' => $nombreMunicipio,
                'nombreEstado2' => $nombreEstado2,
                'consultaIdPadre' => $consultaIdPadre,
                'existeCurpPadre' => $existeCurpPadre,
                //VARIABLES DE LA MADRE
                'consultaMadre' => $consultaMadre,
                'consultaMadreCurp' => $consultaMadreCurp,
                'consultaMFechaNac' => $consultaMFechaNac,
                'consultaMSexo' => $consultaMSexo,
                'consultaMPaterno' => $consultaMPaterno,
                'consultaMMaterno' => $consultaMMaterno,
                'consultaMNombre' => $consultaMNombre,
                'localidadMadre' => $consultaMLocalidad,
                'consultaMTrabaja' => $consultaMTrabaja,
                'consultaMEstudios' => $consultaMEstudios,
                'estados2' => $estados2,
                'nombreLocalidad2' => $nombreLocalidad2,
                'nombreMunicipio2' => $nombreMunicipio2,
                'nombreEstado22' => $nombreEstado22,
                'consultaIdMadre' => $consultaIdMadre,
                'existeCurpMadre' => $existeCurpMadre,
                'datosF3R3' => $datosF3R3,
                'vivecon' => $vivecon]);
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
        $curpId = $usuario->curp;
        $arrayIdCurp = [$curpId];
        $proceUser = 'ObtenerUserId';
        $obtenerId = new ContadorParametros();
        $resultId = $obtenerId->proceSelect($proceUser, $arrayIdCurp);
        $userId = $resultId[0]->idsolicitante ?? null;
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
                alert()
                ->success('CURP ENCONTRADA')
                ->showConfirmButton('Aceptar', '#ab0033');
                //Obtener estados para cargarlos
                $estados = Estado::pluck('NombreEstado', 'IdEstado');
                //Obtener a la persona a través de su curp con el procedimiento almacenado
                $nombreProcedimiento1= 'ObtenerDatosPersona';
                $arrayCurp = [$curp1];
                $procedimiento = new ContadorParametros();
                $resultados= $procedimiento->proceSelect($nombreProcedimiento1, $arrayCurp);
                //dd($resultados);
                // Verificar si se obtuvieron resultados para almacenar el id y la localidad de la personna (papá)
                if (!empty($resultados)) {
                    $consultaIdPadre = $resultados[0]->idpersona;
                    $consultaPadre = true;
                    $consultaLocNacPadre = $resultados[0]->locnac;
                    $consultaTrabaja = $resultados[0]->trabaja;
                    $consultaUltEstudios = $resultados[0]->ult_grad_estudios;
                  
                } else {
                    // Si no se obtienen resultados, se declara null por cualquiercosa
                    $consultaIdPadre = null;
                    $consultaPadre = null;
                    $consultaLocNacPadre = null;
                    $consultaTrabaja = null;
                    $consultaUltEstudios = null;
                }

                $existeCurpPadre = $this->obtenerIdPadre();
                $consultaIdPadre = $this->obtenerIdPadre();
                
                $existeCurpMadre = $this->obtenerIdMadre();
                $consultaIdMadre = $this->obtenerIdMadre();
                //dd($consultaIdPadre);

                 //PROCEDIMIENTO PARA OBTENER PERSONA VIVECON
                $proceObtenerPersona = 'ObtenerDatosPersona';
                $procedimientoPerso = new ContadorParametros();
                $viveconPerso = $procedimientoPerso->proceSelect($proceObtenerPersona,  $arrayIdCurp);
                $vivecon = $viveconPerso[0]->vivecon ?? null;
        
                //Si vive con ambos padres, se iguala a cero el null
                if($vivecon==null){
                    $vivecon=12;
                }
                //Si vive con la mamá solamente entonces se manda un 10 como variable para ocultar los campos del padre
                if($vivecon==1){
                    $vivecon=10;
                }

                //Si vive con el papá solamente se manda un 11 como variable
                if($vivecon==2){
                    $vivecon=11;
                }

                
             
                //Si la validacion arroja que es valida la curp para registrar a su padre
                if($existeCurpPadre!=0){
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
                    //dd($consultaIdPadre);
                  
                    return view('layouts-form.form3', [
                        'xml1' => $xml1,
                        'estados' => $estados,
                        'localidadPadre' => $consultaLocNacPadre,
                        'nombreLocalidad' => $nombreLocalidad,
                        'nombreMunicipio' => $nombreMunicipio,
                        'nombreEstado2' => $nombreEstado2,
                        'consultaTrabaja' => $consultaTrabaja,
                        'consultaUltEstudios' => $consultaUltEstudios,
                        'curpEsValida' => $curpEsValida,
                        'existeCurpPadre' => $existeCurpPadre,
                        'consultaIdPadre' => $consultaIdPadre,
                        'existeCurpMadre' => $existeCurpMadre,
                        'consultaIdMadre' => $consultaIdMadre,
                        'vivecon' => $vivecon 
                    ]);

                } else {
                    //dd($noentro=2);
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
                    //dd($consultaIdPadre);
                    $existeCurpPadre=1;
                   
                    return view('layouts-form.form3', [
                        'xml1' => $xml1,
                        'estados' => $estados,
                        'localidadPadre' => $consultaLocNacPadre,
                        'nombreLocalidad' => $nombreLocalidad,
                        'nombreMunicipio' => $nombreMunicipio,
                        'nombreEstado2' => $nombreEstado2,
                        'consultaTrabaja' => $consultaTrabaja,
                        'consultaUltEstudios' => $consultaUltEstudios,
                        'curpEsValida' => $curpEsValida,
                        'existeCurpPadre' => $existeCurpPadre,
                        'consultaIdPadre' => $consultaIdPadre,
                        'existeCurpMadre' => $existeCurpMadre,
                        'consultaIdMadre' => $consultaIdMadre,
                        'vivecon' => $vivecon 
                    ]);
                }
                  

            } else {
                alert()
                ->error('CURP NO ENCONTRADA')
                ->showConfirmButton('Aceptar', '#ab0033');
                return Redirect::route('form3-formulario');
                
                //$errorMessage = "Tu curp no se encuentra en el sistema.";
                return view('layouts-form.form3');
            }

        }
    }

    public function validarCurpMadre(Request $request)
    {
        $curp1 = $request->curpmadre1;
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
            return view('layouts-form.form3');
        }else {
            session()->forget('error');
            if($curp1)
            //Validación para saber si existe esa persona en el sistema de CURPS del gobierno
            $xml2 = $this->consultarWebService($curp1);

            if ($xml2 ?? null) {
                alert()
                ->success('CURP ENCONTRADA')
                ->showConfirmButton('Aceptar', '#ab0033');
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
                
                $existeCurpMadre = $this->obtenerIdMadre();
                $consultaIdMadre = $this->obtenerIdMadre();

                $existeCurpPadre = $this->obtenerIdPadre();
                $consultaIdPadre = $this->obtenerIdPadre();
                

                 //PROCEDIMIENTO PARA OBTENER PERSONA VIVECON
                $proceObtenerPersona = 'ObtenerDatosPersona';
                $procedimientoPerso = new ContadorParametros();
                $viveconPerso = $procedimientoPerso->proceSelect($proceObtenerPersona,  $arrayIdCurp);
                $vivecon = $viveconPerso[0]->vivecon ?? null;
                
                //Si vive con ambos padres, se iguala a cero el null
                if($vivecon==null){
                    $vivecon=12;
                }
                //Si vive con la mamá solamente entonces se manda un 10 como variable para ocultar los campos del padre
                if($vivecon==1){
                    $vivecon=10;
                }

                //Si vive con el papá solamente se manda un 11 como variable
                if($vivecon==2){
                    $vivecon=11;
                }

                
             
                //Si la consulta arroja que ya tiene un papá registrado
                if($existeCurpMadre!=0){
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
                        'curpEsValida2' => $curpEsValida2,
                        'existeCurpMadre' => $existeCurpMadre,
                        'consultaIdMadre' => $consultaIdMadre,
                        'existeCurpPadre' => $existeCurpPadre,
                        'consultaIdPadre' => $consultaIdPadre,
                        'vivecon' => $vivecon   // Agregar la variable aquí
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
                    $existeCurpMadre=1;
                    return view('layouts-form.form3', [
                        'xml2' => $xml2,
                        'estados2' => $estados2,
                        'localidadMadre' => $consultaLocNacMadre,
                        'nombreLocalidad2' => $nombreLocalidad2,
                        'nombreMunicipio2' => $nombreMunicipio2,
                        'nombreEstado22' => $nombreEstado22,
                        'consultaTrabaja2' => $consultaTrabaja2,
                        'consultaUltEstudios2' => $consultaUltEstudios2,
                        'curpEsValida2' => $curpEsValida2,
                        'existeCurpMadre' => $existeCurpMadre,
                        'consultaIdMadre' => $consultaIdMadre,
                        'existeCurpPadre' => $existeCurpPadre,
                        'consultaIdPadre' => $consultaIdPadre,
                        'vivecon' => $vivecon   // Agregar la variable aquí
                    ]);
                }
                  

            } else {
                alert()
                ->error('CURP NO ENCONTRADA')
                ->showConfirmButton('Aceptar', '#ab0033');
                return Redirect::route('form3-formulario');
                $errorMessage = "Tu curp no se encuentra en el sistema.";
                return view('layouts-form.form3', ['errorMessage' => $errorMessage]);
            }

        }
    }

    // public function validarCurpCon(Request $request)
    // {
    //     $curp1 = $request->curpcon;
    //     $usuario = Auth::user();
    //     $curpId = $usuario->curp;
    //     $arrayIdCurp = [$curpId];
    //     $proceUser = 'ObtenerUserId';
    //     $obtenerId = new ContadorParametros();
    //     $resultId = $obtenerId->proceSelect($proceUser, $arrayIdCurp);
    //     $userId = $resultId[0]->idsolicitante ?? null;
    //     //Validación para que la curp del papá no sea la misma que la del usuario
    //     if($curp1 == $usuario->curp){
    //         session()->flash('error', 'La CURP es la misma que el usuario.');
    //         return view('layouts-form.form3');
    //     }else {
    //         session()->forget('error');
    //         if($curp1)
    //         //Validación para saber si existe esa persona en el sistema de CURPS del gobierno
    //         $xml3 = $this->consultarWebService($curp1);
            
    //         if ($xml3 ?? null) {
    //             alert()
    //             ->success('CURP ENCONTRADA')
    //             ->showConfirmButton('Aceptar', '#ab0033');
    //             //$userId= $usuario->idlog;
    //             //Obtener estados para cargarlos
    //             $estados = Estado::pluck('NombreEstado', 'IdEstado');
    //             //Obtener a la persona a través de su curp con el procedimiento almacenado
    //             $nombreProcedimiento1= 'ObtenerConyuge';
    //             $arrayCurp = [$userId];
    //             $procedimiento = new ContadorParametros();
    //             $resultados = $procedimiento->proceSelect($nombreProcedimiento1, $arrayCurp);
                
    //             // Verificar si se obtuvieron resultados para almacenar el id y la localidad de la personna (papá)
    //             $consultaaccurp= $resultados[0]->curp ?? null;
    //             $consultaacfechanac = $resultados[0]->fechanac ?? null;
    //             $consultaacsexo = $resultados[0]->sexo ?? null;
    //             if ($consultaacsexo !== null) {
    //                 if ($consultaacsexo == 1) {
    //                     $consultaacsexo = 'Masculino';
    //                 } else if ($consultaacsexo == 0) {
    //                     $consultaacsexo = 'Femenino';
    //                 }
    //             }
    //             $consultacpaterno = $resultados[0]->paterno ?? null;
    //             $consultacmaterno = $resultados[0]->materno ?? null;
    //             $consultacnombre = $resultados[0]->nombre ?? null;
    //             $consultacidlocalidad = $resultados[0]->locnac ?? null;
    //             $consultactrabaja = $resultados[0]->trabaja ?? null;
    //             $consultacultgrad = $resultados[0]->ult_grad_estudios ?? null;

              
    //             $existeCurpPadre = $this->obtenerIdPadre();
    //             $consultaIdPadre = $this->obtenerIdPadre();
                
    //             $existeCurpMadre = $this->obtenerIdMadre();
    //             $consultaIdMadre = $this->obtenerIdMadre();

    //             $existeCurpConyuge = $this->obtenerIdConyuge();
    //             $consultaIdConyuge = $this->obtenerIdConyuge();
                
    //             // $consultaIdConyuge = 1;  
    //             // $consulta2IdConyuge = 0;
    //             //dd($consultaIdPadre);

    //              //PROCEDIMIENTO PARA OBTENER PERSONA VIVECON
    //             $proceObtenerPersona = 'ObtenerDatosPersona';
    //             $procedimientoPerso = new ContadorParametros();
    //             $viveconPerso = $procedimientoPerso->proceSelect($proceObtenerPersona,  $arrayIdCurp);
    //             $vivecon = $viveconPerso[0]->vivecon ?? null;
        
    //             //Si vive con ambos padres, se iguala a cero el null
    //             if($vivecon==null){
    //                 $vivecon=0;
    //             }
    //             //Si vive con la mamá solamente entonces se manda un 10 como variable para ocultar los campos del padre
    //             if($vivecon==1){
    //                 $vivecon=10;
    //             }

    //             //Si vive con el papá solamente se manda un 11 como variable
    //             if($vivecon==2){
    //                 $vivecon=11;
    //             }
             
    //             //Si vive con el conyuge u otro
    //             if($vivecon==3||$vivecon=4){
    //                 $vivecon=12;
    //             }
             
            
    //                 //Se ejecuta el procedimiento para cargar el lugar de nacimiento del papá
    //                 $idLocalidad = [$consultacidlocalidad];
    //                 $nombreprocedimiento3= 'ObtenerLugarNacimiento';
    //                 $procedimiento3 = new ContadorParametros();
    //                 $localidad = $procedimiento3->proceSelect($nombreprocedimiento3, $idLocalidad);    

    //                 //En caso de que sea nulo
    //                 $nombreLocalidad4 = $localidad[0]->Localidad ?? null;
    //                 $nombreMunicipio4 = $localidad[0]->NombreMunicipio ?? null;
    //                 $nombreEstado4 = $localidad[0]->NombreEstado ?? null;
    //                 //dd($consultaTrabaja);
    //                 $curpEsValida= true;
    //                 //dd($consultaIdPadre);
                  
    //                 return view('layouts-form.form3', [
    //                     'xml3' => $xml3,
    //                     'estados' => $estados,
    //                     'consultacidlocalidad' => $consultacidlocalidad,
    //                     'nombreLocalidad4' => $nombreLocalidad4,
    //                     'nombreMunicipio4' => $nombreMunicipio4,
    //                     'nombreEstado4' => $nombreEstado4,
    //                     'consultactrabaja' => $consultactrabaja,
    //                     'consultacultgrad' => $consultacultgrad,
    //                     'curpEsValida' => $curpEsValida,
    //                     'vivecon' => $vivecon,
    //                     'existeCurpMadre' => $existeCurpMadre,
    //                     'consultaIdMadre' => $consultaIdMadre,
    //                     'existeCurpPadre' => $existeCurpPadre,
    //                     'consultaIdPadre' => $consultaIdPadre,
    //                     'existeCurpConyuge' => $existeCurpConyuge, 
    //                 ]);

                  

    //         } else {
    //             $errorMessage = "Tu curp no se encuentra en el sistema.";
    //             return view('layouts-form.form3', ['errorMessage' => $errorMessage]);
    //         }

    //     }
    // }

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

    private function obtenerIdPadre(){
        $nombreProcedimiento1= 'ObtenerPadre';
        $usuario = Auth::user();
        $curpId = $usuario->curp;
        $arrayIdCurp = [$curpId];
        $proceUser = 'ObtenerUserId';
        $obtenerId = new ContadorParametros();
        $resultId = $obtenerId->proceSelect($proceUser, $arrayIdCurp);
        $userId = $resultId[0]->idsolicitante ?? null;
        $arrayCurp = [$userId];
        $procedimiento = new ContadorParametros();
        $resultados= $procedimiento->proceSelect($nombreProcedimiento1, $arrayCurp);

        if (!empty($resultados)) {
            $consultaIdPadre = $resultados[0]->idpersona;
           
      
        } else {
            // Si no se obtienen resultados, se declara null por cualquier cosa      
            $consultaIdPadre = null;
        }

        if($consultaIdPadre==null){
            $consultaIdPadre=0;
        }
        return $consultaIdPadre;
    }

    private function obtenerIdMadre(){
        $nombreProcedimiento1= 'ObtenerMadreF3';
        $usuario = Auth::user();
        $curpId = $usuario->curp;
        $arrayIdCurp = [$curpId];
        $proceUser = 'ObtenerUserId';
        $obtenerId = new ContadorParametros();
        $resultId = $obtenerId->proceSelect($proceUser, $arrayIdCurp);
        $userId = $resultId[0]->idsolicitante ?? null;
        $arrayCurp = [$userId];
        $procedimiento = new ContadorParametros();
        $resultados= $procedimiento->proceSelect($nombreProcedimiento1, $arrayCurp);

        if (!empty($resultados)) {
            $consultaIdMadre = $resultados[0]->idpersona;
           
      
        } else {
            // Si no se obtienen resultados, se declara null por cualquier cosa      
            $consultaIdMadre = null;
        }

        if($consultaIdMadre==null){
            $consultaIdMadre=0;
        }
        return $consultaIdMadre;
    }

    private function obtenerIdConyuge(){
        $nombreProcedimiento1= 'ObtenerConyuge';
        $usuario = Auth::user();
        $curpId = $usuario->curp;
        $arrayIdCurp = [$curpId];
        $proceUser = 'ObtenerUserId';
        $obtenerId = new ContadorParametros();
        $resultId = $obtenerId->proceSelect($proceUser, $arrayIdCurp);
        $userId = $resultId[0]->idsolicitante ?? null;
        $arrayCurp = [$userId];
        $procedimiento = new ContadorParametros();
        $resultados= $procedimiento->proceSelect($nombreProcedimiento1, $arrayCurp);

        if (!empty($resultados)) {
            $consultaIdConyuge = $resultados[0]->idpersona;
           
      
        } else {
            // Si no se obtienen resultados, se declara null por cualquier cosa      
            $consultaIdConyuge = null;
        }

        if($consultaIdConyuge==null){
            $consultaIdConyuge=0;
        }
        return $consultaIdConyuge;
    }

    public function obtenerDatosF3R3(){
        $nombreProcedimiento1= 'ObtenerDatosFamF3';
        $usuario = Auth::user();
        $curpId = $usuario->curp;
        $arrayIdCurp = [$curpId];
        $proceUser = 'ObtenerUserId';
        $obtenerId = new ContadorParametros();
        $resultId = $obtenerId->proceSelect($proceUser, $arrayIdCurp);
        $userId = $resultId[0]->idsolicitante ?? null;
        $array = [$userId];
        $procedimiento = new ContadorParametros();
        $resultados= $procedimiento->proceSelect($nombreProcedimiento1, $array);
        if(!empty($resultados)) {
            $datosF3R3= $resultados[0];
        } else {
            $datosF3R3=null;
        }

        return $datosF3R3;

    }

    // public function obtenerDatosConyuge(){
    //     $nombreProce='ObtenerConyuge';
    //     $usuario = Auth::user();
    //     $curpId = $usuario->curp;
    //     $arrayIdCurp = [$curpId];
    //     $proceUser = 'ObtenerUserId';
    //     $obtenerId = new ContadorParametros();
    //     $resultId = $obtenerId->proceSelect($proceUser, $arrayIdCurp);
    //     $userId = $resultId[0]->idsolicitante ?? null;
    //     $array = [$userId];
    //     $procedimiento = new ContadorParametros();
    //     $resultados= $procedimiento->proceSelect($nombreProce, $array);
    //     if(!empty($resultados)) {
    //         $datosConyuge= $resultados[0];
    //     } else {
    //         $datosConyuge=null;
    //     }

    //     return $datosConyuge;
    // }
   

   
}

