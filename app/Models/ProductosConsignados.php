<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;

class ProductosConsignados extends Producto
{
    protected $table = 'productos';
    protected static function booted()
    {
        static::addGlobalScope('concesionado', function(Builder $build){
            $build->whereNotNull('concesionado');
        });
    }
}
