<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    public $timestamps = false;
    protected $fillable = ['id', 'pago', 'nota', 'autorizacion', 'recibido', 'id_usuarios'];

    public function usuario(){
        return $this->belongsTo('App\Models\Usuario', 'id', 'id_usuarios');
      }
}
