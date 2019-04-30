@extends('../../../layout.layoutlider')
@section('titulo','')
@section('content')
<div class="col-6">
<h2>CAMBIA TU CONTRASEÑA</h2>
  <form class="form-inline" action="l_change_password/" method="POST"> 
    @csrf  
    <div class="form-group mx-sm-6 mb-2">      
      <input type="password" name="pass" class="form-control" id="inputPassword2" placeholder="Nueva contraseña">
    </div>
    <button type="submit" class="btn btn-primary mb-2 ml-2">Cambiar</button>
  </form>
  @if(session()->has('msj'))
  <div class="alert alert-primary" role="alert">
   {{ session('msj') }}
  </div>
  @endif
  {!! $errors->first('mensaje','<small class="text-danger">:message</small>')!!}
 
</div>

@endsection