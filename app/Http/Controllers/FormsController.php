<?php

namespace App\Http\Controllers;

use App\Models\Domicilio;
use Illuminate\Http\Request;
use App\Models\Expediente;
use App\Models\Estado;
use App\Models\Municipio;
use App\Models\Localidad;
use App\Models\TablaDinamica;
use Illuminate\Support\Facades\Auth;
use App\Models\Persona;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use App\Http\Controllers\ContadorParametros;
use App\Models\TablaDinamicaF7;

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

    public function form5RegistroTabla(Request $request)
    {
        try{
            $usuario = Auth::user();
            $registro = new TablaDinamica();
            $registro->idpersona = $usuario->idlog;
            $registro->nivel = $request->input('nivel');
            $registro->escuela = $request->input('escuela');
            $registro->tipo = $request->input('tipo');
            $registro->promedio = $request->input('promedio');
            $registro->estado = $request->input('estado');
            $registro->municipio = $request->input('municipio');
            $registro->save();

            return response()->json(['success' => true]);
        } catch  (QueryException $e) {
            dd($e);
        }
        
    }


    public function form7Registro1(Request $request)
    {
        try {
            // Validación de los campos
            

            $usuario = Auth::user();
           
            //Se declara el nombre del procedimiento
            $nombreproceInsertarF7 = 'actualizarInsertarF7';
            //Se crea una instancia para poder utilizar la función 
        
            
            
            // Obtener el usuario autenticado (persona)
             
                //Se usa un trycatch en caso de error en el procedimiento para guardar 
                

                    $idPersona = $usuario->idlog;
                    //Aqui se almacena el idpadre con la consulta anterior    
                    $escpa = $request->input('escpa');
                    $escma = $request->input('escma');
                    $actpa = $request->input('actpa');
                    $actma = $request->input('actma');
                    $autopr = $request->input('autopr');
                    $colpri = $request->input('colpri');
                    $cpup = $request->input('cpup');
                    $autmad = $request->input('autmad');
                    $tamcasa = $request->input('tamcasa');
                    $matcasa = $request->input('matcasa');
                    $ingeco = $request->input('ingeco');
                    
                    //Se pasan los parámetros al array
                    $arrayF7R1 = [$idPersona, $escpa, $escma, $actpa, $actma, $autopr, $colpri, $cpup, $autmad, $tamcasa, $matcasa, $ingeco];
                    //Se ejecuta el procedimiento
                    $proceInsertarF7R1 = new ContadorParametros();
                    $resultados= $proceInsertarF7R1->proceUpdate( $nombreproceInsertarF7, $arrayF7R1);
                    session()->flash('successF7R1', 'Datos guardados con éxito.');            
                    return redirect()->route('form7-formulario')->with(['successF7R1' => session('successF7R1')]);  
        }   catch (QueryException $e) {
                    dd($e);
                    session()->flash('errorF7R1', 'Error al insertar datos.');
                    return redirect()->route('form7-formulario');  
                }
                
        
    }

    
    public function form7Registro2(Request $request)
    {
            // Validación de los campos
            $request->validate([
            'tipapo' => 'required',
            'monmens' => 'required',
            'comapo' => 'required',
            'solapo' => 'required',
            'seoto' => 'required',
            'recmen' => 'required',
            'hermapo' => 'required',
            'cantherm' => 'required',
            'firmun' => 'required']);

            //Se declara el nombre del procedimiento
            $nombreproceInsertarF72 = 'actualizarInsertarF72';
            //Se crea una instancia para poder utilizar la función 
        
            
            
            // Obtener el usuario autenticado (persona)
            $usuario = Auth::user();
            
                //Se usa un trycatch en caso de error en el procedimiento para guardar 
                try {
                    $idPersona = $usuario->idlog;
                    //Aqui se almacena el idpadre con la consulta anterior    
                    $tipapo = $request->input('tipapo');
                    $monmens = $request->input('monmens');
                    $comapo = $request->input('comapo');
                    $solapo = $request->input('solapo');
                    $seoto = $request->input('seoto');
                    $recmen = $request->input('recmen');
                    $hermapo = $request->input('hermapo');
                    $cantherm = $request->input('cantherm');
                    $firmun = $request->input('firmun');
                    
                    //Se pasan los parámetros al array
                    $arrayF7R2 = [$idPersona, $tipapo, $monmens, $comapo, $solapo, $seoto, $recmen, $hermapo, $cantherm, $firmun];
                    //Se ejecuta el procedimiento
                    $proceInsertarF7R2 = new ContadorParametros();
                    $resultados= $proceInsertarF7R2->proceUpdate( $nombreproceInsertarF72, $arrayF7R2);
                    session()->flash('successF7R2', 'Datos guardados con éxito.');            
                    return redirect()->route('form7-formulario')->with(['successF7R2' => session('successF7R2')]);  
            }   catch (QueryException $e) {
                    dd($e);
                    session()->flash('errorF7R2', 'Error al insertar datos.');
                    return redirect()->route('form7-formulario');  
                }
                
        
    }

    public function form7RegistroTabla(Request $request)
    {
        
        try{
            $usuario = Auth::user();
            $registro = new TablaDinamicaF7();
            $registro->idpersona = $usuario->idlog;
            $registro->nombre = $request->input('nombre');
            $registro->paterno = $request->input('paterno');
            $registro->materno = $request->input('materno');
            $registro->nivel = $request->input('niveltd');
            $registro->escuela = $request->input('escuela');
            $registro->tipo = $request->input('tipoesc');
            $registro->parentezco = $request->input('parentesco');
            $registro->fechanac = $request->input('fechanac');
            $registro->save();
            return response()->json(['success' => true]);
        } catch  (QueryException $e) {
            dd($e);
        }
        
    }

    public function form8Registro1(Request $request)
    {
            $request->validate([
                'curpr1' => 'required',
                'fechanacr1' => 'required',
                'sexor1' => 'required',
                'paternor1' => 'required',
                'maternor1' => 'required',
                'nombrer1' => 'required',
                'estador1' => 'required',
                'municipior1' => 'required',
                'domr1' => 'required',
                'nudomr1' => 'required',
                'colr1' => 'required',
                'entre1' => 'required',
                'entre2' => 'required',
                'cpr1' => 'required',
                'telr1' => 'required',
                'celr1' => 'required',
                'estado_nacr1' => 'required',
                'municipio_nacr1' => 'required',
                'localidad_nacr1' => 'required',
            ]);

             //Se declara el nombre del procedimiento
             $nombreproceInsertarR1 = 'ActualizarInsertarF6F8';

             // Obtener el usuario autenticado (persona)
             $usuario = Auth::user();
              //Se usa un trycatch en caso de error en el procedimiento para guardar 
              try {
                $idSolicitante = $usuario->idlog;
                //Aqui se almacena el idpadre con la consulta anterior    
                $curpr1= $request->input('curpr1');
                $paternor1= $request->input('paternor1');
                $maternor1= $request->input('maternor1');
                $nombrer1 = $request->input('nombrer1');
                $sexor1 = $request->input('sexor1');
                if ($sexor1 == 'H') {
                    $sexor1 = 1;  // Hombre
                } elseif ($sexor1 == 'M') {
                    $sexor1 = 0;  // Mujer
                }
                // // Obtener la cadena de fecha del input
                $fechaInput = $request->input('fechanacr1');
                $fechaCarbon = Carbon::createFromFormat('d/m/Y', $fechaInput);
                $nuevaFecha = $fechaCarbon->format('Y-m-d');
                $localidadr1 = $request->input('localidadr1');
                $fechaRegistror1 = Carbon::now();
                $tipor1=4;
                $domr1 = $request->input('domr1');
                $nudomr1 = $request->input('nudomr1');
                $colr1 = $request->input('colr1');
                $entre1 = $request->input('entre1');
                $entre2 = $request->input('entre2');
                $cpr1 = $request->input('cpr1');
                $telr1 = $request->input('telr1');
                $celr1 = $request->input('celr1');
                $localidad_nacr1 = $request->input('localidad_nacr1');
                //Se pasan los parámetros al array
                $arrayR1 = [$idSolicitante, $curpr1, $paternor1, $maternor1, $nombrer1, $sexor1, $tipor1, $nuevaFecha, $localidad_nacr1, $fechaRegistror1, $domr1, $entre1, $entre2, $nudomr1, $colr1, $localidadr1, $telr1, $celr1, $cpr1, null, null, null];
                //Se ejecuta el procedimiento
                $proceInsertarR1 = new ContadorParametros();
                $actualizarR1= $proceInsertarR1->proceUpdate($nombreproceInsertarR1, $arrayR1);
                session()->flash('success', 'Referencia 1 guardado con éxito.');
                //dd($actualizarDomicilio1);
                // $curpGuardar=true;
                // $consultaIdPadre = 1;
                // $controlform3= new Form3Controller();
                // $vistaCon = $controlform3->index()->with('success', session('success'));;
                // return $vistaCon;
                return redirect()->route('form8-formulario')->with(['success' => session('success')]);  
                
                // return redirect()->route('form3-formulario');
                } catch (QueryException $e) {
                    dd($e);
                    session()->flash('errorCF3', 'Error al insertar datos.');
                    return redirect()->route('form8-formulario');  
                }
        
    }

    public function form8R1Eliminar(Request $request){
        try{
            $usuario = Auth::user();
            $userId = $usuario->idlog;

            $nombreProcedimiento1= 'ObtenerR1R2F8';
            $usuario = Auth::user();
            $userId = $usuario->idlog;
            $arrayOR1= [$userId, 4];
            $procedimiento = new ContadorParametros();
            $resultados= $procedimiento->proceSelect($nombreProcedimiento1, $arrayOR1);

            if (!empty($resultados)) {
                $consultaIdR1 = $resultados[0]->idpersona;
        
            } else {
                $consultaIdR1 = null;
            }


            $nombreProcedimiento2 = 'EliminarR1R2F8';
            $arrayER1 = [$consultaIdR1, $userId];
            $procedimiento2 = new ContadorParametros();
            $resultados2= $procedimiento2->proceSelect($nombreProcedimiento2, $arrayER1);
            session()->flash('success', 'Referencia 1 eliminada con éxito.');
            return redirect()->route('form8-formulario')->with(['success' => session('success')]);  
           
        } catch (QueryException $e) {
            session()->flash('r1eli', 'Se ha eliminado el registro de referencia 1.');
            return redirect()->route('form8-formulario');  
        }
           
        
    }

    public function form8Registro2(Request $request)
    {
        
        if ($request->input('btnGuardarR2') == 'guardar') {

            // $request->validate([
            //     'curpr2' => 'required',
            //     'fechanacr2' => 'required',
            //     'sexor2' => 'required',
            //     'paternor2' => 'required',
            //     'maternor2' => 'required',
            //     'nombrer2' => 'required',
            //     'estador2' => 'required',
            //     'municipior2' => 'required',
            //     'localidadr2' => 'required',
            //     'domr2' => 'required',
            //     'nudomr2' => 'required',
            //     'colr2' => 'required',
            //     'entre2' => 'required',
            //     'entre2' => 'required',
            //     'cpr2' => 'required',
            //     'telr2' => 'required',
            //     'celr2' => 'required',
            //     'estado_nacr2' => 'required',
            //     'municipio_nacr2' => 'required',
            //     'localidad_nacr2' => 'required',
            // ]);

            //dd($xd=3);
             //Se declara el nombre del procedimiento
             $nombreproceInsertarR2 = 'ActualizarInsertarF6F8';

             // Obtener el usuario autenticado (persona)
             $usuario = Auth::user();
              //Se usa un trycatch en caso de error en el procedimiento para guardar 
              try {
                $idSolicitante = $usuario->idlog;
                //Aqui se almacena el idpadre con la consulta anterior    
                $curpr2= $request->input('curpr2');
                $paternor2= $request->input('paternor2');
                $maternor2= $request->input('maternor2');
                $nombrer2 = $request->input('nombrer2');
                $sexor2 = $request->input('sexor2');
                if ($sexor2 == 'H') {
                    $sexor2 = 1;  // Hombre
                } elseif ($sexor2 == 'M') {
                    $sexor2 = 0;  // Mujer
                }
                // // Obtener la cadena de fecha del input
                $fechaInput = $request->input('fechanacr2');
                $fechaCarbon = Carbon::createFromFormat('d/m/Y', $fechaInput);
                $nuevaFecha = $fechaCarbon->format('Y-m-d');
                $localidadr2 = $request->input('localidadr2');
                $fechaRegistror2 = Carbon::now();
                $tipor2=5;
                $domr2 = $request->input('domr2');
                $nudomr2 = $request->input('nudomr2');
                $colr2 = $request->input('colr2');
                $entre3 = $request->input('entre3');
                $entre4 = $request->input('entre4');
                $cpr2 = $request->input('cpr2');
                $telr2 = $request->input('telr2');
                $celr2 = $request->input('celr2');
                $localidad_nacr2 = $request->input('localidad_nacr2');
                //Se pasan los parámetros al array
                $arrayR2 = [$idSolicitante, $curpr2, $paternor2, $maternor2, $nombrer2, $sexor2, $tipor2, $nuevaFecha, $localidad_nacr2, $fechaRegistror2, $domr2, $entre3, $entre4, $nudomr2, $colr2, $localidadr2, $telr2, $celr2, $cpr2, null, null, null];
                //Se ejecuta el procedimiento
                $proceInsertarR2 = new ContadorParametros();
                $actualizarR2= $proceInsertarR2->proceUpdate($nombreproceInsertarR2, $arrayR2);
                session()->flash('success', 'Referencia 2 guardado con éxito.');
                return redirect()->route('form8-formulario')->with(['success' => session('success')]);  
                
                // return redirect()->route('form3-formulario');
                } catch (QueryException $e) {
                    dd($e);
                    session()->flash('errorCF3', 'Error al insertar datos.');
                    return redirect()->route('form8-formulario');  
                }
        } else {
            dd($xd=4);
        }
    }

    public function form8R2Eliminar(Request $request){
        try{
            $usuario = Auth::user();
            $userId = $usuario->idlog;
            $nombreProcedimiento1= 'ObtenerR1R2F8';
            $usuario = Auth::user();
            $userId = $usuario->idlog;
            $arrayOR1= [$userId, 5];
            $procedimiento = new ContadorParametros();
            $resultados= $procedimiento->proceSelect($nombreProcedimiento1, $arrayOR1);

            if (!empty($resultados)) {
                $consultaIdR2 = $resultados[0]->idpersona;
        
            } else {
                $consultaIdR2 = null;
            }


            $nombreProcedimiento2 = 'EliminarR1R2F8';
            $arrayER2 = [$consultaIdR2, $userId];
            $procedimiento2 = new ContadorParametros();
            $resultados2= $procedimiento2->proceSelect($nombreProcedimiento2, $arrayER2);
            session()->flash('success', 'Referencia 2 eliminada con éxito.');
            return redirect()->route('form8-formulario')->with(['success' => session('success')]);  
           
        } catch (QueryException $e) {
            session()->flash('r2eli', 'Se ha eliminado el registro de referencia 2.');
            return redirect()->route('form8-formulario');  
        }
           
        
    }

    public function form9Registro1(Request $request)
    {
    
            //Código para obtener el Id del usuario
            $usuario = Auth::user();
            
            $curpId = $usuario->curp;
            $arrayIdCurp = [$curpId];
            $proceUser = 'ObtenerUserId';
            $obtenerId = new ContadorParametros();
            $resultId = $obtenerId->proceSelect($proceUser, $arrayIdCurp);
            $userId = $resultId[0]->idpersona ?? null;
            
            // Valida y guarda los datos del primer formulario de la segunda vista
            $request->validate([
                'nomorgest' => 'required',
                'pueest' => 'required',
                'sueest' => 'required',
                'callest' => 'required',
                'calle2est' => 'required',
                'calle3est' => 'required',
                'numest' => 'required',
                'colest' => 'required',
                'paisest' => 'required',
                'estado'  => 'required',
                'municipio'  => 'required',
                'localidad'  => 'required',
                'telest'  => 'required',
                'cpest'  => 'required'
            ]);

            //Se declara el nombre del procedimiento
            $proceActualizarF9 = 'ActualizarInsertarF9';
            //Se crea una instancia para poder utilizar la función 
            $contadorParametros = new ContadorParametros();
            
            //Se usa un trycatch en caso de error en el procedimiento para guardar 
                try {
                    $nomorgest = $request->input('nomorgest');
                    $pueest = $request->input('pueest');
                    $sueest = $request->input('sueest');
                    $callest = $request->input('callest');
                    $calle2est = $request->input('calle2est');
                    $calle3est = $request->input('calle3est');
                    $numest = $request->input('numest');
                    $colest = $request->input('colest');
                    $paisest = $request->input('paisest');
                    $localidad = $request->input('localidad');
                    $telest = $request->input('telest');
                    $cpest = $request->input('cpest');
                    $tipo = 1;
                    //Se pasan los parámetros al array
                    $arrayT1 = [$userId, $tipo, $callest, $calle2est, $calle3est, $numest, $colest, $localidad, $telest, $cpest, $paisest, $nomorgest, $pueest, $sueest];
                    //Se ejecuta el procedimiento
                    $actualizarTrabajo1= $contadorParametros->proceUpdate($proceActualizarF9, $arrayT1);
                    session()->flash('success', 'Domicilio guardado con éxito.');
                    
                    return redirect()->route('form9-formulario');
                } catch (QueryException $e) {
                    dd($e);
                    return redirect()->route('form9-formulario');  
                }
    }

    private function obtenerIdPadre(){
        $nombreProcedimiento1= 'ObtenerPadre';
        $usuario = Auth::user();
        $userId = $usuario->idlog;
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
        $userId = $usuario->idlog;
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

    public function form9Registro2(Request $request)
    {
    
            //Código para obtener el Id del papá
            
            $idpapa = $this->obtenerIdPadre();
            // Valida y guarda los datos del primer formulario de la segunda vista
            $request->validate([
                'nomorgpa' => 'required',
                'puepa' => 'required',
                'suepa' => 'required',
                'callpa' => 'required',
                'calle2pa' => 'required',
                'calle3pa' => 'required',
                'numpa' => 'required',
                'colpa' => 'required',
                'paispa' => 'required',
                'estado2'  => 'required',
                'municipio2'  => 'required',
                'localidad2'  => 'required',
                'telpa'  => 'required',
                'cppa'  => 'required'
            ]);

            //Se declara el nombre del procedimiento
            $proceActualizarF9 = 'ActualizarInsertarF9';
            //Se crea una instancia para poder utilizar la función 
            $contadorParametros = new ContadorParametros();
            
            //Se usa un trycatch en caso de error en el procedimiento para guardar 
                try {
                    $nomorgpa = $request->input('nomorgpa');
                    $puepa = $request->input('puepa');
                    $suepa = $request->input('suepa');
                    $callpa = $request->input('callpa');
                    $calle2pa = $request->input('calle2pa');
                    $calle3pa = $request->input('calle3pa');
                    $numpa = $request->input('numpa');
                    $colpa = $request->input('colpa');
                    $paispa = $request->input('paispa');
                    $localidad2 = $request->input('localidad2');
                    $telpa = $request->input('telpa');
                    $cppa = $request->input('cppa');
                    $tipo = 2;
                    //Se pasan los parámetros al array
                    $arrayT2 = [$idpapa, $tipo, $callpa, $calle2pa, $calle3pa, $numpa, $colpa, $localidad2, $telpa, $cppa, $paispa, $nomorgpa, $puepa, $suepa];
                    //Se ejecuta el procedimiento
                    $actualizarTrabajo1= $contadorParametros->proceUpdate($proceActualizarF9, $arrayT2);
                    session()->flash('success', 'Domicilio guardado con éxito.');
                    
                    return redirect()->route('form9-formulario');
                }   catch (QueryException $e) {
                    dd($e);
                    return redirect()->route('form9-formulario');  
                }
    }

    public function form9Registro3(Request $request)
    {
    
            //Código para obtener el Id de la mamá   
            $idmama = $this->obtenerIdMadre();
            // Valida y guarda los datos del primer formulario de la segunda vista
            $request->validate([
                'nomorgma' => 'required',
                'puema' => 'required',
                'suema' => 'required',
                'callma' => 'required',
                'calle2ma' => 'required',
                'calle3ma' => 'required',
                'numma' => 'required',
                'colma' => 'required',
                'paisma' => 'required',
                'estado3'  => 'required',
                'municipio3'  => 'required',
                'localidad3'  => 'required',
                'telma'  => 'required',
                'cpma'  => 'required'
            ]);

            //Se declara el nombre del procedimiento
            $proceActualizarF9 = 'ActualizarInsertarF9';
            //Se crea una instancia para poder utilizar la función 
            $contadorParametros = new ContadorParametros();
            
            //Se usa un trycatch en caso de error en el procedimiento para guardar 
                try {
                    $nomorgma = $request->input('nomorgma');
                    $puema = $request->input('puema');
                    $suema = $request->input('suema');
                    $callma = $request->input('callma');
                    $calle2ma = $request->input('calle2ma');
                    $calle3ma = $request->input('calle3ma');
                    $numma = $request->input('numma');
                    $colma = $request->input('colma');
                    $paisma = $request->input('paisma');
                    $localidad3 = $request->input('localidad3');
                    $telma = $request->input('telma');
                    $cpma = $request->input('cpma');
                    $tipo = 3;
                    //Se pasan los parámetros al array
                    $arrayT3 = [$idmama, $tipo, $callma, $calle2ma, $calle3ma, $numma, $colma, $localidad3, $telma, $cpma, $paisma, $nomorgma, $puema, $suema];
                    //Se ejecuta el procedimiento
                    $actualizarTrabajo3= $contadorParametros->proceUpdate($proceActualizarF9, $arrayT3);
                    session()->flash('success', 'Domicilio guardado con éxito.');
                    
                    return redirect()->route('form9-formulario');
                }   catch (QueryException $e) {
                    dd($e);
                    return redirect()->route('form9-formulario');  
                }
    }

    public function form10Registro1(Request $request){

    }
}
