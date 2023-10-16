<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expediente extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'solicitante';
    protected $primaryKey = 'idexpediente';
}
