
@extends('layouts.default')
@section('content')
<h2 class="pt-4">Nuevo Libro</h2>
<div class="table-responsive">
    <form action="{{action('LibroController@store')}}" method="post">
    {{csrf_field()}}
      <div class="form-group">
        <label for="nombre">Nombre</label>
        <input type="text" class="form-control" id="nombre"  placeholder="Nombre" name="name">
      </div>
      <div class="form-group">
        <label for="valor">Valor</label>
        <input type="number" class="form-control" id="valor" placeholder="Valor" name="valor">
      </div>
      <div class="form-group">
        <label for="author">Autor</label>
        <input type="text" class="form-control" id="author" placeholder="Autor" name="author">
      </div>

      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection