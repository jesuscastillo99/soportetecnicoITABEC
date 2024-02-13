<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'CatCarrera';
    protected $primaryKey = 'IdCarrera';
}
