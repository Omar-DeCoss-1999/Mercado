<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Usuario;
use App\Models\Categoria;

class AutenticarIngreso extends Controller
{
    public function autenticar()
    {
        return view('login');
    }

    public function validar(Request $request)
    {
      $credentials = $this->validate(request(),  [
            'correo' => 'required|email|string',
            'password' => 'required|string'
        ]);
        $contaP = Producto::count();
        $contaC = Categoria::count();
        $contaU = Usuario::count();

        if (Auth::attempt($credentials)) {
            if (Auth::user()->rol == 'Contador') {
                return view('Tablero.conta');
            }
            if (Auth::user()->rol == 'Supervisor') {
                return view('Roles.supervisor', compact('contaP', 'contaC', 'contaU'));
            }
            return redirect('/');
        }
        return back()->withErrors(['correo' => 'Estas credenciales no coinciden con nuestros registros']);
/*         $usuario_name = $request->input('correo');
        $usuario = Usuario::where('correo', $usuario_name)->first();
        if (is_null($usuario)) {
            return back()->withErrors(['correo' => 'Estas credenciales no coinciden con nuestros registros']);
        } else {
            $password = $request->input('password');
            $password_user = $usuario->password;
            if (Hash::check($password, $password_user)) {
                Auth::login($usuario);
                if ($usuario->rol == 'Contador') {
                    return view('Tablero.conta');
                }
                if ($usuario->rol != 'Cliente') {
                    $contaP = Producto::count();
                    $contaC = Categoria::count();
                    $contaU = Usuario::count();
                    return view('Roles.supervisor', compact('contaP', 'contaC', 'contaU'));
                }
                return redirect('/');
            } else {
                return back()->withErrors(['correo' => 'Estas credenciales no coinciden con nuestros registros']);
            }
        } */
    }

    // public function logout(Request $request)
    // {
    //     Auth::logout();
    //     $request->session()->invalidate();
    //     $request->session()->regenerateToken();
    //     return redirect('/');
    // }
    // public function logout(Request $request)
    // {
    //     $this->guard()->logout();

    //     $request->session()->invalidate();

    //     return $this->loggedOut($request) ?: redirect('/');
    // }
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function verificarCorreo()
    {
        return view('Rpassword');
    }

    public function verificarCorreoR(Request $request)
    {
        $correo = $request->input('correo');
        $correo_valido = Usuario::where('correo', $correo)->first();

        if (is_null($correo_valido)) {
            return back()->withErrors(['correo' => 'Este correo no coincide con nuestros registros']);
        } else {
            return view('actualizarPassword', compact('correo'));
        }
    }

    public function cambiarContra(Request $request, $email)
    {
        $password = $request->all();
        if ($password['password'] != $password['password2']) {
            return back()->withErrors(['password' => 'Verifique lo ingresado']);
        } else {
            $password['password'] = Hash::make($password['password']);
            $new_pass = Usuario::where('correo', $email)->first();
            $new_pass->password = $password['password'];
            $new_pass->save();
            return redirect('/');
        }
    }
}
