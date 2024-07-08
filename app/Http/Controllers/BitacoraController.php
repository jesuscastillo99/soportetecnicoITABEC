<?php

namespace App\Http\Controllers;
use App\Models\BitacoraModel;
use App\Models\Equipo;
use Illuminate\Http\Request;

class BitacoraController extends Controller
{
    public function create()
    {
        // Obtener todos los equipos para el dropdown
        $equipos = Equipo::all();
        return view('layouts.crearbitacora', compact('equipos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'numero' => 'required|integer',
            'fechasolicitud' => 'required|date',
            'fechaentrega' => 'required|date',
            'idtecnico' => 'required|integer',
            'idequipo' => 'required|integer',
            'falla' => 'required|string|max:255',
            'causa' => 'required|string|max:255',
            'solucion' => 'required|string|max:255',
            'observaciones' => 'nullable|string|max:255',
            'responsable' => 'nullable|string|max:255',
            'archivo' => 'required|file|mimes:pdf|max:2048', // Validación del archivo
        ]);

        // Guardar el archivo
        if ($request->hasFile('archivo')) {
            $archivo = $request->file('archivo');
            $rutaArchivo = $archivo->store('bitacoras', 'public'); // Guardar en storage/app/public/bitacoras

            // Guardar la bitácora en la base de datos
            $bitacora = new BitacoraModel();
            $bitacora->numero = $request->input('numero');
            $bitacora->fechasolicitud = $request->input('fechasolicitud');
            $bitacora->fechaentrega = $request->input('fechaentrega');
            $bitacora->idtecnico = $request->input('idtecnico');
            $bitacora->idequipo = $request->input('idequipo');
            $bitacora->falla = $request->input('falla');
            $bitacora->causa = $request->input('causa');
            $bitacora->solucion = $request->input('solucion');
            $bitacora->observaciones = $request->input('observaciones');
            $bitacora->responsable = $request->input('responsable');
            $bitacora->archivo = $rutaArchivo;
            $bitacora->save();

            return redirect()->route('bitacoras')->with('success', 'Bitácora creada con éxito');
        }

        return redirect()->back()->with('error', 'Error al subir el archivo');
    }

    public function index(Request $request)
    {
        
        // Obtener el número de página de la solicitud
        $page = $request->input('page', 1);
        $limit = 20; // Número de registros por página
        $offset = ($page - 1) * $limit; // Cálculo de la posición inicial

        // Obtener los registros paginados
        $bitacoras = BitacoraModel::obtenerRegistrosPaginados($offset, $limit);

        // Contar el total de registros (necesario para calcular el total de páginas)
        $totalRegistros = BitacoraModel::contarTotalRegistros();
        $totalPages = ceil($totalRegistros / $limit);

        // Retornar la vista con los datos
        return view('layouts.bitacoras', [
            'bitacoras' => $bitacoras,
            'currentPage' => $page,
            'totalPages' => $totalPages
        ]);
    }
}
