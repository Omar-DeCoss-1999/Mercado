<?php

namespace App\Policies;

use App\Models\Pregunta;
use App\Models\Producto;
use App\Models\ProductosEnCategoria;
use App\Models\Usuario;
use Illuminate\Auth\Access\HandlesAuthorization;

class PreguntaPolicy
{
    use HandlesAuthorization;
    public function preguntar(Usuario $usuario, ProductosEnCategoria $producto)
    {
        return $usuario->rol == "Cliente" && $usuario->id != $producto->id_usuarios;
    }

    public function responder(Usuario $usuario, Pregunta $pregunta)
    {   
        return $usuario->rol == "Cliente" && $usuario != $pregunta->id_usuarios;//$pregunta->respuesta == "Sin respuesta";
    }

    public function moderar(Usuario $usuario)
    {
        return $usuario->rol == "Encargado";
    }

    public function delete(Usuario $usuario)
    {
        return $usuario->rol == "Encargado";
    }
}
