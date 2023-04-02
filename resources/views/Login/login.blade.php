<!-- Define que el documento esta bajo el estandar de HTML 5 -->
<!doctype html>

<!-- Representa la raíz de un documento HTML o XHTML. Todos los demás elementos deben ser descendientes de este elemento. -->
<html lang="es">
    
    <head>
        
        <meta charset="utf-8">
        
        <title> Formulario de Acceso </title>    
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <meta name="author" content="Videojuegos & Desarrollo">
        <meta name="description" content="Ejemplo de formulario de acceso basado en HTML5 y CSS">
        <meta name="keywords" content="login,formulariode acceso html">
        
        <link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet"> 
        <link rel="stylesheet" href="css/login.css"> 
    </head>
    
    <body>
        @if(Session::has('error'))
        <div class="alert alert-danger">
            {{ Session::get('error') }}
        </div>
    @endif
        <div id="contenedor">
            
            <div id="contenedorcentrado">
                <div id="login">
                    
                    <form action="{{ route('validar') }}" method="GET">
                        {{ csrf_field() }}
                        <label for="usuario" style="color: black">Usuario</label>
                        <input id="email" type="email" name="email" placeholder="Introduce tu correo" value="{{old('email')}}"required>
                        
                        <label for="password" style="color: black">Contraseña</label>
                        <input id="password" type="password" placeholder="Contraseña" name="password" value="{{old('password')}}" required>
                        
                        <button type="submit" title="Ingresar" name="Ingresar">Login</button>
                    </form>
                </div>
                <div id="derecho">
                    <div class="titulo">
                        Bienvenido
                    </div>
                    <hr>
                    <div class="pie-form">
                        <img src="https://wallpaperaccess.com/full/850628.jpg" width="400px" height="150px">
                    </div>
                </div>
        </div>
        
    </body>
</html> 