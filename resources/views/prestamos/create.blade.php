@extends('layouts.app')
@section('title', 'Prestamos')

@section('content')
    <!-- General Container -->
    <div class="container-fluid p-0">
        <!-- Form Container -->
        <div class="container-fluid">
            <div class="row justify-content-center">

                <!-- Container Slogan -->
                <div class="col-12 bg-primario rounded-top mb-3">
                    <div class="col-12 py-4">
                        <h1 class="text-white fw-bold text-uppercase text-center fs-4 mb-2">Crear Nuevo Prestamo</h1>
                        <p class="text-white text-center fs-6 fw-light"></p>
                    </div>
                </div>
                <!-- Container Slogan -->

                <!-- Form -->
                <form action="{{ route('prestamos.store') }}" class="form" method="POST">
                    @csrf
                    @method('POST')

                    <!-- Hide Section Button -->
                    <div class="row justify-content-center">
                        <button id="btn-general-information"
                            class="col-12 col-lg-10 border-0 text-white btn btn-primary mt-3 mb-1">
                            <div class="row align-items-center justify-content-between">
                                <div class="col-8 text-start">
                                    <span class="w-100">Información General</span>
                                </div>
                                <div class="col-2 text-end">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                                    </svg>
                                </div>
                            </div>
                        </button>
                    </div>
                    <!-- Hide Section Button End -->

                    <!-- Personal Information Section -->
                    <br>
                    <section id="general-information" class="col-12 col-lg-12">
                        <div class="row justify-content-center">
                            <div class="col-12 col-lg-10">

                                <!-- Input Select -->
                                <div class="form-group my-2">
                                    <label for="select_usuario" class="form-label">Alumno:</label>
                                    <select name="idu" id="select_usuario" placeholder="Seleccione un alumno">
                                        <option value="">-- Seleccione un alumno --</option>
                                        @foreach ($usuarios as $c)
                                            <option value="{{ $c->idu }}">{{ $c->matricula }}&nbsp;{{ $c->nombre }}
                                                {{ $c->apellido_paterno }} {{ $c->apellido_materno }}</option>
                                        @endforeach
                                    </select>

                                    @if ($errors->first('idu'))
                                        <div class="invalid-feedback">
                                            <i>El campo usuario es obligatorio</i>
                                        </div>
                                    @endif
                                </div>
                                <!-- Input Select End -->


                                <div class="form-group my-2">
                                    <label class="form-label">Fecha prestamo</label>
                                    <input @class([
                                        'form-control' => !$errors->first('fecha_p'),
                                        'form-control is-invalid' => $errors->first('fecha_p'),
                                    ]) autocomplete="off" type="date"
                                        value="{{ old('fecha_p') || '' }}" name="fecha_p"
                                        placeholder="Fecha de Prestamo" id="fecha_prestamo" required>

                                    @if ($errors->first('idu'))
                                        <div class="invalid-feedback">
                                            <i>El campo Fecha prestamo es obligatorio</i>
                                        </div>
                                    @endif

                                </div>
                                <!-- Input Text -->
                                <div class="form-group my-2">
                                    <label class="form-label">Observacion del Prestamo</label>
                                    <input @class([
                                        'form-control' => !$errors->first('observacion_p'),
                                        'form-control is-invalid' => $errors->first('observacion_p'),
                                    ]) autocomplete="off" type="text" value="{{ old('observacion_p') }}" name="observacion_p"
                                        placeholder="Observación del Prestamo" required>

                                    @if ($errors->first('observacion_p'))
                                        <div class="invalid-feedback">
                                            <i>{{ $errors->first('observacion_p') }}</i>
                                        </div>
                                    @endif

                                </div>

                                <div class="form-group my-2">
                                    <label class="form-label">Fecha de devolución</label>
                                    <input @class([
                                        'form-control' => !$errors->first('fecha_dev'),
                                        'form-control is-invalid' => $errors->first('fecha_dev'),
                                    ]) autocomplete="off" type="date"
                                        value="{{ old('fecha_dev') }}" name="fecha_dev" id="fecha_dev"
                                        placeholder="Fecha de devolución" required>

                                    @if ($errors->first('idu'))
                                        <div class="invalid-feedback">
                                            <i>El campo Fecha devolución es obligatorio</i>
                                        </div>
                                    @endif

                                </div>

                                <div class="form-group my-2">
                                    <label class="form-label">Observacion de devolución</label>
                                    <input @class([
                                        'form-control' => !$errors->first('observacion_dev'),
                                        'form-control is-invalid' => $errors->first('observacion_dev'),
                                    ]) autocomplete="off" type="text"
                                        value="{{ old('observacion_dev') }}" name="observacion_dev" {{-- <-- Nombre del Campo --}}
                                        placeholder="Observacion de devolución" required>

                                    @if ($errors->first('observacion_dev'))
                                        <div class="invalid-feedback">
                                            <i>{{ $errors->first('observacion_dev') }}</i>
                                        </div>
                                    @endif

                                </div>

                                <!-- Input Select -->
                                <div class="form-group my-2">
                                    <label class="form-label">Selecciona un libro</label>
                                    <select name="id_l" id="select_libros" placeholder="Selecciona un libro">
                                        <option value="">Selecciona un libro...</option>
                                        @foreach ($libros as $c)
                                            <option value="{{ $c->id_l }}">{{ $c->titulo }}
                                                {{ $c->clasificacion }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->first('idu'))
                                        <div class="invalid-feedback">
                                            <i>El campo Libro es obligatorio</i>
                                        </div>
                                    @endif
                                </div>
                                <!-- Input Select End -->

                                <!-- Input Select -->
                                <div class="form-group my-2">
                                    <label class="form-label">Status</label>
                                    <select @class([
                                        'form-control form-select' => !$errors->first('status'),
                                        'form-control is-invalid' => $errors->first('status'),
                                    ]) name="status" class="chosen-select form-control">
                                        <option value="" selected disabled>-- Seleccione --</option>
                                        <option value="Disponible">Disponible</option>
                                        <option value="Prestado">Prestado</option>

                                    </select>

                                    @if ($errors->first('status'))
                                        <div class="invalid-feedback">
                                            <i>{{ $errors->first('status') }}</i>
                                        </div>
                                    @endif
                                </div>
                                <!-- Input Select End -->

                                <!-- Input Select -->
                                <div class="form-group my-2">
                                    <label class="form-label">Tipo de prestamo</label>
                                    <select @class([
                                        'form-control form-select' => !$errors->first('tipo_p'),
                                        'form-control is-invalid' => $errors->first('tipo_p'),
                                    ]) name="tipo_p" class="chosen-select form-control">
                                        <option value="0" selected disabled>-- Selecione --</option>
                                        <option value="Domicilio">Domicilio</option>
                                        <option value="Interno">Interno</option>
                                    </select>

                                    @if ($errors->first('idu'))
                                        <div class="invalid-feedback">
                                            <i>El campo Tipo Prestamo es obligatorio</i>
                                        </div>
                                    @endif
                                </div>
                                <!-- Input Select End -->

                                <!-- Input Radios -->

                                <div class="form-check my-2">
                                    <div class="row items-center justify-content-center">
                                        <h3 class="text-start fs-6">Activo</h3>

                                        <!-- Input Radio -->
                                        <div class="col-6 d-md-flex justify-content-center">
                                            <div>
                                                <input class="form-check-input mx-auto" name="activo" type="radio"
                                                    id="opcion-1" value="1" checked>
                                                <label class="form-check-label ms-1" for="opcion-1"> Si </label>
                                            </div>
                                        </div>
                                        <!-- Input Radio End -->

                                        <!-- Input Radio -->
                                        <div class="col-6 d-md-flex justify-content-center">
                                            <div>
                                                <input class="form-check-input mx-auto" name="activo" type="radio"
                                                    id="opcion-2" value="0">
                                                <label class="form-check-label ms-1" for="opcion-2"> No </label>
                                            </div>
                                        </div>
                                        <!-- Input Radio End -->
                                    </div>
                                </div>
                                <!-- Input Radios End -->

                            </div>
                        </div>
                    </section>
                    <!-- Personal Information Section End -->
                    <div class="row justify-content-center">
                        <div class="col-12 col-lg-3">
                            <button type="submit"
                                class="btn btn-md d-block w-100 text-white btn-primario">Guardar</button>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end mt-5">
                        <a title="Regresar" href="{{ route('prestamos.index') }}"
                            class="text-end fs-6 text-secundario"><img src="{{ asset('img/regresa.jpg') }}"
                                width="30" height="30"></a>
                    </div>
                </form>
                <!-- Form End -->
            </div>
        </div>
        <!-- Form Container End -->
    </div>
    <!-- General container End -->
@endsection

@section('scripts')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.14.0/js/selectize.min.js"></script>
    <script>
        $('#btn-general-information').click((e) => {
            e.preventDefault();
            $('#general-information').toggle(500);
        });
    </script>
    <script type="text/javascript">
        $(document).ready(()=>{
            $('#select_libros').selectize({
                sortField: 'text'
            });
            $('#select_usuario').selectize({
                sortField: 'text'
            });
        });
    </script>

    <script src="{{ asset('js/prestamos/main.js') }}"></script>
@endsection
