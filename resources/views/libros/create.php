<!DOCTYPE html>
<html>
<head>
	<title>Libros - Nuevo</title>
</head>
<body>
	<h4>Nuevo Libro</h4>
	<form action="/admin/libros" method="POST">
		<?php echo csrf_field() ?>

		<!-- <label for="isbn">ISBN</label> -->
		<!-- <input type="text" name="isbn"> -->

		<label for="titulo">Título</label>
		<input type="text" name="titulo">

		<label for="autor">Autor</label>
		<input type="text" name="autor">

		<label for="editorial">Editorial</label>
		<select name="editorial">
			<?php foreach ($editoriales as $editorial): ?>
				<option value="<?php echo $editorial->id ?>">
					<?php echo $editorial->nombre ?>
				</option>
			<?php endforeach ?>
		</select>

		<button type="submit">Enviar</button>
	</form>
</body>
</html>