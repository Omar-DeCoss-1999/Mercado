@extends('Tablero.index')

@section('cartas')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Agregar nuevo usuario</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('usuarios.index') }}">Regresar</a>
        </div>
    </div>
</div>
<form action="{{ route('usuarios.store') }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nombre:</strong>
                <input type="text" name="nombre" class="form-control" placeholder="Ingrese el nombre">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Apellido paterno:</strong>
                <input type="text" name="a_paterno" class="form-control" placeholder="Ingrese el primer apellido">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Apellido materno:</strong>
                <input type="text" name="a_materno" class="form-control" placeholder="Ingrese el segundo apellido">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>correo:</strong>
                <input type="text" name="correo" class="form-control" placeholder="Ingrese el correo">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Foto de perfil:</strong>
                <input type="file" name="imagen" class="form-control" placeholder="Seleccione la imagen">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Seleccione el rol:</strong>
                <select class="form-control" name="rol" id="rol"><br>
                    <option>Supervisor</option>
                    <option>Encargado</option>
                    <option>Contador</option>
                    <option>Cliente</option>
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Ingrese la contraseña:</strong>
                <input type="password" name="password" class="form-control" placeholder="Ingrese la constraseña">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Repita la contraseña:</strong>
                <input type="password" name="password2" class="form-control" placeholder="Repita la constraseña">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Agregar</button>
        </div>
    </div>
</form>
@endsection