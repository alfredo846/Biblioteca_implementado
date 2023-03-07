<!DOCTYPE html>
<html lang="es">

<!-- Head -->
@include('layouts.head')

<body>
    <header>
        <!-- Navbar -->
        @include('layouts.navbar')
    </header>

    <!-- SideBar -->

    @include('layouts.sidebar')


    <main class="p-0 border bg-white rounded shadow-lg principal-container">
        <!-- Contenido de la Página -->
        @yield('content')
    </main>

    <script src="{{ asset('js/bootstrap/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

       @if (session('password') == 'ok')
        <script>
             Swal.fire({
                position: 'top-end',
                icon: 'success',
                text: 'La contraseña ha sido actualizada exitosamente.',
                showConfirmButton: true,
                timer: 3000
            })
        </script>
      @endif

      @if (session('foto') == 'ok')
        <script>
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                text: 'La fotografía ha sido actualizada exitosamente.',
                showConfirmButton: true,
                timer: 3000
            })
        </script>
    @endif

      @if (session('passwordincorrecto') == 'ok')
        <script>
            Swal.fire({
                position: 'top-end',
                icon: 'error',
                text: '¡ Los campos contraseña y confirmación de contraseña no coinciden !',
                showConfirmButton: true,
                timer: 3500
            })
        </script>
      @endif

      @if (session('fotoincorrecto') == 'ok')
        <script>
            Swal.fire({
                position: 'top-end',
                icon: 'error',
                text: '¡ La fotografía no debe exceder los 2 Mb y solo acepta imágenes con extensiones jpeg, jpg, png, jfif !',
                showConfirmButton: true,
                timer: 3500
            })
        </script>
    @endif
    
    @yield('scripts')
</body>

</html>
