<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    public $timestamps = false;
    protected $fillable = ['h_compra', 'compra_autorizada', 'c_pago', 'calificacion', 'id_productos', 'id_usuarios'];
    
    public function usuario(){
        return $this->belongsTo('App\Models\Usuario', 'id', 'id_usuarios');
    }

    public function productos(){
        return $this->belongsToMany('App\Models\Producto', 'productos', 'id');
    }
}
