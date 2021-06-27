<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;

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
                'compras.c_pago',
                'compras.comentarios_conta',
                'compras.cantidad',
                'compras.compra_autorizada',
                'productos.nombre',
                'productos.imagen',
                'productos.precio'
            )->join(
                  'compras',
                  'compras.id_productos', '=', 'productos.id'
            );
        });
    }
}
