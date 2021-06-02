<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Usuario;
use App\Models\Categoria;
use App\Models\ProductosConsignados;
use App\Models\ProductosEnCategoria;
use Illuminate\Support\Facades\Auth;


class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id_categoria)
    {
      /*
        $seleccion_categoria = $request->GET('movVarCat');
        $busqueda = trim($request->GET('busqueda'));
        $categoria = Categoria::all();

        if ($busqueda != '') {
          $producto = DB::table('productos')
                      ->select('imagen','nombre','descripcion','precio')
                      ->where('nombre','LIKE','%'.$busqueda.'%')
                      ->orWhere('descripcion','LIKE','%'.$busqueda.'%')
                      ->orderBy('nombre','asc')
                      ->paginate(5);
          return view('Productos.index', compact('producto','busqueda','categoria'));
        } elseif ($seleccion_categoria != '') {
          $producto = DB::table('productos')
                      ->select('imagen','nombre','descripcion','precio')
                      ->where('id_categorias','=',$seleccion_categoria)
                      ->orderBy('nombre','asc')
                      ->paginate(5);
          return view('Productos.index', compact('producto','busqueda','categoria'));
        } else {
          $producto = Producto::all();
          return view('Productos.index', compact('producto','busqueda','categoria'));
        }*/
        //$producto = Producto::all();
        //return view('Productos.index', compact('producto','busqueda'));
        //$producto = Producto::all();
        //return view('Productos.index', compact('producto'));
        //$prod = Producto::all();
        //return view('Roles.anonimo', compact('prod'));
       $producto = ProductosEnCategoria::all()
            ->whereIn('concesionado', ProductosConsignados::select('concesionado'))
            ->where('id_categorias', $id_categoria);
         return view('Productos.index', compact('producto', 'id_categoria'));

    }
    public function buscarpor(Request $request, $id_categoria)
    {
        $producto = ProductosEnCategoria::all()
            ->whereIn('concesionado', ProductosConsignados::select('concesionado'))
            ->where('id_categorias', $id_categoria)
            ->where('productos.nombre', 'like', $request->input('busqueda'));
        return view('Productos.index', compact('producto', 'id_categoria'));
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
