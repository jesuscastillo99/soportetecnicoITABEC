<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Domicilio extends Model
{
    use HasFactory;
    
    public $timestamps = false;
    protected $primaryKey = 'iddomicilio';
    protected $table = 'catdomicilio'; // Nombre de la tabla en la base de datos
    protected $fillable = ['calle', 'calle2', 'calle3', 'numero', 'colonia', 'telefono', 'celular'];
}
