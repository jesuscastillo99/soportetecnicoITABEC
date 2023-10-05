<?php


// use Illuminate\Http\Request;
// use Illuminate\Support\Str;
// use App\Mail\EnviarContraseñaGenerada;
// use App\Models\Usuario; // Asegúrate de importar el modelo 

namespace App\Http\Controllers;
use App\Models\Usuario; // Asegúrate de importar el modelo Usuario adecuadamente
use App\Models\Persona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Mail\ActivationMail;
use GuzzleHttp\Client;
use SimpleXMLElement;


class RegistroController extends Controller
{


public function registro(Request $request)
    {
        // Validación de datos del formulario
        $request->validate([
            'curp' => 'required|unique:usuarioslog,curp',
            'correo' => 'required|email|unique:usuarioslog,correo',
        ]);

        //Solicitud al webservice
        $client = new Client();
        $curpValor = $request->curp;
        $response = $client->get("http://sistemasiceet.tamaulipas.gob.mx/wscurp/wscurp.php?CURP=$curpValor");

        //Generación del token
        $activationToken = Str::random(40);

        if ($response->getStatusCode() == 200) {
            $xmlResponse = $response->getBody()->getContents();
            
            // Procesar la respuesta XML y guardar en "personas"
            $xml = new SimpleXMLElement($xmlResponse);
            $curp = $xml->curp;
            $paterno = $xml->paterno;
            $materno = $xml->materno;
            $nombre = $xml->nombre;
            $sexo = $xml->sexo;
            $fn = $xml->fn;
            
            if (empty($xmlResponse) || $xml->curp == "") {
                $errorMessage = "Tu CURP no fue encontrada en el sistema.";
                // return redirect()->route('registro')->with('error', $errorMessage);
                return view('layouts.registro', ['errorMessage' => $errorMessage]);
            } else {
                // Crea una nueva instancia del modelo Persona
                $nuevaPersona = new Persona;
                $nuevaPersona->curp = $curp;
                $nuevaPersona->correo = $request->correo;
                $nuevaPersona->paterno = $paterno; 
                $nuevaPersona->materno = $materno; 
                $nuevaPersona->nombre = $nombre; 
                $nuevaPersona->sexo = $sexo; 
                $nuevaPersona->fn = $fn; 
                
                $nuevaPersona->save();

                // Crea una nueva instancia del modelo Usuario
                $nuevoUsuario = new Usuario;
                $nuevoUsuario->curp = $request->curp;
                $nuevoUsuario->correo = $request->correo;
                $nuevoUsuario->activo = 0; // Establece 'activo' en 0 (inactivo) por defecto
                $nuevoUsuario->act_token = $activationToken; // Genera un token de activación
                
                $nuevoUsuario->save();

                
                // Envía el correo de activación
                Mail::to($nuevoUsuario->correo)->send(new ActivationMail($nuevoUsuario, $activationToken));

                return redirect()->route('exito'); 

            }
        } else {
            $errorMessage = 'No se pudo realizar la petición';
            return view('registro')->with('errorMessage', $errorMessage);
        }
       
    }

}
