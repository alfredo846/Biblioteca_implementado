@extends('layouts.app')
@section('title', 'Libros')

@section('content')
<div class="container-fluid p-0">
    <!-- Container Slogan -->
    <div class="col-12 bg-primario rounded-top mb-3">
        <div class="col-12 py-4">
            <h1 class="text-white fw-bold text-uppercase text-center fs-4 mb-2">Control de libros</h1>
            </div>
    </div>
    <!-- Container Slogan -->

    <!-- Contenido -->
    <div class="row w-100 h-100 m-0 p-0">

        <!-- Header Section -->
        <form action="{{ route('libros.index') }}" method="POST" class="row w-100 p-0 mx-auto align-items-center" id="form-number-items">
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

            <div class="col-12 col-md-4">
                <a href="{{ route('libros.create') }}" class="btn btn-primario text-white btn-sm d-block mx-auto w-75">Crear Nuevo</a>
            </div>
        </form>
        <!-- Header Section -->

        <div class="col-12">
            @include('layouts.partials.alerts')
        </div>

        <!-- desktop version -->
        <div class="row">
            <div class="col-12">

                <div id="" class="tabcontent">
                    <table class="table table-primaria d-none d-lg-table text-center align-center">
                        <thead class="table-head fw-bold">
                            <th>Título</th>
                            <th>Carrera</th>
                            <th>Editorial</th>
                            <th>Estatus</th>
                            <th>Clasificación</th>
                            <th>Activo</th>
                            <th>Opciones</th>
                        </thead>
                        <tbody>
                            @forelse($items as $item)
                                <tr class="d-none d-lg-table-row col-12">
                                    <td class="col-2">{{ $item->titulo}}</td>
                                    <td class="col-2">{{ $item->carre }} </td>
                                    <td class="col-2">{{ $item->edicion}}</td>
                                    <td class="col-1">{{ $item->status}}</td>
                                    <td class="col-1">{{ $item->clasificacion}}</td>
                                    <td class="col-2">
                                        <span @class([ 'badge bg-success'=> $item->activo,'badge bg-danger' => !$item->activo])>
                                            {{( $item->activo ) ? 'Activo' : 'Inactivo' }}
                                        </span>
                                    </td>

                                <td class="align-center col-3">
                                    {{-- start botón de editar --}}
                                    <div class="row justify-content-evenly w-100">
                                        <div class="col text-center px-0">
                                            <a href="{{ route('libros.edit', $item) }}" class="btn btn-sm btn-primario text-white w-20">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                                    <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
                                                </svg>
                                            </a>
                                        </div>
                                        {{-- end botón de editar --}}

                                        {{-- start botón desactivar/activar --}}
                                        <div class="col text-center px-0">
                                            <form action="{{ route('libros.toggle.status', $item) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" name="activo"
                                                @if($item->activo)
                                                    value="0"
                                                @else
                                                    value="1"
                                                @endif>

                                                <button type="submit"
                                                    @if($item->activo)
                                                        value="Desactivar"
                                                    @else
                                                        value="Activar"
                                                    @endif

                                                    @class([
                                                        'btn-secundario text-white w-20 btn btn-sm' => $item->activo,
                                                        'btn-success w-20 btn btn-sm' => !$item->activo
                                                    ])
                                                        @if($item->activo == "1")
                                                            onclick="return confirm('¿Está seguro de que desea desactivar el registro?')"
                                                        @else
                                                            onclick="return confirm('¿Está seguro de que desea activar el registro?')"
                                                        @endif
                                                    >
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-toggles" viewBox="0 0 16 16">
                                                        <path d="M4.5 9a3.5 3.5 0 1 0 0 7h7a3.5 3.5 0 1 0 0-7h-7zm7 6a2.5 2.5 0 1 1 0-5 2.5 2.5 0 0 1 0 5zm-7-14a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zm2.45 0A3.49 3.49 0 0 1 8 3.5 3.49 3.49 0 0 1 6.95 6h4.55a2.5 2.5 0 0 0 0-5H6.95zM4.5 0h7a3.5 3.5 0 1 1 0 7h-7a3.5 3.5 0 1 1 0-7z"/>
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                        {{-- end botón desactivar/activar --}}

                                        {{-- start botón de elimnar fisicamente --}}
                                        <div class="col text-center px-0">
                                            @if(!$item->activo)
                                            <form action="{{ route('libros.destroy', $item) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger text-white w-20" onclick="return confirm('¿Está seguro de que desea eliminar el registro?')">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                        <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                                                    </svg>
                                                </button>
                                            </form>
                                            @endif
                                        </div>
                                        {{-- Boton pfd --}}
                                        <div class="col text-center px-0">
                                            <form action="{{ route('download-pdf', $item) }}" method="POST">
                                                @csrf
                                                @method('GET')
                                                <button type="submit" class="btn btn-sm btn-primary text-white w-20">
                                                    <img src="{{ asset('icons/ticket-fill.svg') }}" alt="ticket">
                                                </button>
                                            </form>
                                        </div>
                                        {{-- end botón eliminar fisicamente--}}
                                    </div>
                                </td>
                            @empty
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- desktop version End -->

        @foreach($items as $item)
        <!-- Mobile Version -->
        <div class="card shadow-lg my-3 py-3 mx-auto d-lg-none">

            <div class="card-body text-center">
                <p>Título: {{ $item->titulo}}</p>
                <p>Subtítulo: {{ $item->subtitulo}}</p>
                <p>Lugar Publicación: {{ $item->lugar_p }} </p>
                <p>Año Publicación: {{ $item->año_p}}</p>
                <p>Edición: {{ $item->edicion}}</p>
                <p>Paginación: {{ $item->paginacion }} </p>
                <p>ISBN: {{ $item->isbn}}</p>
                <p>Notas: {{ $item->notas}}</p>
                <p>Título Variable: {{ $item->titulo_v }} </p>
                <p>Serie: {{ $item->serie}}</p>
                <p>Carrera: {{ $item->carre }} </p>
                <p>Autor: {{ $item->aut}}</p>
                <p>Editorial: {{ $item->edi}}</p>
                <p>Tema: {{ $item->tem }} </p>
                <p>Ubicación: {{ $item->ubicacion}}</p>
                <p>Clasificación: {{ $item->clasificacion}}</p>
                <p>Status: {{ $item->status }} </p>
                @if($item->activo)
                    <p class="badge bg-success">Activo</p>
                @else
                    <p class="badge bg-danger">Inactivo</p>
                @endif
            </div>

            <div class="card-footer">
                <div class="row">
                    <div class="col text-center">
                        <a href="{{ route('libros.edit', $item) }}" class="btn btn-sm btn-primario text-white">Editar</a>
                    </div>
                    <div class="col text-center">
                           {{-- start botón desactivar/activar --}}
                                    <div class="col text-center px-0">
                                        <form action="{{ route('libros.toggle.status', $item) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="activo"
                                            @if($item->activo)
                                                value="0"
                                            @else
                                                value="1"
                                            @endif>

                                            <input type="submit"
                                                @if($item->activo)
                                                    value="Desactivar"
                                                @else
                                                    value="Activar"
                                                @endif
                                                @class([
                                                    'btn-secundario text-white w-20 btn btn-sm' => $item->activo,
                                                    'btn-success w-20 btn btn-sm' => !$item->activo
                                                ])

                                                onclick="return confirm
                                                    @if($item->activo == "1")
                                                        ('¿Está seguro de que desea desactivar el registro?')
                                                    @endif
                                                    @if($item->activo == "0")
                                                        ('¿Está seguro de que desea activar el registro?')
                                                    @endif
                                                ">

                                                @if($item->activo)
                                                {{-- <span>Desactivar</span> --}}
                                                @else
                                                {{-- <span>Activar</span> --}}
                                                @endif
                                            </button>
                                        </form>
                                    </div>
                                    {{-- end botón desactivar/activar --}}


                    </div>
                    @if(!$item->activo)
                        <div class="col text-center">
                            <form action="{{ route('libros.destroy', $item) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="Eliminar" class="btn btn-sm btn-secundario text-white" onclick="return confirm('¿Está seguro de que desea eliminar el registro?')">
                            </form>
                        </div>
                    @endif
                </div>
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


    function openCity(evt, cityName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
    }
</script>
@endsection
