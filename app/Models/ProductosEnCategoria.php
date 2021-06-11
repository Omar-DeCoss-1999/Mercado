<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductosEnCategoria extends Producto
{
    protected $table = 'productos';
    protected static function booted()
    {
        static::addGlobalScope('concesionado', function (Builder $build) {
            $build->select(
            'productos.id',
            'productos.nombre',
            'productos.descripcion',
            'productos.precio',
            'productos.cantidad',
            'productos.id_categorias')->join('categorias', 'productos.id_categorias', '=', "categorias.id");
        });
    }
}
