@extends('layouts.app')
@section('title', 'Bienvenido')

@section('content')
    <!-- Contenido -->
    <div class="row w-100 h-100 m-0 p-0">
        <!-- Container Slogan -->
        <div class="col-12 bg-primario rounded-top mb-3">
            <div class="col-12 py-4">
                <h1 class="text-white fw-bold text-uppercase text-center fs-4 mb-2">Bienvenido al Sistema</h1>
                <p class="text-white text-center fs-6 fw-light"></p>
            </div>
        </div>
        <!-- Container Slogan -->
        <div class="col-12">
            @include('layouts.partials.alerts')
        </div>
    </div>
    <!-- Contenido End -->
@endsection

