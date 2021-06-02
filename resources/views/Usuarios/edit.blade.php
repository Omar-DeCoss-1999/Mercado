@extends('Tablero.index')

@section('cartas')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Editar usuario</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="/usuarios">Regresar</a>
        </div>
    </div>
</div>

<form action="/usuarios/{{$usuario->id}}" method="POST">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nombre:</strong>
                <input type="text" name="nombre" value="{{ $usuario->nombre }}" class="form-control" placeholder="Usuario">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Apellido paterno:</strong>
                <input type="text" name="a_pat" value="{{ $usuario->a_paterno }}" class="form-control" placeholder="Apellido paterno">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Apellido materno:</strong>
                <input type="text" name="a_mat" value="{{ $usuario->a_materno }}" class="form-control" placeholder="Apellido materno">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Correo:</strong>
                <input type="text" name="correo" value="{{ $usuario->correo }}" class="form-control" placeholder="Correo electronico">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Foto de perfil:</strong>
                <input type="file" name="imagen" value="{{ $usuario->imagen }}" class="form-control" placeholder="Selecciona">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Rol:</strong>
                <select class="form-control" name="rol" id="rol">
                    @if($usuario->rol == 'Supervisor')
                    <option selected>Supervisor</option>
                    @else
                    <option>Supervisor</option>
                    @endif
                    @if($usuario->rol == 'Encargado')
                    <option selected>Encargado</option>
                    @else
                    <option>Encargado</option>
                    @endif
                    @if($usuario->rol == 'Contador')
                    <option selected>Contador</option>
                    @else
                    <option>Contador</option>
                    @endif
                    @if($usuario->rol == 'Cliente')
                    <option selected>Cliente</option>
                    @else
                    <option>Cliente</option>
                    @endif
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Contraseña:</strong>
                <input type="password" name="password" class="form-control" placeholder="Ingresa tu contraseña">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Contraseña de verificación:</strong>
                <input type="password" name="password2" class="form-control" placeholder="Ingresa nueevamente tu contraseña">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Enviar</button>
        </div>
    </div>
</form>

@endsection