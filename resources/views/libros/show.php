<!DOCTYPE html>
<html>
<head>
	<title>Libros - Nuevo</title>
</head>
<body>
	<h4>Libro</h4>
	<div>
		<p>
			<strong>Título: </strong>
			<?php echo $libro['titulo'] ?>
		</p>
		<p>
			<strong>Autor: </strong>
			<?php echo $libro['autor'] ?>
		</p>
		<p>
			<form action="/admin/libros/<?php echo $id ?>" method="POST">
				<input type="hidden" name="_method" value="DELETE">
				<?php echo csrf_field() ?>

				<button type="submit">Eliminar</button>
			</form>
		</p>
		<p>
			<a href="/admin/libros/<?php echo $id ?>/edit">
				<button type="button">Editar</button>
			</a>
		</p>
	</div>
</body>
</html>