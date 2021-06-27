@extends('Tablero.index')
@section('cartas')
<table class="table table-bordered">
    <tr>
        <th>Precio</th>
        <th>Fletes</th>
        <th>Comentarios</th>
        <th>Total</th>
        <th>Estado</th>
    </tr>
    @forelse ($pagos as $pagos_usu)
    <tr>
        <td> ${{$pagos_usu->monto}} </td>
        <td> ${{$pagos_usu->descuento}} </td>
        <td>
            {{$pagos_usu->nota}}
        </td>
        <td> ${{$pagos_usu->total}} </td>
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
            <form action="" method="post">
                @csrf
                @method('PUT')
                <input type="submit" class="btn btn-success" value="Retirar">
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