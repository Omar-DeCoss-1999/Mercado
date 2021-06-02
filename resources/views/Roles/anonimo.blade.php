@extends('Tablero.index')

@section('nombreU')
<span class="mr-2 d-none d-lg-inline text-gray-600 small">Anónimo</span>
@endsection

@section('fotoP')
<img class="img-profile rounded-circle" src="img/undraw_profile.svg">
@endsection

@section('opciones')
<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-folder"></i>
        <span>Categorías</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            @forelse ($category as $categorias)
            <a class="collapse-item" href="">{{$categorias->nombre}}</a>
            @empty
            <a class="collapse-item" href="">Sin registro</a>
            @endforelse
        </div>
    </div>
</li>
@endsection

@section('cartas')
<table class="table col-12 table-responsive">
    <thead>
        <tr>
            <td>Imagen</td>
            <td>Producto</td>
            <td>Descripción</td>
            <td>Precio</td>
            <td>Acciones</td>
        </tr>
    </thead>
    <tbody>
        @forelse ($prod as $products)
        <tr>
            <td><img src="{{asset('/perfil_img/'.$products->imagen)}}" width="50px" height="50px"></td>
            <td>{{$products->nombre}}</td>
            <td>{{$products->descripcion}}</td>
            <td>{{$products->precio}}</td>
            <td><button class="btn btn-round">Ver</button></td>
        </tr>
        @empty
        <tr align="center">
            <td colspan="3">Sin registro</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection
