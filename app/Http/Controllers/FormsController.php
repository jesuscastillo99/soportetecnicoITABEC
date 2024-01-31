<?php

namespace App\Http\Controllers;

use App\Models\Domicilio;
use Illuminate\Http\Request;
use App\Models\Expediente;
use App\Models\Estado;
use App\Models\Municipio;
use App\Models\Localidad;
use Illuminate\Support\Facades\Auth;
use App\Models\Persona;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use App\Http\Controllers\ContadorParametros;

class FormsController extends Controller
{
    
     
        //DESDE ESTE CONTROLADOR SE VAN A VALIDAR DATOS DE INPUTS Y GUARDAR INFORMACION
    public function form1Registro(Request $request)
        {
            try {
                // Validación de los campos
                $request->validate([
                    'estado' => 'required',
                    'municipio' => 'required',
                    'localidad' => 'required',
                    'estado_civil' => 'required|in:0,1',
                ]);
                $nombreProcedimiento = 'SalvarPersona';
                $curp = $request->input('curp');
                $idlocalidad = $request->input('localidad');
                $ecivil = $request->input('estado_civil');
                $arrayP = [$curp, $idlocalidad, $ecivil];
                $contadorParametros = new ContadorParametros();
                $resultados= $contadorParametros->proceSelect($nombreProcedimiento, $arrayP);
        
                // Agregar mensaje de éxito
                return redirect()->route('form1-formulario')->with('mensaje', 'Los datos se guardaron con éxito.');
                } catch (QueryException $e) {
                    // Agregar mensaje de error
                    return redirect()->route('form1-formulario')->with('mensaje', 'Hubo un error al guardar los datos.');
                }
        }

    
    public function form2Registro1(Request $request)
    {
    
            $usuario = Auth::user();
            $userId = $usuario->idlog;
            $idPersona = $usuario->idlog;
            // Valida y guarda los datos del primer formulario de la segunda vista
            $request->validate([
                'calle' => 'required',
                'numero' => 'required',
                'colonia' => 'required',
                'entre_calles' => 'required',
                'entre_calles2' => 'required',
                'telefono_local' => 'required',
                'telefono_celular' => 'required',
                'codigo_postal' => 'required',
                'localidad' => 'required',
            ]);

            //Se declara el nombre del procedimiento
            $proceActualizarDomic = 'actualizarInsertarDomicilio';
            //Se crea una instancia para poder utilizar la función 
            $contadorParametros = new ContadorParametros();
            
            //Se usa un trycatch en caso de error en el procedimiento para guardar 
                try {
                    $idpersona = $userId;
                    $calle= $request->input('calle');
                    $calle2 = $request->input('entre_calles');
                    $calle3 = $request->input('entre_calles2');
                    $numero = $request->input('numero');
                    $colonia = $request->input('colonia');
                    $idlocalidad = $request->input('localidad');
                    $telefono = $request->input('telefono_local');
                    $celular = $request->input('telefono_celular');
                    $tipo = 1;
                    $cp = $request->input('codigo_postal');
                    //Se pasan los parámetros al array
                    $arrayP2 = [$idpersona, $tipo, $calle, $calle2, $calle3, $numero, $colonia, $idlocalidad, $telefono, $celular, $cp];
                    //Se ejecuta el procedimiento
                    $actualizarDomicilio1= $contadorParametros->proceUpdate($proceActualizarDomic, $arrayP2);
                    session()->flash('success', 'Domicilio guardado con éxito.');
                    return redirect()->route('form2-formulario');
                } catch (QueryException $e) {
                    session()->flash('error', 'Error al actualizar domicilio.');
                    return redirect()->route('form2-formulario');  
                }
    }

    public function form2Registro2(Request $request)
    {
        $usuario = Auth::user();
        $userId = $usuario->idlog;
        $idPersona = $usuario->idlog;
        // Valida y guarda los datos del primer formulario de la segunda vista
        $request->validate([
            'calle2' => 'required',
            'numero2' => 'required',
            'colonia2' => 'required',
            'entre_calles3' => 'required',
            'entre_calles4' => 'required',
            'telefono_local2' => 'required',
            'telefono_celular2' => 'required',
            'codigo_postal2' => 'required',
            'localidad2' => 'required',
        ]);

        //Se declara el nombre del procedimiento
        $proceActualizarDomic = 'actualizarInsertarDomicilio';
        //Se crea una instancia para poder utilizar la función 
        $contadorParametros = new ContadorParametros();
        
        //Se usa un trycatch en caso de error en el procedimiento para guardar 
            try {
                $idpersona = $userId;
                $calle= $request->input('calle2');
                $calle2 = $request->input('entre_calles3');
                $calle3 = $request->input('entre_calles4');
                $numero = $request->input('numero2');
                $colonia = $request->input('colonia2');
                $idlocalidad = $request->input('localidad2');
                $telefono = $request->input('telefono_local2');
                $celular = $request->input('telefono_celular2');
                $tipo = 2;
                $cp = $request->input('codigo_postal2');
                //Se pasan los parámetros al array
                $arrayP2 = [$idpersona, $tipo, $calle, $calle2, $calle3, $numero, $colonia, $idlocalidad, $telefono, $celular, $cp];
                //Se ejecuta el procedimiento
                $actualizarDomicilio1= $contadorParametros->proceUpdate($proceActualizarDomic, $arrayP2);
                session()->flash('success2', 'Domicilio guardado con éxito.');
                return redirect()->route('form2-formulario');
            } catch (QueryException $e) {  
                session()->flash('error2', 'Error al actualizar domicilio.'); 
                return redirect()->route('form2-formulario');  
            }
    }

    public function form2Registro3(Request $request)
    {
        $usuario = Auth::user();
        $userId = $usuario->idlog;
        $idPersona = $usuario->idlog;
        // Valida y guarda los datos del primer formulario de la segunda vista
        $request->validate([
            'calle3' => 'required',
            'numero3' => 'required',
            'colonia3' => 'required',
            'entre_calles5' => 'required',
            'entre_calles6' => 'required',
            'telefono_local3' => 'required',
            'telefono_celular3' => 'required',
            'codigo_postal3' => 'required',
            'localidad3' => 'required',
        ]);

        //Se declara el nombre del procedimiento
        $proceActualizarDomic = 'actualizarInsertarDomicilio';
        //Se crea una instancia para poder utilizar la función 
        $contadorParametros = new ContadorParametros();
        
        //Se usa un trycatch en caso de error en el procedimiento para guardar 
            try {
                $idpersona = $userId;
                $calle= $request->input('calle3');
                $calle2 = $request->input('entre_calles5');
                $calle3 = $request->input('entre_calles6');
                $numero = $request->input('numero3');
                $colonia = $request->input('colonia3');
                $idlocalidad = $request->input('localidad3');
                $telefono = $request->input('telefono_local3');
                $celular = $request->input('telefono_celular3');
                $tipo = 3;
                $cp = $request->input('codigo_postal3');
                //Se pasan los parámetros al array
                $arrayP2 = [$idpersona, $tipo, $calle, $calle2, $calle3, $numero, $colonia, $idlocalidad, $telefono, $celular, $cp];
                //Se ejecuta el procedimiento
                $actualizarDomicilio1= $contadorParametros->proceUpdate($proceActualizarDomic, $arrayP2);
                session()->flash('success3', 'Domicilio guardado con éxito.');
                return redirect()->route('form2-formulario');
            } catch (QueryException $e) {
                session()->flash('error3', 'Error al actualizar domicilio.');
                return redirect()->route('form2-formulario');  
            }
    }

    public function form3Registro1(Request $request)
        {
            // Validación de los campos
            $request->validate([
                'curppadre2' => 'required',
                'fechapadre' => 'required',
                'apellidopadre1' => 'required',
                'apellidopadre2' => 'required',
                'nombrepadre' => 'required',
                'estado' => 'required',
                'municipio' => 'required',
                'localidad' => 'required',
                'trabajapadre' => 'required',
                'estudiospadre' => 'required',]);

             //Se declara el nombre del procedimiento
             $nombreproceInsertarPadre = 'ActualizarInsertarPadre2';
             //Se crea una instancia para poder utilizar la función 
             //$proceInsertarPadre = new ContadorParametros();

            
            // Obtener el usuario autenticado (persona)
            $usuario = Auth::user();
               
                 //Se usa un trycatch en caso de error en el procedimiento para guardar 
                 try {
                    $idSolicitante = $usuario->idlog;
                    //Aqui se almacena el idpadre con la consulta anterior    
                    $curpPadre= $request->input('curppadre2');
                    $paterno= $request->input('apellidopadre1');
                    $materno= $request->input('apellidopadre2');
                    $nombre = $request->input('nombrepadre');
                    $sexo = $request->input('sexopadre');
                    if ($sexo == 'H') {
                        $sexo = 1;  // Hombre
                    } elseif ($sexo == 'M') {
                        $sexo = 0;  // Mujer
                    }
                    // // Obtener la cadena de fecha del input
                    $fechaInput = $request->input('fechapadre');
                    // // Convertir la cadena de fecha a un objeto Carbon
                    $fechaCarbon = Carbon::createFromFormat('d/m/Y', $fechaInput);
                    // // Obtener la nueva cadena de fecha en el formato deseado
                    $fechanac = $fechaCarbon->format('Y-m-d');
                    $locnac = $request->input('localidad');
                    $fechaRegistro = Carbon::now();
                    $trabaja = $request->input('trabajapadre');
                    $ult_grad_estudios = $request->input('estudiospadre');;
                    //Se pasan los parámetros al array
                    $arrayPIP = [$idSolicitante, $curpPadre, $paterno, $materno, $nombre, $sexo, $fechanac, $locnac, $fechaRegistro, $trabaja, $ult_grad_estudios];
                    //Se ejecuta el procedimiento
                    $proceInsertarPadre = new ContadorParametros();
                    $actualizarDomicilio1= $proceInsertarPadre->proceUpdate($nombreproceInsertarPadre, $arrayPIP);
                    session()->flash('success', 'Padre guardado con éxito.');
                    $curpGuardar=true;
                    return view('layouts-form.form3', ['curpGuardar' => $curpGuardar]);
                   // return redirect()->route('form3-formulario');
                } catch (QueryException $e) {
                    session()->flash('error', 'Error al intsertar datos.');
                    return redirect()->route('form3-formulario');  
                }
               
        }
    
    public function form3Registro2(Request $request) 
    {
          // Validación de los campos
          $request->validate([
            'curpmadre2' => 'required',
            'fechamadre' => 'required',
            'apellidomadre1' => 'required',
            'apellidomadre2' => 'required',
            'nombremadre' => 'required',
            'estado2' => 'required',
            'municipio2' => 'required',
            'localidad2' => 'required',
            'trabajamadre' => 'required',
            'estudiosmadre' => 'required',]);

         //Se declara el nombre del procedimiento
         $nombreproceInsertarPadre = 'ActualizarInsertarPadre2';
         //Se crea una instancia para poder utilizar la función 
       

        
        // Obtener el usuario autenticado (persona)
        $usuario = Auth::user();
           
             //Se usa un trycatch en caso de error en el procedimiento para guardar 
             try {
                $idSolicitante = $usuario->idlog;
                //Aqui se almacena el idpadre con la consulta anterior    
                $curpMadre= $request->input('curpmadre2');
                $paterno= $request->input('apellidomadre1');
                $materno= $request->input('apellidomadre2');
                $nombre = $request->input('nombremadre');
                $sexo = $request->input('sexomadre');
                if ($sexo == 'H') {
                    $sexo = 1;  // Hombre
                } elseif ($sexo == 'M') {
                    $sexo = 0;  // Mujer
                }
                // // Obtener la cadena de fecha del input
                $fechaInput = $request->input('fechamadre');
                // // Convertir la cadena de fecha a un objeto Carbon
                $fechaCarbon = Carbon::createFromFormat('d/m/Y', $fechaInput);
                // // Obtener la nueva cadena de fecha en el formato deseado
                $fechanac = $fechaCarbon->format('Y-m-d');
                $locnac = $request->input('localidad2');
                $fechaRegistro = Carbon::now();
                $trabaja = $request->input('trabajamadre');
                $ult_grad_estudios = $request->input('estudiosmadre');;
                //Se pasan los parámetros al array
                $arrayPIM = [$idSolicitante, $curpMadre, $paterno, $materno, $nombre, $sexo, $fechanac, $locnac, $fechaRegistro, $trabaja, $ult_grad_estudios];
                //Se ejecuta el procedimiento
                $proceInsertarPadre = new ContadorParametros();
                $actualizarDomicilio1= $proceInsertarPadre->proceUpdate($nombreproceInsertarPadre, $arrayPIM);
                session()->flash('success2', 'Madre guardada con éxito.');
                //return redirect()->route('form3-formulario');
                $curpGuardar2=true;
                return view('layouts-form.form3', ['curpGuardar2' => $curpGuardar2]);
            } catch (QueryException $e) {
                session()->flash('error2', 'Error al insertar datos.');
                return redirect()->route('form3-formulario');  
            }
            
        }
    
}
