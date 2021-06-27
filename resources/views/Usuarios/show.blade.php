@extends('Tablero.index')

@section('cartas')
@if(Auth::user()->rol != 'Contador')
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
@endif
@if(Auth::user()->rol == 'Contador')
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
      @php $acumulador = 0; @endphp
      @php $id_usuario = 0; @endphp
      <center> {!! $errors->first('correo', '<span class="help-block">:message</span>')!!} </center>
      @forelse ($produ_elegidos as $produ_elegido)
        <tr>
            <td>{{$produ_elegido->nombre}}</td>
            <td>${{$produ_elegido->precio}}</td>
            <td>{{$produ_elegido->cantidad}}</td>
            <td>${{$produ_elegido->precio * $produ_elegido->cantidad}}</td>
            @php $acumulador += $produ_elegido->precio * $produ_elegido->cantidad; @endphp
        </tr>
        @php $id_usuario = $produ_elegido->id_usuarios; @endphp
        @empty
        <tr align="center">
            <td colspan="5">Sin registro</td>
        </tr>
        @endforelse
    </tbody>
</table>
<label>Total a pagar = $@php echo($acumulador); @endphp</label>
<form action="{{ url('pago_cliente', ['id1' => $acumulador, 'id2' => $id_usuario]) }}" method="get">
  @csrf
    <label>Gatos extras:</label>
    <input type="text" name="fletes" placeholder="Gastos extras">
    <label>Nota:</label>
    <input type="text" name="nota" placeholder="Ingrese una nota">
    <input type="submit" value="Pagar">
</form>

@endif
@endsection
