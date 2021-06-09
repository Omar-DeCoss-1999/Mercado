@extends('Tablero.index')

@section('desplegable')
@if(Auth::user() == null)
<li class="nav-item">
    <a class="nav-link collapsed" href="" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-folder"></i>
        <span>Categorías</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            @forelse ($category as $categorias)
            <a class="collapse-item" href="productos/{{$categorias->id}}/index">{{$categorias->nombre}}</a>
            @empty
            <a class="collapse-item" href="">Sin registro</a>
            @endforelse
        </div>
    </div>
</li>
@elseif(Auth::user()->rol == 'Cliente')
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
        <i class="fas fa-fw fa-folder"></i>
        <span>Mis compras</span>
    </a>
    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="/productosComprados">Ver</a>
        </div>
    </div>
</li>
@endif
@endsection

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
<a href="categorias/create" class="btn btn-success">Agregar una nueva categoría</a>
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