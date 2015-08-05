<!DOCTYPE html>
<html>
<head>
	<title>Libros - Nuevo</title>
</head>
<body>
	<h4>Nuevo Libro</h4>
	<!-- <form action="/admin/libros/<?php echo $libro->ISBN ?>" method="POST"> -->
	<form action="/admin/libros/<?php echo $libro->id ?>" method="POST">
		<input type="hidden" name="_method" value="PUT">
		<?php echo csrf_field() ?>

		<!-- <label for="isbn">ISBN</label> -->
		<!-- <input type="text" name="isbn" value="<?php echo $libro->ISBN ?>"> -->

		<label for="titulo">Título</label>
		<input type="text" name="titulo" value="<?php echo $libro->titulo ?>">
		
		<label for="autor">Autor</label>
		<input type="text" name="autor" value="<?php echo $libro->autor ?>">
		
		<select name="editorial">
			<?php foreach ($editoriales as $editorial): ?>
				<option value="<?php echo $editorial->id ?>">
					<?php echo $editorial->nombre ?>
				</option>
			<?php endforeach ?>
		</select>
		
		<button type="submit">Editar</button>
	</form>
</body>
</html>