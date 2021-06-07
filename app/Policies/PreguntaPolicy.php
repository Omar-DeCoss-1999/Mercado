<?php

namespace App\Policies;

use App\Models\Pregunta;
use App\Models\Usuario;
use Illuminate\Auth\Access\HandlesAuthorization;


class PreguntaPolicy
{
    use HandlesAuthorization;

    public function responder(Usuario $usuario, Pregunta $pregunta){
        return $usuario->rol == "Cliente" && is_null($pregunta->respuesta);
    }

    public function moderar(Usuario $usuario){
        return $usuario->rol == "Encargado";
    }

    public function delete(Usuario $usuario){
        return $usuario->rol == "Encargado";
    }
}
