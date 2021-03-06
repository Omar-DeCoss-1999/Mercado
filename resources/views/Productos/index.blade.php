@extends('Tablero.index')
@section('buscar')
<form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" action="/productos/{{$id_categoria}}/buscarpor" method="GET">
    @csrf
    <div class="input-group">
        <input name="busqueda" type="text" class="form-control bg-light border-0 small" placeholder="Buscar un producto" aria-label="Search" aria-describedby="basic-addon2">
        <div class="input-group-append">
            <button class="btn btn-primary" type="submit">
                <i class="fas fa-search fa-sm"></i>
            </button>
        </div>
    </div>
</form>
@endsection

@section('cartas')
<h2>Productos exitentes</h2>
<div class="pull-right">
    <a class="btn btn-primary" href="/">Regresar</a>
</div>
@can('create', App\Models\Producto::class)
<a href="/crearProducto" class="btn btn-success">Proponer</a>
@endcan
<table class="table table-bordered">
    <thead>
        <tr>
            <td>Imagen</td>
            <td>Nombre</td>
            <td>Descripción</td>
            <td>Precio</td>
            <td>Stock</td>
            <td>Acciones</td>
        </tr>
    </thead>
    <tbody>
      <br> <center> {!! $errors->first('correo', '<span class="help-block">:message</span>')!!} </center>
        @forelse ($producto as $productos)
        <tr>
            <td>
              <img src="{{ asset('storage').'/'.'productos'.'/'.$productos->imagen }}" width="150px" height="150px">
            </td>
            <td>{{$productos->nombre}}</td>
            <td>{{$productos->descripcion}}</td>
            <td>$ {{$productos->precio}}</td>
            <td>{{$productos->cantidad}}</td>
            <td>
                <a class="btn btn-info" href="/productos/{{$productos->id}}/show">Ver</a>
                @can('editar', $productos)
                <a class="btn btn-primary" href="/editarProducto/{{$productos->id}}">Editar</a>
                @endcan
                @can('comprar', $productos)
                <form action="/comprar/{{$productos->id}}" method="post">
                    @csrf
                    <input type="number" name="cantidad" min="1" step="1" pattern="\d+" placeholder="Cantidad de productos">
                    <br><input type="submit" class="btn btn-success" value="Comprar">
                </form>
                @endcan
                @can('delete', $productos)
                <form action="/deleteProducto/{{$productos->id}}" method="post">
                    @csrf
                    <input type="submit" class="btn btn-danger" value="Eliminar">
                </form>
                @endcan
                <!-- <a class="btn btn-info" href="">Validar</a> -->
            </td>
        </tr>
        @empty
        <tr align="center">
            <td colspan="5">Sin registro</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection
