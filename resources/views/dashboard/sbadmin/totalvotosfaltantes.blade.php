@extends('../../layout.layout')
@section('titulo','TOTAL PERSONAS QUE HACEN FALTA POR VOTAR')
@section('content')
<div class="col-md-9">
    @php
        //dd($usu_reg_by_lider->first());
    @endphp
    @if(is_null($usu_reg_by_lider->first()))
      <p>No tiene usuarios registrados para la campaña</p>
    @else
    <p>Listado general de usuarios en el sistema que no han confirmado su voto </p>
        <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Lider</th>
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
                            <td><div class="pl-2 bg-dark text-white"><i class="fas fa-user-tie"></i> <strong>{{$usuario->lider}} {{$usuario->apellidolider}}</strong></div> </td>
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