<?php
namespace App\Http\Controllers;
use App\Models\Usuario; 
use App\Models\Persona;
use App\Models\Expediente;
use App\Models\Domicilio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Mail\ActivationMail;
use GuzzleHttp\Client;
use SimpleXMLElement;
use Illuminate\Support\Carbon;



class RegistroController extends Controller
{


    public function registro(Request $request)
    {
        //Solicitud al webservice
        $client = new Client();
        $curpValor = $request->curp;
        $response = $client->get("http://sistemasiceet.tamaulipas.gob.mx/wscurp/wscurp.php?CURP=$curpValor");
    
        if ($response->getStatusCode() == 200) {
            $xmlResponse = $response->getBody()->getContents();
    
            // Procesar la respuesta XML y guardar en "personas"
            $xml = new SimpleXMLElement($xmlResponse);
    
            if (empty($xmlResponse) || $xml->curp == "") {
                $errorMessage = "Tu CURP no fue encontrada en el sistema.";
                return view('layouts.registro', ['errorMessage' => $errorMessage]);
            } else {
                // Validación de datos del formulario
                $request->validate([
                    'curp' => 'required|unique:usuarioslog,curp',
                    'correo' => 'required|email|unique:usuarioslog,correo',
                ]);
    
                // Generación del token
                $activationToken = Str::random(50);
                //PROCEDIMIENTO SQL SERVER INSERTAR SOLICITANTE

                $nombreProcedimiento1= 'insertarsolicitante';
                $curp= $xml->curp;
                $correo= $request->correo;
                $activo = 0; // Establece 'activo' en 0 (inactivo) por defecto
                $act_token = $activationToken; // Genera un token de activación
                $paterno = $xml->paterno;
                $materno = $xml->materno;
                $nombre = $xml->nombre;
                if ($xml->sexo == 'H') {
                    $sexo = 1; // Hombre
                } elseif ($xml->sexo == 'M') {
                    $sexo = 0; // Mujer
                }
                //$fechanac = Carbon::createFromFormat('d/m/Y', $xml->fn)->toDateString();
                $fechaInput = $xml->fn;
                $fechaCarbon = Carbon::createFromFormat('d/m/Y', $fechaInput);
                $nuevaFecha = $fechaCarbon->format('Y-m-d');
                $finalizado = 0;
                $arraySolicitante = [$curp, $correo, $activo, $act_token, $paterno, $materno, $nombre, $sexo, $nuevaFecha, $finalizado];
                $procedimiento = new ContadorParametros();
                $resultados= $procedimiento->proceStatement($nombreProcedimiento1, $arraySolicitante);
                //dd($resultados[0]);
                // Verificar si se obtuvieron resultados para almacenar el id y la localidad de la personna (papá)
                // if (!empty($resultados)) {
                //     $correoUsuario = $resultados[0]->correo;
                    
                    
                // } else {
                //     // Si no se obtienen resultados
                //     return redirect()->route('login');
                // }


                /* codigo USANDO ELOQUENT */
                // // Crea una nueva instancia del modelo Usuario
                $nuevoUsuario = new Usuario;
                // $nuevoUsuario->curp = $xml->curp;
                // $nuevoUsuario->correo = $request->correo;
                // $nuevoUsuario->activo = 0; // Establece 'activo' en 0 (inactivo) por defecto
                // $nuevoUsuario->act_token = $activationToken; // Genera un token de activación
                // $nuevoUsuario->save();

                // //Generar el mismo idpersona para las demás tablas
                // $nuevoId=$nuevoUsuario->idlog;

                // // Crea una nueva instancia del modelo Persona
                // $nuevaPersona = new Persona;
                // $nuevaPersona->rfc = '';
                // $nuevaPersona->curp = $xml->curp;
                // $nuevaPersona->correo = $request->correo;
                // $nuevaPersona->paterno = $xml->paterno;
                // $nuevaPersona->materno = $xml->materno;
                // $nuevaPersona->nombre = $xml->nombre;
                // if ($xml->sexo == 'H') {
                //     $nuevaPersona->sexo = 1; // Hombre
                // } elseif ($xml->sexo == 'M') {
                //     $nuevaPersona->sexo = 0; // Mujer
                // }
                // $nuevaPersona->fechanac = Carbon::createFromFormat('d/m/Y', $xml->fn)->toDateString();
                // $nuevaPersona->locnac = '';
                // $nuevaPersona->fechaRegistro = Carbon::now();
                // $nuevaPersona->estadoCivil = '';
                // $nuevaPersona->save();

                // //Creando instancia del modelo Expediente
                // $nuevoExpediente = new Expediente;
                // $nuevoExpediente->idsolicitante = $nuevoId;
                // $nuevoExpediente->fecha = Carbon::now();
                // $nuevoExpediente->save();

                // Envía el correo de activación
                Mail::to($correo)->send(new ActivationMail($nuevoUsuario, $activationToken));
    
                return redirect()->route('exito');
            }
        } else {
            $errorMessage = 'No se pudo realizar la petición';
            return view('layouts.registro', ['errorMessage' => $errorMessage]);
        }
    }

}
