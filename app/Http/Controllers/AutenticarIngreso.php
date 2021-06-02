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
    public function autenticar(){
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
        if (Auth::attempt($credentials)){
            return view('Roles.supervisor', compact('contaP', 'contaC', 'contaU'));
        }
        return back()->withErrors(['correo' => 'Estas credenciales no coinciden con nuestros registros']);
    }

    public function salir(){
        Auth::logout();
        return redirect('/');
    }
}
