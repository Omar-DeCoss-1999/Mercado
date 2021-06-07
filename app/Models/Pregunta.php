<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pregunta extends Model
{
    public $timestamps = false;
    protected $fillable = ['pregunta', 'hora_p', 'p_autorizada', 'respuesta', 'r_autorizada', 'id_productos', 'id_usuarios'];

    public function usuario(){
        return $this->hasOne('App\Models\Usuario', 'id', 'id_usuarios');
    }

    public function productos(){
        return $this->hasOne('App\Models\Producto', 'id', 'id_productos');
    }
}
