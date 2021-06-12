@extends('Tablero.index')

@section('cartas')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Producto</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="/">Regresar</a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <img src="{{asset('/productos_img/'.$producto->imagen )}}" width="50px" height="50px"></td>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Nombre:</strong>
            {{ $producto->nombre }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Descripción:</strong>
            {{ $producto->descripcion }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Precio:</strong>
            {{ $producto->precio }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Cantidad:</strong>
            {{ $producto->cantidad }}
        </div>
    </div>
</div>
@can('preguntar', $producto)
<form action="/pregunta/{{$producto->id}}" method="post">
    @csrf
    <strong>Has una pregunta:</strong>
    <input type="text" name="pregunta" class="form-control" placeholder="Ingresa tu pregunta">
    <input type="submit" class="btn btn-success" value="Enviar">
</form>
@endcan
@forelse ($preguntas as $pregunta)
<p> Pregunta: {{$pregunta->pregunta}} </p>
<p> Respuesta: {{$pregunta->respuesta}} </p>
@can('responder', $producto)
<form action="/pregunta/{{$pregunta->id}}" method="post">
    @method('PUT')
    @csrf
    <strong>Agrega una respuesta:</strong>
    <input type="text" name="respuesta" class="form-control" placeholder="Ingresa tu respuesta">
    <input type="submit" class="btn btn-success" value="Enviar">
</form>
@endcan
@can('moderar', App\Models\Pregunta::class)
<form action="/eliminarPregunta/{{$pregunta->id}}" method="post">
    @csrf
    <a class="btn btn-success" href="/editarPregunta/{{$pregunta->id}}">Moderar</a>
    <button type="submit" class="btn btn-danger">Eliminar</button>
</form>
@endcan
@empty
<div>
    <p>No existen preguntas para mostrar en este producto</p>
</div>
@endforelse
<br>
@if(Auth::user() == null)
@else
@if(Auth::user()->rol == 'Encargado')
@if($producto->concesionado == true)
<form action="/productos/{{$producto->id}}/concesionar" method="post">
    @csrf
    @method('PUT')
    <input type="submit" class="btn btn-success" value="Desconcesionar">
</form>
@else
<form action="/productos/{{$producto->id}}/concesionar" method="post">
    @csrf
    @method('PUT')
    <input type="submit" class="btn btn-success" value="Concesionar">
</form>
<form action="/productos/{{$producto->id}}/motivo" method="post">
    @csrf
    @method('PUT')
    <strong>Agrega un motivo:</strong>
    <input type="text" name="motivo" class="form-control" placeholder="Agregar motivo">
    <input type="submit" class="btn btn-success" value="Enviar">
</form>
@endif
@endif
@endif
@endsection