<!DOCTYPE html>
<html>
<head>
	<title>Personas - Nueva</title>
</head>
<body>
	<h4>Nueva Persona</h4>
	<form action="/admin/personas" method="POST">
		<?php echo csrf_field() ?>

		<label for="nombre">Nombre</label>
		<input type="text" name="nombre">

		<label for="apellido_paterno">Apellido Paterno</label>
		<input type="text" name="apellido_paterno">

		<label for="apellido_materno">Apellido Materno</label>
		<input type="text" name="apellido_materno">

		<label for="usuario">Usuario</label>
		<input type="text" name="usuario">

		<button type="submit">Enviar</button>
	</form>
</body>
</html>