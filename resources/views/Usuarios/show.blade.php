@include('layouts.header')

@include('layouts.menu')


@section('header')

@endsection

<head>
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
            <h4 class="card-title">Usuarios</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped">
                <thead class=" text-primary">
                  <th scope="col">
                    ID
                  </th>
                  <th scope="col">
                    Nombre
                  </th>
                  <th scope="col">APP</th>
                  <th scope="col">APM</th>
                  <th scope="col">Correo</th>
                  <th scope="col">Imagen_P</th>
                  <th scope="col">Telefono</th>
                </thead>
                <tbody>
                  <tr>
                    @foreach($usuarios as $usuario)
                    <tr>
                    <td>{{$usuario->id}}</td>
                    <td>{{$usuario->nombre}}</td>
                    <td>{{$usuario->app}}</td>
                    <td>{{$usuario->apm}}</td>
                    <td>{{$usuario->email}}</td>
                    <td><img src="card-img-top" src="{{asset()}} " alt="Foto"/></td>
                    <td class="text-right">{{$usuario->telefono}}</td>
                    <div class="row">
                      <a href="/usuarios" class="btn btn-danger m-3">Salir</a>
                                                              </div>
                </tr>
                @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
@include('layouts.footer')