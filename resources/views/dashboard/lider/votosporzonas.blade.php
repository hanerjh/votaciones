@extends('../../layout.layoutlider')
@section('titulo','VOTOS POR ZONAS')
@section('content')
<div class="col-md-9">
  @php
  $cantidad=0;
@endphp
   
   
    <p>Listado de votación por zonas </p>
        <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">ZONA DE VOTACÓN</th>
                    <th scope="col">CANTIDAD DE VOTOS</th>                   
                  </tr>
                </thead>
                <tbody>
                    @foreach ($voto_por_zonas as $zona)
                        <tr>
                            <th scope="row">{{$loop->index+1}}</th>
                            <td>{{$zona->zona}}</td>
                            <td>{{$zona->cantidad}}</td>    
                            @php
                            $cantidad+=$zona->cantidad;
                          @endphp                         
                          </tr>
                    @endforeach
                    <tr>
                      <td colspan="2"><b>TOTAL DE VOTOS CONFIRMADOS POR ZONAS</b></td>
                      <td> <b>{{$cantidad}}</b></td>
                    </tr>
                  
                </tbody>
              </table>
     
</div>

     
      @endsection