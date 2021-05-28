<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Usuario;

class AutenticarIngreso extends Controller
{
    public function autenticar(){
        return view('login');
    }

    public function validar(Request $request)
    {
/*         $usuario_name = $request->input('correo');
        $usuario = Usuario::where('correo', $usuario_name)->first();
        if (is_null($usuario)) {
            return redirect('login');//->with('error', 'usuario o contraseña inscorrecta');
        } else {
            $password = $request->input('password');
            $password_user = $usuario->password;
            if (Hash::check($password, $password_user)) {
                Auth::login($usuario);
                return redirect('categorias');
                // echo Auth::user();
            } else {
                return redirect('login');//->with('error', 'usuario o contraseña inscorrecta');
            }
        } */
        $credentials = $this->validate(request(),  [
            'correo' => 'required|email|string',
            'password' => 'required|string'
        ]);
        
        if (Auth::attempt($credentials)){
            return redirect('categorias');
        }

        return back()->withErrors(['correo' => 'Estas credenciales no coinciden con nuestros registros']);
    }

    public function salir(){
        Auth::logout();
        return redirect('/');
    }
}
