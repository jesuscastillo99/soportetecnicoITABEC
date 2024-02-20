<?php

namespace App\Http\Controllers;

use App\Models\TablaDinamica;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class DinamicTableController extends Controller
{
    public function index()
    {
        $registros = TablaDinamica::all();
        return view('registro.index', compact('registros'));
    }

    public function store(Request $request)
    {
        $registro = new TablaDinamica();
        $registro->nombre = $request->input('nombre');
        $registro->apellido = $request->input('apellido');
        $registro->save();

        return response()->json(['success' => true]);
    }

    public function destroy($id)
    {
        $registro = TablaDinamica::find($id);
        $registro->delete();

        return response()->json(['success' => true]);
    }
}
