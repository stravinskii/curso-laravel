<!DOCTYPE html>
<html>
<head>
	<title>Libros - Nuevo</title>
</head>
<body>
	<h4>Libro</h4>
	<div>
		<!-- <p>
			<strong>ISBN: </strong>
			<?php echo $libro->ISBN ?>
		</p> -->
		<p>
			<strong>Título: </strong>
			<?php echo $libro->titulo ?>
		</p>
		<p>
			<strong>Autor: </strong>
			<?php echo $libro->autor ?>
		</p>
		<p>
			<!-- <form action="/admin/libros/<?php echo $libro->ISBN ?>" method="POST"> -->
			<form action="/admin/libros/<?php echo $libro->id ?>" method="POST">
				<input type="hidden" name="_method" value="DELETE">
				<?php echo csrf_field() ?>

				<button type="submit">Eliminar</button>
			</form>
		</p>
		<p>
			<!-- <a href="/admin/libros/<?php echo $libro->ISBN ?>/edit"> -->
			<a href="/admin/libros/<?php echo $libro->id ?>/edit">
				<button type="button">Editar</button>
			</a>
		</p>
	</div>
</body>
</html>