@extends('../../layout.layoutlider')
@section('titulo','PUESTOS POR ZONAS')
@section('content')
<div class="col-md-9">

   
    <p>Listado puestos por zonas</p>
        <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>                 
                    <th scope="col">PUESTO DE VOTOS</th>                    
                    <th scope="col">CANTIDAD DE VOTOS</th>                   
                  </tr>
                </thead>
                <tbody>
                    @foreach ($total_puestos_zonas as $puesto)
                        <tr>
                            <th scope="row">{{$loop->index+1}}</th> 
                            <td>{{$puesto->zona}}</td>                          
                            <td>{{$puesto->nombre_puesto}}</td>                           
                            <td></td> 
                                                                               
                          </tr>
                    @endforeach
                 
                  
                </tbody>
              </table>
     
</div>

     
      @endsection