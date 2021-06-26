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
            <td>Acciones</td>
        </tr>
    </thead>
    <tbody>
        @forelse ($producto as $productos)
        <tr>
            <td>
              <img src="{{ asset('storage').'/'.'productos'.'/'.$productos->imagen }}" width="150px" height="150px">
            </td>
            <td>{{$productos->nombre}}</td>
            <td>${{$productos->precio}}</td>
            <td>
              @if($productos->c_pago == "No hay comprobante")
                <form action="/comprobante/{{$productos->id}}" method="POST"
                  enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="file" name="captura">
                    <label>Calificación:
                        <input type="number" name="calificacion">
                    </label>
                    <button type="submit" class="btn btn-success">Enviar comprobante</button>
                    <br>{!! $errors->first('correo', '<span class="help-block">:message</span>')!!}
                </form>
                @else
                  Ya mandaste el comprobante de compra de este producto
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
