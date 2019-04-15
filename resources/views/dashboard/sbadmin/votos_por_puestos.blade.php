@extends('../../layout.layout')
@section('titulo','VOTOS POR MESAS')
@section('content')
<div class="col-md-9">
   
   
    <p>Listado de votación por mesas </p>
        <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>                 
                    <th scope="col">PUESTO DE VOTOS</th>                    
                    <th scope="col">CANTIDAD DE VOTOS</th>                   
                  </tr>
                </thead>
                <tbody>
                    @foreach ($voto_por_puesto as $puesto)
                        <tr>
                            <th scope="row">{{$loop->index+1}}</th>                           
                            <td>{{$puesto->nombre_puesto}}</td>                           
                            <td>{{$puesto->cantidad}}</td>                           
                          </tr>
                    @endforeach
                  
                  
                </tbody>
              </table>
     
</div>

     
      @endsection