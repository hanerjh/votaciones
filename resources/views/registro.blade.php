<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin 2 - Login</title>

  <!-- Custom fonts for this template-->
  <link href="customstyle/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="customstyle/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 ">Regístrate </h1>
                    <blockquote class="blockquote">
                      <small class="">Si deseas apoyar esta campaña, por favor registrate y te mantendremos informado de este proceso </small>
               </blockquote>
                  </div>
   <div id="login">
   <form class="user" name="" method="POST" action="{{route('registro')}}" >
          {{ csrf_field() }}

          <div class="form-row">
          
            <div class="form-group col-md-12">               
                <input type="text" name="documento" class="form-control"  placeholder="*Docuemento">
                  @if($errors->has('documento'))         
                     <small class="text-danger">{{$errors->first('documento')}} </small>  
                  @endif
                
              </div>
      
            <div class="form-group col-md-6">         
              <input type="text"  name="nombre" class="form-control"  placeholder="*Nombre"  value="{{old('nombre')}}">
              @if($errors->has('nombre'))         
                <small class="text-danger">{{$errors->first('nombre')}}</small>  
              @endif
            </div>

            <div class="form-group col-md-6">              
              <input type="text"  name="apellido" class="form-control" id="inputPassword4" placeholder="*Apellido" value="{{old('apellido')}}">
              @if($errors->has('apellido'))         
              <small class="text-danger">{{$errors->first('apellido')}}</small>  
            @endif
            </div>

            <div class="form-group col-md-5">         
              <input type="text"  name="telefono" class="form-control"  placeholder="*Telefono"  value="{{old('telefono')}}">
              @if($errors->has('telefono'))         
                <small class="text-danger">{{$errors->first('telefono')}}</small>  
              @endif
            </div>

            <div class="form-group col-md-7">              
              <input type="email"  name="email" class="form-control" id="inputPassword4" placeholder="*Correo" value="{{old('email')}}">
              @if($errors->has('email'))         
              <small class="text-danger">{{$errors->first('email')}}</small>  
            @endif
            </div>

            <div class="form-group col-md-12">               
              <input type="text" name="direccion" class="form-control"  placeholder="Dirección">
                @if($errors->has('direccion'))         
                   <small class="text-danger">{{$errors->first('direccion')}} </small>  
                @endif
              
            </div>
          </div>
          <input type="submit" class="btn btn-primary btn-block" value="Registrarse">
          <a class="small btn btn-success btn-block" id="olvido" href="/inicio">Iniciar session</a>
          <br>
          <div class="text-center">
              @if(session()->has('msg'))
              <div class="alert alert-primary" role="alert">
               {{ session('msg') }}
              </div>
              @endif
              {!! $errors->first('msj','<small class="text-danger">:message</small>')!!}
            </div>
          <hr>  
        </form>
   </div>

 
                  
                 
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="customstyle/vendor/jquery/jquery.min.js"></script>
  <script src="customstyle/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="customstyle/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="customstyle/js/sb-admin-2.min.js"></script>


  

</body>

</html>
