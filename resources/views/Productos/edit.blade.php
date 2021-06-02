@extends('Tablero.index')

@section('cartas')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Editar producto</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('productos.index') }}">Regresar</a>
        </div>
    </div>
</div>

<form action="{{ route('productos.update', $producto->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nombre:</strong>
                <input type="text" name="nombre" value="{{ $producto->nombre }}" class="form-control" placeholder="Producto">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Descripción:</strong>
                <textarea name="descripcion" class="form-control" style="height: 150px" placeholder="Descripción">{{ $producto->descripcion }}</textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Precio:</strong>
                <input type="number" name="precio" value="{{ $producto->precio }}" class="form-control" placeholder="Precio">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Enviar</button>
        </div>
    </div>
</form>

@endsection