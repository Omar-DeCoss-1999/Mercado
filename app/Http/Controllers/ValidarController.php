<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ValidarController extends Controller
{
    
    public function autenticar()
    {
        return view('login');
    }

    public function validar(Request $request)
    {
        $correo = $request->input('correo');
        $usuario = Usuario::where('correo', $correo)->first();

        if (is_null($usuario)) {
            return back()->withErrors(['correo' => 'Estas credenciales no coinciden con nuestros registros']);
        } else {
            $password_ingresado = $request->input('password');
            $password_base = $usuario->password;
            if (Hash::check($password_ingresado, $password_base)) {
                Auth::login($usuario);
                if ($usuario->rol == 'Contador') {
                    return view('Tablero.conta');
                }
                if ($usuario->rol == 'Supervisor') {
                    $contaP = Producto::count();
                    $contaC = Categoria::count();
                    $contaU = Usuario::count();
                    return view('Roles.supervisor', compact('contaP', 'contaC', 'contaU'));
                }
                return redirect('/');
            } else {
                return back()->withErrors(['correo' => 'Estas credenciales no coinciden con nuestros registros']);
            }
        }
    }

    public function salir(){
        Auth::logout();
        return redirect('/');
    }

    public function verificarCorreo(){
        return view('Rpassword');
    }

    public function verificarCorreoR(Request $request){
        $correo = $request->input('correo');
        $correo_valido  = Usuario::where('correo', $correo)->first();

        if (is_null($correo_valido)){
            return back()->withErrors(['correo' => 'Este correo no coincide con nuestros registros']);
        } else{
            return view('actualizarPassword', compact('correo'));
        }
    }

    public function cambiarContra(Request $request, $email){
        $password = $request->all();
        if ($password['password'] != $password['password2']){
            return back()->withErrors(['password' => 'Verifique lo ingresado']);
        } else{
            $password['password'] = Hash::make($password['password']);
            $new_pass = Usuario::where('correo', $email)->first();
            $new_pass->password = $password['password'];
            $new_pass->save();
            return redirect('/login');
        }
    }
}
