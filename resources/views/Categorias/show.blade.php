@extends('Tablero.index')

@section('cartas')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Categoria</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('categorias.index') }}">Regresar</a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Nombre:</strong>
            {{ $categoria->nombre }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Descripción:</strong>
            {{ $categoria->descripcion }}
        </div>
    </div>
</div>

@endsection