
@extends('layouts.default')
@section('content')
<h2 class="pt-4">Libro: {{$libro->name}}</h2>
<div class="table-responsive">
    <table class="table table-bordered table-hover table-striped">
        <tbody>
            <tr>
                <td>ID</td>
                <td>{{$libro->id }}</td>
              </tr>                 
            <tr>
                <td>Nombre</td>
                <td>{{$libro->name }}</td>
              </tr>                 
            <tr>
                <td>Valor</td>
                <td>{{$libro->valor }}</td>
              </tr>                 
            <tr>
                <td>Autor</td>
                <td>{{$libro->author }}</td>
              </tr>                 
        </tbody>
    </table>
</div>
@endsection