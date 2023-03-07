@extends('layouts.app')
@section('title', 'Consulta Libros')

@section('content')
    <div class="container-fluid p-0">
        <!-- Container Slogan -->
        <div class="col-12 bg-primario rounded-top mb-3">
            <div class="col-12 py-4">
                <h1 class="text-white fw-bold text-uppercase text-center fs-4 mb-2">Consulta Libros</h1>
                <h1 class="text-white fw-bold text-uppercase text-center fs-6 fw-light">

                        Carrera : {{ $datos->carrera }} &nbsp;&nbsp;

                </h1>

            </div>
        </div>
        <!-- Container Slogan -->

        <!-- Contenido -->
        <div class="row w-100 h-100 m-0 p-0">

            <!-- Header Section -->
            <div class="col-12 col-md-3 text-center my-2">
            </div>

            <div class="col-12 col-md-5 text-center my-2 d-flex">

            </div>

            <div class="col-12 col-md-4">
            </div>
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
                            <th>Año publicación</th>
                            <th>Edicion</th>
                            <th>Detalles</th>

                        </thead>
                        <tbody id="">
                            @forelse($listas as $lista)
                                <tr class="d-none d-lg-table-row col-12">


                                    <td class="col-2">{{ $lista->titulo }}</td>

                                    <td class="col-2">{{ $lista->nombre_a }}</td>

                                    <td class="col-2">{{ $lista->nombre_e }} </td>

                                    <td class="col-2">{{ $lista->año_p }}</td>

                                    <td class="col-2">{{ $lista->edicion }}</td>

                                    <td>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#detalleLibroModal{{ $lista->id_l }}">
                                          Más detalles
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="detalleLibroModal{{ $lista->id_l }}" tabindex="-1" aria-labelledby="libroModalLabel" aria-hidden="true">
                                          <div class="modal-dialog">
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="libroModalLabel">Detalles de {{$lista->titulo}}</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                              </div>
                                              <div class="modal-body">

                                                <div>
                                                    <h5>Título</h5>
                                                    <label for="">{{$lista->titulo}}</label>
                                                </div>

                                                <div>
                                                    <h5>Autor</h5>
                                                    <label for="">{{$lista->nombre_a}}</label>
                                                </div>

                                                <div>
                                                    <h5>Nombre del Editorial</h5>
                                                    <label for="">{{$lista->nombre_e}}</label>
                                                </div>

                                                <div>
                                                    <h5>Año de publicación</h5>
                                                    <label for="">{{$lista->año_p}}</label>
                                                </div>

                                                <div>
                                                    <h5>Edición</h5>
                                                    <label for="">{{$lista->edicion}}</label>
                                                </div>

                                                <div>
                                                    <h5>Serie</h5>
                                                    <label for="">{{$lista->serie}}</label>
                                                </div>

                                                <div>
                                                    <h5>Clasificación</h5>
                                                    <label for="">{{$lista->clasificacion}}</label>
                                                </div>

                                              </div>
                                              <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                    </td>

                                </tr>
                            @empty
                            @endforelse
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-end mt-5">
                        <a title="Regresar" href="{{ route('consultaL') }}" class="text-end fs-6 text-secundario"><img src="{{ asset('img/regresa.jpg')}}" width="30" height="30"></a>
                    </div>
                </div>
            </div>
            <!-- desktop version End -->

            @forelse($listas as $lista)
                <!-- Mobile Version -->
                <div class="card shadow-lg my-3 py-3 mx-auto d-lg-none">
                    <div class="card-title text-center fw-bold">Grupo: {{ $datos->carrera }}</div>

                    <div class="card-body text-center">
                        <p> Titulo: {{ $lista->titulo }} </p>
                    </div>
                    <div class="card-body text-center">
                        <p> Fecha P: {{ $lista->nombre_a }} </p>
                    </div>
                    <div class="card-body text-center">
                        <p> Observacion D: {{ $lista->nombre_e }} </p>
                    </div>
                    <div class="card-body text-center">
                        <p> Fecha D: {{ $lista->año_p }} </p>
                    </div>
                    <div class="card-body text-center">
                        <p> Matricula: {{ $lista->edicion }} </p>
                    </div>
                </div>
                <!-- Mobile Version End -->
            @empty
            @endforelse

        </div>
        <!-- Contenido End -->

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
