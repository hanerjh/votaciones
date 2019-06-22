@extends('../../layout.layout')
@section('titulo','Campaña')
@section('content')

<div class="col-8" >
      
    <form action="campaña/" method="POST" >
        <div class="form-row">
                <div class="col-12 ">
                        <legend class="text-light bg-dark px-2">Informacion Registro de Campaña</legend>
                     </div>
        @csrf
            <div class="form-group col-md-4">
                    <label for="inputState">Tipo de elección</label>
                    <select name="tipoeleccion" id="inputState"   class="form-control">          
                      <option selected>Seleccione...</option>
                    @foreach ($tipoelecciones as $eleccion)
                    <option value="{{ $eleccion->idtipoeleccion}}">{{ $eleccion->eleccion }}</option>
                    @endforeach
                      
                    </select>
                  </div>
        
          
    
            <div class="form-group col-md-6">
              <label for="inputAddress2">* Nombre de la Campaña</label>
              <input type="text" name="campaña" class="form-control" id="inputAddress2" placeholder="Campaña">
              @if($errors->has('campaña'))         
                <small class="text-danger">{{$errors->first('campaña')}}</small>  
              @endif
            </div>
            <div class="form-group col-md-2">
                    <label for="inputAddress2">* Año</label>
                    <input type="text" name="año" class="form-control"  placeholder="Año">
                    @if($errors->has('año'))         
                    <small class="text-danger">{{$errors->first('año')}} </small>  
                   @endif
            </div>

            <div class="form-group col-md-4">
                <label for="inputAddress2">* Fecha de Cierre de Campaña</label>
                <input type="date" name="fecha" class="form-control" >
                @if($errors->has('fecha'))         
                <small class="text-danger">{{$errors->first('fecha')}} </small>  
               @endif
              </div>
              
          </div>
          <button type="submit" class="btn btn-primary btn-block">Registrar</button>
       
        
    </form>
    
    </div>
    
    <div class="col-4">
      @if(session()->has('msj'))
      <div class="alert alert-success" role="alert">
       {{ session('msj') }}
      </div>
      @endif
    </div>
    

@endsection