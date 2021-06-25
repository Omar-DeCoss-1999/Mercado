<?php

namespace App\Http\Controllers;

use App\Mail\ContactanosMailable;
use App\Models\Compra;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;

class ComprasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $comprando = new Compra();
        $comprando->id_productos = $id;
        $comprando->h_compra = date('Y-m-d');
        $comprando->id_usuarios = auth()->user()->id;
        $comprando->compra_autorizada = false;
        //$comprando->c_pago = $request->input('imagen')
        $comprando->calificacion = 0;
        $comprando->c_pago = 'No hay comprobante';
        $comprando->save();
        $correo = new ContactanosMailable;
        Mail::to('ruizomar003@gmail.com')->send($correo);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        if ($request->hasFile("captura")){
          //preparamos el nombre del comprobante y lo agregamos al proyecto
          $compro_pago['c_pago'] = time().'_'.$request->file('captura')->getClientOriginalName();
          $request->file('captura')->storeAs('compro_pago',$compro_pago['c_pago']);
          //se hace la consulta y actualizacion del nombre del comprobante
          $datos_actu = Compra::find($id);
          $datos_actu->c_pago = $compro_pago['c_pago'];
          $datos_actu->save();
          //se hace la consulta y disminucion del numero de articulos disponibles
          $productos_actuales = Producto::find($datos_actu->id_productos);
          $restar_producto = $productos_actuales->cantidad;
          $restar_producto--;
          $productos_actuales->cantidad = $restar_producto;
          $productos_actuales->save();

          return redirect('/');

        } else {
          return "Ingrese un comprobante de pago";
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
