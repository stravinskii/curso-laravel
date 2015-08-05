<!DOCTYPE html>
<html>
<head>
	<title>Personas - Editar</title>
</head>
<body>
	<h4>Editar Persona</h4>
	<form action="/admin/personas/<?php echo $persona->id ?>" method="POST">
		<input type="hidden" name="_method" value="PUT">
		<?php echo csrf_field() ?>

		<label for="nombre">Nombre</label>
		<input type="text" name="nombre" value="<?php echo $persona->nombre ?>">

		<label for="apellido_paterno">Apellido Paterno</label>
		<input type="text" name="apellido_paterno" value="<?php echo $persona->apellido_paterno ?>">

		<label for="apellido_materno">Apellido Materno</label>
		<input type="text" name="apellido_materno" value="<?php echo $persona->apellido_materno ?>">

		<label for="usuario">Usuario</label>
		<input type="text" name="usuario" value="<?php echo $persona->usuario->username ?>">

		<button type="submit">Editar</button>
	</form>
</body>
</html>