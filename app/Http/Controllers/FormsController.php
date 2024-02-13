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
            if ($request->input('btnGuardarPadre') == 'guardar') {
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
                    $nombreproceInsertarPadre = 'ActualizarInsertarPersonas';
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
                            $fechaCarbon = Carbon::createFromFormat('d/m/Y', $fechaInput);
                            $nuevaFecha = $fechaCarbon->format('Y-m-d');
                            $locnac = $request->input('localidad');
                            $fechaRegistro = Carbon::now();
                            $trabaja = $request->input('trabajapadre');
                            $ult_grad_estudios = $request->input('estudiospadre');
                            $tipo=1;
                            //Se pasan los parámetros al array
                            $arrayPIP = [$idSolicitante, $curpPadre, $paterno, $materno, $nombre, $sexo, $tipo, $nuevaFecha, $locnac, $fechaRegistro, $trabaja, $ult_grad_estudios];
                            //Se ejecuta el procedimiento
                            $proceInsertarPadre = new ContadorParametros();
                            $actualizarDomicilio1= $proceInsertarPadre->proceUpdate($nombreproceInsertarPadre, $arrayPIP);
                            session()->flash('success', 'Padre guardado con éxito.');
                            //dd($actualizarDomicilio1);
                            $curpGuardar=true;
                            $consultaIdPadre = 1;
                            // $controlform3= new Form3Controller();
                            // $vistaCon = $controlform3->index()->with('success', session('success'));;
                            // return $vistaCon;
                            return redirect()->route('form3-formulario')->with(['success' => session('success')]);  
                            
                        // return redirect()->route('form3-formulario');
                        } catch (QueryException $e) {
                            dd($e);
                            session()->flash('errorCF3', 'Error al insertar datos.');
                            return redirect()->route('form3-formulario');  
                        }
            }
               
        }

    public function form3Registro1Eliminar(Request $request){
        try{
            $usuario = Auth::user();
            $userId = $usuario->idlog;

            $nombreProcedimiento1= 'ObtenerPadre';
            $usuario = Auth::user();
            $userId = $usuario->idlog;
            $arrayOP= [$userId];
            $procedimiento = new ContadorParametros();
            $resultados= $procedimiento->proceSelect($nombreProcedimiento1, $arrayOP);

            if (!empty($resultados)) {
                $consultaIdPadre = $resultados[0]->idpersona;
        
            } else {
                $consultaIdPadre = null;
            }


            $nombreProcedimiento2 = 'Eliminarpadres';
            $arrayEP = [$consultaIdPadre, $userId];
            $procedimiento2 = new ContadorParametros();
            $resultados2= $procedimiento2->proceSelect($nombreProcedimiento2, $arrayEP);
            session()->flash('success', 'Padre eliminado con éxito.');
            return redirect()->route('form3-formulario')->with(['success' => session('success')]);  
        } catch (QueryException $e) {
            session()->flash('padreEli', 'Se ha eliminado el registro de tu padre.');
            return redirect()->route('form3-formulario');  
        }
           
        
    }
    
    public function form3Registro2(Request $request) 
    {
        if ($request->input('btnGuardarMadre') == 'guardar') {
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
            $nombreproceInsertarPadre = 'ActualizarInsertarPersonas';
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
                $ult_grad_estudios = $request->input('estudiosmadre');
                $tipo=2;
                //Se pasan los parámetros al array
                $arrayPIM = [$idSolicitante, $curpMadre, $paterno, $materno, $nombre, $sexo, $tipo, $fechanac, $locnac, $fechaRegistro, $trabaja, $ult_grad_estudios];
                //Se ejecuta el procedimiento
                $proceInsertarPadre = new ContadorParametros();
                $actualizarDomicilio1= $proceInsertarPadre->proceUpdate($nombreproceInsertarPadre, $arrayPIM);
                session()->flash('successM', 'Madre guardada con éxito.');
                $consultaIdMadre = 1;
                //return redirect()->route('form3-formulario');
                $curpGuardar2=true;
               
                return redirect()->route('form3-formulario')->with(['successM' => session('successM')]);  
            }   catch (QueryException $e) {
                    dd($e);
                    session()->flash('error2', 'Error al insertar datos.');
                    return redirect()->route('form3-formulario');  
                }
            
        }
    }

        public function form3Registro2Eliminar(Request $request){
            try{
                $usuario = Auth::user();
                $userId = $usuario->idlog;
    
                $nombreProcedimiento1= 'ObtenerMadreF3';
                $usuario = Auth::user();
                $userId = $usuario->idlog;
                $arrayOP= [$userId];
                $procedimiento = new ContadorParametros();
                $resultados= $procedimiento->proceSelect($nombreProcedimiento1, $arrayOP);
    
                if (!empty($resultados)) {
                    $consultaIdMadre = $resultados[0]->idpersona;
            
                } else {
                    $consultaIdMadre = null;
                }
    
    
                $nombreProcedimiento2 = 'Eliminarpadres';
                $arrayEP = [$consultaIdMadre, $userId];
                $procedimiento2 = new ContadorParametros();
                $resultados2= $procedimiento2->proceSelect($nombreProcedimiento2, $arrayEP);
                session()->flash('successM', 'Madre eliminado con éxito.');
                return redirect()->route('form3-formulario')->with(['successM' => session('successM')]);  
            } catch (QueryException $e) {
                session()->flash('madreEli', 'Se ha eliminado el registro de tu Madre.');
                return redirect()->route('form3-formulario');  
            }
               
            
        }
    

        public function form3Registro3(Request $request) 
        {
        
                // Validación de los campos
                $request->validate([
                    'padres_cas_sol' => 'required',
                    'herm_dep_ing_familiar' => 'required',
                    'edad_hermanos' => 'required',
                    'casa_familiar' => 'required',
                    'cantidad_renta' => 'required']);
    
                //Se declara el nombre del procedimiento
                $nombreproceInsertarF3R3 = 'actualizarInsertarFamF3';
                //Se crea una instancia para poder utilizar la función 
            
    
                
                // Obtener el usuario autenticado (persona)
                $usuario = Auth::user();
               
                 //Se usa un trycatch en caso de error en el procedimiento para guardar 
                 try {
                        $idSolicitante = $usuario->idlog;
                        //Aqui se almacena el idpadre con la consulta anterior    
                        $padres_civil= $request->input('padres_cas_sol');
                        $num_herm_dep= $request->input('herm_dep_ing_familiar');
                        $edad_hermanos= $request->input('edad_hermanos');
                        $casa_familiar = $request->input('casa_familiar');
                        $pago_renta = $request->input('cantidad_renta');
                        //Se pasan los parámetros al array
                        $arrayF3R3 = [$idSolicitante, $padres_civil, $num_herm_dep, $edad_hermanos, $casa_familiar, $pago_renta];
                        //Se ejecuta el procedimiento
                        $proceInsertarF3R3 = new ContadorParametros();
                        $resultados= $proceInsertarF3R3->proceUpdate( $nombreproceInsertarF3R3, $arrayF3R3);
                        session()->flash('successF3R3', 'Datos guardados con éxito.');            
                        return redirect()->route('form3-formulario')->with(['successF3R3' => session('successF3R3')]);  
                }   catch (QueryException $e) {
                        //dd($e);
                        session()->flash('errorF3R3', 'Error al insertar datos.');
                        return redirect()->route('form3-formulario');  
                    }
                
            
        }

        public function form4Registro1(Request $request) 
        {
        
            // Validación de los campos
            $request->validate([
            'estado' => 'required',
            'municipio' => 'required',
            'escuela' => 'required',
            'carrera' => 'required',
            'semestre' => 'required',
            'pAcademico' => 'required',
            'numControl' => 'required',
            'periodo' => 'required',
            'promUltGrado' => 'required',
            'impInscripcion' => 'required',
            'impInscripcionCol' => 'required',
            'nivel' => 'required',
            'mesTermEst' => 'required',
            'añoTermEst' => 'required',
            'nivelAcaTitulacion' => 'required',
            'tipoTitulacion' => 'required']);

            //Se declara el nombre del procedimiento
            $nombreproceInsertarF4R1 = 'actualizarInsertarF4';
            //Se crea una instancia para poder utilizar la función 
        
            
            
            // Obtener el usuario autenticado (persona)
            $usuario = Auth::user();
           
             //Se usa un trycatch en caso de error en el procedimiento para guardar 
             try {
                    $idSolicitante = $usuario->idlog;
                    //Aqui se almacena el idpadre con la consulta anterior    
                    $idcarrera= $request->input('carrera');
                    $semestre = $request->input('semestre');
                    $pAcademico = $request->input('pAcademico');
                    $numControl = $request->input('numControl');
                    $periodo = $request->input('periodo'); 
                    $promUltGrado = $request->input('promUltGrado');
                    $impInscripcion = $request->input('impInscripcion');
                    $impInscripcionCol = $request->input('impInscripcionCol');
                    $nivel = $request->input('nivel');
                    $mesTermEst = $request->input('mesTermEst');
                    $añoTermEst = $request->input('añoTermEst');
                    $nivelacatitu = $request->input('nivelAcaTitulacion');
                    $tipotitu = $request->input('tipoTitulacion');
                    //Se pasan los parámetros al array
                    $arrayF4R1 = [$idSolicitante, $idcarrera, $semestre, $pAcademico, $numControl, $periodo, $promUltGrado, $impInscripcion, $impInscripcionCol, $nivel, $mesTermEst, $añoTermEst, $nivelacatitu, $tipotitu];
                    //Se ejecuta el procedimiento
                    $proceInsertarF4R1 = new ContadorParametros();
                    $resultados= $proceInsertarF4R1->proceUpdate( $nombreproceInsertarF4R1, $arrayF4R1);
                    session()->flash('successF4R1', 'Datos guardados con éxito.');            
                    return redirect()->route('form4-formulario')->with(['successF4R1' => session('successF4R1')]);  
            }   catch (QueryException $e) {
                    dd($e);
                    session()->flash('errorF4R1', 'Error al insertar datos.');
                    return redirect()->route('form4-formulario');  
                }
             
            
        }
}
