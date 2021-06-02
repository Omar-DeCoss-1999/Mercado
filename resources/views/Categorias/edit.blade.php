@extends('Tablero.index')

@section('cartas')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Editar categoría</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('categorias.index') }}">Regresar</a>
        </div>
    </div>
</div>

<form action="/categorias/{{$categoria->id}}" method="POST">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Título:</strong>
                <input type="text" name="nombre" value="{{ $categoria->nombre }}" class="form-control" placeholder="Categoría">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Descripción:</strong>
                <textarea name="descripcion" class="form-control" style="height: 150px" placeholder="Descripción">{{ $categoria->descripcion }}</textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Imagen:</strong>
                <input type="file" name="imagen" value="{{ $categoria->imagen }}" class="form-control" placeholder="Selecciona">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Enviar</button>
        </div>
    </div>
</form>

@endsection