@extends('Tablero.index')
@section('cartas')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Compra</h2>
            <!-- Acá va la imagen del comprobante -->
            <!-- esta hoja no nos sirve -->
            <h4> <img src="{{ $compras->c_pago }}" width="50px" height="50px">
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Producto</strong>
            {{ $compras->nombre }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Precio</strong>
            {{ $compras->precio }}
        </div>
    </div>
</div>

<form action="">
    @csrf
    <strong>En caso de ser rechazado</strong>
    <input type="text" name="motivos" class="form-control" placeholder="Ingresa los motivos aquí">
    <input type="submit" class="btn btn-danger" value="Rechazar">
    <a href="" type="submit" class="btn btn-primary">Autorizar compra</a>
</form>
@endsection
