<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;

class ProductosEnCategoria extends Producto
{
    protected $table = 'productos';
    protected static function booted()
    {
        static::addGlobalScope('concesionado', function (Builder $build) {
            $build->select(
            'productos.id',
            'productos.imagen',
            'productos.nombre',
            'productos.descripcion',
            'productos.precio',
            'productos.cantidad',
            'productos.id_usuarios',
            'productos.id_categorias')->join('categorias', 'productos.id_categorias', '=', "categorias.id");
        });
    }
}
