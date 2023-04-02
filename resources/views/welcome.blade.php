@include('layouts.header')
@include('layouts.container')

<!DOCTYPE html>
<html>
<head>
	<title>Bienvenido</title>
	<!-- Agrega el enlace para SweetAlert2 -->
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/sweetalert2@9"></link>
</head>
<body>
	<!-- Agrega el código JavaScript para SweetAlert2 -->
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
	<!-- Código JavaScript para mostrar el mensaje de bienvenida -->
	@if(session()->has('bienvenida'))
            <script>
                Swal.fire({
                    icon: 'success',
                    title: '{{ session('bienvenida') }}',
                    showConfirmButton: false,
                    timer: 2000
                })
            </script>
        @endif
</body>
</html>

@include('layouts.footer')
        