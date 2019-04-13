@extends('../../layout.layout')
@section('titulo','VOTOS POR ZONAS')
@section('content')
<div class="col-md-9">
   
   
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
                          </tr>
                    @endforeach
                  
                  
                </tbody>
              </table>
     
</div>

     
      @endsection