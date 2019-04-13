@extends('../../../layout.layout')
@section('titulo','RESTABLECER CONTRASEÑA')
@section('content')
<div class="col-6">
<p>Para restablecer la contraseña de un usuario, por favor ingresar su número de documento y le será enviado al correo la nueva contraseña</p>
<form class="form-inline" action="cambiar_password/" method="POST"> 
    @csrf  
    <div class="form-group mx-sm-6 mb-2">      
      <input type="text" name="documento" class="form-control" id="inputPassword2" placeholder="Ingresar Documento">
    </div>
    <button type="submit" class="btn btn-primary mb-2 ml-2">Enviar</button>
  </form>
  @if(session()->has('msjpass'))
  <div class="alert alert-primary" role="alert">
   {{ session('msjpass') }}
  </div>
  @endif
  {!! $errors->first('mensaje','<small class="text-danger">:message</small>')!!}
 
</div>

@endsection