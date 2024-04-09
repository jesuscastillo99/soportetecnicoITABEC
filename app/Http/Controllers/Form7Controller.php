<?php

namespace App\Http\Controllers;

use App\Models\Municipio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use App\Models\TablaDinamicaF7;


class Form7Controller extends Controller
{
    public function index()
    {   
        //ESTRUCTURA PRINCIPAL PARA IMPLEMENTAR UN PROCEDIMIENTO 
        $nombreProcedimiento1= 'ObtenerDatosF7';
        $usuario = Auth::user();
        $userId = $usuario->idlog;
        $arrayId = [$userId];
        $procedimiento = new ContadorParametros();
        $resultados= $procedimiento->proceSelect($nombreProcedimiento1, $arrayId);

        //SE DEFINEN VARIABLES PARA EL F7
        $consultaEscPa = $resultados[0]->esc_alca_padre ?? null;
        $consultaEscMa =  $resultados[0]->esc_alca_madre ?? null;
        $consultaActPa =  $resultados[0]->actividad_padre ?? null; 
        $consultaActMa =  $resultados[0]->actividad_madre ?? null;
        $consultaAuPro =  $resultados[0]->auto_propio ?? null;
        $consultaColPri =  $resultados[0]->colegio_privado ?? null;
        $consultaCpu =  $resultados[0]->cpu_personal ?? null;
        $consultaAuMa =  $resultados[0]->auto_madre ?? null; 
        $consultaTamCas =  $resultados[0]->tam_casa_fam ?? null;
        $consultaMatCas =  $resultados[0]->material_casa ?? null;
        $consultaIngEco =  $resultados[0]->ingreso_eco ?? null;   
        
        //CODIGO PARA OBTENER DEL PROCEDIMIENTO OBTENERDATOSF7 PARTE 2
        $nombreProcedimiento2= 'ObtenerDatosF72';
        $procedimiento2 = new ContadorParametros();
        $resultados2= $procedimiento2->proceSelect($nombreProcedimiento2, $arrayId);

        //SE DEFINEN VARIABLES PARA EL F7 PARTE 2
        $consultaTipApo = $resultados2[0]->tipo_apoyo_eco ?? null;
        $consultaMonMens = $resultados2[0]->monto_mens_apoyo ?? null;
        $consultaComApo = $resultados2[0]->como_supo_apoyo ?? null;
        $consultaSolApo = $resultados2[0]->soli_ante_apoyo ?? null;
        $consultaSeOto = $resultados2[0]->se_otorgo ?? null;
        $consultaRecMen = $resultados2[0]->recibio_mens ?? null;
        $consultaHermApo = $resultados2[0]->herm_recibe_apoyo ?? null;
        $consultaCntHerm = $resultados2[0]->cntos_hermanos ?? null;
        $consultaIdMunicipio = $resultados2[0]->firma_municipio ?? null;  

        //Enviar todos los municipios
        $municipios = Municipio::where('IdEstado', 28)
                       ->pluck('NombreMunicipio', 'IdMunicipio');

        //CODIGO PARA EL FORM 7 DEPENDIENTES ECONOMICOS
        $registros = TablaDinamicaF7::where('idpersona', $userId)
                                    ->get();
        
        //CODIGO PARA TRAERME EL NOMBRE DEL MUNICIPIO
        $nombreMunicipio2 = Municipio::where('IdMunicipio', $consultaIdMunicipio)->value('NombreMunicipio');
      
            return view('layouts-form.form7',[
               'consultaEscPa' => $consultaEscPa,
               'consultaEscMa' => $consultaEscMa,
               'consultaActPa' => $consultaActPa, 
               'consultaActMa' => $consultaActMa, 
               'consultaAuPro' => $consultaAuPro,
               'consultaColPri' => $consultaColPri, 
               'consultaCpu' => $consultaCpu, 
               'consultaAuMa' => $consultaAuMa,
               'consultaTamCas' => $consultaTamCas, 
               'consultaMatCas' => $consultaMatCas, 
               'consultaIngEco' => $consultaIngEco,
               'consultaTipApo' => $consultaTipApo,
               'consultaMonMens' => $consultaMonMens,
               'consultaComApo' => $consultaComApo,
               'consultaSolApo' => $consultaSolApo,
               'consultaSeOto' => $consultaSeOto,
               'consultaRecMen' => $consultaRecMen,
               'consultaHermApo' => $consultaHermApo,
               'consultaCntHerm' => $consultaCntHerm,
               'nombreMunicipio2' => $nombreMunicipio2,
               'municipios' => $municipios,
               'registros' => $registros
            ]);
    }

    public function delete_post2($id)
    {
        try {
            
          $registro = TablaDinamicaF7::find($id);
          
          $registro->delete();
  
          return redirect()->route('form7-formulario');

        } catch (QueryException $e) {
          dd($e);
          
        }
        
    }
}
