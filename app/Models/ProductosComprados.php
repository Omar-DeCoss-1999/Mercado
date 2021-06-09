<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductosComprados extends Producto
{
    protected $table = 'productos';
    protected static function booted()
    {
        static::addGlobalScope('concesionado', function (Builder $builder){
            $builder->select(
                'compras.id', 
                'compras.id_usuarios',
                'compras.id_productos',
                'productos.nombre',
                'productos.imagen',
                'productos.precio',
                'compras.compra_autorizada'    
            )->join(
                  'compras',
                  'compras.id_productos', '=', 'productos.id'  
            );
        });
    }
}
