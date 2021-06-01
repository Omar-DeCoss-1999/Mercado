@extends('Tablero.index')

@section('cartas')
<h2>Categorias exitentes</h2>
<a href="{{ route('categorias.create') }}" class="btn btn-success">Agregar una nueva categoría</a>
<table class="table table-bordered">
    <thead>
        <tr>
            <td>Categoria</td>
            <td>Descripción</td>
            <td>Acciones</td>
        </tr>
    </thead>
    <tbody>
        @forelse ($category as $categorias)
        <tr>
            <td>{{$categorias->nombre}}</td>
            <td>{{$categorias->descripcion}}</td>
            <td>
                <form action="{{ route('categorias.destroy', $categorias->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('categorias.show', $categorias->id) }}">Mostrar</a>
                    <a class="btn btn-primary" href="{{ route('categorias.edit', $categorias->id) }}">Editar</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
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