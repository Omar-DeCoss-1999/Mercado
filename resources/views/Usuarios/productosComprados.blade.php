@extends('Tablero.index')

@section('cartas')
<h2>Mis productos comprados</h2>
<a href="/" class="btn btn-primary">Regresar</a>
<table class="table table-bordered">
  <thead>
    <tr>
      <td>Imagen</td>
      <td>Producto</td>
      <td>Precio</td>
      <td>Cantidad</td>
      <td>Acciones</td>
    </tr>
  </thead>
  <tbody>
    <br> <center> {!! $errors->first('correo', '<span class="help-block">:message</span>')!!} </center>
    @forelse ($producto as $productos)
    <tr>
      <td>
        <img src="{{ asset('storage').'/'.'productos'.'/'.$productos->imagen }}" width="150px" height="150px">
      </td>
      <td>{{$productos->nombre}}</td>
      <td>${{$productos->precio}}</td>
      <td>{{$productos->cantidad}}</td>
      <td>
        @if($productos->c_pago == "No hay comprobante")
        <form action="/comprobante/{{$productos->id}}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <input type="file" name="captura">
          <label>Calificación:
            <select name="calificacion">
              <option value="1">Muy mala</option>
              <option value="2">Mala</option>
              <option value="3">Regular</option>
              <option value="4">Buena</option>
              <option value="5">Excelente</option>
            </select>
          </label>
          <button type="submit" class="btn btn-success">Enviar comprobante</button>
        </form>
        <form action="/eliminarCarrito/{{$productos->id}}" method="post">
          @csrf
          <button type="submit" class="btn btn-danger">Eliminar</button>
        </form>
          @if($productos->comentarios_conta != "")
          No se pudo completa la compra: {{$productos->comentarios_conta}}
          <br>Intentelo de nuevo
          @endif

        @else
          @if($productos->compra_autorizada == 1)
            Esta compra ya fue autorizada, espere su o sus productos
          @else
            Comprobante enviado, espere respuesta
          @endif
        @endif
      </td>
    </tr>
    @empty
    <tr align="center">
      <td colspan="4">Aún no has comprado ningun producto</td>
    </tr>
    @endforelse
  </tbody>
</table>

@endsection
