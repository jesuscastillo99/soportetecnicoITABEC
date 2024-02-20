<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TablaDinamica extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'idtd';
    protected $table = 'tabladinamica';

    public function municipio()
    {
        return $this->belongsTo('App\Models\Municipio', 'municipio');
    }
}
