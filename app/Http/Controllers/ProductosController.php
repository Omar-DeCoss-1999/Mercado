<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Usuario;
use App\Models\Categoria;
use App\Models\ProductosConsignados;
use App\Models\ProductosEnCategoria;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id_categoria)
    {
/*         if (Auth::user()->rol == "Cliente")
            $producto = Producto::where('id_usuarios', Auth::id())->get();
        else 
            $producto = Producto::all(); */
       $producto = ProductosEnCategoria::all()
            ->whereIn('concesionado', ProductosConsignados::select('concesionado'))
            ->where('id_categorias', $id_categoria);
         return view('Productos.index', compact('producto', 'id_categoria'));
    }

    public function buscarpor(Request $request, $id_categoria)
    {
      $busqueda = trim($request->GET('busqueda'));

      if ($busqueda != '') { //si estamos buscando algo (campo de texto lleno)
        $producto = DB::table('productos')
                    ->select('imagen','nombre','descripcion','precio')
                    ->where('id_categorias','=',$id_categoria)
                    ->where('nombre','LIKE','%'.$busqueda.'%')
                    //->orWhere('descripcion','LIKE','%'.$busqueda.'%')
                    ->orderBy('nombre','asc')
                    ->paginate(5);
        return view('Productos.index', compact('producto','id_categoria','busqueda'));
      } else { //si no estamos buscando algo (campo de texto vacio, pero evita errores)
        $producto = ProductosEnCategoria::all()
            ->whereIn('concesionado', ProductosConsignados::select('concesionado'))
            ->where('id_categorias', $id_categoria);
        return view('Productos.index', compact('producto', 'id_categoria','busqueda'));
      }
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
        //$imagen = $request->file('imagen');
/*         if (!is_null($imagen)) {
            $ruta_imagen = public_path('productos_img/');
            $nombre_imagen = $imagen->getClientOriginalName();
            $imagen->move($ruta_imagen, $nombre_imagen);
            $producto['imagen'] = $nombre_imagen;
        } */
        if($request->hasFile('image')){
            $detination_path = 'public/images/products';
            $image = $request->file('image');
            $image_name = $image->getClientOriginalName();
            $path = $request->file('image')->storeAs($detination_path, $image_name);
            $producto['imagen'] = $image_name;
        }
        $registrar = new Producto();
        $registrar->fill($producto);
        $registrar->concesionado = 1;
        $registrar->motivo = "";
        $registrar->save();
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
        // $this->authorize('update', $producto);
        // $categorias = Categoria::all();
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
        if($new_producto->concesionado == 0) $new_producto->concesionado=null;
        $new_producto->save();
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
        Producto::destroy($id);
        return redirect('/');
    }
}
