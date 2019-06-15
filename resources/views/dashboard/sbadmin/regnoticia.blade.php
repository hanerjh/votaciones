@extends('../../layout.layout')
@section('titulo','REGISTRAR NOTICIA')
@section('content')

<div class="col-7" >
      
  <form action="/noticias" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="exampleFormControlFile1">Imagen</label>
      <input type="file" name="archivo">
    </div>
    <div class="form-group">
      <label for="exampleFormControlInput1">Titulo</label>
      <input type="text" name="titulo" class="form-control" id="titulo" placeholder="Titulo de la noticia">
    </div>
    
   
    <div class="form-group">
      <label for="exampleFormControlTextarea1">Contenido</label>
      <textarea name="contenido" class="form-control" id="editor" rows="3"></textarea>
    </div>
    <button type="submit" class="btn btn-primary btn-block">Registrar</button>
  </form>

</div>

@endsection

@section('css')
    
@endsection

@section('script')
<script src="https://cdn.ckeditor.com/4.11.4/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'editor' );
</script>
@endsection