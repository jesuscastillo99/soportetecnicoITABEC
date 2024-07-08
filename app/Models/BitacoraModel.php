<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class BitacoraModel extends Model
{
    protected $primaryKey = 'idbitacora';
    // Especificar el nombre de la tabla
    protected $table = 'bitacoras';
    // Desactivar timestamps
    public $timestamps = false;
    protected $fillable = [
        'numero',
        'fechasolicitud',
        'fechaentrega',
        'idtecnico',
        'idequipo',
        'falla',
        'causa',
        'solucion',
        'observaciones',
        'responsable',
        'archivo'
    ];

    use HasFactory;

    public static function obtenerRegistrosPaginados($offset, $limit)
    {
        $results = DB::select('EXEC ObtenerRegistrosBitacoras ?, ?', [$offset, $limit]);
        return $results;
    }

    public static function contarTotalRegistros()
    {
        return DB::table('bitacoras')->count();
    }
}
