<?php


namespace App\Http\Controllers;
use App\Models\Estado;
use App\Models\Municipio;
use App\Models\Localidad;
use Illuminate\Http\Request;
use App\Models\Persona;
use App\Models\Domicilio;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class Form2Controller extends Controller
{
    public function index()
    {
        $usuario = Auth::user();

        // Obtener los datos del primer domicilio desde la tabla "catdomicilio"
        //Se declaran los parámetros para ejecutar el procedimiento "NombreProcedimiento" y "Array de Parametros"
        $proce1Domicilio = 'CargarDomicilioForm2';
        $arrayIdDomicilio = [$usuario->idlog, 1];
        //Se crea una instancia para poder utilizar la función 
        $contadorParametros = new ContadorParametros();
        $datosDomicilio1 = $contadorParametros->proceSelect($proce1Domicilio, $arrayIdDomicilio);
        
        // Verificar si se obtuvieron resultados
        if (!empty($datosDomicilio1)) {
            // Obtener el primer resultado
            $datosDomicilio1 = $datosDomicilio1[0];
        } else {
            // Si no se obtienen resultados, puedes manejarlo de acuerdo a tus necesidades
            $datosDomicilio1 = null;
        }



        // Obtener los datos del segundo domicilio desde la tabla "catdomicilio"
        $arrayIdDomicilio2 = [$usuario->idlog, 2];
        $datosDomicilio2 = $contadorParametros->proceSelect($proce1Domicilio, $arrayIdDomicilio2);
        
        // Verificar si se obtuvieron resultados
        if (!empty($datosDomicilio2)) {
            // Obtener el primer resultado
            $datosDomicilio2 = $datosDomicilio2[0];
        } else {
            // Si no se obtienen resultados, puedes manejarlo de acuerdo a tus necesidades
            $datosDomicilio2 = null;
        }

        // Obtener los datos del segundo domicilio desde la tabla "catdomicilio"
        $arrayIdDomicilio3 = [$usuario->idlog, 3];
        $datosDomicilio3 = $contadorParametros->proceSelect($proce1Domicilio, $arrayIdDomicilio3);
        
        // Verificar si se obtuvieron resultados
        if (!empty($datosDomicilio3)) {
            // Obtener el primer resultado
            $datosDomicilio3 = $datosDomicilio3[0];
        } else {
            // Si no se obtienen resultados, puedes manejarlo de acuerdo a tus necesidades
            $datosDomicilio3 = null;
        }


       //Enviando datos al select    
        $estados = Estado::pluck('NombreEstado', 'IdEstado');


        //función para cargar estado,municipio y localidad del form2
        
        $idUser=$usuario->idlog;

        /* CODIGO DEL DOMICILIO 1 */

        //En caso de que sea nulo
        $idLocalidad1 = $datosDomicilio1 ? $datosDomicilio1->idlocalidad : null;
        //Ejecutar procedimiento
        $arrayLocalidad1 = [$idLocalidad1];
        $proce2Localidad= 'ObtenerLugarNacimiento';
        //Ejecutar procedimiento
        $localidad = $contadorParametros->proceSelect($proce2Localidad, $arrayLocalidad1);

        //En caso de que sea nulo
        $nombreLocalidad = $localidad[0]->Localidad ?? null;
        $nombreMunicipio = $localidad[0]->NombreMunicipio ?? null;
        $nombreEstado2 = $localidad[0]->NombreEstado ?? null;

        

        /* CODIGO DEL DOMICILIO 2 */

        //En caso de que sea nulo
        $idLocalidad2 = $datosDomicilio2 ? $datosDomicilio2->idlocalidad : null;
        $arrayLocalidad2 = [$idLocalidad2];
        //Ejecutar procedimiento
        $localidad2 = $contadorParametros->proceSelect($proce2Localidad, $arrayLocalidad2);

        //En caso de que sea nulo
        $nombreLocalidad2 = $localidad2[0]->Localidad ?? null;
        $nombreMunicipio2 = $localidad2[0]->NombreMunicipio ?? null;
        $nombreEstado22 = $localidad2[0] ->NombreEstado ?? null;

        
        /* CODIGO DEL DOMICILIO 3 */

        //En caso de que sea nulo
        $idLocalidad3 = $datosDomicilio3 ? $datosDomicilio3->idlocalidad : null;
        $arrayLocalidad3 = [$idLocalidad3];
        //Ejecutar procedimiento
        $localidad3 = $contadorParametros->proceSelect($proce2Localidad, $arrayLocalidad3);

        //En caso de que sea nulo
        $nombreLocalidad3 = $localidad3[0]->Localidad ?? null;
        $nombreMunicipio3 = $localidad3[0]->NombreMunicipio ?? null;
        $nombreEstado23 = $localidad3[0]->NombreEstado ?? null;
        
        // Pasar los datos a la vista
        return view('layouts-form.form2', 
            ['datosDomicilio1' => $datosDomicilio1, 
            'datosDomicilio2' => $datosDomicilio2,
            'datosDomicilio3' => $datosDomicilio3,
            'estados' => $estados, 
            'nombreLocalidad' => $nombreLocalidad,
            'nombreMunicipio' => $nombreMunicipio,
            'nombreEstado2' => $nombreEstado2,
            'nombreLocalidad2' => $nombreLocalidad2,
            'nombreMunicipio2' => $nombreMunicipio2,
            'nombreEstado22' => $nombreEstado22,
            'nombreLocalidad3' => $nombreLocalidad3,
            'nombreMunicipio3' => $nombreMunicipio3,
            'nombreEstado23' => $nombreEstado23]);
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
}
