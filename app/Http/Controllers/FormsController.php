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
class FormsController extends Controller
{
    
     
        //DESDE ESTE CONTROLADOR SE VAN A VALIDAR DATOS DE INPUTS Y GUARDAR INFORMACION
    public function form1Registro(Request $request)
        {
            // Validación de los campos
            $request->validate([
                'sexo' => 'required|in:0,1,3',
                'estado' => 'required',
                'municipio' => 'required',
                'localidad' => 'required',
                'estado_civil' => 'required|in:0,1',
            ]);

            // Aquí guarda los datos en la base de datos
            // Asumiendo que tienes un modelo "Persona" para guardar estos datos
            $curp = $request->input('curp');
            $persona = Persona::where('curp', $curp)->first();
            $persona->sexo = $request->input('sexo');
            $persona->locnac = $request->input('localidad'); // Asumiendo que "idLocalidad" es el campo en tu tabla para la localidad
            $persona->estadoCivil = $request->input('estado_civil');
            $persona->save();

            // Redirige o realiza otras acciones después de guardar los datos

            return redirect()->route('form1-formulario');
        }

    
    public function form2Registro1(Request $request)
    {
        $usuario = Auth::user();
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

        $domicilio = Domicilio::where('idpersona', $idPersona)
        ->where('tipo', 1)
        ->first();

        if($domicilio == null){
            $domicilioNuevo = new Domicilio;
            $domicilioNuevo->idpersona = $idPersona;
            $domicilioNuevo->calle = $request->input('calle');
            $domicilioNuevo->numero = $request->input('numero');
            $domicilioNuevo->colonia = $request->input('colonia');
            $domicilioNuevo->calle2 = $request->input('entre_calles');
            $domicilioNuevo->calle3 = $request->input('entre_calles2');
            $domicilioNuevo->telefono = $request->input('telefono_local');
            $domicilioNuevo->celular = $request->input('telefono_celular');
            $domicilioNuevo->tipo = 1;
            $domicilioNuevo->cp = $request->input('codigo_postal');
            $domicilioNuevo->idlocalidad = $request->input('localidad');
            $domicilioNuevo->save();
            return redirect()->route('form2-formulario');

        } else {
            $domicilio->calle = $request->input('calle');
            $domicilio->numero = $request->input('numero');
            $domicilio->colonia = $request->input('colonia');
            $domicilio->calle2 = $request->input('entre_calles');
            $domicilio->calle3 = $request->input('entre_calles2');
            $domicilio->telefono = $request->input('telefono_local');
            $domicilio->celular = $request->input('telefono_celular');
            $domicilio->cp = $request->input('codigo_postal');
            $domicilio->idlocalidad = $request->input('localidad');
            $domicilio->save();
            return redirect()->route('form2-formulario');
        }

    }

    public function form2Registro2(Request $request)
    {
        $usuario = Auth::user();
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
        
        $domicilio = Domicilio::where('idpersona', $idPersona)
        ->where('tipo', 2)
        ->first();

        if($domicilio == null){
            $domicilioNuevo = new Domicilio;
            $domicilioNuevo->idpersona = $idPersona;
            $domicilioNuevo->calle = $request->input('calle2');
            $domicilioNuevo->numero = $request->input('numero2');
            $domicilioNuevo->colonia = $request->input('colonia2');
            $domicilioNuevo->calle2 = $request->input('entre_calles3');
            $domicilioNuevo->calle3 = $request->input('entre_calles4');
            $domicilioNuevo->telefono = $request->input('telefono_local2');
            $domicilioNuevo->celular = $request->input('telefono_celular2');
            $domicilioNuevo->tipo = 2;
            $domicilioNuevo->cp = $request->input('codigo_postal2');
            $domicilioNuevo->idlocalidad = $request->input('localidad2');
            $domicilioNuevo->save();
            return redirect()->route('form2-formulario');

        } else {
            $domicilio->calle = $request->input('calle2');
            $domicilio->numero = $request->input('numero2');
            $domicilio->colonia = $request->input('colonia2');
            $domicilio->calle2 = $request->input('entre_calles3');
            $domicilio->calle3 = $request->input('entre_calles4');
            $domicilio->telefono = $request->input('telefono_local2');
            $domicilio->celular = $request->input('telefono_celular2');
            $domicilio->cp = $request->input('codigo_postal2');
            $domicilio->idlocalidad = $request->input('localidad2');
            $domicilio->save();
            return redirect()->route('form2-formulario');
        }
    }

    public function form2Registro3(Request $request)
    {
        $usuario = Auth::user();
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
        
        $domicilio = Domicilio::where('idpersona', $idPersona)
        ->where('tipo', 3)
        ->first();

        if($domicilio == null){
            $domicilioNuevo = new Domicilio;
            $domicilioNuevo->idpersona = $idPersona;
            $domicilioNuevo->calle = $request->input('calle3');
            $domicilioNuevo->numero = $request->input('numero3');
            $domicilioNuevo->colonia = $request->input('colonia3');
            $domicilioNuevo->calle2 = $request->input('entre_calles5');
            $domicilioNuevo->calle3 = $request->input('entre_calles6');
            $domicilioNuevo->telefono = $request->input('telefono_local3');
            $domicilioNuevo->celular = $request->input('telefono_celular3');
            $domicilioNuevo->tipo = 3;
            $domicilioNuevo->cp = $request->input('codigo_postal3');
            $domicilioNuevo->idlocalidad = $request->input('localidad3');
            $domicilioNuevo->save();
            return redirect()->route('form2-formulario');

        } else {
            $domicilio->calle = $request->input('calle3');
            $domicilio->numero = $request->input('numero3');
            $domicilio->colonia = $request->input('colonia3');
            $domicilio->calle2 = $request->input('entre_calles5');
            $domicilio->calle3 = $request->input('entre_calles6');
            $domicilio->telefono = $request->input('telefono_local3');
            $domicilio->celular = $request->input('telefono_celular3');
            $domicilio->cp = $request->input('codigo_postal3');
            $domicilio->idlocalidad = $request->input('localidad3');
            $domicilio->save();
            return redirect()->route('form2-formulario');
        }
    }

    public function form3Registro1(Request $request)
        {
            // Validación de los campos
            $request->validate([
                'curppadre2' => 'required|unique:catpersonas,curp',
                'fechapadre' => 'required',
                'apellidopadre1' => 'required',
                'apellidopadre2' => 'required',
                'nombrepadre' => 'required',
                'estado' => 'required',
                'municipio' => 'required',
                'localidad' => 'required',
            ]);

            //Defino la curp del input ingresado
            $curpInputPadre=$request->curppadre2;
            // Obtener el usuario autenticado (persona)
            $usuario = Auth::user();

            // Obtener los datos del id del papá de la persona que está haciendo la solicitud
            $idPadre = Expediente::where('idsolicitante', $usuario->idlog)
            ->select('idpadre')
            ->first(); // Obtén la primera coincidencia (puede haber solo una)
           
            //Verificar si existe ya un papá registrado, si no existe se crea y si ya existe se actualiza
            $padre = Persona::where('idpersona', $idPadre->idpadre)
            ->first();

                if($padre == null){
                    $nuevoPadre = new Persona();
                    $nuevoPadre->curp = $request->input('curppadre2');
                    $nuevoPadre->paterno = $request->input('apellidopadre1');
                    $nuevoPadre->materno = $request->input('apellidopadre2');
                    $nuevoPadre->nombre = $request->input('nombrepadre');
                    $sexo = $request->input('sexopadre');
                    if ($sexo == 'H') {
                        $nuevoPadre->sexo = 1;  // Hombre
                    } elseif ($sexo == 'M') {
                        $nuevoPadre->sexo = 0;  // Mujer
                    }
                    $nuevoPadre->fechanac = $request->input('fechapadre');
                    $nuevoPadre->locnac = $request->input('localidad'); // Asumiendo que "idLocalidad" es el campo en tu tabla para la localidad
                    $nuevoPadre->fechaRegistro = Carbon::now();
                    $nuevoPadre->save();
    
                    // Encuentra el expediente relacionado al solicitante actual (puedes ajustar esta parte según tus relaciones)
                    $expediente = Expediente::where('idsolicitante', $usuario->idlog)->first();
                    $expediente->idpadre = $nuevoPadre->idpersona;
                    $expediente->save();
                    // Redirige o realiza otras acciones después de guardar los datos
                    session()->flash('success', 'Registro del padre guardado.');
                    return view('layouts-form.form3');
    
                } else {
                    $padre->curp = $request->input('curppadre2');
                    $padre->paterno = $request->input('apellidopadre1');
                    $padre->materno = $request->input('apellidopadre2');
                    $padre->nombre = $request->input('nombrepadre');
                    $sexo = $request->input('sexopadre');
                    if ($sexo == 'H') {
                        $padre->sexo = 1;  // Hombre
                    } elseif ($sexo == 'M') {
                        $padre->sexo = 0;  // Mujer
                    }
                    $padre->fechanac = $request->input('fechapadre');
                    $padre->locnac = $request->input('localidad'); 
                    $padre->save();
                    session()->flash('success', 'Registro del padre actualizado.');
                    return redirect()->route('form3-formulario');
                    session()->forget('success');
                }
               
        }
    
    public function form3Registro2(Request $request) {
             // Validación de los campos
             $request->validate([
                'curpmadre2' => 'required|unique:catpersonas,curp',
                'fechamadre' => 'required',
                'apellidomadre1' => 'required',
                'apellidomadre2' => 'required',
                'nombremadre' => 'required',
                'estado2' => 'required',
                'municipio2' => 'required',
                'localidad2' => 'required',
            ]);

            //Defino la curp del input ingresado
            $curpInputMadre=$request->curpmadre2;
            // Obtener el usuario autenticado (persona)
            $usuario = Auth::user();

            // Obtener los datos del id del papá de la persona que está haciendo la solicitud
            $idMadre = Expediente::where('idsolicitante', $usuario->idlog)
            ->select('idmadre')
            ->first(); // Obtén la primera coincidencia (puede haber solo una)
           
            //Verificar si existe ya un papá registrado en caso contrario se crea
            $madre = Persona::where('idpersona', $idMadre->idmadre)
            ->first();

            //Validar que la curp no se encuentre registrada
            if($curpInputMadre == $madre->curp){
                session()->flash('errorM', 'La CURP ya se encuentra registrada.');
                return redirect()->route('form3-formulario');
            }else {
                if($madre == null){
                    $nuevoMadre = new Persona();
                    $nuevoMadre->curp = $request->input('curpmadre2');
                    $nuevoMadre->paterno = $request->input('apellidomadre1');
                    $nuevoMadre->materno = $request->input('apellidomadre2');
                    $sexo = $request->input('sexomadre');
                    if ($sexo == 'H') {
                        $nuevoMadre->sexo = 1;  // Hombre
                    } elseif ($sexo == 'M') {
                        $nuevoMadre->sexo = 0;  // Mujer
                    }
                    $nuevoMadre->fechanac = $request->input('fechamadre');
                    $nuevoMadre->nombre = $request->input('nombremadre');
                    $nuevoMadre->locnac = $request->input('localidad2'); // Asumiendo que "idLocalidad" es el campo en tu tabla para la localidad
                    $nuevoMadre->fechaRegistro = Carbon::now();
                    $nuevoMadre->save();
    
                    // Encuentra el expediente relacionado al solicitante actual (puedes ajustar esta parte según tus relaciones)
                    $expediente = Expediente::where('idsolicitante', $usuario->idlog)->first();
                    $expediente->idmadre = $nuevoMadre->idpersona;
                    $expediente->save();
                    // Redirige o realiza otras acciones después de guardar los datos
                    session()->flash('successM', 'Registro de la madre guardadoxd.');
                    return view('layouts-form.form3');
    
                } else {
                    $madre->curp = $request->input('curpmadre2');
                    $madre->paterno = $request->input('apellidomadre1');
                    $madre->materno = $request->input('apellidomadre2');
                    $madre->nombre = $request->input('nombremadre');
                    $sexo = $request->input('sexomadre');
                    if ($sexo == 'H') {
                        $madre->sexo = 1;  // Hombre
                    } elseif ($sexo == 'M') {
                        $madre->sexo = 0;  // Mujer
                    }
                    $madre->fechanac = $request->input('fechamadre');
                    $madre->locnac = $request->input('localidad2'); 
                    $madre->save();
                    session()->flash('successM', 'Registro de la madre guardado2.');
                    return view('layouts-form.form3');
                }
            } 
            
        }
    
}
