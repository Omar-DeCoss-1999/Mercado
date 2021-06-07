<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    public $timestamps = false;
    protected $fillable = ['nombre', 'a_paterno', 'a_materno', 'correo', 'imagen', 'rol', 'ativo', 'password'];

    public function pregunta(){
        return $this->hasMany('App\Models\Pregunta');
    }

    public function producto(){
        return $this->hasMany('App\Models\Producto');
    }

    public function recibidas(){
        return $this->hasManyThrough(
            Pregunta::class,
            Producto::class,
            'id_usuarios',
            '',
            '',
            'id'
        );
    }
}
