@extends('../../layout.layout')
@section('titulo','REGISTRO DE AMIGO')
@section('content')

<div class="col-8" >
<form action="ingresar/" method="POST" >
    @csrf
  <div class="form-row">
      <div class="col-12 ">
          <legend class="text-light bg-dark px-2">Informacion personal</legend>
       </div>
      <div class="form-group col-md-4">
          <label for="inputEmail4">* Documento</label>
          <input type="text" name="documento" class="form-control" v-model="documento" @blur="onBlur()"  placeholder="Cedula">
        </div>

      <div class="form-group col-md-4">
        <label for="inputEmail4">* Nombre</label>
        <input type="text"  name="nombre" class="form-control"  placeholder="Ingresar nombre">
      </div>
      <div class="form-group col-md-4">
        <label for="inputPassword4">* Apellido</label>
        <input type="text"  name="apellido" class="form-control" id="inputPassword4" placeholder="Ingresar Apellido">
      </div>
    </div>

<div class="form-row">
    <div class="form-group col-md-4">
        <label for="inputEmail4">Fecha de Nacimiento</label>
        <input type="date"  name="fechaNacimiento" class="form-control"  placeholder="Fecha de nacimierto">
      </div>

      <div class="form-group col-md-8">
          <label for="inputEmail4">Genero</label>
          <select id="inputState"  name="genero" class="form-control">
              <option selected>Selecciones</option>
              <option value="Hombre">Hombre</option>
              <option value="Mujer">Mujer</option>
            </select>
        </div>

  <div class="form-group col-md-7">
    <label for="inputEmail4">Email</label>
    <input type="email"  name="email" class="form-control" id="inputEmail4" placeholder="Email">
  </div>
  <div class="form-group col-md-5">
    <label for="inputPassword4">* Telefono/Celular</label>
    <input type="text"  name="telefono" class="form-control" id="inputPassword4" placeholder="telefono">
  </div>


<div class="form-row">

  <div class="form-group col-md-4">
    <label for="inputState">Departamento</label>
    <select id="inputState"  name="departamento" class="form-control" v-on:change="cargarMunicipioPersona($event)">
        <option selected>Seleccione...</option>
      @foreach ($departamentos as $departamento)      
    <option value="{{$departamento->coddepartamentos }}">{{ $departamento->departamento }}</option>
      @endforeach
      
    </select>
  </div>

    <div class="form-group col-md-4">
        <label for="inputState">Municipio</label>
        <select id="inputState"  name="municipio" class="form-control" v-on:change="cargarcomunasPersona($event)">
          <option selected>Seleccione...</option>
          <option v-for="mpersona in municipiosPersona" :value="mpersona.codmunicipio">@{{mpersona.municipio}}</option>
        </select>
      </div>

      <div class="form-group col-md-4">
        <label for="inputState">Comuna</label>
        <select id="inputState"  name="comuna" class="form-control" v-model="idcomuna">
          <option value="">Seleccione...</option>
        <option v-for="comuna in lista[0]"  v-bind:value="comuna.idcomuna">@{{comuna.comuna}}</option>
        </select>
      </div>

  <div class="form-group col-md-5">
  <label for="inputAddress">Barrio</label>
  <!--<input type="text"  class="form-control" id="inputAddress" v-model="inputbarrio"  placeholder="Cascajal, Transformacion...">-->
  <input type="hidden"  name="barrio"  class="form-control" id="inputAddress" :value="idbarrio" v-on:keyup="">

  <component-list v-bind:lists="lista[1]" v-bind:input="inputbarrio"  v-on:itemidbarrio="idbarrio=$event"  v-on:itemidcomuna="idcomuna=$event"></component-list>
  @{{idbarrio}} - @{{idcomuna}}
  </div>

  <div class="form-group col-md-7">
    <label for="inputAddress2">* Direccion</label>
    <input type="text" name="direccion" class="form-control" id="inputAddress2" placeholder="1234 Main St">
  </div>
</div>



 
<div class="form-row">
   <div class="col-12 ">
      <legend class="text-light bg-dark px-2">Informacion de Lugar de votacion</legend>
   </div>
    
    <div class="form-group col-md-4">
        <label for="inputState">Region</label>
        <select id="inputState"   class="form-control" v-on:Change="onChangeregion($event)"  v-model="selectedregion">          
          <option selected>Seleccione...</option>
          @foreach ($regiones as $region)
        <option value="{{$region->idregiones}}">{{$region->region}}</option>
          @endforeach
          
        </select>
      </div>
  <div class="form-group col-md-4">
    <label for="inputState">Departamento</label>
    <select id="inputState"   class="form-control" v-on:Change="onChange($event)" v-model="itemlist" >
      <option selected>Seleccione...</option>
     
    <option v-for="departamento in departamentos" :value="departamento.coddepartamentos">@{{departamento.departamento}}</option>
       
    </select>
  </div>

  <div class="form-group col-md-4">
      <label for="inputState">Municipio</label>
      <select id="inputState"  class="form-control" v-on:Change="cargarPuestosVotacion($event)" v-model="selectedmunicipio">
        <option selected>Seleccione...</option>
      <option v-for="muni in municipios" :value="muni.codmunicipio">@{{muni.municipio}}</option>         
     
      </select>
    </div>


    <div class="form-group col-md-6">
        <label for="inputState">Puesto de Votación</label>
        <select id="inputState"  name="puesto" class="form-control" v-on:Change="cargarmesas($event)" v-model="selectedpuesto">
          <option selected>Seleccione...</option>
          <option v-for="puesto in puestovotaciones" v-bind:value="puesto.idpuesto_votacion">@{{puesto.nombre}}</option>
        </select>
      </div>

      <div class="form-group col-md-2">
          <label for="inputAddress2">Mesa </label>
          <select  name="mesa" class="form-control">
            <option selected>Seleccione...</option>
            <option v-for="mesa in mesas" v-bind:value="mesa.idmesa">@{{mesa.mesa}}</option>
          </select>

          
        </div>

        
    <div class="form-group col-md-4">
        <label for="inputState">Consultar Mesa Votación</label>
        <a href="https://wsp.registraduria.gov.co/censo/consultar/"  class="btn btn-primary btn-block" target="_blank">Ir a Registraduria</a>
      </div>
     
</div>


<button type="submit" class="btn btn-primary btn-block">Registrar</button>
</form>
</div>
dd($municipiosPersona);
@endsection
