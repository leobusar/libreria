<!DOCTYPE html>
<html>
<head>
	<title>Libro Vista</title>
</head>
<body>
	<h1>Libro Vista 1</h1>
	<p>Esta es una prueba de vista</p>
	@if(isset($id))
		<p>El libro con el id {{ $id }} se llama {{ $name }} </p>
	@endif
</body>
</html>