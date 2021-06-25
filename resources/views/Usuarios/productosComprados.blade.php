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
            <td> <img src="{{ asset('/productos_img/'.$productos->imagen) }}" </td>
            <td>{{$productos->nombre}}</td>
            <td>${{$productos->precio}}</td>
            <td>
                <form action="/comprobante/{{$productos->id}}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="file" name="imagen" placeholder="Ingrese su comprobante">
                    <label>Calificación:
                        <input type="number" name="calificacion">
                    </label>                 
                    <button type="submit" class="btn btn-success">Enviar comprobante</button>
                </form>
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