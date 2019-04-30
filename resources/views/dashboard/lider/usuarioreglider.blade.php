@extends('../../layout.layoutlider')
@section('titulo','REGISTRO DE USUARIOS POR LIDER')
@section('content')
<div class="col-md-9">
    @php
        //dd($usu_reg_by_lider->first());
    @endphp
    @if(is_null($usu_reg_by_lider->first()))
      <p>No tienes usuarios registrados para la campaña</p>
    @else
    <p>Listado de usuarios regitrados por el/la lider <strong>{{$usu_reg_by_lider[0]->lider}}</strong> </p>
        <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Usuario</th>
                    <th scope="col">Telefono</th>
                    <th scope="col">Puesto de votación</th>
                    <th scope="col">Mesa de votación</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($usu_reg_by_lider as $usuario)
                        <tr>
                            <th scope="row">{{$loop->index+1}}</th>
                            <td>{{$usuario->nombre}} {{$usuario->apellido}}</td>
                            <td>{{$usuario->telefono}}</td>
                            <td>{{$usuario->nombre_puesto}}</td>
                            <td>{{$usuario->mesa}}</td>
                          </tr>
                    @endforeach
                  
                  
                </tbody>
              </table>
       @endif
</div>

     
      @endsection