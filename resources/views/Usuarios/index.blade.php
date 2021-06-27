@extends('Tablero.index')

@section('cartas')
<h2>Usuarios exitentes</h2>
@if(Auth::user()->rol == 'Supervisor')
<a href="/usuarios/create" class="btn btn-success">Agregar una nuevo usuario</a>
@endif
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
            <td>
              <img src="{{ asset('storage').'/'.'usuarios'.'/'.$usuarios->imagen }}" width="100px" height="100px">
            </td>
            <td>{{$usuarios->nombre}}</td>
            <td>{{$usuarios->correo}}</td>
            <td>{{$usuarios->rol}}</td>
            <td>
            @can('eliminar', App\Models\Usuario::class)
                <a class="btn btn-info" href="/usuarios/{{$usuarios->id}}/show">Mostrar</a>
                <form action="/usuarios/delete/{{$usuarios->id}}" method="POST">
                    <a class="btn btn-primary" href="/usuarios/{{$usuarios->id}}/edit">Editar</a>
                    @csrf
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
                @endcan
                <br>
                @if(Auth::user()->rol == 'Encargado')
                <a type="submit" class="btn btn-success" href="/restablecer/{{$usuarios->id}}">Restablecer contraseña</a>
                @endif
                @if(Auth::user()->rol == 'Contador')
                <a class="btn btn-success" href="/usuarios_conta/{{$usuarios->id}}">Generar pago</a>
                @endif
            </td>
        </tr>
        @empty
        <tr align="center">
            <td colspan="5">Sin registro</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection
