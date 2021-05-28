<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Usuario;
use Illuminate\Support\Facades\DB;

class RegistrarNuevoUsuario extends Controller
{
    public function registroNuevo(){
        return view('registro');
    }

    public function registrarBD(Request $request){
/*          $request->validate([
            'nombre' => 'required|min:1|max:30',
            'a_paterno' => 'required|min:1|20',
            'a_materno' => 'required|min:1|20',
            'correo' => 'required|email|unique:usuarios',
            'imagen' => 'required|image',
            'rol' => 'required',
            'activo' => 'required',
            'password'=> 'required'
        ]); */

            $usuario_nuevo = $request->all();
            if($usuario_nuevo['password'] !== $usuario_nuevo['password2']){
              return redirect()->back()->with('error','Las contraseñas ingresadas son diferentes');
            }
              $imagen = $request->file('imagen');
              if (!is_null($imagen)){
                  $ruta_imagen = public_path('perfil_img/');
                  $nombre_imagen = $imagen->getClientOriginalName();
                  $imagen->move($ruta_imagen,$nombre_imagen);
                  $usuario_nuevo['imagen']=$nombre_imagen;
              }
              $usuario_nuevo['password']=Hash::make($usuario_nuevo['password']);
              $registrar = new Usuario();
              $registrar->fill($usuario_nuevo);
              $registrar->rol = "Cliente";
              $registrar->activo = 1;
              $registrar->save();
              return redirect('login')->with('success','Te has registrado con exito, ¡Bienvenido!');           
    }
}
