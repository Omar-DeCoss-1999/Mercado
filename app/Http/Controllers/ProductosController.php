<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Usuario;
use App\Models\Categoria;
use Illuminate\Support\Facades\DB;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $busqueda = trim($request->GET('busqueda'));
        $categoria = Categoria::all();
        if($busqueda == ''){
          $producto = Producto::all();
          return view('Productos.index', compact('producto','busqueda','categoria'));
        } else {
          $producto = DB::table('productos')
                      ->select('imagen','nombre','descripcion','precio')
                      ->where('nombre','LIKE','%'.$busqueda.'%')
                      ->orWhere('descripcion','LIKE','%'.$busqueda.'%')
                      ->orderBy('nombre','asc')
                      ->paginate(3);
          return view('Productos.index', compact('producto','busqueda','categoria'));
        }
        //$producto = Producto::all();
        //return view('Productos.index', compact('producto','busqueda'));
        //$producto = Producto::all();
        //return view('Productos.index', compact('producto'));
        //$prod = Producto::all();
        //return view('Roles.anonimo', compact('prod'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id_categoria = Categoria::all();
        $id_usuario = Usuario::all();
        return view('Productos.create', compact('id_categoria', 'id_usuario'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $producto = $request->all();
        $imagen = $request->file('imagen');
        if (!is_null($imagen)) {
            $ruta_imagen = public_path('productos_img/');
            $nombre_imagen = $imagen->getClientOriginalName();
            $imagen->move($ruta_imagen, $nombre_imagen);
            $producto['imagen'] = $nombre_imagen;
        }
        $registrar = new Producto();
        $registrar->fill($producto);
        $registrar->concesionado = 1;
        $registrar->motivo = "";
        $registrar->save();
        return redirect('/productos');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $producto = Producto::find($id);
        return view('Productos.show', compact('producto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $producto = Producto::find($id);
        return view('Productos.edit', compact('producto'));
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
        $new_productos = $request->all();
        $imagen = $request->file('imagen');
        if (!is_null($imagen)) {
            $ruta_imagen = public_path('productos_img/');
            $nombre_imagen = $imagen->getClientOriginalName();
            $imagen->move($ruta_imagen, $nombre_imagen);
            $new_productos['imagen'] = $nombre_imagen;
        }
        $new_producto = Producto::find($id);
        $new_producto->nombre = $request->input('nombre');
        $new_producto->descripcion = $request->input('descripcion');
        $new_producto->precio = $request->input('precio');
        $new_producto->save();
        return redirect('/productos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Producto::destroy($id);
        return redirect('/productos');
    }
}
