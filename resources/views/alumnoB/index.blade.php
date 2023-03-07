@extends('layouts.app')
@section('title', 'Búsqueda Libros')

@section('content')
<div class="container-fluid p-0">
    <!-- Container Slogan -->
    <div class="col-12 bg-primario rounded-top mb-3">
        <div class="col-12 py-4">
            <h1 class="text-white fw-bold text-uppercase text-center fs-4 mb-2">Busqueda de libros</h1>
         </div>
    </div>
    <!-- Container Slogan -->

    <!-- Contenido -->
    <div class="row w-100 h-100 m-0 p-0">

        <!-- Header Section -->
        <form action="{{ route('alumnoB.index') }}" method="POST" class="row w-100 p-0 mx-auto align-items-center" id="form-number-items">
            <div class="col-12 col-md-4 text-center my-2">
                @csrf
                @method('GET')
                <select name="paginate" id="select-number-items">
                    <option value="10" @if($items->count() == '10') selected @endif >10</option>
                    <option value="50" @if($items->count() == '50') selected @endif >50</option>
                    <option value="100" @if($items->count() == '100') selected @endif >100</option>
                    <option value="250" @if($items->count() == '250') selected @endif >250</option>
                </select>
            </div>
            <div class="col-12 col-md-4 text-center my-2 d-flex">
                <input autocomplete="off" type="text" name="q" placeholder="Buscar..." class="form-control me-2">
                <input type="submit" value="Buscar" class="btn btn-primario text-white">
            </div>

            <!--
            <div class="col-12 col-md-4">
                <a href="{{ route('estudiantes.create') }}" class="btn btn-primario text-white btn-sm d-block mx-auto w-75">Crear Nuevo</a>
            </div>
            -->
        </form>
        <!-- Header Section -->

        <div class="col-12">
            @include('layouts.partials.alerts')
        </div>

        <!-- desktop version -->
        <div class="row">
            <div class="col-12">
                <table class="table table-primaria d-none d-lg-table text-center align-center">
                    <thead class="table-head fw-bold">
                        <th>Titulo</th>
                        <th>Autor</th>
                        <th>Editorial</th>
                        <th>Clasificación</th>
                        <th>Status</th>
                        <th>&nbsp;</th>
                    </thead>
                    <tbody id="">
                        @forelse($items as $item)
                        <tr class="d-none d-lg-table-row col-12">
                            <td class="col-4">{{$item->titulo}}</td>
                            <td class="col-3">{{$item->nombrA}}</td>
                            <td class="col-3">{{$item->nombrE}}</td>
                            <td class="col-3">{{$item->clasificacion}}</td>
                            
                            @if($item->status == 'Disponible')
                             <td class="col-3">
                                 <p class="badge bg-success">Disponible</p>

                             </td>
                         @else
                            <td class="col-3">
                                 <p class="badge bg-danger">{{ $item->status }}</p>

                            </td>
               
                            @endif
                            
                            
                           
                                    
                                   
                           
                        </tr>
                        @empty
                        @endforelse
                        </tbody>
                </table>
            </div>
        </div>
        <!-- desktop version End -->

        
        <!-- Mobile Version -->
        @foreach($items as $item)
        <div class="card shadow-lg my-3 py-3 mx-auto d-lg-none">
        
            <div class="card-title text-center fw-bold">{{ $item->titulo }}</div>
            <div class="card-body text-center">
                <p>{{ $item->nombrE }}</p>
                <p>{{ $item->nombrA }}</p>
                <p>{{ $item->clasificacion }}</p>
                @if($item->status == 'Disponible')
                <p class="badge bg-success">Disponible</p>
                @else
                <p class="badge bg-danger">{{ $item->status }}</p>
                @endif
                 
            </div>
            
        </div>
        
        <!-- Mobile Version End -->
        @endforeach
    </div>
    <!-- Contenido End -->

    <!-- Links -->
    <div class="row my-3 w-100 h-100 p-0">
        <div class="col-12 col-md-3">
            <p class="text-secondary text-center fst-italic">Mostrando {{ $items->count() }} resultados de {{ $items->total() }}</p>
        </div>
        <div class="col-12 col-md-9">
            {{ $items->links() }}
        </div>
    </div>
    <!-- Links End -->
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(() => {
        $('#select-number-items').change(() => {
            $('#form-number-items').submit();
        });
    });
</script>
@endsection
