<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    public $timestamps = false;
    protected $fillable = ['nombre', 'descripcion', 'precio', 'imagen', 'concesionado', 'motivo', 'id_categorias', 'id_usuarios'];

    public function pregunta(){
        return $this->hasMany('App\Models\Pregunta');
    }

    public function preguntas_autorizadas(){
        return $this->hasMany('App\Models\Pregunta')->whereNotNull('p_autorizada');
    }

    public function usuario(){
        return $this->belongsTo('App\Models\Usuario');
    }

    public function propietario(){
        return $this->hasOne('App\Models\Usuario', 'id', 'id_usuarios');
    }

    public function categoria()
    {
        return $this->hasOne('App\Models\Categoria','id','id_categorias');
    }

    public function estaConcesionado(){
        if ($this->concesionado) return "SI";
        else return "NO";
    }

    public function compra(){
        return $this->belongsToMany('App\Models\Compra');
    }
}
