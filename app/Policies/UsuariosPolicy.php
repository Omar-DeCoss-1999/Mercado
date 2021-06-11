<?php

namespace App\Policies;

use App\Models\Usuario;
use Illuminate\Auth\Access\HandlesAuthorization;

class UsuariosPolicy
{
    use HandlesAuthorization;

    public function eliminar(Usuario $usuario){
        return $usuario->rol == 'Supervisor';
    }
}
