@extends('../../layout.layout')
@section('titulo','REGISTRAR MESA')
@section('content')

<div class="col-7" >
      
<form action="/registrarmesa" method="POST" >
    <div class="form-row">
            <div class="col-12 ">
                    <legend class="text-light bg-dark px-2">Informacion Registro de Mesa de votación</legend>
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
              <label for="inputState"> Municipio</label>
              <select id="inputState"   class="form-control" v-on:Change="cargarPuestosVotaciongeneral($event)">
                <option selected>Seleccione...</option>
                <option v-for="mpersona in municipiosPersona" :value="mpersona.codmunicipio">@{{mpersona.municipio}}</option>
              </select>
            </div>
      

            
    <div class="form-group col-md-6">
        <label for="inputState">* Puesto de Votación</label>
        <select id="inputState"  name="puesto" class="form-control" v-on:Change="cargarmesas($event)" v-model="selectedpuesto">
          <option selected>Seleccione...</option>
          <option v-for="puesto in puestovotaciones" v-bind:value="puesto.idpuesto_votacion">@{{puesto.nombre_puesto}}</option>
        </select>
      </div>

         
      
      
      
        <div class="form-group col-md-6">
          <label for="inputAddress2">* Mesa de Votacion</label>
          <input type="text" name="mesa" class="form-control" id="inputAddress2" placeholder="Mesa">
        </div>
       
      </div>
      <button type="submit" class="btn btn-primary btn-block">Registrar</button>
   
    
</form>

</div>

@endsection