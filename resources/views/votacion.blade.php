<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Amigos de Hardany - Votaciones</title>
  </head>
  <body>
  

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <img src="customstyle/img/logo.png" class="img-fluid" alt="Responsive image">
            </div>
            <div class="col-md-6 ">
                <br><br>
                    <h1>¿¡Ya votastes!?</h1>
                    <blockquote class="blockquote">
                            <p class="mb-0">Nos gustaría que confirmaras en nuestro sistema, tu voto por nuestro amigo Hardany Cedeño, quien es candidato al concejo de Buenaventura</p>
                     </blockquote>
                                             
                         
                     {!! $errors->first('mensaje','<div class="alert alert-warning" role="alert"><small>:message</small> </div>')!!}

                     @if(session()->has('msjsuccess'))
                        <div class="alert alert-success" role="alert">
                          Muchas gracias amigo(a) <strong>  {{ session('msjsuccess')}} </strong>por confirmar su votación
                         
                          </div>
                     
                     @endif

                <form method="POST" action="{{ route('confirmar_votacion')}}">
                        {{ csrf_field() }}
                <div class="form-group">
                    <label for="exampleInputEmail1">Documento</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="documento" aria-describedby="emailHelp" placeholder="Ingresar documento">
                    <small id="emailHelp" class="form-text text-muted">Ingresa tu numero de documento para confirmar tu votación</small>
                    {!! $errors->first('documento','<small class="text-danger">:message</small>')!!}
                </div>
               <!-- <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>-->
                
                <button type="submit" class="btn btn-success btn-lg btn-block">Confirma tu Votación</button>
                </form>
            </div>
        </div>    
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>