<!DOCTYPE html>
<html>
<head>
	<title>Libros - Index</title>
</head>
<body>
	<h4>Libros</h4>
	<form action="/admin/libros/search" method="GET">
		<!-- <label for="isbn">ISBN</label>
		<input type="text" name="isbn">	 -->
		<label for="titulo">Titulo</label>
		<input type="text" name="titulo">
		<label for="autor">Autor</label>
		<input type="text" name="autor">
		<button type="submit">Buscar</button>
	</form>
	<table>
		<thead>
			<!-- <th>ISBN</th> -->
			<th>Título</th>
			<th>Autor</th>
			<th></th>
		</thead>
		<tbody>
			<?php foreach ($libros as $libro): ?>
				<tr>
					<!-- <td><?php echo $libro->ISBN ?></td> -->
					<td><?php echo $libro->titulo ?></td>
					<td><?php echo $libro->autor ?></td>
					<td>
						<!-- <a href="/admin/libros/<?php echo $libro->ISBN ?>"> -->
						<a href="/admin/libros/<?php echo $libro->id ?>">
							<button type="button">Ver libro</button>
						</a>
					</td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>
	<a href="/admin/libros/create">
		<button type="button">Nuevo libro</button>
	</a>
</body>
</html>