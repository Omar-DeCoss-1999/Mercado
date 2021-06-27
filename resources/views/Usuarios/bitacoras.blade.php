@extends('Tablero.index')
@section('cartas')
<table class="table table-bordered">
    <thead>
        <tr>
            <td>¿Quien?</td>
            <td>¿Cuando?</td>
            <td>Accion realizada</td>
            <td>¿Que?</td>
        </tr>
    </thead>
    <tbody>
        @forelse ($resultado as $bitacora)
        <tr>
            <td>{{$bitacora->quien}}</td>
            <td>{{$bitacora->cuando}}</td>
            <td>{{$bitacora->accion}}</td>
            <td>{{$bitacora->que}}</td>
        </tr>
        @empty
        <tr align="center">
            <td colspan="4">Sin registro</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection 