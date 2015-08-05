<!DOCTYPE html>
<html>
<head>
	<title>Personas - Perfil</title>
</head>
<body>
	<h4>Perfil</h4>
	<div>
		<p>
			<strong>Nombre: </strong>
			<?php echo $persona->nombre ?>
		</p>
		<p>
			<strong>Apellido Paterno: </strong>
			<?php echo $persona->apellido_paterno ?>
		</p>
		<p>
			<strong>Apellido Materno: </strong>
			<?php echo $persona->apellido_materno ?>
		</p>
		<p>
			<strong>Usuario: </strong>
			<?php echo $persona->usuario->username ?>
		</p>
		<p>
			<strong>Libros: </strong>
			<?php echo $persona->libros->lists('titulo') ?>
		</p>
		<p>
			<form action="/admin/personas/<?php echo $persona->id ?>" method="POST">
				<input type="hidden" name="_method" value="DELETE">
				<?php echo csrf_field() ?>

				<button type="submit">Eliminar</button>
			</form>
		</p>
		<p>
			<a href="/admin/personas/<?php echo $persona->id ?>/edit">
				<button type="button">Editar</button>
			</a>
		</p>
		<p>
			<a href="/admin/personas/libros/<?php echo $persona->id ?>">
				<button type="button">Agregar libro</button>
			</a>
		</p>
	</div>
</body>
</html>