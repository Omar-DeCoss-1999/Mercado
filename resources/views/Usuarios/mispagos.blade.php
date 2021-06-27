@extends('Tablero.index')
@section('cartas')
<table class="table table-bordered">
    <tr>
        <th>Comentarios</th>
        <th>Total</th>
        <th>Estado</th>
    </tr>
    @forelse ($mis_pagos as $pagos_usu)
    <tr>
        <td> {{$pagos_usu->nota}} </td>
        <td> ${{$pagos_usu->pago}} </td>
        @if(Auth::user()->rol == "Contador")
        @if($pagos_usu->autorizado == 0)
        <td style="
                background:rgb(225, 111, 111);"> Pago no autorizado
        </td>
        @else
        <td> pago autorizado</td>
        @endif
        @elseif(Auth::user()->rol == "Cliente")
        @if($pagos_usu->autorizado == 0)
        <td style="
                background:rgb(225, 111, 111);">
            <form action="/aceptar_pago/{{$pagos_usu->id}}" method="get">
                @csrf
                @method('PUT')
                @if($pagos_usu->recibido == 0)
                <input type="submit" class="btn btn-success" value="Retirar">
                @endif
            </form>
        </td>
        @else
        <td>Pago aceptado</td>
        @endif
        @endif
    </tr>
    @empty
    <tr>
        <td colspan="5">sin registro</td>
    </tr>
    @endforelse
</table>
@endsection
