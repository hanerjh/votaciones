@extends('../../layout.layout')
@section('titulo','VOTOS POR ZONAS')
@section('content')
<div class="col-md-9">
   
   
    <p>LISTADO DE LIDERES  </p>
        <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Lider</th>
                    <th scope="col">Cantidad de usuarios regitrados</th>                   
                  </tr>
                </thead>
                <tbody>
                    @foreach ($total_usu_reg_por_lideres as $lideres)
                        <tr>
                            <th scope="row">{{$loop->index+1}}</th>
                            <td> {{ $lideres->lider }} </td>
                            <td><a href="usuarioslider/{{$lideres->id}}">{{$lideres->cantidad}}</a></td>                            
                          </tr>
                    @endforeach
                  
                  
                </tbody>
              </table>
     
</div>

     
      @endsection