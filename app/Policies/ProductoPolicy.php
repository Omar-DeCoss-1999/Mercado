<?php

namespace App\Policies;

use App\Models\Usuario;
use App\Models\Producto;
use App\Models\ProductosConsignados;
use App\Models\ProductosEnCategoria;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class ProductoPolicy
{
    use HandlesAuthorization;

    public function preguntar(Usuario $usuario, Producto $producto){
        return Auth::user()->rol == "Cliente" && $producto->id_usuarios != Auth::user()->id;     
    }

    public function cambios(Usuario $usuario, Producto $producto){
        return $producto->concesionado != 1;
    }

    public function comprar(Usuario $usuario, ProductosConsignados $producto){
        return $producto->id_usuarios != Auth::user()->id && Auth::user()->rol == 'Cliente';
    }
    /**
     * Determine whether the user can view any models.
     *
     * @param  \  $
     * @return mixed
     */
    public function viewAny(Usuario $usuario)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \  $
     * @param  \App\Models\Usuario  $usuario
     * @return mixed
     */
    public function view(Producto $producto, Usuario $usuario)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \  $
     * @return mixed
     */
    public function create()
    {
        return Auth::user()->rol == 'Cliente';
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \  $
     * @param  \App\Models\Usuario  $usuario
     * @return mixed
     */
    public function update(ProductosConsignados $producto, Usuario $usuario)
    {
        return $producto->id_usuarios == Auth::user()->id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \  $
     * @param  \App\Models\Usuario  $usuario
     * @return mixed
     */
    public function delete(ProductosConsignados $producto, Usuario $usuario)
    {
        if ( Auth::user()->rol == "Contador") return false;
        if ( Auth::user()->rol == "Supervisor" || Auth::user()->rol == "Encargado") return !$producto->concesionado;
        if ( Auth::user()->rol == "Cliente") return !$producto->concesionado && $producto->id_usuarios == Auth::user()->id;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \  $
     * @param  \App\Models\Usuario  $usuario
     * @return mixed
     */
    public function restore(Producto $producto, Usuario $usuario)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \  $
     * @param  \App\Models\Usuario  $usuario
     * @return mixed
     */
    public function forceDelete(Producto $producto, Usuario $usuario)
    {
        //
    }
}
