<?php

namespace App\Http\Controllers;
use App\Models\Estado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UbicacionController extends Controller
{
    public function obtenerEstados()
    {
        // Obtén los estados desde la tabla CatEstado
        $estados = Estado::pluck('IdEstado', 'NombreEstado');

         // Cargar la vista y pasar los estados como una variable
         return view('layouts-form.form1', ['estados' => $estados]);
    }
}
