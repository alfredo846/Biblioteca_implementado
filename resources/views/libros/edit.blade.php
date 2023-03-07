@extends('layouts.app')
@section('title', 'Libros')

@section('content')
<!-- General Container -->
<div class="container-fluid p-0">
    <!-- Form Container -->
    <div class="container-fluid">
        <div class="row justify-content-center">

            <!-- Container Slogan -->
            <div class="col-12 bg-primario rounded-top mb-3">
                <div class="col-12 py-4">
                    <h1 class="text-white fw-bold text-uppercase text-center fs-4 mb-2">Modificar Libro</h1>
                    <p class="text-white text-center fs-6 fw-light"></p>
                </div>
            </div>
            <!-- Container Slogan -->

            <!-- Form -->
            <form action="{{ route('libros.update',$consulta) }}" class="form" method="POST">
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
                                    @class(['form-control'=> !$errors->first('titulo'), 'form-control is-invalid' => $errors->first('titulo')])
                                    autocomplete="off"
                                    type="text"
                                    value="{{$consulta->titulo}}"
                                    name="titulo" {{-- <-- Nombre del Campo --}}
                                    placeholder="input-text"
                                    id="input-text">
                                <label for="input-text">Título</label>

                                @if($errors->first('titulo'))
                                    <div class="invalid-feedback">
                                        <i>{{ $errors->first('titulo') }}</i>
                                    </div>
                                @endif

                            </div>
                            <!-- Input Text End -->

                            <!-- Input Text -->
                            <div class="form-floating my-2">
                                <input
                                    @class(['form-control'=> !$errors->first('subtitulo'), 'form-control is-invalid' => $errors->first('subtitulo')])
                                    autocomplete="off"
                                    type="text"
                                    value="{{$consulta->subtitulo}}"
                                    name="subtitulo" {{-- <-- Nombre del Campo --}}
                                    placeholder="input-text"
                                    id="input-text">
                                <label for="input-text">Subtitulo</label>

                                @if($errors->first('subtitulo'))
                                    <div class="invalid-feedback">
                                        <i>{{ $errors->first('subtitulo') }}</i>
                                    </div>
                                @endif

                            </div>
                            <!-- Input Text End -->

                            <!-- Input Text -->
                            <div class="form-floating my-2">
                                <input
                                    @class(['form-control'=> !$errors->first('lugar_p'), 'form-control is-invalid' => $errors->first('lugar_p')])
                                    autocomplete="off"
                                    type="text"
                                    value="{{$consulta->lugar_p}}"
                                    name="lugar_p" {{-- <-- Nombre del Campo --}}
                                    placeholder="input-text"
                                    id="input-text">
                                <label for="input-text">Lugar de publicación</label>

                                @if($errors->first('lugar_p'))
                                    <div class="invalid-feedback">
                                        <i>{{ $errors->first('lugar_p') }}</i>
                                    </div>
                                @endif

                            </div>
                            <!-- Input Text End -->

                            <!-- Input Text -->
                            <div class="form-floating my-2">
                                <input
                                    @class(['form-control'=> !$errors->first('año_p'), 'form-control is-invalid' => $errors->first('año_p')])
                                    autocomplete="off"
                                    type="text"
                                    value="{{$consulta->año_p}}"
                                    name="año_p" {{-- <-- Nombre del Campo --}}
                                    placeholder="input-text"
                                    id="input-text">
                                <label for="input-text">Año de publicación</label>

                                @if($errors->first('año_p'))
                                    <div class="invalid-feedback">
                                        <i>{{ $errors->first('año_p') }}</i>
                                    </div>
                                @endif

                            </div>
                            <!-- Input Text End -->

                            <!-- Input Text -->
                            <div class="form-floating my-2">
                                <input
                                    @class(['form-control'=> !$errors->first('edicion'), 'form-control is-invalid' => $errors->first('edicion')])
                                    autocomplete="off"
                                    type="text"
                                    value="{{$consulta->edicion}}"
                                    name="edicion" {{-- <-- Nombre del Campo --}}
                                    placeholder="input-text"
                                    id="input-text">
                                <label for="input-text">Edición</label>

                                @if($errors->first('edicion'))
                                    <div class="invalid-feedback">
                                        <i>{{ $errors->first('edicion') }}</i>
                                    </div>
                                @endif

                            </div>
                            <!-- Input Text End -->

                            <!-- Input Text -->
                            <div class="form-floating my-2">
                                <input
                                    @class(['form-control'=> !$errors->first('paginacion'), 'form-control is-invalid' => $errors->first('paginacion')])
                                    autocomplete="off"
                                    type="text"
                                    value="{{$consulta->paginacion}}"
                                    name="paginacion" {{-- <-- Nombre del Campo --}}
                                    placeholder="input-text"
                                    id="input-text">
                                <label for="input-text">Paginación</label>

                                @if($errors->first('paginacion'))
                                    <div class="invalid-feedback">
                                        <i>{{ $errors->first('paginacion') }}</i>
                                    </div>
                                @endif

                            </div>
                            <!-- Input Text End -->

                            <!-- Input Text -->
                            <div class="form-floating my-2">
                                <input
                                    @class(['form-control'=> !$errors->first('isbn'), 'form-control is-invalid' => $errors->first('isbn')])
                                    autocomplete="off"
                                    type="text"
                                    value="{{$consulta->isbn}}"
                                    name="isbn" {{-- <-- Nombre del Campo --}}
                                    placeholder="input-text"
                                    id="input-text">
                                <label for="input-text">ISBN</label>

                                @if($errors->first('isbn'))
                                    <div class="invalid-feedback">
                                        <i>{{ $errors->first('isbn') }}</i>
                                    </div>
                                @endif

                            </div>
                            <!-- Input Text End -->

                            <!-- Input Text -->
                            <div class="form-floating my-2">
                                <input
                                    @class(['form-control'=> !$errors->first('notas'), 'form-control is-invalid' => $errors->first('notas')])
                                    autocomplete="off"
                                    type="text"
                                    value="{{$consulta->notas}}"
                                    name="notas" {{-- <-- Nombre del Campo --}}
                                    placeholder="input-text"
                                    id="input-text">
                                <label for="input-text">Notas</label>

                                @if($errors->first('notas'))
                                    <div class="invalid-feedback">
                                        <i>{{ $errors->first('notas') }}</i>
                                    </div>
                                @endif

                            </div>
                            <!-- Input Text End -->

                            <!-- Input Text -->
                            <div class="form-floating my-2">
                                <input
                                    @class(['form-control'=> !$errors->first('titulo_v'), 'form-control is-invalid' => $errors->first('titulo_v')])
                                    autocomplete="off"
                                    type="text"
                                    value="{{$consulta->titulo_v}}"
                                    name="titulo_v" {{-- <-- Nombre del Campo --}}
                                    placeholder="input-text"
                                    id="input-text">
                                <label for="input-text">Título variable</label>

                                @if($errors->first('titulo_v'))
                                    <div class="invalid-feedback">
                                        <i>{{ $errors->first('titulo_v') }}</i>
                                    </div>
                                @endif

                            </div>
                            <!-- Input Text End -->

                            <!-- Input Text -->
                            <div class="form-floating my-2">
                                <input
                                    @class(['form-control'=> !$errors->first('serie'), 'form-control is-invalid' => $errors->first('serie')])
                                    autocomplete="off"
                                    type="text"
                                    value="{{$consulta->serie}}"
                                    name="serie" {{-- <-- Nombre del Campo --}}
                                    placeholder="input-text"
                                    id="input-text">
                                <label for="input-text">Serie</label>
                                @if($errors->first('serie'))
                                    <div class="invalid-feedback">
                                        <i>{{ $errors->first('serie') }}</i>
                                    </div>
                                @endif

                            </div>
                            <!-- Input Text End -->

                            <!-- Input Select -->
                            <div class="form-floating my-2">
                                <select name="idca" id="idca" class="form-select form-control" autocomplete="off">
                                <option value="{{$consulta->idca}}" selected hidden>{{$consulta->carre}}</option>
                                    @foreach($carreras as $c)
                                        <option value="{{$c->idca}}">{{$c->nombre}}</option>
                                    @endforeach
                                </select>
                                <label for="input-text">Seleccione una carrera</label>

                                @if($errors->first('idca'))
                                    <div class="invalid-feedback">
                                        <i>{{ $errors->first('idca') }}</i>
                                    </div>
                                @endif
                            </div>
                            <!-- Input Select End -->

                            <!-- Input Select -->
                            <div class="form-floating my-2">
                                <select name="id_e" id="idca" class="form-select form-control" autocomplete="off">
                                <option value="{{$consulta->id_e}}" selected hidden>{{$consulta->edi}}</option>
                                    @foreach($editoriales as $c)
                                        <option value="{{$c->id_e}}">{{$c->nombre_e}}</option>
                                    @endforeach
                                </select>
                                <label for="input-text">Seleccione un editorial</label>

                                @if($errors->first('id_e'))
                                    <div class="invalid-feedback">
                                        <i>{{ $errors->first('id_e') }}</i>
                                    </div>
                                @endif
                            </div>
                            <!-- Input Select End -->

                            <!-- Input Select -->
                            <div class="form-floating my-2">
                                <select name="id_a" id="id_a" class="form-select form-control" autocomplete="off">
                                    <option value="{{$consulta->id_a}}" selected hidden>{{$consulta->aut}}</option>
                                    @foreach($autores as $c)
                                        <option value="{{$c->id_a}}">{{$c->nombre_a}}</option>
                                    @endforeach
                                </select>
                                <label for="input-text">Seleccione carrera</label>

                                @if($errors->first('id_a'))
                                    <div class="invalid-feedback">
                                        <i>{{ $errors->first('id_a') }}</i>
                                    </div>
                                @endif
                            </div>
                            <!-- Input Select End -->

                            <!-- Input Select -->
                            <div class="form-floating my-2">
                                <select name="id_t" id="id_t" class="form-select form-control" autocomplete="off">
                                <option value="{{$consulta->id_t}}" selected hidden>{{$consulta->tem}}</option>
                                    @foreach($temas as $c)
                                        <option value="{{$c->id_t}}">{{$c->nombre_t}}</option>
                                    @endforeach
                                </select>
                                <label for="input-text">Seleccione tema</label>

                                @if($errors->first('id_t'))
                                    <div class="invalid-feedback">
                                        <i>{{ $errors->first('id_t') }}</i>
                                    </div>
                                @endif
                            </div>
                            <!-- Input Select End -->

                            <!-- Input Text -->
                            <div class="form-floating my-2">
                                <input
                                    @class(['form-control'=> !$errors->first('ubicacion'), 'form-control is-invalid' => $errors->first('ubicacion')])
                                    autocomplete="off"
                                    type="text"
                                    value="{{$consulta->ubicacion}}"
                                    name="ubicacion" {{-- <-- Nombre del Campo --}}
                                    placeholder="input-text"
                                    id="input-text">
                                <label for="input-text">Ubicacion</label>

                                @if($errors->first('ubicacion'))
                                    <div class="invalid-feedback">
                                        <i>{{ $errors->first('ubicacion') }}</i>
                                    </div>
                                @endif
                            </div>
                            <!-- Input Text End -->

                            <!-- Input Text -->
                            <div class="form-floating my-2">
                                <input
                                    @class(['form-control'=> !$errors->first('clasificacion'), 'form-control is-invalid' => $errors->first('clasificacion')])
                                    autocomplete="off"
                                    type="text"
                                    value="{{$consulta->clasificacion}}"
                                    name="clasificacion" {{-- <-- Nombre del Campo --}}
                                    placeholder="input-text"
                                    id="input-text">
                                <label for="input-text">Clasificacion</label>

                                @if($errors->first('clasificacion'))
                                    <div class="invalid-feedback">
                                        <i>{{ $errors->first('clasificacion') }}</i>
                                    </div>
                                @endif
                            </div>
                            <!-- Input Text End -->

                            <!-- Input select -->
                            <div class="form-floating my-2">
                                <select name="status" id="role_select" class="form-select form-control" autocomplete="off" value="{{ old( 'status' ) }}" placeholder="Cargo">
                                    <option value="{{ $consulta->status }}" selected hidden>{{ $consulta->status }}</option>
                                    <option value="Disponible">Disponible</option>
                                    <option value="Prestado">Prestado</option>
                                </select>
                                <label for="input-text">Status</label>

                                @if($errors->first('status'))
                                    <div class="invalid-feedback">
                                        <i>{{ $errors->first('status') }}</i>
                                    </div>
                                @endif
                            </div>
                            <!-- Input select End -->

                            <!-- Input Radios -->

                            <div class="form-check my-2">
                                <div class="row items-center justify-content-center">
                                    <h3 class="text-start  fs-6">Activo</h3>
                                    <!-- Input Radio -->
                                    <div class="col-6 d-md-flex justify-content-center">
                                        <div>
                                            <input class="form-check-input mx-auto" name="activo"{{-- <-- Nombre del Campo --}} type="radio" id="opcion-1" value="1" required  @if($consulta->activo) checked @endif>
                                            <label class="form-check-label ms-1" for="opcion-1"> Si</label>
                                        </div>
                                    </div>
                                    <!-- Input Radio End -->

                                    <!-- Input Radio -->
                                    <div class="col-6 d-md-flex justify-content-center">
                                        <div>
                                            <input class="form-check-input mx-auto" name="activo"{{-- <-- Nombre del Campo --}} type="radio" id="opcion-2" value="0" required @if(!$consulta->activo) checked @endif>
                                            <label class="form-check-label ms-1" for="opcion-2"> No </label>
                                        </div>
                                    </div>
                                    <!-- Input Radio End -->

                                </div>
                            </div>
                            {{-- Input TextArea --}}

                            {{-- Input TextArea End --}}
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
                    <a title="Regresar" href="{{ route('libros.index') }}" class="text-end fs-6 text-secundario"><img src="{{ asset('img/regresa.jpg')}}" width="30" height="30"></a>
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
