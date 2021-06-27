<?php

namespace App\Observers;

use App\Models\Bitacora;
use App\Models\Producto;
use Illuminate\Support\Facades\Auth;

class ProductosObserver
{
    protected $usuario = null;

    public function __construct()
    {
        $recibe = Auth::user();
        if (is_null($recibe)) {
            $this->usuario = 'Anonimo';
        } else {
            $this->usuario = $recibe->nombre;
        }
    }

    public function created(Producto $producto)
    {
        $fecha_ac = date('Y-m-d');
        $registro = Bitacora::create([
            'quien' => $this->usuario,
            'cuando' =>  $fecha_ac,
            'accion' => 'Agrego un producto',
            'que' => $producto->toJson()
        ]);
    }

    public function updated(Producto $producto){
        $fecha_ac = date('Y-m-d');
        $registro = Bitacora::create([
            'quien' => $this->usuario,
            'cuando' =>  $fecha_ac,
            'accion'=> 'Actualizo un producto',
            'que' => $producto->toJson()
        ]);
    }

    public function deleted(Producto $producto){
        $fecha_ac = date('Y-m-d');
        $registro = Bitacora::create([
            'quien' => $this->usuario,
            'cuando' =>  $fecha_ac,
            'accion'=> 'Elimino un producto',
            'que' => $producto->toJson()
        ]);
    }
}
