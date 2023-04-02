@include('layouts.header')
@include('layouts.menu')

@section('header')

@endsection

<head>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<div class="main-panel" id="main-panel">
    <nav class="navbar navbar-expand-lg navbar-transparent bg-primary navbar-absolute">
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
                        <h4 class="card-title">Alta Ubicacion</h4>
                    </div>
                    <form action="{{ url('ubicacion')}}" method="post" id="agregar" enctype="multipart/form-data">
                      {!! csrf_field() !!}
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="ciudad" placeholder="Ejemplo: Lerma"
                                name="ciudad" required>
                            <label for="floatingInput">Ciudad</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="calle" placeholder="Ejemplo: Solidaridad"
                                name="calle" required>
                            <label for="floatingInput">Calle</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="number" class="form-control" id="n_ex" placeholder="Ejemplo: 120" name="n_ex"
                                required>
                            <label for="floatingInput">N_Ext</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="number" class="form-control" id="n_int" placeholder="Ejemplo: 122" name="n_int"
                                required>
                            <label for="floatingInput">N_int</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="colonia" placeholder="Ejemplo: Guadalupe"name="colonia" required>
                            <label for="floatingInput">Colonia</label>
                        </div>
                        <div class="form-floating mb-3">
                          <select class="form-control form-select" aria-label="Default select example" name="estado_id" id="estado_id">
                              <option selected>Elige el Estado</option>
                              @foreach($estados as $estado)   
                                  <option value="{{$estado->id}}">{{$estado->nombre_e}}</option>
                              @endforeach
                          </select>
                          <label for="estado_id">Estado</label>
                      </div>
                      <div class="form-floating mb-3">
                        <select class="form-control form-select" aria-label="Default select example" name="municipio_id" id="municipio_id">
                            <option selected>Elige el Municipio</option>
                            @foreach($municipios as $municipio)   
                                <option value="{{$municipio->id}}">{{$municipio->nombre}}</option>
                            @endforeach
                        </select>
                        <label for="floatingInput">Municipio</label>
                    </div>
                      <div class="form-floating mb-3">
                        <select class="form-control form-select" aria-label="Default select example" name="usuario_id" id="usuario_id">
                            <option selected>Elige el Usuario</option>
                            @foreach($usuarios as $usuario)   
                                <option value="{{$usuario->id}}">{{$usuario->nombre_u}}</option>
                            @endforeach
                        </select>
                        <label for="floatingInput">Usuario</label>
                    </div>
                    <a href="/ubicacion" class="btn btn-danger m-3">Cancelar</a>
                    <button type="submit" class="btn btn-success m-3" value="save">Agregar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@include("Layouts.footer")                      


{{-- ALERTA --}}
<script type="text/javascript">
    $('#agregar').submit(function(r){
        r.preventDefault();
  Swal.fire({
        title: '¿Estas Seguro?',
  text: "No Puedes Revertir Esto!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonText: 'Si,Agregalo!',
  cancelButtonText: 'No, Cancelalo!',
  cancelButtonColor: 'red',
  confirmButtonColor: 'green',
  reverseButtons: true
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
  
  