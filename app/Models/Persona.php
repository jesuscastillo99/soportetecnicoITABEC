<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'personas'; // Nombre de la tabla en la base de datos
    protected $fillable = ['curp', 'correo', 'paterno', 'materno', 'nombre', 'sexo', 'fn'];
}
