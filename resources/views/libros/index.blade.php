@extends('layouts.default')


@section('content')
@include('partials.messages')
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Autor</th>
                    <th>Valor</th>
                    <th colspan="3"></th>
                </tr>
            </thead>
            <tbody>
                 @foreach($libros as $key => $libro)
                <tr>
                    <td>{{$libro->id}}</td>
                    <td>{{$libro->name }}</td>
                    <td>{{$libro->author }}</td>
                    <td>{{$libro->valor }}</td>
                    <td><a href="{{route('libro.show', $libro->id)}}" class="btn btn-info">Mostrar</a></td>
                    <td><a href="{{route('libro.edit', $libro->id)}}" class="btn btn-success">Editar</a></td>
                    <td>
                    <form action="{{action('LibroController@destroy', $libro->id)}}" method="post">
                    {{csrf_field()}}
                    <input name="_method" type="hidden" value="DELETE">
                    <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                    </td>
                </tr>                 
                 @endforeach          	
            </tbody>
        </table>
        <div class="m-auto">{{$libros->links()}}</div>
        <a href="{{route('libro.create')}}" class="btn btn-success">Nuevo</a>

@stop