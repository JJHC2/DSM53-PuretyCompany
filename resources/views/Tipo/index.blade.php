@include('layouts.header')

@include('layouts.menu')


@section('header')

@endsection

<head>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />    <!-- CSS only -->
  </head>
<div class="main-panel" id="main-panel">
  <nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
    <div class="container-fluid">
    </div>
  </nav>
  <div class="panel-header panel-header-sm">
  </div>
  <div class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Tipo Usuario</h4>
          </div>
          <div class="d-flex justify-content-end">
            <a class="btn btn-success" href="t_usuario/create"><i class="fa-sharp fa-solid fa-boxes-stacked"></i></a>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped">
                <thead class="text-danger">
                  <th scope="col">ID</th>
                  <th scope="col">Tipo</th>
                  <th>Usuario</th>
                  <th class="text-center">Mostrar</th>
                  <th class="text-center">Eliminar</th>
                  <th class="text-center">Modificar</th>
                </thead>
                <tbody>
                  @foreach($tipos as $tipo)
                  <tr>
                  <td>{{$tipo->id}}</td>
                  <td>{{$tipo->nombre_t}}</td>
                  <td>{{$tipo->nombre_u}}</td>
                  <td><a href="t_usuario/{{ $tipo->id }}" class="btn btn-primary"><i class="fa-solid fa-eye"></i></a></td>
                  <td>
                    <form action="{{ route('t_usuario.destroy', $tipo->id) }}" class="d-inline formulario-eliminar" method="POST">
                      @csrf
                      @method('DELETE')
                      <button class="btn btn-danger m-6"><i class="fa-solid fa-trash"></i></button>
                  </form>
                  </td>
                  <td><a href="t_usuario/{{ $tipo->id }}/edit" class="btn btn-warning"><i class="fa-solid fa-pen"></i></a></td>
                </tr>
                @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
@include('layouts.footer')



{{-- ALERTAS --}}
@if(session('editar') == 'Ok')
<script>
  Swal.fire(
    'Modificado',
    'Usuario Modificado',
    'success'
  )
</script>
@endif

@if(session('agregar') == 'Ok')
<script>
  swal.fire(
    'Agregado!',
    'El usuario a sido agregado.',
    'success'
  )
</script>
@endif


@if(session('eliminar') == 'Ok')
<script>
  Swal.fire(
    'Eliminado',
    'Usuario Eliminado',
    'success'
  )
</script>
@endif
<script>
  $('.formulario-eliminar').submit(function(e) {
    e.preventDefault();
    Swal.fire({
title: '¿Estás seguro?',
text: "No Puedes Revertir Esto!",
icon: 'warning',
showCancelButton: true,
confirmButtonColor: 'green',
cancelButtonColor: 'red',
confirmButtonText: 'Si,Eliminalo!',
cancelButtonText:'Cancelar'
}).then((result) => {
if (result.isConfirmed) {
this.submit();
}else if (
/* Read more about handling dismissals below */
result.dismiss === Swal.DismissReason.cancel
) {
swal.fire(
'Cancelado',
'¿Te Arrepentiste?',
'error'
)
}
})
});
</script>