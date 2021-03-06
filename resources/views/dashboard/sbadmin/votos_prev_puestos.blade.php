@extends('../../layout.layout')
@section('titulo','VOTOS POSIBLES POR PUESTOS')
@section('content')
<div class="col-md-9">
   @php
       $cantidad=0;
   @endphp
   
    <p>Listado de votación por puestos </p>
        <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>                 
                    <th scope="col">PUESTO DE VOTACION</th>                    
                    <th scope="col">CANTIDAD DE POSBLES VOTOS</th>                   
                  </tr>
                </thead>
                <tbody>
                    @foreach ($votos_prev as $puesto)
                        <tr>
                            <th scope="row">{{$loop->index+1}}</th>                           
                            <td>{{$puesto->nombre_puesto}}</td>                           
                            <td>{{$puesto->cantidad}}</td> 
                                @php
                                $cantidad+=$puesto->cantidad;
                              @endphp                                                   
                          </tr>
                    @endforeach
                  <tr>
                    <td colspan="2"><b>TOTAL DE VOTOS POSIBLES POR PUESTOS</b></td>
                    <td> <b>{{$cantidad}}</b></td>
                  </tr>
                  
                </tbody>
              </table>
     
</div>

     
      @endsection