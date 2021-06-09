<?php

namespace App\Policies;

use App\Models\Usuario;
use App\Models\Producto;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class ProductoPolicy
{
    use HandlesAuthorization;

    public function preguntar(Usuario $usuario, Producto $producto){
        return $usuario->rol == "Cliente" && $producto->id_usuarios != $usuario->id;     
    }

    public function cambios(Usuario $usuario, Producto $producto){
        return $producto->concesionado != 1;
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
    public function update(Producto $producto, Usuario $usuario)
    {
        return $producto->id_usuarios == $usuario->id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \  $
     * @param  \App\Models\Usuario  $usuario
     * @return mixed
     */
    public function delete(Producto $producto, Usuario $usuario)
    {
        if ($usuario->rol == "Contador") return false;
        if ($usuario->rol == "Supervisor" || $usuario->rol == "Encargado") return !$producto->concesionado;
        if ($usuario->rol == "Cliente") return !$producto->concesionado && $producto->id_usuarios == $usuario->id;
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
