@extends('Tablero.index')

@section('nombreU')
<span style="color:#fff;" class="mr-2 d-none d-lg-inline small">{{ auth()->user()->nombre }} ({{ auth()->user()->rol }})</span>
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
            <a class="collapse-item" href="/">Ver</a>
        </div>
    </div>
</li>
<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-folder"></i>
        <span>Productos</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="/">Ver</a>
        </div>
    </div>
</li>

<!-- Nav Item - Utilities Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
        <i class="fas fa-fw fa-folder"></i>
        <span>Usuarios</span>
    </a>
    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="usuarios">Ver</a>
        </div>
    </div>
</li>
@endsection

@section('usuarioOpciones')
<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
    <a class="dropdown-item" href="login">
        <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
        Perfil
    </a>
    <a class="dropdown-item" href="" data-toggle="modal" data-target="#logoutModal">
        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
        Cerrar sesión
    </a>
</div>
@endsection

@section('cartas')
<div class="container">
    <div class="card">
        <div class="content">
            <h3>Productos</h3>
            <p>Actualmente se encuentran: <strong>{{$contaP}}</strong> productos registrados en el sistema</p>
            <a href="/">Ver</a>
        </div>
    </div>
    <div class="card2">
        <div class="content">
            <h3>Categorías</h3>
            <p>Actualmente se encuentran: <strong>{{$contaC}}</strong> categorías registrados en el sistema</p>
            <a href="/">Ver</a>
        </div>
    </div>
    <div class="card3">
        <div class="content">
            <h3>Usuarios</h3>
            <p>Actualmente se encuentran: <Strong>{{$contaU}}</Strong> usuarios registrados en el sistema</p>
            <a href="usuarios">Ver</a>
        </div>
    </div>
</div>
@endsection