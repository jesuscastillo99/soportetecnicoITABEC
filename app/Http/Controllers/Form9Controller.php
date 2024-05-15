<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estado;
use App\Models\Municipio;
use App\Models\Localidad;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;
use SimpleXMLElement;

class Form9Controller extends Controller
{
    public function index(){
        $usuario = Auth::user();
        $curpId = $usuario->curp;
        $arrayIdCurp = [$curpId];
        $proceUser = 'ObtenerUserId';
        $obtenerId = new ContadorParametros();
        $resultId = $obtenerId->proceSelect($proceUser, $arrayIdCurp);
        $userId = $resultId[0]->idsolicitante ?? null;
        
        $proce1 = 'ObtenerDatosF9J';
        $proce2= 'ObtenerLugarNacimiento';
        $estados = Estado::pluck('NombreEstado', 'IdEstado');

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

        //CODIGO PARA OBTENER DATOS DEL TRABAJO DEL ESTUDIANTE
        $array1= [$userId];
        $procedimiento = new ContadorParametros();
        $datosDomicilio1 = $procedimiento->proceSelect($proce1, $array1);
        $nomorgest = $datosDomicilio1[0]->nombreorg ?? null;
        $pueest = $datosDomicilio1[0]->puesto ?? null;
        $sueest = $datosDomicilio1[0]->sueldo ?? null;
        $callest = $datosDomicilio1[0]->calle ?? null;
        $calle2est = $datosDomicilio1[0]->calle2 ?? null;
        $calle3est = $datosDomicilio1[0]->calle3 ?? null;
        $numest = $datosDomicilio1[0]->numero ?? null;
        $colest = $datosDomicilio1[0]->colonia ?? null;
        $paisest = $datosDomicilio1[0]->pais ?? null;
        $idlocalidadest = $datosDomicilio1[0]->idlocalidad ?? null;
        $telest = $datosDomicilio1[0]->telefono ?? null;
        $cpest = $datosDomicilio1[0]->cp ?? null;
        //Ejecutar procedimiento para obtener estado y municipio
        $arrayLocalidad1 = [$idlocalidadest];
        $localidad = $procedimiento->proceSelect($proce2, $arrayLocalidad1);

        //En caso de que sea nulo
        $nombreLocalidad = $localidad[0]->Localidad ?? null;
        $nombreMunicipio = $localidad[0]->NombreMunicipio ?? null;
        $nombreEstado = $localidad[0]->NombreEstado ?? null;


        //CODIGO PARA OBTENER DATOS DEL TRABAJO DEL PADRE
        $idpapa =$this->obtenerIdPadre();
        $array2= [$idpapa];
        $procedimiento = new ContadorParametros();
        $datosDomicilio2 = $procedimiento->proceSelect($proce1, $array2);
        $nomorgpa = $datosDomicilio2[0]->nombreorg ?? null;
        $puepa = $datosDomicilio2[0]->puesto ?? null;
        $suepa = $datosDomicilio2[0]->sueldo ?? null;
        $callpa = $datosDomicilio2[0]->calle ?? null;
        $calle2pa = $datosDomicilio2[0]->calle2 ?? null;
        $calle3pa = $datosDomicilio2[0]->calle3 ?? null;
        $numpa = $datosDomicilio2[0]->numero ?? null;
        $colpa = $datosDomicilio2[0]->colonia ?? null;
        $paispa = $datosDomicilio2[0]->pais ?? null;
        $idlocalidadpadre = $datosDomicilio2[0]->idlocalidad ?? null;
        $telpa = $datosDomicilio2[0]->telefono ?? null;
        $cppa = $datosDomicilio2[0]->cp ?? null;

        //Ejecutar procedimiento para obtener estado y municipio
        $arrayLocalidad2 = [$idlocalidadpadre];
        $localidad2 = $procedimiento->proceSelect($proce2, $arrayLocalidad2);
        
        //En caso de que sea nulo
        $nombreLocalidad2 = $localidad2[0]->Localidad ?? null;
        $nombreMunicipio2 = $localidad2[0]->NombreMunicipio ?? null;
        $nombreEstado2 = $localidad2[0]->NombreEstado ?? null;
        
        //CODIGO PARA OBTENER DATOS DEL TRABAJO DE LA MADRE
        $idmama =$this->obtenerIdMadre();
        $array3= [$idmama];
        $procedimiento = new ContadorParametros();
        $datosDomicilio3 = $procedimiento->proceSelect($proce1, $array3);
        $nomorgma = $datosDomicilio3[0]->nombreorg ?? null;
        $puema = $datosDomicilio3[0]->puesto ?? null;
        $suema = $datosDomicilio3[0]->sueldo ?? null;
        $callma = $datosDomicilio3[0]->calle ?? null;
        $calle2ma = $datosDomicilio3[0]->calle2 ?? null;
        $calle3ma = $datosDomicilio3[0]->calle3 ?? null;
        $numma = $datosDomicilio3[0]->numero ?? null;
        $colma = $datosDomicilio3[0]->colonia ?? null;
        $paisma = $datosDomicilio3[0]->pais ?? null;
        $idlocalidadmadre = $datosDomicilio3[0]->idlocalidad ?? null;
        $telma = $datosDomicilio3[0]->telefono ?? null;
        $cpma = $datosDomicilio3[0]->cp ?? null;

        //Ejecutar procedimiento para obtener estado y municipio
        $arrayLocalidad3 = [$idlocalidadmadre];
        $localidad3 = $procedimiento->proceSelect($proce2, $arrayLocalidad3);
        
        //En caso de que sea nulo
        $nombreLocalidad3 = $localidad3[0]->Localidad ?? null;
        $nombreMunicipio3 = $localidad3[0]->NombreMunicipio ?? null;
        $nombreEstado3 = $localidad3[0]->NombreEstado ?? null;
       
        return view('layouts-form.form9',
            [
             'nomorgest' => $nomorgest,
             'pueest' => $pueest,
             'sueest' => $sueest,
             'callest' => $callest,
             'calle2est' => $calle2est,
             'calle3est' => $calle3est,
             'numest' => $numest,
             'colest' => $colest,
             'paisest' => $paisest,
             'idlocalidadest' => $idlocalidadest,
             'telest' => $telest,
             'cpest' => $cpest,
             'nombreLocalidad' => $nombreLocalidad,
             'nombreMunicipio' => $nombreMunicipio,
             'nombreEstado' => $nombreEstado,
             //variablespadre
             'nomorgpa' => $nomorgpa,
             'puepa' => $puepa,
             'suepa' => $suepa,
             'callpa' => $callpa,
             'calle2pa' => $calle2pa,
             'calle3pa' => $calle3pa,
             'numpa' => $numpa,
             'colpa' => $colpa,
             'paispa' => $paispa,
             'idlocalidadpadre' => $idlocalidadpadre,
             'telpa' => $telpa,
             'cppa' => $cppa,
             'nombreLocalidad2' => $nombreLocalidad2,
             'nombreMunicipio2' => $nombreMunicipio2,
             'nombreEstado2' => $nombreEstado2, 
             //variables madre                           
             'nomorgma' => $nomorgma,
             'puema' => $puema,
             'suema' => $suema,
             'callma' => $callma,
             'calle2ma' => $calle2ma,
             'calle3ma' => $calle3ma,
             'numma' => $numma,
             'colma' => $colma,
             'paisma' => $paisma,
             'idlocalidadmadre' => $idlocalidadmadre,
             'telma' => $telma,
             'cpma' => $cpma,
             'nombreLocalidad3' => $nombreLocalidad3,
             'nombreMunicipio3' => $nombreMunicipio3,
             'nombreEstado3' => $nombreEstado3, 
             'estados' => $estados,
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


}
