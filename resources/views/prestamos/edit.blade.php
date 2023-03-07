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
                    <h1 class="text-white fw-bold text-uppercase text-center fs-4 mb-2">Modificar Prestamo</h1>
                </div>
            </div>
            <!-- Container Slogan -->

            <!-- Form -->
            <form action="{{ route('prestamos.update',$consulta) }}" class="form" method="POST">
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
                <section id="general-information" class="col-12 col-lg-12">
                    <div class="row justify-content-center">
                        <div class="col-12 col-lg-10">



                            <!-- Input Select -->
                 
                            <!-- Input Select End -->
                            <div class="form-floating my-2">
                            <input @class(['form-control'=> !$errors->first('idu'), 'form-control is-invalid' => $errors->first('idu')])
                                autocomplete="off"
                                type="hidden"
                                value="{{$consulta->idu}}"
                                name="idu" 
                                placeholder="input-text"
                                id="input-text"
                                readonly ='readonly'
                                required>
                                <input @class(['form-control'=> !$errors->first('idu'), 'form-control is-invalid' => $errors->first('idu')])
                                autocomplete="off"
                                type="text"
                                value="{{$consulta->user}} {{$consulta->nombre}} {{$consulta->apellido_paterno}} {{$consulta->apellido_materno}}"
                                name="matricula" 
                                placeholder="input-text"
                                id="input-text"
                                readonly ='readonly'
                                required>
                                <label for="input-text">Matricula usuario</label>
                                @if($errors->first('idu'))
                                <div class="invalid-feedback">
                                    <i>{{ $errors->first('idu') }}</i>
                                </div>
                                @endif

                                

                            </div>
                            <!-- Input Text -->
                            <div class="form-floating my-2">
                                <input @class(['form-control'=> !$errors->first('fecha_p'), 'form-control is-invalid' => $errors->first('fecha_p')])
                                autocomplete="off"
                                type="date"
                                value="{{$consulta->fecha_p}}"
                                name="fecha_p" 
                                placeholder="input-text"
                                id="input-text"
                                required>
                                <label for="input-text">Fecha prestamo</label>

                                @if($errors->first('fecha_p'))
                                <div class="invalid-feedback">
                                    <i>{{ $errors->first('fecha_p') }}</i>
                                </div>
                                @endif

                            </div>

                            <div class="form-floating my-2">
                                <input @class(['form-control'=> !$errors->first('observacion_p'), 'form-control is-invalid' => $errors->first('observacion_p')])
                                autocomplete="off"
                                type="text"
                                value="{{$consulta->observacion_p}}"
                                name="observacion_p" 
                                placeholder="input-text"
                                id="input-text"
                                required>
                                <label for="input-text">Observacion prestamo</label>

                                @if($errors->first('observacion_p'))
                                <div class="invalid-feedback">
                                    <i>{{ $errors->first('observacion_p') }}</i>
                                </div>
                                @endif

                            </div>


                            <div class="form-floating my-2">
                                <input @class(['form-control'=> !$errors->first('fecha_dev'), 'form-control is-invalid' => $errors->first('fecha_dev')])
                                autocomplete="off"
                                type="date"
                                value="{{$consulta->fecha_dev}}"
                                name="fecha_dev" 
                                placeholder="input-text"
                                id="input-text"
                                >
                                <label for="input-text">Fecha devolucion</label>

                                @if($errors->first('fecha_dev'))
                                <div class="invalid-feedback">
                                    <i>{{ $errors->first('fecha_dev') }}</i>
                                </div>
                                @endif

                            </div>

                            <div class="form-floating my-2">
                                <input @class(['form-control'=> !$errors->first('observacion_dev'), 'form-control is-invalid' => $errors->first('observacion_dev')])
                                autocomplete="off"
                                type="text"
                                value="{{$consulta->observacion_dev}}"
                                name="observacion_dev" 
                                placeholder="input-text"
                                id="input-text"
                                required>
                                <label for="input-text">Observacion devolucion</label>

                                @if($errors->first('observacion_dev'))
                                <div class="invalid-feedback">
                                    <i>{{ $errors->first('observacion_dev') }}</i>
                                </div>
                                @endif

                            </div>

                            <!-- Input Select -->
                            <div class="form-floating my-2">
                                <select name="id_l"  id="role_select" class="form-select form-control" autocomplete="off" value="{{ old( 'id_l' ) }}" placeholder="Carrera">
                                    <option value="{{$consulta->id_l}}" selected>{{$consulta->lib}}</option>
                                    @foreach($libros as $c)
                                    <option value="{{$c->id_l}}">{{$c->titulo}}</option>
                                    @endforeach
                                </select>
                                <label for="input-text">Seleccione libro</label>

                                @if($errors->first('id_l'))
                                <div class="invalid-feedback">
                                    <i>{{ $errors->first('id_l') }}</i>
                                </div>
                                @endif
                            </div>
                            <!-- Input Select End -->

                            <!-- Input Select -->
                            <div class="form-floating my-2">
                                <select name="tipo_p" id="role_select" class="form-select form-control" autocomplete="off" value="{{ old( 'tipo_p' ) }}" placeholder="Cargo" required>
                                    <option value="{{ $consulta->tipo_p }}" selected hidden>{{ $consulta->tipo_p }}</option>
                                    <option value="Interno">Interno</option>
                                    <option value="Domicilio">Domicilio</option>
                                </select>
                                <label for="input-text">Tipo prestamo</label>

                                @if($errors->first('tipo_p'))
                                <div class="invalid-feedback">
                                    <i>{{ $errors->first('tipo_p') }}</i>
                                </div>
                                @endif
                            </div>
                            
                            <div class="form-floating my-2">
                                <select name="status"  id="role_select" class="form-select form-control" autocomplete="off" value="{{ old( 'status' ) }}" placeholder="Cargo" required>
                                    <option value="{{ $consulta->status}}" selected hidden>{{ $consulta->status }}</option>
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

                            <!-- Input Select End -->

                            <!-- Input Select -->
                            <!-- Input Select -->

                            <!-- Input Select End -->
                            <!-- Input Select End -->




                            <!-- Input Radios -->


                            <div class="form-check my-2">
                                <div class="row items-center justify-content-center">
                                    <h3 class="text-start fs-6">Activo</h3>

                                    <!-- Input Radio -->
                                    <div class="col-6 d-md-flex justify-content-center">
                                        <div>
                                            <input class="form-check-input mx-auto" name="activo"  type="radio" id="opcion-1" value="1" required @if($consulta->activo) checked @endif>
                                            <label class="form-check-label ms-1" for="opcion-1"> Si </label>
                                        </div>
                                    </div>
                                    <!-- Input Radio End -->

                                    <!-- Input Radio -->
                                    <div class="col-6 d-md-flex justify-content-center">
                                        <div>
                                            <input class="form-check-input mx-auto" name="activo"  type="radio" id="opcion-2" value="0" required @if(!$consulta->activo) checked @endif>
                                            <label class="form-check-label ms-1" for="opcion-2"> No </label>
                                        </div>
                                    </div>
                                    <!-- Input Radio End -->
                                </div>
                            </div>
                            <!-- Input Radios End -->

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
                    <a title="Regresar" href="{{ route('prestamos.index') }}" class="text-end fs-6 text-secundario"><img src="{{ asset('img/regresa.jpg')}}" width="30" height="30"></a>
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