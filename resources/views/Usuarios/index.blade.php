@extends('Tablero.index')

@section('cartas')
<h2>Usuarios exitentes</h2>
<a href="{{ route('usuarios.create') }}" class="btn btn-success">Agregar una nuevo usuario</a>
<table class="table table-bordered">
    <thead>
        <tr>
            <td>Imagen</td>
            <td>Usuario</td>
            <td>Correo</td>
            <td>Rol</td>
            <td>Acciones</td>
        </tr>
    </thead>
    <tbody>
        @forelse ($usuario as $usuarios)
        <tr>
            <td><img src="{{asset('/perfil_img/'.$usuarios->imagen)}}" width="50px" height="50px"></td>
            <td>{{$usuarios->nombre}}</td>
            <td>{{$usuarios->correo}}</td>
            <td>{{$usuarios->rol}}</td>
            <td>
                <form action="{{ route('usuarios.destroy', $usuarios->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('usuarios.show', $usuarios->id) }}">Mostrar</a>
                    <a class="btn btn-primary" href="{{ route('usuarios.edit', $usuarios->id) }}">Editar</a>
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