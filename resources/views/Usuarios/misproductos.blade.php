@extends('Tablero.index')
@section('cartas')
<table class="table table-bordered">
    <thead>
        <tr>
            <td>Imagen</td>
            <td>Nombre</td>
            <td>Descripción</td>
            <td>Precio</td>
            <td>Stock</td>
        </tr>
    </thead>
    <tbody>
        @forelse ($producto as $productos)
        <tr>
            <td>
              <img src="{{ asset('storage').'/'.'productos'.'/'.$productos->imagen }}" width="150px" height="150px">
            </td>
            <td>{{$productos->nombre}}</td>
            <td>{{$productos->descripcion}}</td>
            <td>$ {{$productos->precio}}</td>
            <td>{{$productos->cantidad}}</td>
        </tr>
        @empty
        <tr align="center">
            <td colspan="5">Sin registro</td>
        </tr>
        @endforelse
    </tbody>
</table>

@endsection