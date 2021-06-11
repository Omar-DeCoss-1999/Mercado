<?php

namespace App\Policies;

use App\Models\Usuario;
use App\Models\Producto;
use App\Models\ProductosConsignados;
use App\Models\ProductosEnCategoria;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductoPolicy
{
    use HandlesAuthorization;

    //politica = el usuario es anonimo no le aparecera un producto
    public function preguntar(Usuario $usuario, Producto $producto){
        return $usuario->rol == "Cliente" && $producto->id_usuarios != $usuario->id;
    }

    public function cambios(Usuario $usuario, Producto $producto){
        return $producto->concesionado != 1;
    }

    public function comprar(Usuario $usuario, ProductosEnCategoria $producto){
        return $producto->id_usuarios !=  $usuario->id && $usuario->rol == 'Cliente';  
    }

    public function editar(Usuario $usuario, ProductosEnCategoria $producto){
        return $producto->id_usuarios == $usuario->id; 
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
    public function create(Usuario $usuario)
    {
        return $usuario->rol == 'Cliente';
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \  $
     * @param  \App\Models\Usuario  $usuario
     * @return mixed
     */
    public function update(Usuario $usuario, ProductosEnCategoria $producto)
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
    public function delete(Usuario $usuario, Producto $producto)
    {
        if ( $usuario->rol == "Contador") return false;
        if ( $usuario->rol == "Supervisor" || $usuario->rol == "Encargado") return !$producto->concesionado;
        if ( $usuario->rol == "Cliente") return !$producto->concesionado && $producto->id_usuarios == $usuario->id;
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
