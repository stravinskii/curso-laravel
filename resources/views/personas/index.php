<!DOCTYPE html>
<html>
<head>
	<title>Personas - Index</title>
</head>
<body>
	<h4>Personas</h4>
	<table>
		<thead>
			<th>Persona</th>
			<th></th>
		</thead>
		<tbody>
			<?php foreach ($personas as $persona): ?>
				<tr>
					<td><?php echo $persona->nombre_completo ?></td>
					<td>
						<a href="/admin/personas/<?php echo $persona->id ?>">
							<button type="button">Ver persona</button>
						</a>
					</td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>
	<a href="/admin/personas/create">
		<button type="button">Nueva persona</button>
	</a>
</body>
</html>