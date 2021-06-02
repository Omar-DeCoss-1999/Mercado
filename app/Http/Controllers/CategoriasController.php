<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use Illuminate\Support\Facades\Auth;
use App\Models\Producto;
class CategoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Categoria::all();
/*         $prod = Producto::all();
        if(Auth::user() == null){
            return view('Roles.anonimo', compact('category', 'prod'));
        } */
        return view('Categorias.index', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Categorias.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $categoria = new Categoria();
        $imagen = $request->file('imagen');
        if (!is_null($imagen)){
            $ruta_imagen = public_path('images/images_categorias/');
            $nombre_imagen = $imagen->getClientOriginalName();
            $imagen->move($ruta_imagen,$nombre_imagen);
            $categoria['imagen']=$nombre_imagen;
        }
        $categoria->nombre=$request->input('nombre');
        $categoria->descripcion=$request->input('descripcion');
        $categoria->imagen = $request->input('imagen');
        $categoria->activa = 1;
        $categoria->save();
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categoria = Categoria::find($id);
        return view('Categorias.show',compact('categoria'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categoria = Categoria::find($id);
        return view('Categorias.edit',compact('categoria'));
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
        $categoria = Categoria::find($id);
        $categoria->nombre=$request->input('nombre');
        $categoria->descripcion=$request->input('descripcion');
        $categoria->imagen = $request->input('imagen');
        $categoria->activa = 1;
        $categoria->save();
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Categoria::destroy($id);
        return redirect('/categorias');
    }
}
