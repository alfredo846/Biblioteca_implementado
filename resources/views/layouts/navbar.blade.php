<nav class="navbar navbar-expand-lg navbar-dark p-1 fixed-top" id="navbar">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('index') }}">
            <img src="{{ asset('img/logo.svg') }}" alt="logo" width="30" height="24"
                class="d-inline-block align-text-top">
            <span class="d-none text-white">Universidad Politectnica Metropolitana de Puebla</span>
            <span class="text-white">UPMP</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 text-center">
                <li class="nav-item dropdown">
                    @auth
                        <a class="nav-link dropdown-toggle p-0 px-2 h-100 w-100" href="#" id="userData"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                             <img src="{{ asset('fotos/' . Auth::user()->foto) }}" alt="user-image" class="rounded-pill"
                                width="40px" height="40px">
                            {{ Auth::user()->nombre . ' ' . Auth::user()->apellido_paterno . ' ' . Auth::user()->apellido_materno }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="userData">
                            <li>
                                <a href="{{ route('perfil') }}" class="btn d-block btn-light w-100">
                                    Ver mí Perfil
                                </a>
                            </li>
                            <li>
                                <button type="button" class="btn d-block btn-light w-100" data-bs-toggle="modal"
                                    data-bs-target="#editPassword">
                                    Cambiar Contraseña
                                </button>
                            </li>
                            <li>
                                <button type="button" class="btn d-block btn-light w-100" data-bs-toggle="modal"
                                    data-bs-target="#editPhoto">
                                    Cambiar Foto
                                </button>
                            <li>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    @method('POST')
                                    <button type="submit" class="btn d-block btn-light w-100">Cerrar Sesion</button>
                                </form>
                            </li>
                        </ul>
                    @endauth
                </li>
                <li class="nav-item d-lg-none">



                    <div class="row justify-content-center">
                        <a class="sidebar-link catalogos2-link py-2" data-bs-toggle="collapse" href="#catalogos2"
                            role="button" aria-expanded="true" aria-controls="catalogos2">

                            <div class="w-100 h-100 d-flex justify-content-between">

                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22"
                                        fill="currentColor" class="bi bi-bookmark-star" viewBox="0 0 16 16">
                                        <path
                                            d="M7.84 4.1a.178.178 0 0 1 .32 0l.634 1.285a.178.178 0 0 0 .134.098l1.42.206c.145.021.204.2.098.303L9.42 6.993a.178.178 0 0 0-.051.158l.242 1.414a.178.178 0 0 1-.258.187l-1.27-.668a.178.178 0 0 0-.165 0l-1.27.668a.178.178 0 0 1-.257-.187l.242-1.414a.178.178 0 0 0-.05-.158l-1.03-1.001a.178.178 0 0 1 .098-.303l1.42-.206a.178.178 0 0 0 .134-.098L7.84 4.1z" />
                                        <path
                                            d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5V2zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1H4z" />
                                    </svg>
                                    Catálogos
                                </span>
                                <div id="inactive-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-caret-right-fill" viewBox="0 0 16 16">
                                        <path
                                            d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z" />
                                    </svg>
                                </div>
                                <div class="d-none" id="active-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z" />
                                    </svg>
                                </div>
                            </div>
                        </a>
                        <div class="collapse collapse-catalogos2" id="catalogos2">








                            <div class="">
                                <a href="{{ route('libros.index') }}" class="sidebar-link py-2">
                                    <div class="col-11">
                                        <div class="row w-100 align-items-center mx-auto justify-content-center">
                                            <div class="col-4 p-0 text-end">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                    fill="currentColor" class="bi bi-bookmarks-fill"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M2 4a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v11.5a.5.5 0 0 1-.777.416L7 13.101l-4.223 2.815A.5.5 0 0 1 2 15.5V4z" />
                                                    <path
                                                        d="M4.268 1A2 2 0 0 1 6 0h6a2 2 0 0 1 2 2v11.5a.5.5 0 0 1-.777.416L13 13.768V2a1 1 0 0 0-1-1H4.268z" />
                                                </svg>
                                            </div>
                                            <div class="col-8 ps-0">
                                                <span>Libros</span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <div class="">
                                <a href="{{ route('autores.index') }}" class="sidebar-link py-2">
                                    <div class="col-11">
                                        <div class="row w-100 align-items-center mx-auto justify-content-center">
                                            <div class="col-4 p-0 text-end">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                    fill="currentColor" class="bi bi-bookmarks-fill"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M2 4a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v11.5a.5.5 0 0 1-.777.416L7 13.101l-4.223 2.815A.5.5 0 0 1 2 15.5V4z" />
                                                    <path
                                                        d="M4.268 1A2 2 0 0 1 6 0h6a2 2 0 0 1 2 2v11.5a.5.5 0 0 1-.777.416L13 13.768V2a1 1 0 0 0-1-1H4.268z" />
                                                </svg>
                                            </div>
                                            <div class="col-8 ps-0">
                                                <span>Autores</span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <div class="">
                                <a href="{{ route('editoriales.index') }}" class="sidebar-link py-2">
                                    <div class="col-11">
                                        <div class="row w-100 align-items-center mx-auto justify-content-center">
                                            <div class="col-4 p-0 text-end">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                    fill="currentColor" class="bi bi-bookmarks-fill"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M2 4a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v11.5a.5.5 0 0 1-.777.416L7 13.101l-4.223 2.815A.5.5 0 0 1 2 15.5V4z" />
                                                    <path
                                                        d="M4.268 1A2 2 0 0 1 6 0h6a2 2 0 0 1 2 2v11.5a.5.5 0 0 1-.777.416L13 13.768V2a1 1 0 0 0-1-1H4.268z" />
                                                </svg>
                                            </div>
                                            <div class="col-8 ps-0">
                                                <span>Editoriales</span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <div class="">
                                <a href="{{ route('temas.index') }}" class="sidebar-link py-2">
                                    <div class="col-11">
                                        <div class="row w-100 align-items-center mx-auto justify-content-center">
                                            <div class="col-4 p-0 text-end">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                    fill="currentColor" class="bi bi-bookmarks-fill"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M2 4a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v11.5a.5.5 0 0 1-.777.416L7 13.101l-4.223 2.815A.5.5 0 0 1 2 15.5V4z" />
                                                    <path
                                                        d="M4.268 1A2 2 0 0 1 6 0h6a2 2 0 0 1 2 2v11.5a.5.5 0 0 1-.777.416L13 13.768V2a1 1 0 0 0-1-1H4.268z" />
                                                </svg>
                                            </div>
                                            <div class="col-8 ps-0">
                                                <span>Temas</span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>

                        </div>
                    </div>


                    <div class="row justify-content-center">
                        <a class="sidebar-link reportes2-link py-2" data-bs-toggle="collapse" href="#reportes2"
                            role="button" aria-expanded="true" aria-controls="reportes2">

                            <div class="w-100 h-100 d-flex justify-content-between">

                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22"
                                        fill="currentColor" class="bi bi-bookmark-star" viewBox="0 0 16 16">
                                        <path
                                            d="M7.84 4.1a.178.178 0 0 1 .32 0l.634 1.285a.178.178 0 0 0 .134.098l1.42.206c.145.021.204.2.098.303L9.42 6.993a.178.178 0 0 0-.051.158l.242 1.414a.178.178 0 0 1-.258.187l-1.27-.668a.178.178 0 0 0-.165 0l-1.27.668a.178.178 0 0 1-.257-.187l.242-1.414a.178.178 0 0 0-.05-.158l-1.03-1.001a.178.178 0 0 1 .098-.303l1.42-.206a.178.178 0 0 0 .134-.098L7.84 4.1z" />
                                        <path
                                            d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5V2zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1H4z" />
                                    </svg>
                                    Reportes
                                </span>
                                <div id="inactive-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-caret-right-fill" viewBox="0 0 16 16">
                                        <path
                                            d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z" />
                                    </svg>
                                </div>
                                <div class="d-none" id="active-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z" />
                                    </svg>
                                </div>
                            </div>
                        </a>


                        <div class="collapse collapse-reportes2" id="reportes2">
                            <div class="">
                                <a href="{{ route('consultaP') }}" class="sidebar-link py-2">
                                    <div class="col-11">
                                        <div class="row w-100 align-items-center mx-auto justify-content-center">
                                            <div class="col-4 p-0 text-end">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    fill="currentColor" class="bi bi-file-earmark-text"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M5.5 7a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zM5 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5z" />
                                                    <path
                                                        d="M9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.5L9.5 0zm0 1v2A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5z" />
                                                </svg>
                                            </div>
                                            <div class="col-8 ps-0">
                                                <span>Prestamos</span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="collapse collapse-reportes2" id="reportes2">
                            <div class="">
                                <a href="{{ route('consultaL') }}" class="sidebar-link py-2">
                                    <div class="col-11">
                                        <div class="row w-100 align-items-center mx-auto justify-content-center">
                                            <div class="col-4 p-0 text-end">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    fill="currentColor" class="bi bi-file-earmark-text"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M5.5 7a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zM5 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5z" />
                                                    <path
                                                        d="M9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.5L9.5 0zm0 1v2A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5z" />
                                                </svg>
                                            </div>
                                            <div class="col-8 ps-0">
                                                <span>Libros</span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>

                    </div>

                    <div class="row justify-content-center">
                        <a class="sidebar-link procesos2-link py-2" data-bs-toggle="collapse" href="#procesos2"
                            role="button" aria-expanded="true" aria-controls="procesos2">

                            <div class="w-100 h-100 d-flex justify-content-between">

                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22"
                                        fill="currentColor" class="bi bi-gear" viewBox="0 0 16 16">
                                        <path
                                            d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z" />
                                        <path
                                            d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z" />
                                    </svg>
                                    Procesos
                                </span>
                                <div id="inactive-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-caret-right-fill" viewBox="0 0 16 16">
                                        <path
                                            d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z" />
                                    </svg>
                                </div>
                                <div class="d-none" id="active-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z" />
                                    </svg>
                                </div>
                            </div>
                        </a>



                        <div class="collapse collapse-procesos2" id="procesos2">

                            <div class="">
                                <a href="{{ route('alumnoB.index') }}" class="sidebar-link py-2">
                                    <div class="col-11">
                                        <div class="row w-100 align-items-center mx-auto justify-content-center">
                                            <div class="col-4 p-0 text-end">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                    fill="currentColor" class="bi bi-journal-text"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M5 10.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z" />
                                                    <path
                                                        d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z" />
                                                    <path
                                                        d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z" />
                                                </svg>
                                            </div>
                                            <div class="col-8 ps-0">
                                                <span>Buscar Libros</span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <div class="">
                                <a href="{{ route('prestamos.index') }}" class="sidebar-link py-2">
                                    <div class="col-11">
                                        <div class="row w-100 align-items-center mx-auto justify-content-center">
                                            <div class="col-4 p-0 text-end">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                    fill="currentColor" class="bi bi-journal-text"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M5 10.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z" />
                                                    <path
                                                        d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z" />
                                                    <path
                                                        d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z" />
                                                </svg>
                                            </div>
                                            <div class="col-8 ps-0">
                                                <span>Prestamos</span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>

                        </div>





                    </div>

                </li>
            </ul>
        </div>
    </div>
</nav>
@include('layouts.partials.change-image')
@include('layouts.partials.change-password')
