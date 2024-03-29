@extends('layouts.app')
@section('title', 'Autores')

@section('content')
<!-- General Container -->
<div class="container-fluid p-0">
    <!-- Form Container -->
    <div class="container-fluid">
        <div class="row justify-content-center">

            <!-- Container Slogan -->
            <div class="col-12 bg-primario rounded-top mb-3">
                <div class="col-12 py-4">
                    <h1 class="text-white fw-bold text-uppercase text-center fs-4 mb-2">Modificar Autor</h1>

                </div>
            </div>
            <!-- Container Slogan -->

            <!-- Form -->
            <form action="{{ route('autores.update',$consulta) }}" class="form" method="POST">
                @csrf
                @method('PUT')

                <!-- Hide Section Button -->
                <div class="row justify-content-center">
                    <button id="btn-general-information" class="col-12 col-lg-10 border-0 text-white btn btn-primary mt-3 mb-1">
                        <div class="row align-items-center justify-content-between">
                            <div class="col-8 text-start">
                                <span class="w-100">Información General</span>
                            </div>
                            <div class="col-2 text-end">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                                </svg>
                            </div>
                        </div>
                    </button>
                </div>
                <!-- Hide Section Button End -->

                <!-- Personal Information Section -->
                <br>
                <section id="general-information" class="col-12 col-lg-12" >
                    <div class="row justify-content-center">
                        <div class="col-12 col-lg-10">

                            <!-- Input Text -->
                            <div class="form-floating my-2">
                                <input
                                    @class(['form-control'=> !$errors->first('nombre_a'), 'form-control is-invalid' => $errors->first('nombre_a')])
                                    autocomplete="off"
                                    type="text"
                                    value="{{$consulta->nombre_a }}"
                                    name="nombre_a" {{-- <-- Nombre del Campo --}}
                                    placeholder="input-text"
                                    id="input-text"
                                    required>
                                <label for="input-text">Nombre autor</label>

                                @if($errors->first('nombre_a'))
                                <div class="invalid-feedback">
                                    <i>{{ $errors->first('nombre_a') }}</i>
                                </div>
                                @endif
                            </div>


                            <div class="form-floating my-2">
                                <input
                                    @class(['form-control'=> !$errors->first('nacionalidad_a'), 'form-control is-invalid' => $errors->first('nacionalidad_a')])
                                    autocomplete="off"
                                    type="text"
                                    value="{{$consulta->nacionalidad_a}}"
                                    name="nacionalidad_a" {{-- <-- Nombre del Campo --}}
                                    placeholder="input-text"
                                    id="input-text"
                                    required>
                                <label for="input-text">Nacionalidad</label>

                                @if($errors->first('nacionalidad_a'))
                                <div class="invalid-feedback">
                                    <i>{{ $errors->first('nacionalidad_a') }}</i>
                                </div>
                                @endif
                            </div>


                            <div class="form-floating my-2">
                                <input
                                    @class(['form-control'=> !$errors->first('fecha_n'), 'form-control is-invalid' => $errors->first('fecha_n')])
                                    autocomplete="off"
                                    type="date"
                                    value="{{$consulta->fecha_n}}"
                                    name="fecha_n" {{-- <-- Nombre del Campo --}}
                                    placeholder="input-text"
                                    id="input-text"
                                    required>
                                <label for="input-text">Fecha de Nacimiento</label>

                                @if($errors->first('fecha_n'))
                                <div class="invalid-feedback">
                                    <i>{{ $errors->first('fecha_n') }}</i>
                                </div>
                                @endif
                            </div>


                            <div class="form-floating my-2">
                                <input
                                    @class(['form-control'=> !$errors->first('fecha_d'), 'form-control is-invalid' => $errors->first('fecha_d')])
                                    autocomplete="off"
                                    type="text"
                                    value="{{$consulta->fecha_d}}"
                                    name="fecha_d" {{-- <-- Nombre del Campo --}}
                                    placeholder="input-text"
                                    id="input-text"
                                    required>
                                <label for="input-text">Fecha de defunción  (DD-MM-YYYY)</label>

                                @if($errors->first('fecha_d'))
                                <div class="invalid-feedback">
                                    <i>{{ $errors->first('fecha_d') }}</i>
                                </div>
                                @endif
                            </div>
                            <!-- Input Text End -->

                            <!-- Input Radios -->
                            <div class="form-check my-2">
                                <div class="row items-center justify-content-center">
                                    <h3 class="text-start fs-6">Activo</h3>

                                    <!-- Input Radio -->
                                    <div class="col-6 d-md-flex justify-content-center">
                                        <div>
                                            <input class="form-check-input mx-auto" name="activo" type="radio" id="opcion-1" value="1" required @if($consulta->activo) checked @endif>
                                            <label class="form-check-label ms-1" for="opcion-1"> Si </label>
                                        </div>
                                    </div>
                                    <!-- Input Radio End -->

                                    <!-- Input Radio -->
                                    <div class="col-6 d-md-flex justify-content-center">
                                        <div>
                                            <input class="form-check-input mx-auto" name="activo" type="radio" id="opcion-2" value="0" required @if(!$consulta->activo) checked @endif>
                                            <label class="form-check-label ms-1" for="opcion-2"> No </label>
                                        </div>
                                    </div>
                                    <!-- Input Radio End -->
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Personal Information Section End -->
                <div class="row justify-content-center">
                    <div class="col-12 col-lg-3">
                        <button type="submit" class="btn btn-md d-block w-100 text-white btn-primario">Guardar</button>
                    </div>
                </div>
                <div class="d-flex justify-content-end mt-5">
                    <a title="Regresar" href="{{ route('autores.index') }}" class="text-end fs-6 text-secundario"><img src="{{ asset('img/regresa.jpg')}}" width="30" height="30"></a>
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
<script>
    $('#btn-general-information').click((e) => {
        e.preventDefault();
        $('#general-information').toggle(500);
    });
</script>
@endsection
