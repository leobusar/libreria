@extends('layouts.default')

@section('title', 'Prueba 1')

@section('content')
	<p>Esto es lo que se encuentra en prueba. </p> 
@endsection

@section('header')
	@parent 
	<h2>Titulo en prueba</h2>
@endsection