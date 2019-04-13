@extends('../../layout.layout')
@section('titulo','VOTOS POR ZONAS')
@section('content')
<div class="col-md-9">
   
   
    <p>Listado de usuarios regitrados por la paginas web </p>
        <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Usuario</th>
                    <th scope="col">Telefono</th>                   
                  </tr>
                </thead>
                <tbody>
                    @foreach ($registroweb as $usuario)
                        <tr>
                            <th scope="row">{{$loop->index+1}}</th>
                            <td> {{ $usuario->nombre }} {{ $usuario->apellido }}</td>
                            <td>{{$usuario->telefono}}</td>                            
                          </tr>
                    @endforeach
                  
                  
                </tbody>
              </table>
     
</div>

     
      @endsection