<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estado;
use App\Models\Municipio;
use App\Models\TablaDinamica;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Form5Controller extends Controller
{
  public function index()
    {
        $usuario = Auth::user();
        $curpId = $usuario->curp;
            $arrayIdCurp = [$curpId];
            $proceUser = 'ObtenerUserId';
            $obtenerId = new ContadorParametros();
            $resultId = $obtenerId->proceSelect($proceUser, $arrayIdCurp);
            $userId = $resultId[0]->idsolicitante ?? null;
        $registros = TablaDinamica::where('idpersona', $userId)
                                  ->with('municipio')
                                  ->get();
        $estados = Estado::pluck('NombreEstado', 'IdEstado');
        $consultaEstado = null;
        $consultaMunicipio = null;
        //dd($registros);
        return view('layouts-form.form5',[
          'estados' => $estados,
          'registros' => $registros,
          'consultaEstado' => $consultaEstado,
          'consultaMunicipio' => $consultaMunicipio]);
    }

    
    public function delete_post($idtd)
    {
        try {
            
          $registro = TablaDinamica::find($idtd);
          
          $registro->delete();
  
          return redirect()->route('form5-formulario');

        } catch (QueryException $e) {
          dd($e);
          
        }
        
    }

    public function cargarMunicipios($estado)
    {
        // Consulta los municipios relacionados con el estado
        $municipios = Municipio::where('IdEstado', $estado)->get();

        // Devuelve los municipios en formato JSON
        return response()->json($municipios);
    }

}