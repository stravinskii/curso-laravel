<!DOCTYPE html>
<html>
<head>
	<title>Libros - Index</title>
</head>
<body>
	<h4>Libros</h4>
	<table>
		<thead>
			<th>Título</th>
			<th>Autor</th>
			<th></th>
		</thead>
		<tbody>
			<?php foreach ($libros as $id => $libro): ?>
				<tr>
					<td><?php echo $libro['titulo'] ?></td>
					<td><?php echo $libro['autor'] ?></td>
					<td>
						<a href="/admin/libros/<?php echo $id ?>">
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