<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    public $timestamps = false;
    protected $fillable = ['nombre', 'a_paterno', 'a_materno', 'correo', 'imagen', 'rol', 'ativo', 'password'];
}
