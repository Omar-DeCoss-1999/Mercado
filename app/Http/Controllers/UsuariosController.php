<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Usuario;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuario = Usuario::all();
        return view('Usuarios.index', compact('usuario'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Usuarios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $usuario_nuevo = $request->all();
        if ($usuario_nuevo['password'] !== $usuario_nuevo['password2']) {
            return redirect()->back()->with('error', 'Las contraseñas ingresadas son diferentes');
        }
        $imagen = $request->file('imagen');
        if (!is_null($imagen)) {
            $ruta_imagen = public_path('perfil_img/');
            $nombre_imagen = $imagen->getClientOriginalName();
            $imagen->move($ruta_imagen, $nombre_imagen);
            $usuario_nuevo['imagen'] = $nombre_imagen;
        }
        $usuario_nuevo['password'] = Hash::make($usuario_nuevo['password']);
        $registrar = new Usuario();
        $registrar->fill($usuario_nuevo);
        $registrar->activo = 1;
        $registrar->save();
        return redirect('/usuarios')->with('success', 'Te has registrado con exito, ¡Bienvenido!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $usuario = Usuario::find($id);
        return view('Usuarios.show', compact('usuario'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usuario = Usuario::find($id);
        return view('Usuarios.edit', compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $valores = $request->all();
        if ($valores['password'] != $valores['password2']) {
            return redirect()->back()->with('error', 'Las contraseñas ingresadas son diferentes');
        }
        if (is_null($valores['password'])) {
            unset($valores['password']);
        } else {
            $valores['password'] = Hash::make($valores['password']);
        }
        $imagen = $request->file('imagen');
        if (!is_null($imagen)) {
            $ruta_imagen = public_path('perfil_img/');
            $nombre_imagen = $imagen->getClientOriginalName();
            $imagen->move($ruta_imagen, $nombre_imagen);
            $new_user['imagen'] = $nombre_imagen;
        }
        $registrar = Usuario::find($id);
        $registrar->fill($valores);
        $registrar->save();
        return redirect('/usuarios');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $usuario = Usuario::find($id);
            $usuario->delete();
            return redirect('/usuarios')->with('mensaje', 'Se elimino el usuario');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/usuarios')->with('error', $e->getMessage());
        }
    }
}
