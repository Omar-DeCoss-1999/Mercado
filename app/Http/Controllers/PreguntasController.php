<?php

namespace App\Http\Controllers;

use App\Models\Pregunta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PreguntasController extends Controller
{
    public function createPregunta(Request $request, $id)
    {
        $registrar = new Pregunta();
        $registrar->fill(
            $registrar->pregunta = $request->only('pregunta'),
            $registrar->id_productos = $id,
            $registrar->id_usuarios = Auth::user()->id,
            $registrar->hora_p = date('Y-m-d'),
            $registrar->p_autorizada = date('Y-m-d'),
            $registrar->respuesta = "Sin respuesta",
            $registrar->r_autorizada = date('Y-m-d')
        );
        $registrar->save();
        return redirect()->back();
    }

    public function createRespuesta(Request $request, $id)
    {
        $pregunta = Pregunta::find($id);
        $pregunta->respuesta = $request->input('respuesta');
        $pregunta->save();
        return redirect()->back();
    }

    public function destroy($id){
        Pregunta::destroy($id);
        return redirect()->back();
    }
}
