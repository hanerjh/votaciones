@extends('../../layout.layout')

@section('content')


<form>
  <div class="form-row">
      <div class="col-12 ">
          <legend class="text-light bg-dark px-2">Informacion personal</legend>
       </div>
      <div class="form-group col-md-4">
          <label for="inputEmail4">Documento</label>
          <input type="text" class="form-control"  placeholder="Cedula">
        </div>

      <div class="form-group col-md-4">
        <label for="inputEmail4">Nombre</label>
        <input type="text" class="form-control"  placeholder="Ingresar nombre">
      </div>
      <div class="form-group col-md-4">
        <label for="inputPassword4">Apellido</label>
        <input type="text" class="form-control" id="inputPassword4" placeholder="Ingresar Apellido">
      </div>
    </div>

<div class="form-row">
    <div class="form-group col-md-4">
        <label for="inputEmail4">Fecha de Nacimiento</label>
        <input type="date" class="form-control"  placeholder="Fecha de nacimierto">
      </div>

      <div class="form-group col-md-8">
          <label for="inputEmail4">Genero</label>
          <select id="inputState" class="form-control">
              <option selected>Selecciones</option>
              <option value="">Hombre</option>
              <option value="">Mujer</option>
            </select>
        </div>

  <div class="form-group col-md-4">
    <label for="inputEmail4">Email</label>
    <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
  </div>
  <div class="form-group col-md-3">
    <label for="inputPassword4">Telefono</label>
    <input type="text" class="form-control" id="inputPassword4" placeholder="telefono">
  </div>
  <div class="form-group col-md-5">
      <label for="inputPassword4">Celular</label>
      <input type="text" class="form-control" id="inputPassword4" placeholder="Celular">
    </div>
</div>

<div class="form-row">

    <div class="form-group col-md-4">
        <label for="inputState">Ciudad</label>
        <select id="inputState" class="form-control">
          <option selected>Seleccione...</option>
          <option>...</option>
        </select>
      </div>

      <div class="form-group col-md-3">
        <label for="inputState">Comuna</label>
        <select id="inputState" class="form-control">
          <option selected>Seleccione...</option>
          <option>...</option>
        </select>
      </div>

  <div class="form-group col-md-5">
  <label for="inputAddress">Barrio</label>
  <input type="text" class="form-control" id="inputAddress" placeholder="Cascajal, Transformacion...">
  </div>
</div>

<div class="form-group">
  <label for="inputAddress2">Direccion</label>
  <input type="text" class="form-control" id="inputAddress2" placeholder="1234 Main St">
</div>

 
<div class="form-row">
   <div class="col-12 ">
      <legend class="text-light bg-dark px-2">Informacion de Lugar de votacion</legend>
   </div>
    
    <div class="form-group col-md-4">
        <label for="inputState">Region</label>
        <select id="inputState" class="form-control">          
          <option selected>Seleccione...</option>
          @foreach ($regiones as $region)
        <option value="{{$region->idregiones}}">{{$region->region}}</option>
          @endforeach
          
        </select>
      </div>
  <div class="form-group col-md-4">
    <label for="inputState">Departamento</label>
    <select id="inputState" class="form-control">
      <option selected>Seleccione...</option>
      @foreach ($departamentos as $departamento)
      <option value="{{$departamento->coddepartamentos}}">{{$departamento->departamento}}</option>
        @endforeach
    </select>
  </div>
  <div class="form-group col-md-4">
      <label for="inputState">Municipio</label>
      <select id="inputState" class="form-control">
        <option selected>Seleccione...</option>
        <option>...</option>
      </select>
    </div>


    <div class="form-group col-md-6">
        <label for="inputState">Puesto de Votación</label>
        <select id="inputState" class="form-control">
          <option selected>Seleccione...</option>
          <option>...</option>
        </select>
      </div>

      <div class="form-group col-md-2">
          <label for="inputAddress2">Mesa de votacion</label>
          <input type="text" class="form-control" id="inputAddress2" placeholder="Mesa">
        </div>

        
    <div class="form-group col-md-4">
        <label for="inputState">Consultar Mesa Votación</label>
        <a href="https://wsp.registraduria.gov.co/censo/consultar/"  class="btn btn-primary btn-block" target="_blank">Ir a Registraduria</a>
      </div>
     
</div>


<button type="submit" class="btn btn-primary btn-block">Registrar</button>
</form>
    
@endsection
