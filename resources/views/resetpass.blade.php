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
                    <h1 class="h4 text-gray-900 mb-4">Bienvenido, Iniciar session</h1>
                  </div>
  
                          <div id="recuperar_pass">
                              <p>Para restablecer la contraseña de un usuario, por favor ingresar su número de documento y le será enviado al correo la nueva contraseña</p>
                              <form class="user" name="" method="POST" action="/cambiar_passwordinical">
                                    @csrf  
                                  <div class="form-group {{$errors->has('pass') ? 'was-invalidated':''}}">                    
                                    <input type="text" id="documento" name="documento" class="form-control "  placeholder="Ingresar documento">
                                    {!! $errors->first('documento','<small class="text-danger">:message</small>')!!}
                                  </div>
                                  <input type="submit" id="pass" class="btn btn-primary btn-block" value="Restrablecer contraseña">
                                  <a class="small btn btn-success btn-block" id="olvido" href="/inicio">Iniciar session</a>
                                  <br>
                                  <div class="text-center">
                                      @if(session()->has('msjpass'))
                                        <div class="alert alert-primary" role="alert">
                                        {{ session('msjpass') }}
                                        </div>
                                        @endif
                                      {!! $errors->first('mensaje','<small class="text-danger">:message</small>')!!}
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
