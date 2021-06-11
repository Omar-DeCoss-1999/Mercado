<?php

namespace App\Http\Controllers;

use App\Mail\ContactanosMailable;
use App\Models\Compra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

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
        $comprando->c_pago = 'prueba.jpg';
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
        $valores = $request->all();
        if (is_null($valores['imagen'])){
            return back()->withErrors(['imagen' => 'No imgresó su pago']);
        } else{
            $registrar = Compra::find($id);
            $registrar->c_pago = request()->input('imagen');
            $registrar->calificacion = request()->input('calificacion');
            $registrar->compra_autorizada = true;
            $registrar->h_compra = date('Y-m-d');
            $registrar->save();
            //Acá descuentas en el producto
            return redirect()->back();
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
