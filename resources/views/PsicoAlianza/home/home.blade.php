@extends('PsicoAlianza.layouts.app');
@section('title', 'Inicio')
@section('content')
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="d-flex justify-content-center align-items-center flex-column mt-5">
                <h1 class="text-center mb-3">Bienvenido(a)</h1>
                <h2 class="text-center mb-4">{{ Auth::user()->name }}</h2>
                <p class="text-center">Empieza por agregar los Cargos, Áreas y Roles que vas a manejar en el sistema</p>
                <a class="round-button mb-2" href="{{ route('config.get') }}">
                    <i class="fas fa-cogs d-block"></i>
                </a>
                <p>Empieza Aqui</p>
            </div>
        </div>
    </div>
</div>

@endsection