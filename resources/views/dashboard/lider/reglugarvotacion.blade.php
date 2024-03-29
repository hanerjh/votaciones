@extends('../../layout.layoutlider')
@section('titulo','REGISTRAR LUGAR DE VOTACIÓN')
@section('content')

<div class="col-8" >
      
<form action="registrarpuestovotacion/" method="POST" >
    <div class="form-row">
            <div class="col-12 ">
                    <legend class="text-light bg-dark px-2">Informacion Registro de puesto de votación</legend>
                 </div>
    @csrf
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
                    <select id="inputState"   class="form-control" v-on:change="cargarMunicipioPersona($event)" >
                      <option selected>Seleccione...</option>
                     
                    <option v-for="departamento in departamentos" :value="departamento.coddepartamentos">@{{departamento.departamento}}</option>
                       
                    </select>
                  </div>

     
      
          <div class="form-group col-md-4">
              <label for="inputState">* Municipio</label>
              <select id="inputState"  name="municipio" class="form-control" v-on:change="cargarcomunasPersona($event)">
                <option selected>Seleccione...</option>
                <option v-for="mpersona in municipiosPersona" :value="mpersona.codmunicipio">@{{mpersona.municipio}}</option>
              </select>
              {!! $errors->first('municipio','<small class="text-danger">:message</small>')!!}
            </div>
      
            <div class="form-group col-md-4">
              <label for="inputState">Comuna</label>
              <select id="inputState"  name="comuna" class="form-control" v-model="idcomuna" v-on:change="cargarBarrios($event)">
                <option value="">Seleccione...</option>
              <option v-for="comuna in lista[0]"  v-bind:value="comuna.idcomuna">@{{comuna.comuna}}</option>
              </select>
              {!! $errors->first('comuna','<small class="text-danger">:message</small>')!!}
            </div>
      
        <div class="form-group col-md-8">
        <label for="inputAddress">Barrio</label>
         <select id="inputState"  name="barrio" class="form-control">
                <option value="">Seleccione...</option>
              <option v-for="barrio in barrios"  v-bind:value="barrio.idbarrio">@{{barrio.barrio}}</option>
        </select>
        </div>
       
        <div class="form-group col-md-4">
          <label for="inputAddress">zonas*</label>
           <select id="inputState"  name="zona" class="form-control">
                  <option value="">Seleccione...</option>
                <option v-for="zona in zonas"  v-bind:value="zona.idzona">@{{zona.zona}}</option>
          </select>
          {!! $errors->first('zona','<small class="text-danger">:message</small>')!!}
          </div>

        <div class="form-group col-md-4">
          <label for="inputAddress2">* puesto de Votacion</label>
          <input type="text" name="lugarvotacion" class="form-control" id="inputAddress2" placeholder="puesto de votacion">
          @if($errors->has('lugarvotacion'))         
            <small class="text-danger">{{$errors->first('lugarvotacion')}}</small>  
          @endif
        </div>
        <div class="form-group col-md-4">
                <label for="inputAddress2">* Dirección</label>
                <input type="text" name="direccion" class="form-control"  placeholder="Direccón">
                @if($errors->has('direccion'))         
                <small class="text-danger">{{$errors->first('direccion')}} </small>  
               @endif
              </div>
          
      </div>
      <button type="submit" class="btn btn-primary btn-block">Registrar</button>
   
    
</form>

</div>

<div class="col-4">
  @if(session()->has('msj'))
  <div class="alert alert-success" role="alert">
   {{ session('msj') }}
  </div>
  @endif
</div>

@endsection