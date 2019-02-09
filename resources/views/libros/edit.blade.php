
@extends('layouts.default')
@section('content')
<h2 class="pt-4">Libro: {{$libro->name}}</h2>
<div class="table-responsive">
    <form action="{{action('LibroController@update', $libro->id)}}" method="post">
    {{csrf_field()}}
      <input name="_method" type="hidden" value="PUT">    
      <div class="form-group">
        <label for="id">ID</label>
        <input type="text" class="form-control" id="id"  placeholder="ID" name="id" value="{{$libro->id}}" disabled>
      </div>

      <div class="form-group">
        <label for="nombre">Nombre</label>
        <input type="text" class="form-control" id="nombre"  placeholder="Nombre" name="name" value="{{$libro->name}}">
      </div>
      <div class="form-group">
        <label for="valor">Valor</label>
        <input type="number" class="form-control" id="valor" placeholder="Valor" name="valor" value="{{$libro->valor}}">
      </div>
      <div class="form-group">
        <label for="author">Autor</label>
        <input type="text" class="form-control" id="author" placeholder="Autor" name="author" value="{{$libro->author}}">
      </div>

      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection