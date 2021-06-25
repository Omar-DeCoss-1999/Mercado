@extends('Tablero.index')

@section('cartas')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Agregar nuevo producto</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="/">Regresar</a>
        </div>
    </div>
</div>
<form action="/producto" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nombre del producto:</strong>
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
                <strong>Precio:</strong>
                <input type="number" name="precio" class="form-control" placeholder="Ingrese el precio">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Cantidad de productos:</strong>
                <input type="number" name="cantidad" class="form-control" placeholder="Ingrese la cantidad">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Imagen del producto:</strong>
                <input type="file" name="image" class="form-control">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Identificador de categorias:</strong>
                <select class="form-control" name="id_categorias" id="id_categorias">
                    @forelse ($id_categoria as $categoria)
                    <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                    @empty
                    <option>No existen categorias</option>
                    @endforelse
                </select>
            </div>
        </div>
<!--         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Identificador de usuarios:</strong>
                <select class="form-control" name="id_usuarios" id="id_usuarios">
                    @forelse ($id_usuario as $usuario)
                    <option value="{{$usuario->id}}">{{$usuario->nombre}}</option>
                    @empty
                    <option>No existen usuarios</option>
                    @endforelse
                </select>
            </div>
        </div> -->
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Proponer</button>
        </div>
    </div>
</form>
@endsection
