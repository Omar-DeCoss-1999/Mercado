@extends('Tablero.index')
@section('cartas')

<h2>Categorias exitentes</h2>
@if(Auth::user() == null)
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
                <form action="productos/{{$categorias->id}}/index" method="GET">
                    @csrf
                    <button type="submit" class="btn btn-primary">Mostrar</button>
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

@elseif(Auth::user()->rol == 'Cliente')

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
                <form action="productos/{{$categorias->id}}/index" method="GET">
                    @csrf
                    <button type="submit" class="btn btn-primary">Mostrar</button>
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
@elseif(Auth::user()->rol == 'Encargado')
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
                <form action="productos/{{$categorias->id}}/index" method="GET">
                    @csrf
                    <button type="submit" class="btn btn-primary">Mostrar</button>
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

@elseif(Auth::user()->rol == 'Supervisor')
<a href="crearCategoria" class="btn btn-success">Agregar una nueva categoría</a>
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
                <form action="categorias/{{$categorias->id}}" method="POST">
                    <a class="btn btn-info" href="productos/{{$categorias->id}}/index">Mostrar</a>
                    <a class="btn btn-primary" href="/editar/{{$categorias->id}}">Editar</a>
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
@endif
@endsection