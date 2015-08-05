<!DOCTYPE html>
<html>
<head>
	<title>Personas - Perfil</title>
</head>
<body>
	<h4>Libros</h4>
	<div>
		<form method="POST" action="/admin/personas/libros/<?php echo $persona->id ?>">
			<?php echo csrf_field() ?>
			<select name="libro">
				<?php foreach ($libros as $libro): ?>
					<option value="<?php echo $libro->id ?>">
						<?php echo $libro->titulo ?>
					</option>
				<?php endforeach ?>
			</select>

			<button type="submit">Agregar libro</button>
		</form>
	</div>
</body>
</html>