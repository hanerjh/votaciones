@extends('../../layout.layout')
@section('titulo','Actualizar usuario')
@section('content')



<div class="col-md-8">

<form action="/usuario/{{$usuario->idpersona}}/" method="POST" >
  <!--metodo para actualizar informacion-->
    @method('PUT')
    @csrf
  <div class="form-row">
      <div class="col-12 ">
          <legend class="text-light bg-dark px-2">Informacion personal</legend>
       </div>
       <div class="form-group col-md-3">
          <label for="inputEmail4">Tipo de usuario</label>
          <select id="tpusuario"  name="tpusuario" class="form-control" data-tpusu="{{$usuario->fktipousuario}}" value="">
              <option>Selecciones</option>
              <option value="1">Amigo</option>
              <option value="2">Lider</option>
            </select>
       </div>
      <div class="form-group col-md-3">
          <label for="inputEmail4">* Documento</label>
          
      <input type="text" name="documento" class="form-control" value="{{$usuario->documento}}" placeholder="Cedula">
            @if($errors->has('documento'))         
               <small class="text-danger">{{$errors->first('documento')}} </small>  
            @endif
           
        </div>

      <div class="form-group col-md-3">
        <label for="inputEmail4">* Nombre</label>
        <input type="text"  name="nombre" class="form-control"  placeholder="Ingresar nombre"  value="{{$usuario->nombre}}">
        @if($errors->has('nombre'))         
          <small class="text-danger">{{$errors->first('nombre')}}</small>  
        @endif
      </div>
      <div class="form-group col-md-3">
        <label for="inputPassword4">* Apellido</label>
        <input type="text"  name="apellido" class="form-control" id="inputPassword4" placeholder="Ingresar Apellido" value="{{$usuario->apellido}}">
        @if($errors->has('apellido'))         
        <small class="text-danger">{{$errors->first('apellido')}}</small>  
      @endif
      </div>
    </div>

<div class="form-row">
    <div class="form-group col-md-4">
        <label for="inputEmail4">Fecha de Nacimiento</label>
        <input type="date"  name="fechaNacimiento" class="form-control" value="{{$usuario->fechaNacimiento}}" placeholder="Fecha de nacimierto">
      </div>

      <div class="form-group col-md-8">
          <label for="inputEmail4">Genero</label>
          <select id="genero"  name="genero" class="form-control" data-id="{{$usuario->sexo}}" value="">
              <option>Selecciones</option>
              <option value="Hombre">Hombre</option>
              <option value="Mujer">Mujer</option>
            </select>
        </div>

  <div class="form-group col-md-7">
    <label for="inputEmail4">Email</label>
    <input type="email"  name="email" class="form-control" id="inputEmail4" placeholder="Email" value="{{$usuario->correo}}">
    @if($errors->has('email'))         
          <small class="text-danger">{{$errors->first('email')}}</small>  
        @endif
  </div>
  <div class="form-group col-md-5">
    <label for="inputPassword4">* Telefono/Celular</label>
    <input type="text"  name="telefono" class="form-control" id="inputPassword4" placeholder="telefono" value="{{$usuario->telefono}}">
    @if($errors->has('telefono'))         
          <small class="text-danger">{{$errors->first('telefono')}}</small>  
        @endif
  </div>


<div class="form-row">

  <div class="form-group col-md-4">
    <label for="inputState">Departamento</label>
  <select id="departamento"  name="departamento" data-dpt="{{ $usuario->departamentos_coddepartamentos}}" class="form-control" v-on:change="cargarMunicipioPersona($event)">
        <option selected>Seleccione...</option>
      @foreach ($departamentos as $departamento)      
    <option value="{{$departamento->coddepartamentos }}">{{ $departamento->departamento }}</option>
      @endforeach
      
    </select>
  </div>

    <div class="form-group col-md-4">
        <label for="inputState">Municipio</label>
        <select id="municipio"  name="municipio" data-codmuni="{{$usuario->codmunicipio }}"  data-muni="{{$usuario->municipio }}" class="form-control" v-on:change="cargarcomunasPersona($event)">
          <option selected>Seleccione...</option>
          <option v-for="mpersona in municipiosPersona" :value="mpersona.codmunicipio">@{{mpersona.municipio}}</option>
        </select>
      </div>


      <div class="form-group col-md-4">
        <label for="inputAddress">Barrio</label>
        <!--<input type="text"  class="form-control" id="inputAddress" v-model="inputbarrio"  placeholder="Cascajal, Transformacion...">-->
      <input type="hidden" id="hiddenbarrio"  data-barrioid="{{$usuario->idbarrio}}" name="barrio"  class="form-control" id="inputAddress" :value="idbarrio" v-on:keyup="">
      
        <component-list id="barriocomponet" data-barrio="{{$usuario->barrio}}" v-bind:lists="lista[1]" v-bind:input="inputbarrio"  v-on:itemidbarrio="idbarrio=$event"  v-on:itemidcomuna="idcomuna=$event"></component-list>
       <!-- @{{idbarrio}} - @{{idcomuna}}-->
        </div>

      <div class="form-group col-md-5">
        <label for="inputState">Comuna</label>
      <select id="comuna"  name="comuna" data-comunaid="{{$usuario->idcomuna}}" data-comuna="{{$usuario->comuna}}" class="form-control" v-model="idcomuna">
          <option value="">Seleccione...</option>
        <option v-for="comuna in lista[0]"  v-bind:value="comuna.idcomuna">@{{comuna.comuna}}</option>
        </select>
      </div>

 

  <div class="form-group col-md-7">
    <label for="inputAddress2">* Direccion</label>
    <input type="text" name="direccion" class="form-control" id="inputAddress2" placeholder="1234 Main St" value="{{$usuario->direccion}}">
    @if($errors->has('direccion'))         
    <small class="text-danger">{{$errors->first('direccion')}}</small>  
  @endif
  </div>
</div>



 
<div class="form-row">
   <div class="col-12 ">
      <legend class="text-light bg-dark px-2">*Informacion de Lugar de votacion</legend>
   </div>
    
    <div class="form-group col-md-4">
        <label for="inputState">Region</label>
        <select id="inputState" name="region"  class="form-control" v-on:Change="onChangeregion($event)"  v-model="selectedregion">          
          <option selected>Seleccione...</option>
          @foreach ($regiones as $region)
        <option value="{{$region->idregiones}}">{{$region->region}}</option>
          @endforeach          
        </select>
        @if($errors->has('region'))         
    <small class="text-danger">{{$errors->first('region')}}</small>  
  @endif
      </div>
  <div class="form-group col-md-4">
    <label for="inputState">*Departamento</label>
    <select id="inputState" name="departamento_votacion"  class="form-control" v-on:Change="onChange($event)" v-model="itemlist" >
      <option selected>Seleccione...</option>
     
    <option v-for="departamento in departamentos" :value="departamento.coddepartamentos">@{{departamento.departamento}}</option>
       
    </select>
    @if($errors->has('departamento_votacion'))         
    <small class="text-danger">{{$errors->first('departamento_votacion')}}</small>  
  @endif
  </div>

  <div class="form-group col-md-4">
      <label for="inputState">*Municipio</label>
      <select id="inputState"  name="municipio_votacion" class="form-control" v-on:Change="cargarPuestosVotacion($event)" v-model="selectedmunicipio">
        <option selected>Seleccione...</option>
      <option v-for="muni in municipios2" :value="muni.codmunicipio">@{{muni.municipio}}</option>         
           
      </select>
      @if($errors->has('municipio_votacion'))         
      <small class="text-danger">{{$errors->first('municipio_votacion')}}</small>  
    @endif
    </div>
   

    <div class="form-group col-md-6">
        <label for="inputState">*Puesto de Votación</label>
        <select id="puesto"  name="puesto" data-puestoid="{{$usuario->idpuesto_votacion}}" data-puesto="{{$usuario->nombre_puesto}}" class="form-control" v-on:Change="cargarmesas($event)" v-model="selectedpuesto">
          <option selected>Seleccione...</option>
          <option v-for="puesto in puestovotaciones" v-bind:value="puesto.idpuesto_votacion">@{{puesto.nombre_puesto}}</option>
        </select>
        @if($errors->has('puesto'))         
        <small class="text-danger">{{$errors->first('puesto')}}</small>  
      @endif
      </div>

      <div class="form-group col-md-2">
          <label for="inputAddress2">*Mesa </label>
            <select id="mesa" name="mesa" data-mesaid="{{$usuario->idmesa}}" data-mesa="{{$usuario->mesa}}" class="form-control">
            <option selected>Seleccione...</option>
            <option v-for="mesa in mesas" v-bind:value="mesa.idmesa">@{{mesa.mesa}}</option>
          </select>

          @if($errors->has('mesa'))         
          <small class="text-danger">{{$errors->first('mesa')}}</small>  
        @endif
        </div>

        
    <div class="form-group col-md-4">
        <label for="inputState">Consultar Mesa Votación</label>
        <a href="https://wsp.registraduria.gov.co/censo/consultar/"  class="btn btn-primary btn-block" target="_blank">Ir a Registraduria</a>
      </div>
     
</div>


<button type="submit" class="btn btn-primary btn-block">Actualizar</button>
</form>

</div>
</div>

<div class="col-md-4">
  @if (session()->has('msj'))
  <div class="alert alert-success" role="alert">
       {{ session('msj')}}
    </div>
  @endif

    @if($errors->any())
    <div class="alert alert-danger" role="alert">
       <h4>Por favor rellenar los campos que hacen falta.</h4>
       <ul>
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
      </ul>
      </div>
  
    @endif
  </div>


@endsection

@section('script')
    <script>
       $( document ).ready(function() {
           var $genero= $("#genero").data('id');
           var $tpusuario= $("#tpusuario").data('tpusu');
           var $dpt= $("#departamento").data('dpt');
           var $muni= $("#municipio").data('muni');
           var $codmuni= $("#municipio").data('codmuni');
           var $barrioid=$("#hiddenbarrio").data('barrioid');
           var $barrio=$("#barriocomponet").data('barrio');
           var $comuna=$("#comuna").data('comuna');
           var $comunaid=$("#comuna").data('comunaid');
           var $puestoid=$("#puesto").data('puestoid');
           var $puesto=$("#puesto").data('puesto');
           var $mesaid=$("#mesa").data('mesaid');
           var $mesa=$("#mesa").data('mesa');

           $("#genero").val($genero);
           $("#tpusuario").val($tpusuario);
           $("#departamento").val($dpt);
           $("#municipio").append("<option value='"+$codmuni+"' selected>"+ $muni +"</option>");
           $("#hiddenbarrio").val($barrioid);
           $("#barriocomponet #inputAddress").val($barrio);
           $("#comuna").append("<option value='"+$comunaid+"' selected>"+ $comuna +"</option>");
           $("#puesto").append("<option value='"+$puestoid+"' selected>"+ $puesto +"</option>");
           $("#mesa").append("<option value='"+$mesaid+"' selected>"+ $mesa +"</option>");

          
        });
    </script>
@endsection