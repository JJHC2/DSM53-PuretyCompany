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
                        <h4 class="card-title">Editar Ubicacion</h4>
                    </div>
                    <form action="{{ route('ubicacion.update',$ubicacion->id) }}" id="editar" method="POST" enctype="multipart/form-data"> 
                        {!! csrf_field() !!}
                        @method("PATCH")
                        <div class="form-floating mb-3">
                            <input class="form-control" type="text" value="{{$ubicacion->id}}" aria-label="Disabled input example" disabled/>
                            <label for="">ID</label>
                            </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="ciudad" value="{{$ubicacion->ciudad}}"
                                name="ciudad" required>
                            <label for="floatingInput">Ciudad</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="calle" value="{{$ubicacion->calle}}"
                                name="calle" required>
                            <label for="floatingInput">Calle</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="n_ex" value="{{$ubicacion->n_ex}}" name="n_ex"
                                required>
                            <label for="floatingInput">N_Ext</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="n_int" value="{{$ubicacion->n_int}}" name="n_int"
                                required>
                            <label for="floatingInput">N_int</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="colonia" value="{{$ubicacion->colonia}}" name="colonia" required>
                            <label for="floatingInput">Colonia</label>
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-control form-select" aria-label="Default select example" name="estado_id">
                                <option selected>Elige el Estado:</option>
                                @foreach($estados as $estado)
                                    <option value="{{ $estado->id }}" @if($estado->id == $ubicacion->estado_id) selected @endif>{{ $estado->nombre_e }}</option>
                                @endforeach
                            </select>
                                <label for="form-floating mb-3">Estado</label>
                          </div>
                          <div class="form-floating mb-3">
                            <select class="form-control form-select" aria-label="Default select example" name="municipio_id">
                                <option selected>Elige el Municipio:</option>
                                @foreach($municipios as $municipio)
                                    <option value="{{ $municipio->id }}" @if($municipio->id == $ubicacion->municipio_id) selected @endif>{{ $municipio->nombre }}</option>
                                @endforeach
                            </select>
                                <label for="form-floating mb-3">Municipio</label>
                          </div>
                      
                      <div class="form-floating mb-3">
                        <select class="form-control form-select" aria-label="Default select example" name="usuario_id">
                            <option selected>Elige el Usuario:</option>
                            @foreach($usuarios as $usuario)
                                <option value="{{ $usuario->id }}" @if($usuario->id == $ubicacion->usuario_id) selected @endif>{{ $usuario->nombre_u }}</option>
                            @endforeach
                        </select>
                            <label for="form-floating mb-3">Usuario</label>
                      </div>
                      <a class="btn btn-danger m-1"  href="/ubicacion" >Cancelar</a>
                      <button type="submit" class="btn btn-success m-1" value="update">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include("Layouts.footer")             
</div>         




{{-- ALERTA --}}
<script type="text/javascript">
    $('#editar').submit(function(r){
        r.preventDefault();
  Swal.fire({
        title: '¿Estas Seguro?',
  text: "No Puedes Revertir Esto!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonText: 'Si,Modificalo!',
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
  
  {{-- IMAGEN VER --}}
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script>
    $(document).ready(function(e){
      $('#imagen').change(function(){
        let reader=new FileReader();
        reader.onload = (e) => {
          $('#imagenSeleccionada').attr('src', e.target.result);
        }
        reader.readAsDataURL(this.files[0]);
      });
    });
  </script>