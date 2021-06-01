@extends('Tablero.index')

@section('cartas')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Producto</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('productos.index') }}">Regresar</a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
        <img src="{{asset('/productos_img/'.$producto->imagen )}}" width="50px" height="50px"></td>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Nombre:</strong>
            {{ $producto->nombre }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Descripción:</strong>
            {{ $producto->descripcion }}
        </div>
    </div>
</div>

@endsection