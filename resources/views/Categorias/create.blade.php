@extends('Tablero.index')

@section('cartas')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Agregar nueva categoria</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="/">Regresar</a>
        </div>
    </div>
</div>
<form action="/categorias" method="POST">
    @csrf
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nombre de la categoría:</strong>
                <input type="text" name="nombre" class="form-control" placeholder="Ingrese el nombre">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Descripción:</strong>
                <textarea name="descripcion" class="form-control" style="height: 150px" placeholder="Ingresar descripción"></textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Imagen de la categoría:</strong>
                <input type="file" name="imagen" class="form-control" placeholder="Seleccione la imagen">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Enviar</button>
        </div>
    </div>
</form>
@endsection