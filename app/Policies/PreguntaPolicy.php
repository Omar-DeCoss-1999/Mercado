<?php

namespace App\Policies;

use App\Models\Pregunta;
use App\Models\Producto;
use App\Models\Usuario;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;


class PreguntaPolicy
{
    use HandlesAuthorization;
    public function preguntar(Usuario $usuarios, Producto $producto)
    {
        return Auth::user()->rol == "Cliente" && $usuarios->id != $producto->id_usuarios;
    }

    public function responder(Usuario $usuario, Pregunta $pregunta)
    {
        return Auth::user()->rol == "Cliente" && is_null($pregunta->respuesta);
    }

    public function moderar(Usuario $usuario)
    {
        return Auth::user()->rol == "Encargado";
    }

    public function delete(Usuario $usuario)
    {
        return Auth::user()->rol == "Encargado";
    }
}
