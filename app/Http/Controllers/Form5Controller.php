<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estado;
use App\Models\Municipio;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Form5Controller extends Controller
{
  public function cargarEstadosMunicipios()
  {
      // Obtener datos de la tabla CatEstado
      $estados = Estado::pluck('NombreEstado', 'IdEstado');
      $municipios = Municipio::pluck('NombreMunicipio', 'IdMunicipio');
  
      return view('layouts-form.form5', ['estados' => $estados]);
  }

  public function cargarMunicipios($estado)
  {
    $municipios=Municipio::where('idEstado', $estado)->get();

    return response()->json($municipios);
  }

}