@extends('Tablero.index')

@section('cartas')
<h2>Cambio de contraseña</h2>
<form action="/usuarios/restablecer/{{$usuario->id}}" method="post">
    @csrf
    @method('PUT')
    <div class="inputBx">
        <span>Ingrese la nueva contraseña</span>
        <input type="password" name="password" class="form-control" placeholder="Ingrese su contraseña">
        {!! $errors->first('password', '<span class="help-block">:message</span>')!!}
    </div>
    <div class="inputBx">
        <span>Verefique contraseña</span>
        <input type="password" class="form-control" name="password2" placeholder="Verifique su contraseña">
    </div>
    <div class="inputBx">
        <input type="submit" class="btn btn-success" value="Actualizar">
    </div>
</form>
@endsection