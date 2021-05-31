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
