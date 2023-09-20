<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Curp extends Model implements Authenticatable
{
    use AuthenticatableTrait;

    use HasApiTokens, HasFactory, Notifiable;

    use HasFactory;

    protected $table = 'curps'; // Nombre de la tabla en la base de datos

    protected $fillable = ['curp', 'correo'];

    
}