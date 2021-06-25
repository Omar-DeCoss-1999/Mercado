@extends('Tablero.index')
@section('cartas')
<table class="table table-bordered">
    <thead>
        <tr>
            <td>Comprobante de pago</td>
            <td>Producto</td>
            <td>Precio</td>
            <td>Acciones</td>
        </tr>
    </thead>
    <tbody>
        @forelse ($compras as $compra)
        <tr>
            <td>
              <center>
                <img src="{{ asset('storage').'/'.'compro_pago'.'/'.$compra->c_pago }}" width="250px" height="250px">
              </center>
            </td>
            <td>{{$compra->nombre}}</td>
            <td>{{$compra->precio}}</td>
            <td>
                <!-- <a href="/autorizar/{{$compra->id}}" type="submit" class="btn btn-primary">Autorizar compra</a> -->
                <form action="">
                    @csrf
                    <strong>En caso de ser rechazado</strong>
                    <input type="text" name="motivos" class="form-control" placeholder="Ingresa los motivos aquí">
                    <br>
                    <input type="submit" class="btn btn-danger" value="Rechazar">
                    <a href="" type="submit" class="btn btn-primary">Autorizar compra</a>
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
