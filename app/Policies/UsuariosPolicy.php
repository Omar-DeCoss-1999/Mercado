<?php

namespace App\Policies;

use App\Models\Usuario;
use Illuminate\Auth\Access\HandlesAuthorization;


class UsuariosPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \  $
     * @return mixed
     */
    public function viewAny(Usuario $usuarioA)
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
    public function view(Usuario $usuarioA, Usuario $usuarioM)
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
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \  $
     * @param  \App\Models\Usuario  $usuario
     * @return mixed
     */
    public function update(Usuario $usuarioA, Usuario $usuarioM)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \  $
     * @param  \App\Models\Usuario  $usuario
     * @return mixed
     */
    public function delete(Usuario $usuarioA, Usuario $usuarioM)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \  $
     * @param  \App\Models\Usuario  $usuario
     * @return mixed
     */
    public function restore(Usuario $usuarioA, Usuario $usuarioM)
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
    public function forceDelete(Usuario $usuarioA, Usuario $usuarioM)
    {
        //
    }
}
