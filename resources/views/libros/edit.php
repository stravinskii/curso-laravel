<!DOCTYPE html>
<html>
<head>
	<title>Libros - Nuevo</title>
</head>
<body>
	<h4>Nuevo Libro</h4>
	<form action="/admin/libros/<?php echo $id ?>" method="POST">
		<input type="hidden" name="_method" value="PUT">
		<?php echo csrf_field() ?>

		<label for="titulo">Título</label>
		<input type="text" name="titulo" value="<?php echo $libro['titulo'] ?>">
		<label for="autor">Autor</label>
		<input type="text" name="autor" value="<?php echo $libro['autor'] ?>">
		<button type="submit">Editar</button>
	</form>
</body>
</html>