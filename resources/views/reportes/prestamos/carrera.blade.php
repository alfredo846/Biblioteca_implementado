@extends('layouts.app')
@section('title', 'Consulta Prestamos')

@section('content')
    <div class="container-fluid p-0">
        <!-- Container Slogan -->
        <div class="col-12 bg-primario rounded-top mb-3">
            <div class="col-12 py-4">
                <h1 class="text-white fw-bold text-uppercase text-center fs-4 mb-2">Consulta Prestamos</h1>
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
                            <th>Fecha<br>Prestamo</th>
                            <th>Observacion Prestamo</th>
                            <th>Fecha Devolución</th>
                            <th>Matricula</th>
                            <th>Nombre</th>
                            <th>Grupo</th>
                            <th>Disponibilidad</th>
                            <th>&nbsp;</th>
                        </thead>
                        <tbody id="">
                            @forelse($listas as $lista)
                                <tr class="d-none d-lg-table-row col-12">


                                    <td class="col-2">{{ $lista->titulo }}</td>

                                    <td class="col-2">{{ $lista->fecha_p }}</td>

                                    <td class="col-2">{{ $lista->observacion_dev }} </td>

                                    <td class="col-2">{{ $lista->fechadevolucion }}</td>

                                    <td class="col-2">{{ $lista->matricula }}</td>

                                    <td class="col-2">{{ $lista->nombrecompleto }} </td>

                                    <td class="col-2">{{ $lista->nombre }}</td>

                                    <td class="col-2">{{ $lista->disponibilidad }}</td>

                                </tr>
                            @empty
                            @endforelse
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-end mt-5">
                        <a title="Regresar" href="{{ route('consultaP') }}" class="text-end fs-6 text-secundario"><img src="http://localhost/biblioteca/public/img/regresa.jpg" width="30" height="30"></a>
                    </div>
                </div>
            </div>

            <div class="col-9">
            </div>
            <div class="col-3">


            </div>
            <!-- desktop version End -->

            @forelse($listas as $lista)
                <!-- Mobile Version -->
                <div class="card shadow-lg my-3 py-3 mx-auto d-lg-none">
                    <div class="card-title text-center fw-bold">Grupo: {{ $lista->nombre }}</div>

                    <div class="card-body text-center">
                        <p> Titulo: {{ $lista->titulo }} </p>
                    </div>
                    <div class="card-body text-center">
                        <p> Fecha P: {{ $lista->fecha_p }} </p>
                    </div>
                    <div class="card-body text-center">
                        <p> Observacion D: {{ $lista->observacion_dev }} </p>
                    </div>
                    <div class="card-body text-center">
                        <p> Fecha D: {{ $lista->fechadevolucion }} </p>
                    </div>
                    <div class="card-body text-center">
                        <p> Matricula: {{ $lista->matricula }} </p>
                    </div>
                    <div class="card-body text-center">
                        <p> Nombre: {{ $lista->nombrecompleto }} </p>
                    </div>
                    <div class="card-body text-center">
                        <p> Grupo: {{ $lista->nombre }} </p>
                    </div>
                    <div class="card-body text-center">
                        <p> Disponibilidad: {{ $lista->disponibilidad }} </p>
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
