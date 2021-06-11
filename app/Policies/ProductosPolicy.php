<?php

namespace App\Policies;

use App\Models\Producto;
use App\Models\ProductosConsignados;
use App\Models\Usuario;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class ProductosPolicy
{
    use HandlesAuthorization;

    public function comprando(Usuario $user, Producto $producto)
    {
        return $producto->id_usuarios != auth()->user()->id && auth()->user()->rol == 'Cliente';
    }
}
