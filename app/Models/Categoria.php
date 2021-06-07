<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    public $timestamps = false;
    protected $fillable = ['nombre', 'descripcion', 'imagen', 'activa'];
    
    public function producto(){
        return $this->hasMany('App\Models\Producto');
    }

    public function concesionado(){
        return $this->hasMany('App\Models\Producto')->where('concesionado', 1);
    }

    public function preguntas(){
        return $this->hasManyThrough(
            Pregunta::class,
            Producto::class,
            'id_categorias',
            '',
            '',
            'id'
        );
    }
}
