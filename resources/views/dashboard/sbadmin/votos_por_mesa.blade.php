@extends('../../layout.layout')
@section('titulo','VOTOS POR MESAS')
@section('content')
<div class="col-md-9">
  @php
  $cantidad=0;
@endphp
   
    <p>Listado de votación por mesas </p>
        <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">ZONA DE VOTACÓN</th>
                    <th scope="col">PUESTO DE VOTOS</th> 
                    <th scope="col">MESA DE VOTOS</th> 
                    <th scope="col">CANTIDAD DE VOTOS</th>                   
                  </tr>
                </thead>
                <tbody>
                    @foreach ($voto_por_mesa as $mesa)
                        <tr>
                            <th scope="row">{{$loop->index+1}}</th>
                            <td>{{$mesa->zona}}</td>
                            <td>{{$mesa->nombre_puesto}}</td> 
                            <td>{{$mesa->mesa}}</td>
                            <td>{{$mesa->cantidad}}</td>  
                            @php
                            $cantidad+=$mesa->cantidad;
                          @endphp                           
                          </tr>
                    @endforeach
                    <tr>
                      <td colspan="4"><b>TOTAL DE VOTOS CONFIRMADOS POR MESAS</b></td>
                      <td> <b>{{$cantidad}}</b></td>
                    </tr>
                  
                </tbody>
              </table>
     
</div>

     
      @endsection