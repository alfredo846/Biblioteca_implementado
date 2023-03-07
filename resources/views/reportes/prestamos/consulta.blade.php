@extends('layouts.app')
@section('title', 'Consulta Prestamos')

@section('content')
    <div class="container-fluid p-0">
        <!-- Container Slogan -->
        <div class="col-12 bg-primario rounded-top mb-3">
            <div class="col-12 py-4">
                <h1 class="text-white fw-bold text-uppercase text-center fs-4 mb-2">Consulta Prestamos</h1>

            </div>
        </div>
        <!-- Container Slogan -->

        <!-- Contenido -->
        <div class="row w-100 h-100 m-0 p-0">

            <!-- Header Section -->
            <div class="col-12 col-md-3 text-center my-2">
            </div>

            <div class="col-12 text-center my-2 d-flex">
                <div class="container mx-auto">
                    <div class="row justify-content-around w-100 align-items-center">
                        <div class="col-12 col-md-4 col-lg-3 my-2">
                            <span class="d-block text-start mb-2 fw-bold">Ciclo Escolar</span>
                            <select class="form-select" name="idce" id="ciclos_select" class="form-control">
                                <option value="0" selected disabled>-- Seleccionar --</option>
                                @forelse ($ciclos as $ciclo)
                                    <option value="{{ $ciclo->idce }}">{{ $ciclo->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12 col-md-4 col-lg-3 my-2">
                            <span class="d-block text-start mb-2 fw-bold">Carrera</span>
                            <select class="form-select text-danger" name="idca" id="carreras_select" class="form-control" disabled>
                                <option value="0" selected disabled>-- Selecciona una carrera --</option>
                            </select>
                        </div>
                        <div class="col-12 col-md-4 col-lg-3 my-2">
                            <span class="d-block text-start mb-2 fw-bold">Grupo</span>
                            <select class="form-select text-danger" name="idg" id="grupo_select" class="form-control" disabled>
                                <option value="0" selected disabled>-- Selecciona una Grupo --</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-4">
            </div>
            <!-- Header Section -->

            <div class="col-12">
                @include('layouts.partials.alerts')
            </div>

            <!-- desktop version -->
            <div id="resultado1">
                <div class="row">
                    <div class="col-12">
                        <table class="table table-primaria d-none d-lg-table text-center align-center">
                            <thead class="table-head fw-bold">
                                <th>Titulo</th>
                                <th>Fecha Prestamo</th>
                                <th>Observacion Prestamo</th>
                                <th>Fecha Devolución</th>
                                <th>Matricula</th>
                                <th>Nombre</th>
                                <th>Tipo de Prestamo</th>
                                <th>Disponibilidad</th>
                                <th>&nbsp;</th>
                            </thead>
                            <tbody id="carreras_tbody"></tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- desktop version End -->

            <!-- Mobile Version -->
            <div id="mobile_container"></div>
            <!-- Mobile Version End -->
        </div>
        <!-- Contenido End -->

    </div>
@endsection

@section('scripts')

    <script src="{{ asset('js/reportes/prestamos/main.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $("#carreras").change(function() {
                var valciclo = $("#carreras").val();
                if (valciclo != 0) {
                    $("#resultado1").load("{{ route('contenidoP') }}?idca=" + valciclo).serialize();
                    //$("#conte").hide();
                }
            });
        });
    </script>

    <script>
        $(document).ready(() => {
            $('#select-number-items').change(() => {
                $('#form-number-items').submit();
            });
        });
    </script>
@endsection
