<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    public $timestamps = false;
    protected $fillable = ['nombre', 'descripcion', 'precio', 'imagen', 'concesionado', 'motivo', 'id_categorias', 'id_usuarios'];
}
