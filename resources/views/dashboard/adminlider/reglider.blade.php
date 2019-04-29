@extends('../../layout.layout')
@section('titulo','ASIGNAR ROLES')
@section('content')
<div class="col-12">
<h1 class="h3 mb-2 text-gray-800">Tables</h1>
<p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>
@php
$lista="[";    
@endphp

@foreach ($tpusuario as $item)
@php
 $lista  = $lista."{value:". "'".$item->idtipousuario."'" .", text:". "'".$item->tipousuario."'"."},";
    
@endphp
@endforeach
@php
    $lista=$lista."]";  
@endphp
{{$lista}}
<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Documento</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Direccion</th>
            <th>Correo</th>
            <th>Telefono</th>
            <th>Tipo Usuario</th>
            <th>Puesto votacion</th>
            <th>Mesa</th>
            <th>editar</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>Documento</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Direccion</th>
            <th>Correo</th>
            <th>Telefono</th>
            <th>Tipo Usuario</th>
            <th>Puesto votacion</th>
            <th>Mesa</th>
            <th>editar</th>
          </tr>
        </tfoot>
        <tbody>
       
            @foreach ($personas as $persona)

                <tr>
                <td   class="iteminput" data-name="documento" data-type="text" data-pk="{{$persona->idpersona}}">
                     {{$persona->documento}}
                </td>
              <td  class="iteminput" data-name="nombre" data-type="text" data-pk="{{$persona->idpersona}}">{{$persona->nombre}}</td>  
                 <td  class="iteminput" data-name="apellido" data-type="text" data-pk="{{$persona->idpersona}}" >{{$persona->apellido}}</td>                 
                 <td  class="iteminput" data-name="direccion"  data-type="text" data-pk="{{$persona->idpersona}}" >{{$persona->direccion}}</td>
                 <td  class="iteminput" data-name="correo" data-type="text" data-pk="{{$persona->idpersona}}" >{{$persona->correo}}</td>
                 <td  class="iteminput" data-name="telefono"  data-type="text" data-pk="{{$persona->idpersona}}" >{{$persona->telefono}}</td>
              <td  class="itemselect" data-name="fktipousuario" data-type="select" data-pk="{{$persona->idpersona}}" data-source="{{$lista}}" data-value="{{$persona->fktipousuario}}" >{{$persona->tipousuario}}</td>
              <td>{{$persona->nombre_puesto}}</td>
              <td>{{$persona->mesa}}</td>
              <td><a class="btn btn-small btn-info" href="/usuario/{{$persona->idpersona }}/edit">Edit</a></td>
            </tr>
                
            @endforeach
         
         
        </tbody>
      </table>
    </div>
  </div>
</div>
</div> 

@endsection