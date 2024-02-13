<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ContadorParametros extends Controller
{
    

    public function proceSelect($nombreProcedimiento, array $parametros)
    {
        // Construir la cadena de parámetros para el procedimiento almacenado
        $parametrosStr = implode(', ', array_fill(0, count($parametros), '?'));

        
        // Construir la consulta para llamar al procedimiento almacenado
        $query = "EXEC $nombreProcedimiento $parametrosStr";

        //dd($query);
      
        $resultados = DB::connection('sqlsrv')->select($query, $parametros);
        
        return $resultados;
        
    }

    public function proceStatement($nombreProcedimiento, array $parametros)
    {
        // Construir la cadena de parámetros para el procedimiento almacenado
        $parametrosStr = implode(', ', array_fill(0, count($parametros), '?'));

        
        // Construir la consulta para llamar al procedimiento almacenado
        $query = "EXEC $nombreProcedimiento $parametrosStr";

        //dd($query);
      
        $resultados = DB::connection('sqlsrv')->statement($query, $parametros);
        
        return $resultados;
        
    }

    public function proceUpdate($nombreProcedimiento, array $parametros)
    {
        // Construir la cadena de parámetros para el procedimiento almacenado
        $parametrosStr = implode(', ', array_fill(0, count($parametros), '?'));

        
        // Construir la consulta para llamar al procedimiento almacenado
        $query = "EXEC $nombreProcedimiento $parametrosStr";

        //dd($query);
      
        $resultados = DB::connection('sqlsrv')->update($query, $parametros);
        
        return $resultados;
        
    }
    
}
