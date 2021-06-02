@extends('Tablero.index')

@section('cartas')
<h2>Productos exitentes</h2>
<a href="{{ route('productos.create') }}" class="btn btn-success">Agregar una nuevo producto</a>
<table class="table table-bordered">
    <thead>
        <tr>
            <td>Imagen</td>
            <td>Nombre</td>
            <td>Descripción</td>
            <td>Precio</td>
            <td>Acciones</td>
        </tr>
    </thead>
    <tbody>
        @forelse ($producto as $productos)
        <tr>
            <td><img src="{{asset('/productos_img/'.$productos->imagen)}}" width="50px" height="50px"></td>
            <td>{{$productos->nombre}}</td>
            <td>{{$productos->descripcion}}</td>
            <td>{{$productos->precio}}</td>
            <td>

            </td>
        </tr>
        @empty
        <tr align="center">
            <td colspan="3">Sin registro</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection

@section('listaCatalogos')
  @forelse ($categoria as $categorias)
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-folder"></i>
        <span>{{$categorias->nombre}}</span>
      </a>
    </li>
    @empty
    @endforelse
@endsection
