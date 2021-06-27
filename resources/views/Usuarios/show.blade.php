@extends('Tablero.index')

@section('cartas')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Usuario</h2>
            <h4><img src="{{ asset('storage').'/'.'usuarios'.'/'.$usuario->imagen }}" width="250px" height="250px">
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="/usuarios">Regresar</a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Nombre:</strong>
            {{ $usuario->nombre}}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Apellido paterno:</strong>
            {{ $usuario->a_paterno }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Apellido materno:</strong>
            {{ $usuario->a_materno }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Correo:</strong>
            {{ $usuario->correo }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Rol:</strong>
            {{ $usuario->rol }}
        </div>
    </div>
</div>
@if(Auth::user->rol == 'Contador')
<table class="table table-bordered">
    <thead>
        <tr>
            <td>Producto</td>
            <td>Precio</td>
            <td>Cantidad</td>
            <td>TOTAL</td>
        </tr>
    </thead>
    <tbody>
        <!-- @forelse () -->
        <tr>

        </tr>
        <!-- @empty -->
        <tr align="center">
            <td colspan="4">Sin registro</td>
        </tr>
        <!-- @endforelse -->
    </tbody>
</table>
<label>Total a pagar = </label>
<form action="" method="post">
    <label>Gatos extras:</label>
    <input type="text" name="fletes" placeholder="Gastos extras">
    <label>Nota:</label>
    <input type="text" name="nota" placeholder="Ingrese una nota">
    <input type="submit" value="Pagar">
</form>

@endif
@endsection